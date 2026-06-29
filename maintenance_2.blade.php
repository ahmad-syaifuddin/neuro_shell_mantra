<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Failure</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --border-color: rgba(148, 163, 184, 0.1);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --accent-red: #ef4444;
            --accent-glow: rgba(239, 68, 68, 0.2);
            --code-bg: #020617;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background-color: var(--bg-color);
            background-image: radial-gradient(#1e293b 1px, transparent 1px);
            background-size: 24px 24px;
            color: var(--text-primary);
            font-family: 'Figtree', sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 1rem;
        }

        .glow {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(239, 68, 68, 0.05) 0%, transparent 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
            pointer-events: none;
        }

        .container {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            padding: 3rem 2rem;
            width: 100%;
            max-width: 34rem;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            position: relative;
            animation: fadeIn 0.8s ease-out;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; height: 4px;
            background: linear-gradient(90deg, transparent, var(--accent-red), transparent);
            border-radius: 1rem 1rem 0 0;
            box-shadow: 0 2px 10px var(--accent-glow);
        }

        .icon-wrapper {
            background: rgba(239, 68, 68, 0.1);
            width: 80px; height: 80px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.5rem auto;
            border: 1px solid rgba(239, 68, 68, 0.2);
            box-shadow: 0 0 20px var(--accent-glow);
            animation: pulse 3s infinite;
        }

        .icon-wrapper svg { width: 40px; height: 40px; color: var(--accent-red); }

        h1 {
            font-size: 1.75rem; font-weight: 700; letter-spacing: -0.025em; margin-bottom: 0.75rem;
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }

        .message {
            color: var(--text-secondary); font-size: 1rem; line-height: 1.6; margin-bottom: 2rem; font-weight: 400;
        }

        .terminal {
            background: var(--code-bg); border: 1px solid var(--border-color);
            border-radius: 0.5rem; padding: 1.25rem; text-align: left;
            margin-bottom: 2rem; font-family: 'Fira Code', monospace; font-size: 0.8rem;
        }

        .terminal-header { display: flex; gap: 6px; margin-bottom: 1rem; opacity: 0.5; }
        .dot { width: 10px; height: 10px; border-radius: 50%; background-color: #334155; }

        .code-line { display: flex; justify-content: space-between; margin-bottom: 0.5rem; color: var(--text-secondary); }
        .code-line:last-child { margin-bottom: 0; }
        
        .label { color: #64748b; margin-right: 1rem; }
        .value { color: #ef4444; font-weight: 500; }
        .value-neutral { color: #cbd5e1; text-transform: uppercase; }

        .footer {
            margin-top: auto; display: flex; flex-direction: column; align-items: center; gap: 0.75rem; font-size: 0.75rem; color: #475569;
        }

        .tech-stack {
            display: flex; align-items: center; gap: 0.75rem;
            background: rgba(15, 23, 42, 0.5); padding: 0.5rem 1rem;
            border-radius: 9999px; border: 1px solid rgba(255,255,255,0.05);
        }

        .separator { width: 1px; height: 12px; background: #334155; }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4); }
            70% { box-shadow: 0 0 0 15px rgba(239, 68, 68, 0); }
            100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }

        @media (max-width: 640px) { .container { padding: 2rem 1.5rem; } .code-line { flex-direction: column; gap: 0.25rem; } }
    </style>
</head>
<body>

    <div class="glow"></div>

    <div class="container">
        <div class="icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>

        <h1>System Failure</h1>

        <p class="message">{{ $message ?? 'Critical system error encountered. Service suspended.' }}</p>

        <div class="terminal">
            <div class="terminal-header">
                <div class="dot" style="background:#ef4444"></div>
                <div class="dot" style="background:#f59e0b"></div>
                <div class="dot" style="background:#10b981"></div>
            </div>
            
            <div class="code-line">
                <span class="label">ERROR_CODE</span>
                <span class="value">503_PAYMENT_REQUIRED</span>
            </div>
            <div class="code-line">
                <span class="label">REFERENCE</span>
                <span class="value-neutral">{{ strtoupper(config('app.name') ?? 'LARAVEL_SYSTEM') }}</span>
            </div>
            <div class="code-line">
                <span class="label">REQUEST_ID</span>
                <span class="value-neutral">{{ $reqId ?? uniqid() }}</span>
            </div>
             <div class="code-line">
                <span class="label">PING</span>
                <span class="value-neutral">{{ date('Y-m-d H:i:s T') }}</span>
            </div>
        </div>

        <div class="footer">
            <div class="tech-stack">
                <div style="display:flex; align-items:center; gap:0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1888 1888" style="width:1.25rem;height:1.25rem;">
                        <path fill="#ef4444" d="M791.5 1714L215 1381.5c-8.5-5.5-15-8.5-15-19.5V357.5c0-8.158 5-13.5 9.5-16L502 173c9.5-5.5 17.5-5.5 26.5 0L819 340c11.5 6.5 12 15 12 22.5v622L1073.5 845V527c0-11 5-17.5 17-24.5L1380 336c7-4 12.5-4 19.5 0l295 170c9.5 5.5 10.5 12 10.5 21.5V858c0 10.5-2.5 16-13 22.5l-278.5 160v317c0 12.5-3 17.5-14 24L821 1714c-11 6-18.5 6-29.5 0zm-9-61.5v-279l-276-156c-9-5.5-15.5-9.5-15.5-23V543L248 403.5V1345zm583-307.5v-277L831 1373.5v279zm-25.528-318.167L1098 886.5 565 1194l241 137zM782.5 1012V403L540 543v609zm583-28V708l-243-140v277zm291-139V568l-243 140v276zm-267-179.5l242-139.5-242-139.5L1147 526zM757.635 361.004L515 221.5 273 361l242 140z"/>
                    </svg>
                    <span style="color:#e2e8f0; font-weight:600;">Laravel</span>
                    <span style="color:#64748b;">v{{ app()->version() }}</span>
                </div>
                <div class="separator"></div>
                <div style="display:flex; align-items:center; gap:0.5rem;">
                    <span style="color:#777bb4; font-weight:600;">PHP</span>
                    <span style="color:#64748b;">v{{ phpversion() }}</span>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
