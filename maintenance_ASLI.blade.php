<!DOCTYPE html>
<html lang="en" class="antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - {{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['ui-sans-serif', 'system-ui', '-apple-system', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                        mono: ['Fira Code', 'ui-monospace', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', 'monospace'],
                    }
                }
            }
        }
    </script>

    <style>
        /* thin scrollbar to match the accent strip feel */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 9999px; }
    </style>
</head>
<body class="bg-[#f7f8fa] text-gray-900 font-sans">

    {{-- right edge accent strip, an Ignition signature detail --}}
    <div class="fixed top-0 right-0 h-full w-[3px] bg-red-500 z-40"></div>

    <div class="min-h-screen flex flex-col">

        {{-- Top toolbar --}}
        <div class="bg-white border-b border-gray-200 sticky top-0 z-30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-12 flex items-center justify-between">
                <div class="flex items-center gap-6">
                    <button type="button" class="flex items-center gap-1.5 text-[11px] font-bold tracking-wider text-red-500">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="4" rx="1"></rect>
                            <rect x="3" y="10" width="18" height="4" rx="1"></rect>
                            <rect x="3" y="16" width="18" height="4" rx="1"></rect>
                        </svg>
                        STACK
                    </button>
                    <button type="button" class="flex items-center gap-1.5 text-[11px] font-bold tracking-wider text-gray-400 hover:text-gray-600">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="3" width="16" height="18" rx="2"></rect>
                            <line x1="8" y1="8" x2="16" y2="8"></line>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                            <line x1="8" y1="16" x2="12" y2="16"></line>
                        </svg>
                        CONTEXT
                    </button>
                    <button type="button" class="flex items-center gap-1.5 text-[11px] font-bold tracking-wider text-gray-400 hover:text-gray-600">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 12v7a1 1 0 001 1h14a1 1 0 001-1v-7"></path>
                            <polyline points="16 6 12 2 8 6"></polyline>
                            <line x1="12" y1="2" x2="12" y2="15"></line>
                        </svg>
                        SHARE
                    </button>
                </div>
                <div class="flex items-center gap-5">
                    <a href="https://laravel.com/docs" target="_blank" class="flex items-center gap-1.5 text-[11px] font-bold tracking-wider text-gray-400 hover:text-gray-600">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 016.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"></path>
                        </svg>
                        DOCS
                    </a>
                    <button type="button" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09a1.65 1.65 0 00-1-1.51 1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09a1.65 1.65 0 001.51-1 1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Error headline banner --}}
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col lg:flex-row gap-4 items-stretch">

                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
                        <span class="text-xs font-semibold text-gray-600 font-mono bg-gray-100 inline-block px-2 py-1 rounded">
                            {{ $exceptionClass ?? 'Illuminate\\Database\\QueryException' }}
                        </span>
                        <div class="flex items-center gap-4 text-xs font-mono text-gray-400">
                            <span>PHP {{ phpversion() }}</span>
                            <span class="flex items-center gap-1 text-red-400">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                                {{ app()->version() }}
                            </span>
                        </div>
                    </div>
                    <h1 class="text-xl md:text-2xl font-bold text-gray-900 tracking-tight leading-snug break-words">
                        {{ $message ?? "SQLSTATE[HY000]: General error: 1017 Database schema collation mismatch or integrity constraint violation." }}
                    </h1>
                </div>

                <div class="relative bg-emerald-400 rounded-xl shadow-sm px-5 py-4 lg:w-80 shrink-0 text-white">
                    <button type="button" class="absolute top-2.5 right-2.5 text-white/70 hover:text-white">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                    <div class="font-bold text-sm mb-1">{{ $suggestionTitle ?? 'Payment Required' }}</div>
                    <div class="text-sm text-emerald-50 leading-snug pr-3">
                        {{ $suggestionText ?? 'Did you mean to check the subscription status before running this query?' }}
                    </div>
                </div>

            </div>
        </div>

        {{-- Body: stack trace + code viewer --}}
        <div class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Stack trace sidebar --}}
            <div class="lg:col-span-1 order-2 lg:order-1">
                <button type="button" class="flex items-center gap-1.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3 hover:text-gray-600">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="7 13 12 18 17 13"></polyline>
                        <polyline points="7 6 12 11 17 6"></polyline>
                    </svg>
                    Expand vendor frames
                </button>

                <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
                    <ul class="divide-y divide-gray-200 text-sm">

                        <li class="px-4 py-2.5 flex items-center justify-between text-gray-400 hover:bg-gray-50 cursor-pointer select-none">
                            <span class="text-xs font-medium">4 vendor frames</span>
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </li>

                        <li class="px-4 py-3 bg-red-500 border-l-4 border-red-700">
                            <div class="text-sm text-white font-mono break-all leading-snug">vendor/laravel/framework/src/Illuminate/Database/Connection.php:760</div>
                            <div class="text-xs text-white/90 font-semibold mt-1">runQueryCallback</div>
                        </li>

                        <li class="px-4 py-2.5 flex items-center justify-between text-gray-400 hover:bg-gray-50 cursor-pointer select-none">
                            <span class="text-xs font-medium">7 vendor frames</span>
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </li>

                        <li class="px-4 py-3 hover:bg-gray-50 transition-colors cursor-pointer">
                            <div class="text-sm text-gray-700 font-mono break-all leading-snug">App\Http\Middleware\CacheControl:13</div>
                            <div class="text-xs text-gray-500 font-semibold mt-1">handle</div>
                        </li>

                        <li class="px-4 py-2.5 flex items-center justify-between text-gray-400 hover:bg-gray-50 cursor-pointer select-none">
                            <span class="text-xs font-medium">44 vendor frames</span>
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </li>

                        <li class="px-4 py-3 hover:bg-gray-50 transition-colors cursor-pointer">
                            <div class="text-sm text-gray-700 font-mono break-all leading-snug">public/index.php:52</div>
                            <div class="text-xs text-gray-500 font-semibold mt-1">require</div>
                        </li>

                        <li class="px-4 py-3 hover:bg-gray-50 transition-colors cursor-pointer">
                            <div class="text-sm text-gray-700 font-mono break-all leading-snug">~/.composer/vendor/laravel/valet/server.php:234</div>
                            <div class="text-xs text-gray-500 font-semibold mt-1">[top]</div>
                        </li>

                    </ul>
                </div>
            </div>

            {{-- Code viewer --}}
            <div class="lg:col-span-2 order-1 lg:order-2 space-y-6">

                <div class="flex justify-end">
                    <span class="text-xs font-mono text-gray-400">
                        {{ $activeFile ?? 'vendor/laravel/framework/src/Illuminate/Database/Connection.php' }}:760
                    </span>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="text-[13px] font-mono leading-relaxed overflow-x-auto">
                        <div class="flex"><span class="w-10 shrink-0 text-gray-300 select-none text-right pr-4 py-0.5">757</span><span class="py-0.5"><span class="text-purple-600">try</span> {</span></div>
                        <div class="flex"><span class="w-10 shrink-0 text-gray-300 select-none text-right pr-4 py-0.5">758</span><span class="py-0.5">&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-600">return</span> <span class="text-gray-800">$callback</span>(<span class="text-gray-800">$query</span>, <span class="text-gray-800">$bindings</span>);</span></div>
                        <div class="flex"><span class="w-10 shrink-0 text-gray-300 select-none text-right pr-4 py-0.5">759</span><span class="py-0.5">} <span class="text-purple-600">catch</span> (<span class="text-blue-600">Exception</span> <span class="text-gray-800">$e</span>) {</span></div>
                        <div class="flex bg-red-50"><span class="w-10 shrink-0 text-red-500 select-none text-right pr-4 py-0.5 font-semibold">760</span><span class="py-0.5 text-red-600">&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-600">throw new</span> <span class="text-blue-600">QueryException</span>(</span></div>
                        <div class="flex bg-red-50"><span class="w-10 shrink-0 text-red-500 select-none text-right pr-4 py-0.5 font-semibold">761</span><span class="py-0.5 text-red-600">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-gray-700">$query</span>, <span class="text-gray-700">$this</span>-&gt;prepareBindings(<span class="text-gray-700">$bindings</span>), <span class="text-gray-700">$e</span></span></div>
                        <div class="flex bg-red-50"><span class="w-10 shrink-0 text-red-500 select-none text-right pr-4 py-0.5 font-semibold">762</span><span class="py-0.5 text-red-600">&nbsp;&nbsp;&nbsp;&nbsp;);</span></div>
                        <div class="flex"><span class="w-10 shrink-0 text-gray-300 select-none text-right pr-4 py-0.5">763</span><span class="py-0.5">}</span></div>
                    </div>
                </div>

                {{-- Environment & request details --}}
                <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-6">
                    <h3 class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-4 border-b border-gray-100 pb-3">Environment &amp; Request Details</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5 text-sm">
                        <div>
                            <span class="block text-gray-400 text-[11px] uppercase tracking-wide mb-1">Laravel Version</span>
                            <span class="font-mono text-gray-900 font-medium">v{{ app()->version() }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-400 text-[11px] uppercase tracking-wide mb-1">PHP Version</span>
                            <span class="font-mono text-gray-900 font-medium">v{{ phpversion() }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-400 text-[11px] uppercase tracking-wide mb-1">Application Name</span>
                            <span class="font-mono text-gray-900 font-medium">{{ config('app.name', 'Laravel') }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-400 text-[11px] uppercase tracking-wide mb-1">Request ID</span>
                            <span class="font-mono text-gray-900 font-medium">{{ $reqId ?? uniqid('SYS-') }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-400 text-[11px] uppercase tracking-wide mb-1">Constraint Signature</span>
                            <span class="font-mono text-red-600 font-bold">{{ $signature ?? 'PAYMENT_REQUIRED' }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-400 text-[11px] uppercase tracking-wide mb-1">Timestamp</span>
                            <span class="font-mono text-gray-900 font-medium">{{ date('Y-m-d H:i:s T') }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('button.flex.items-center.gap-1\\.5.text-\\[11px\\]').forEach(function (row) {
            if (row.querySelector('polyline')) {
                row.addEventListener('click', function () {
                    this.classList.toggle('opacity-60');
                });
            }
        });
    </script>

</body>
</html>
