<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tieudetrang', 'Trang chủ tin tức')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,600;9..144,700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-sky: #d8f0ff;
            --bg-mint: #d2f8ea;
            --panel: #ffffff;
            --panel-soft: #f8fbff;
            --line: #dbe9f8;
            --text-main: #12314e;
            --text-sub: #4d6782;
            --brand: #0b67c2;
            --brand-dark: #074f95;
            --accent: #ff8f3f;
            --shadow-soft: 0 20px 45px rgba(6, 54, 103, 0.16);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Be Vietnam Pro', 'Segoe UI', sans-serif;
            color: var(--text-main);
            background:
                radial-gradient(circle at 7% 8%, rgba(255, 255, 255, 0.74) 0%, rgba(255, 255, 255, 0) 35%),
                radial-gradient(circle at 92% 86%, rgba(255, 143, 63, 0.18) 0%, rgba(255, 143, 63, 0) 40%),
                linear-gradient(145deg, var(--bg-sky), var(--bg-mint));
            padding: 1.5rem 0;
        }

        .site-shell {
            width: min(1120px, calc(100% - 2rem));
            margin: 0 auto;
            background: var(--panel);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: var(--shadow-soft);
            border: 1px solid rgba(255, 255, 255, 0.6);
            animation: riseUp 0.55s ease-out;
        }

        .hero-header {
            position: relative;
            padding: 48px clamp(20px, 4vw, 48px) 52px;
            background: linear-gradient(125deg, #0c66bc 0%, #0588be 54%, #31a4d8 100%);
            color: #ffffff;
            overflow: hidden;
        }

        .hero-header::before,
        .hero-header::after {
            content: '';
            position: absolute;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.22);
            filter: blur(2px);
        }

        .hero-header::before {
            width: 210px;
            height: 210px;
            right: -42px;
            top: -72px;
        }

        .hero-header::after {
            width: 170px;
            height: 170px;
            left: 45%;
            bottom: -88px;
        }

        .hero-eyebrow,
        .hero-title,
        .hero-subtitle {
            position: relative;
            z-index: 1;
        }

        .hero-eyebrow {
            margin: 0 0 10px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 700;
            font-size: 0.79rem;
            opacity: 0.9;
        }

        .hero-title {
            margin: 0;
            max-width: 700px;
            font-family: 'Fraunces', serif;
            font-size: clamp(1.9rem, 4vw, 2.65rem);
            line-height: 1.18;
        }

        .hero-subtitle {
            margin: 14px 0 0;
            max-width: 680px;
            color: rgba(255, 255, 255, 0.92);
            font-size: 1rem;
        }

        .site-nav {
            padding: 0.8rem 1.25rem;
            border-bottom: 1px solid var(--line);
            background: rgba(242, 248, 255, 0.95);
            backdrop-filter: blur(8px);
        }

        .menu-root {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .menu-brand {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            font-weight: 700;
            color: var(--brand-dark);
            text-decoration: none;
        }

        .menu-brand-badge {
            width: 2.2rem;
            height: 2.2rem;
            border-radius: 999px;
            display: grid;
            place-items: center;
            color: #ffffff;
            font-weight: 800;
            background: linear-gradient(140deg, #0b67c2, #119dd8);
            box-shadow: 0 9px 18px rgba(11, 103, 194, 0.3);
        }

        .menu-list {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            gap: 0.55rem;
        }

        .menu-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.58rem 0.95rem;
            border-radius: 999px;
            text-decoration: none;
            color: var(--text-main);
            border: 1px solid transparent;
            font-size: 0.93rem;
            font-weight: 600;
            transition: transform 0.24s ease, background-color 0.24s ease, color 0.24s ease, border-color 0.24s ease;
        }

        .menu-link:hover {
            transform: translateY(-2px);
            color: var(--brand-dark);
            background: #e9f5ff;
            border-color: #bfdbfe;
        }

        .menu-link.is-active {
            color: #ffffff;
            background: linear-gradient(120deg, var(--brand), #1a98d7);
            border-color: transparent;
            box-shadow: 0 10px 18px rgba(17, 119, 206, 0.32);
        }

        .site-main {
            display: grid;
            grid-template-columns: minmax(0, 2fr) minmax(270px, 1fr);
            gap: 1.25rem;
            padding: 1.25rem;
            background: var(--panel-soft);
        }

        .content-panel,
        .sidebar-panel {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 22px;
            box-shadow: 0 12px 28px rgba(9, 63, 116, 0.08);
        }

        .content-panel {
            padding: clamp(1rem, 2vw, 1.6rem);
            animation: riseUp 0.55s ease-out 0.1s both;
        }

        .sidebar-panel {
            padding: 1.1rem 1rem;
            animation: riseUp 0.55s ease-out 0.2s both;
            align-self: start;
        }

        .sidebar-title {
            margin: 0;
            font-size: 1.08rem;
            font-weight: 700;
            color: var(--brand-dark);
        }

        .sidebar-text {
            margin: 0.65rem 0 0;
            color: var(--text-sub);
            line-height: 1.6;
        }

        .quick-info {
            margin: 1rem 0 0;
            padding: 0;
            list-style: none;
            display: grid;
            gap: 0.6rem;
        }

        .quick-info li {
            display: flex;
            align-items: flex-start;
            gap: 0.55rem;
            color: var(--text-sub);
            font-size: 0.94rem;
            line-height: 1.5;
        }

        .quick-info li::before {
            content: '';
            width: 0.55rem;
            height: 0.55rem;
            border-radius: 999px;
            margin-top: 0.42rem;
            flex-shrink: 0;
            background: linear-gradient(135deg, var(--brand), #36b8dd);
        }

        .site-footer {
            padding: 0.95rem 1.5rem;
            text-align: center;
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.03em;
            color: #f4f9ff;
            background: linear-gradient(90deg, #064678 0%, #0a659f 100%);
        }

        .section-title {
            margin: 0;
            font-family: 'Fraunces', serif;
            font-size: clamp(1.45rem, 3vw, 2rem);
            line-height: 1.3;
            color: #0d3b68;
        }

        .section-subtitle {
            margin: 0.7rem 0 0;
            color: var(--text-sub);
            line-height: 1.7;
        }

        .home-intro {
            padding: 0.45rem 0 1.15rem;
        }

        .home-kicker {
            margin: 0 0 0.55rem;
            font-weight: 700;
            font-size: 0.82rem;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            color: #0a78b8;
        }

        .highlight-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 0.85rem;
        }

        .highlight-card {
            text-decoration: none;
            color: inherit;
            border-radius: 18px;
            padding: 1rem;
            border: 1px solid #d5e5f6;
            background: linear-gradient(130deg, #ffffff 0%, #f2f9ff 100%);
            box-shadow: 0 10px 20px rgba(14, 86, 141, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        }

        .highlight-card:hover {
            transform: translateY(-4px);
            border-color: #9ecff5;
            box-shadow: 0 18px 28px rgba(11, 102, 190, 0.16);
        }

        .highlight-card h3 {
            margin: 0;
            font-size: 1.05rem;
            color: #0e5da8;
        }

        .highlight-card p {
            margin: 0.55rem 0 0;
            color: var(--text-sub);
            font-size: 0.94rem;
            line-height: 1.58;
        }

        .news-card {
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 1rem;
            background: #ffffff;
            box-shadow: 0 8px 16px rgba(11, 90, 155, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .news-card + .news-card {
            margin-top: 0.8rem;
        }

        .news-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 24px rgba(11, 90, 155, 0.13);
        }

        .news-card-title {
            margin: 0;
            font-size: 1.24rem;
            line-height: 1.4;
        }

        .news-card-title a {
            color: #0c4f8a;
            text-decoration: none;
        }

        .news-card-title a:hover {
            text-decoration: underline;
        }

        .news-card-summary {
            margin: 0.62rem 0 0;
            color: var(--text-sub);
            line-height: 1.66;
        }

        .news-card-meta {
            margin: 0.75rem 0 0;
            font-size: 0.86rem;
            font-weight: 600;
            color: #5f7690;
        }

        .empty-state {
            margin: 0.6rem 0 0;
            border-radius: 14px;
            border: 1px dashed #b8d6ef;
            padding: 0.85rem 1rem;
            color: #4e6a84;
            background: #f8fcff;
        }

        .detail-title {
            margin: 0;
            font-family: 'Fraunces', serif;
            font-size: clamp(1.55rem, 3vw, 2.15rem);
            line-height: 1.32;
            color: #0d3f70;
        }

        .detail-summary {
            margin: 0.9rem 0 0;
            padding: 0.95rem;
            border-radius: 14px;
            background: #f0f8ff;
            border: 1px solid #d2e6f8;
            color: #244762;
            line-height: 1.7;
        }

        .detail-content {
            margin-top: 1rem;
            line-height: 1.74;
            color: #233b53;
        }

        .detail-content img {
            max-width: 100%;
            height: auto;
            border-radius: 14px;
        }

        @keyframes riseUp {
            from {
                opacity: 0;
                transform: translateY(14px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 1024px) {
            .site-main {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 840px) {
            body {
                padding: 0.8rem 0;
            }

            .site-shell {
                width: calc(100% - 1rem);
                border-radius: 20px;
            }

            .site-nav {
                padding: 0.7rem 0.85rem;
            }

            .menu-root {
                align-items: flex-start;
                flex-direction: column;
            }

            .highlight-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body>
<div class="site-shell">
    <header class="hero-header">
        <p class="hero-eyebrow">Bản tin trực tuyến</p>
        <h1 class="hero-title">@yield('tieudetrang', 'Trang chủ tin tức')</h1>
        <p class="hero-subtitle">Tin nóng mỗi ngày, trình bày gọn gàng và dễ theo dõi trên mọi thiết bị.</p>
    </header>

    <nav class="site-nav">
        @include('menu')
    </nav>

    <main class="site-main">
        <article class="content-panel">
            @yield('noidung')
        </article>

        <aside class="sidebar-panel">
            <h2 class="sidebar-title">Thông tin bổ sung</h2>
            <p class="sidebar-text">Chọn một chuyên mục để xem bài viết theo chủ đề bạn quan tâm.</p>
            <ul class="quick-info">
                <li>Cập nhật nội dung mới liên tục trong ngày.</li>
                <li>Ưu tiên bài nổi bật theo từng nhóm tin.</li>
                <li>Tối ưu hiển thị cho cả điện thoại và desktop.</li>
            </ul>
        </aside>
    </main>

    <footer class="site-footer">
        Phát triển bởi XYZ
    </footer>
</div>
</body>
</html>
