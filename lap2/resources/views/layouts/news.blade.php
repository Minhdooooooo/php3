<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LAB Query Builder')</title>
    <style>
        :root {
            --bg: #f1f5f9;
            --panel: #ffffff;
            --text: #0f172a;
            --muted: #64748b;
            --line: #e2e8f0;
            --brand: #0f766e;
            --brand-soft: #e6fffb;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, #dff6ff 0%, transparent 38%),
                radial-gradient(circle at bottom right, #d1fae5 0%, transparent 40%),
                var(--bg);
        }

        .wrapper {
            max-width: 960px;
            margin: 34px auto;
            padding: 0 16px;
        }

        .panel {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 14px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
            overflow: hidden;
        }

        .header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--line);
            background: linear-gradient(90deg, #f8fafc 0%, #ecfeff 100%);
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
        }

        .nav {
            margin-top: 12px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .nav a {
            text-decoration: none;
            font-weight: 600;
            color: var(--brand);
            border: 1px solid #99f6e4;
            background: var(--brand-soft);
            border-radius: 999px;
            padding: 8px 14px;
            font-size: 14px;
        }

        .content {
            padding: 22px 24px 28px;
        }

        .news-item {
            padding: 14px 0;
            border-bottom: 1px solid var(--line);
        }

        .news-item:last-child {
            border-bottom: 0;
        }

        .news-title {
            margin: 0 0 8px;
            font-size: 21px;
        }

        .news-title a {
            color: #0f172a;
            text-decoration: none;
        }

        .news-title a:hover {
            text-decoration: underline;
        }

        .meta {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
        }

        .summary {
            margin: 8px 0 0;
            color: #334155;
            line-height: 1.65;
        }

        .empty {
            margin: 0;
            color: var(--muted);
        }

        .detail-body {
            margin-top: 14px;
            line-height: 1.75;
            color: #1f2937;
        }

        @media (max-width: 640px) {
            .wrapper { margin-top: 18px; }
            .header, .content { padding: 16px; }
            .news-title { font-size: 18px; }
            .nav a { font-size: 13px; }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="panel">
            <div class="header">
                <h1>LAB 1 - Query Builder</h1>
                <div class="nav">
                    <a href="{{ route('xemnhieu') }}">Tin xem nhieu</a>
                    <a href="{{ route('tinmoi') }}">Tin moi</a>
                    <a href="{{ route('tintrongloai', ['id' => 12]) }}">Tin trong loai 12</a>
                    <a href="{{ route('tintrongloai', ['id' => 9]) }}">Tin trong loai 9</a>
                </div>
            </div>
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
