<!DOCTYPE html>
<html lang="en" class="antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error - {{ config('app.name', 'Laravel') }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                        mono: ['Fira Code', 'ui-monospace', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', 'monospace'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-900">

    <div class="min-h-screen flex flex-col">
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-10">
                <div class="text-xs md:text-sm font-semibold text-gray-500 mb-3 font-mono bg-gray-100 inline-block px-2 py-1 rounded">
                    Illuminate\Database\QueryException
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 tracking-tight leading-snug">
                    {{ $message ?? "SQLSTATE[HY000]: General error: 1017 Database schema collation mismatch or integrity constraint violation." }}
                </h1>
            </div>
        </div>

        <div class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-1 order-2 lg:order-1">
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Stack Trace</h3>
                <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
                    <ul class="divide-y divide-gray-200">
                        <li class="px-4 py-3 bg-red-50 border-l-4 border-red-500">
                            <div class="text-sm text-red-700 font-mono break-all">vendor/laravel/framework/src/Illuminate/Database/Connection.php:760</div>
                            <div class="text-xs text-red-500 mt-1 font-mono">runQueryCallback()</div>
                        </li>
                        <li class="px-4 py-3 hover:bg-gray-50 transition-colors">
                            <div class="text-sm text-gray-700 font-mono break-all">vendor/laravel/framework/src/Illuminate/Database/Connection.php:720</div>
                            <div class="text-xs text-gray-500 mt-1 font-mono">run()</div>
                        </li>
                        <li class="px-4 py-3 hover:bg-gray-50 transition-colors">
                            <div class="text-sm text-gray-700 font-mono break-all">vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:612</div>
                            <div class="text-xs text-gray-500 mt-1 font-mono">getModels()</div>
                        </li>
                        <li class="px-4 py-3 hover:bg-gray-50 transition-colors">
                            <div class="text-sm text-gray-700 font-mono break-all">public/index.php:55</div>
                            <div class="text-xs text-gray-500 mt-1 font-mono">handle()</div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="lg:col-span-2 order-1 lg:order-2 space-y-6">

                <div class="bg-[#1e1e1e] rounded-lg shadow-lg overflow-hidden border border-gray-800">
                    <div class="flex items-center px-4 py-3 bg-[#2d2d2d] border-b border-gray-900">
                        <div class="flex gap-2 mr-4">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <span class="text-gray-400 text-xs font-mono">vendor/laravel/framework/src/Illuminate/Database/Connection.php</span>
                    </div>
                    <div class="p-4 text-xs md:text-sm font-mono text-gray-300 overflow-x-auto leading-relaxed">
                        <div class="flex"><span class="w-10 text-gray-600 select-none text-right pr-4">757</span><span class="text-gray-400">        try {</span></div>
                        <div class="flex"><span class="w-10 text-gray-600 select-none text-right pr-4">758</span><span class="text-gray-400">            return $callback($query, $bindings);</span></div>
                        <div class="flex"><span class="w-10 text-gray-600 select-none text-right pr-4">759</span><span class="text-gray-400">        } catch (Exception $e) {</span></div>
                        <div class="flex bg-red-500/20 -mx-4 px-4 py-1"><span class="w-10 text-red-400 select-none text-right pr-4">760</span><span class="text-red-400">            throw new QueryException(</span></div>
                        <div class="flex bg-red-500/20 -mx-4 px-4 py-1"><span class="w-10 text-red-400 select-none text-right pr-4">761</span><span class="text-red-400">                $query, $this->prepareBindings($bindings), $e</span></div>
                        <div class="flex bg-red-500/20 -mx-4 px-4 py-1"><span class="w-10 text-red-400 select-none text-right pr-4">762</span><span class="text-red-400">            );</span></div>
                        <div class="flex"><span class="w-10 text-gray-600 select-none text-right pr-4">763</span><span class="text-gray-400">        }</span></div>
                    </div>
                </div>

                <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4 border-b pb-2">Environment & Request Details</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-sm">
                        <div>
                            <span class="block text-gray-500 text-xs uppercase mb-1">Laravel Version</span>
                            <span class="font-mono text-gray-900 font-medium">v{{ app()->version() }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 text-xs uppercase mb-1">PHP Version</span>
                            <span class="font-mono text-gray-900 font-medium">v{{ phpversion() }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 text-xs uppercase mb-1">Application Name</span>
                            <span class="font-mono text-gray-900 font-medium">{{ config('app.name', 'Laravel') }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 text-xs uppercase mb-1">Request ID</span>
                            <span class="font-mono text-gray-900 font-medium">{{ $reqId ?? uniqid('SYS-') }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 text-xs uppercase mb-1">Constraint Signature</span>
                            <span class="font-mono text-red-600 font-bold">{{ $signature ?? 'PAYMENT_REQUIRED' }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 text-xs uppercase mb-1">Timestamp</span>
                            <span class="font-mono text-gray-900 font-medium">{{ date('Y-m-d H:i:s T') }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
