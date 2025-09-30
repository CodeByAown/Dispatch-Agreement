<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dispatch Agreement')</title>
    <style>
        :root {
            --ink: #111827;
            --muted: #6b7280;
            --line: #e5e7eb;
            --bg: #f3f4f6;
            --brand: #0ea5e9;
            --brand2: #0369a1;
        }

        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            background: var(--bg);
            color: var(--ink);
            font: 400 11.5pt/1.55 system-ui, -apple-system, "Segoe UI", "Inter", Arial;
        }

        a {
            color: var(--brand2);
            text-decoration: none;
        }

        .wrap {
            max-width: 1024px;
            margin: 28px auto;
            padding: 0 16px;
        }

        .card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 8px 30px rgba(2, 6, 23, .05);
        }

        header.hero {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 10px;
        }

        .logo {
            width: 56px;
            height: 56px;
            border: 2px dashed var(--line);
            border-radius: 12px;
            display: grid;
            place-items: center;
            color: var(--muted);
            font-weight: 700;
            font-size: 10pt;
        }

        .hero h1 {
            margin: 0;
            font-size: 20pt;
            letter-spacing: .2px;
        }

        .hero p {
            margin: 2px 0 0;
            color: var(--muted);
            font-size: 10.5pt;
        }

        .hint {
            font-size: 10pt;
            color: var(--muted);
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 16px;
        }

        button, .btn {
            border: none;
            border-radius: 999px;
            padding: 10px 14px;
            font: 600 11pt/1 system-ui;
            cursor: pointer;
            display: inline-block;
        }

        .b-primary {
            background: var(--brand);
            color: white;
        }

        .b-secondary {
            background: #fff;
            border: 1px solid var(--line);
            color: var(--ink);
        }

        .b-ghost {
            background: transparent;
            color: var(--brand2);
            border: 1px dashed var(--brand);
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        @media (max-width: 900px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        label {
            font-size: 10.5pt;
            color: var(--muted);
        }

        input, select, textarea {
            appearance: none;
            border: 1px solid var(--line);
            border-radius: 10px;
            padding: 10px 12px;
            font: inherit;
            background: #fff;
        }

        textarea {
            min-height: 86px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 10pt;
            margin-top: 4px;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="wrap">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>
