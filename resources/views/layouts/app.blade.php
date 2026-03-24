<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DTSEN Jawa Tengah')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary:       #1565C0;
            --primary-dark:  #0D47A1;
            --accent-light:  #E3F2FD;
            --nav-bg:        #1565C0;
            --border:        #DEE2E6;
            --text-dark:     #212529;
            --text-muted:    #6C757D;
            --white:         #ffffff;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--white);
            color: var(--text-dark);
            font-size: 14px;
        }

        /* ===== NAVBAR ===== */
        .navbar-dtsen {
            background: #1565C0;
            width: 100%;
            position: sticky;
            top: 0;     
            z-index: 1000;
        }

        .navbar-dtsen .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 58px;
            padding: 0 24px;
        }

        .navbar-dtsen .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            flex-shrink: 0;
        }

        .navbar-dtsen .brand-logo {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .navbar-dtsen .brand-text {
            color: #fff;
            font-weight: 800;
            font-size: 18px;
            letter-spacing: 0.4px;
            white-space: nowrap;
        }

        .navbar-dtsen .navbar-nav {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 0;
            list-style: none;
            margin: 0;
            padding: 0;
            height: 58px;
        }

        .navbar-dtsen .nav-link {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
            font-size: 15px;
            padding: 0 16px !important;
            height: 36px;
            display: flex;
            align-items: center;
            border-bottom: 2px solid transparent;
            text-decoration: none;
            transition: color 0.15s, border-color 0.15s;
            white-space: nowrap;
        }

        .navbar-dtsen .nav-link:hover {
            color: #fff !important;
        }

        .navbar-dtsen .nav-link.active {
            color: #fff !important;
            border-bottom: 2px solid #fff;
            font-weight: 600;
        }

        .navbar-dtsen .dropdown-toggle::after {
            margin-left: 4px;
            vertical-align: middle;
        }

        .navbar-dtsen .dropdown-menu {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            padding: 6px 0;
            margin-top: 0;
        }

        .navbar-dtsen .dropdown-item {
            font-size: 13px;
            font-weight: 500;
            padding: 8px 18px;
            color: #212529;
        }

        .navbar-dtsen .dropdown-item:hover {
            background: #E3F2FD;
            color: #1565C0;
        }

        /* ===== MAIN ===== */
        main { min-height: 60vh; }

        /* ===== FOOTER LOGOS ===== */
        .footer-logos-section {
            padding: 32px 0;
            border-top: 1px solid #DEE2E6;
            border-bottom: 1px solid #DEE2E6;
            background: #fff;
        }

        .footer-logos-wrap {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            gap: 64px;
            flex-wrap: wrap;
            padding: 0 24px;
        }

        .footer-logo-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            text-decoration: none;
            color: #212529;
            width: 170px;
            transition: opacity 0.2s;
        }

        .footer-logo-item:hover { opacity: 0.8; }

        .footer-logo-item img {
            height: 70px;
            object-fit: contain;
            margin-bottom: 12px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .footer-logo-item .logo-name {
            font-size: 13px;
            font-weight: 700;
            color: #212529;
            line-height: 1.3;
            margin-bottom: 5px;
            text-align: center;
            width: 100%;
        }

        .footer-logo-item .logo-desc {
            font-size: 11.5px;
            color: #6C757D;
            line-height: 1.5;
            text-align: center;
            width: 100%;
        }

        /* ===== FOOTER BOTTOM ===== */
        .footer-bottom {
            background: #0D47A1;
            padding: 24px 0;
            width: 100%;
        }

        .footer-bottom-inner {
            display: flex;
            align-items: center;
            gap: 24px;
            padding: 0 24px;
        }

        .footer-bottom .footer-dinsos-logo img {
            height: 56px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .footer-bottom .footer-info {
            color: rgba(255,255,255,0.9);
            font-size: 13px;
            line-height: 1.8;
        }

        .footer-bottom .footer-info strong {
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            display: block;
            margin-bottom: 2px;
        }

        .footer-social {
            display: flex;
            gap: 8px;
            margin-top: 10px;
        }

        .footer-social a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            color: #fff;
            font-size: 14px;
            text-decoration: none;
            transition: background 0.2s;
        }

        .footer-social a:hover { background: rgba(255,255,255,0.3); }
    </style>
    @stack('styles')
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar-dtsen">
    <div class="nav-inner">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/dinas-sosial-prov-jawa-tengah.png') }}" class="brand-logo" alt="Logo">
            <span class="brand-text">DTSEN JAWA TENGAH</span>
        </a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('daya-tampung-panti*') ? 'active' : '' }}" href="{{ url('/daya-tampung-panti') }}">Daya Tampung Panti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('peta*') ? 'active' : '' }}" href="{{ url('/peta') }}">Peta</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ request()->is('rilis-data*') ? 'active' : '' }}"
                   href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Rilis Data
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">DT Jateng</a></li>
                    <li><a class="dropdown-item {{ request()->is('ppks*') ? 'active' : '' }}" href="{{ url('/ppks') }}">PPKS</a></li>
                    <li><a class="dropdown-item" href="#">PSKS</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('faqs*') ? 'active' : '' }}" href="{{ url('/faqs') }}">FAQs</a>
            </li>
        </ul>
    </div>
</nav>

{{-- CONTENT --}}
<main>
    @yield('content')
</main>

{{-- FOOTER LOGOS --}}
<div class="footer-logos-section">
    <div class="container-fluid px-4">
        <div class="footer-logos-wrap">
            <a href="#" class="footer-logo-item">
                <img src="{{ asset('assets/dinas-sosial-prov-jawa-tengah.png') }}" alt="Dinas Sosial">
                <span class="logo-name">DINAS SOSIAL PROV JATENG</span>
                <span class="logo-desc">Portal Website Milik Dinas Sosial, Provinsi Jawa Tengah</span>
            </a>
            <a href="#" class="footer-logo-item">
                <img src="{{ asset('assets/CariBDT.png') }}" alt="Caribot">
                <span class="logo-name">CARIBDT</span>
                <span class="logo-desc">Portal layanan pencarian data Data Tunggal Sosial dan Ekonomi Nasional berdasarkan NIK atau No.NIK khusus Provinsi Jawa Tengah</span>
            </a>
            <a href="#" class="footer-logo-item">
                <img src="{{ asset('assets/Kemensos.png') }}" alt="Kemensos">
                <span class="logo-name">KEMENSOS</span>
                <span class="logo-desc">Portal Website Milik Kementrian Sosial Republik Indonesia</span>
            </a>
            <a href="#" class="footer-logo-item">
                <img src="{{ asset('assets/cek Bansos Kemensos.png') }}" alt="Cekbansos">
                <span class="logo-name">CEKBANSOS KEMENSOS</span>
                <span class="logo-desc">Portal Website Milik Kementrian Sosial Republik Indonesia</span>
            </a>
        </div>
    </div>
</div>

{{-- FOOTER BOTTOM --}}
<div class="footer-bottom">
    <div class="footer-bottom-inner">
        <div class="footer-dinsos-logo">
            <img src="{{ asset('assets/dinsos_footer.png') }}" alt="Dinas Sosial">
        </div>
        <div class="footer-info">
            <strong>Dinas Sosial Provinsi Jawa Tengah</strong>
            Jl. Pahlawan No.12, Pleburan, Semarang Selatan, Kota Semarang<br>
            Telepon : (024) 8311729 / (024) 84507041<br>
            Helpdesk (WA Text Only) : +62 851-866-844-8
            <div class="footer-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-x-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>