@extends('layouts.app')

@section('title', 'Daya Tampung Panti - DTSEN Jawa Tengah')

@push('styles')
<style>
    /* ===== PAGE ===== */
    .page-section {
        padding: 40px 0 52px;
        background: #fff;
    }

    /* ===== PAGE HEADER ===== */
    .page-header {
        text-align: center;
        margin-bottom: 32px;
        animation: fadeInUp 0.5s ease both;
    }

    .page-header h1 {
        font-size: 26px;
        font-weight: 800;
        color: #111;
        margin-bottom: 8px;
    }

    .page-header p {
        font-size: 13.5px;
        color: #6C757D;
        max-width: 620px;
        margin: 0 auto;
        line-height: 1.6;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ===== CARD TABEL ===== */
    .card-tabel {
        background: #fff;
        border: 1px solid #DEE2E6;
        border-radius: 12px;
        overflow: hidden;
        animation: fadeInUp 0.5s ease 0.1s both;
        box-shadow: 0 2px 12px rgba(0,0,0,0.05);
    }

    /* ===== TOOLBAR ===== */
    .tabel-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid #DEE2E6;
        gap: 12px;
        flex-wrap: wrap;
    }

    .tabel-toolbar .toolbar-title {
        font-size: 15px;
        font-weight: 700;
        color: #212529;
    }

    .search-wrap {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .search-wrap label {
        font-size: 13px;
        color: #6C757D;
        font-weight: 500;
        white-space: nowrap;
    }

    .search-input-wrap {
        position: relative;
    }

    .search-input-wrap i {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #ADB5BD;
        font-size: 13px;
        pointer-events: none;
    }

    .search-input {
        border: 1px solid #DEE2E6;
        border-radius: 6px;
        padding: 7px 30px 7px 12px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13px;
        color: #212529;
        width: 200px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .search-input:focus {
        outline: none;
        border-color: #1565C0;
        box-shadow: 0 0 0 3px rgba(21,101,192,0.10);
    }

    /* ===== TABLE ===== */
    .tabel-panti {
        width: 100%;
        border-collapse: collapse;
    }

    .tabel-panti thead tr {
        background: #1565C0;
    }

    .tabel-panti thead th {
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        padding: 11px 14px;
        text-align: left;
        white-space: nowrap;
    }

    .tabel-panti thead th.center {
        text-align: center;
    }

    .tabel-panti tbody tr {
        border-bottom: 1px solid #F0F0F0;
        transition: background 0.15s;
    }

    .tabel-panti tbody tr:hover {
        background: #F0F7FF;
    }

    .tabel-panti tbody tr:last-child {
        border-bottom: none;
    }

    .tabel-panti tbody td {
        font-size: 13px;
        color: #212529;
        padding: 11px 14px;
        vertical-align: middle;
    }

    .tabel-panti tbody td.center {
        text-align: center;
    }

    .tabel-panti tbody td.no {
        color: #6C757D;
        width: 40px;
    }

    .tabel-panti tbody td.nama a {
        color: #1565C0;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.15s;
    }

    .tabel-panti tbody td.nama a:hover {
        color: #0D47A1;
        text-decoration: underline;
    }

    .td-arrow {
        color: #ADB5BD;
        font-size: 12px;
        width: 24px;
        text-align: center;
    }

    /* ===== INFO SECTION ===== */
.info-section {
    border-top: 1px solid #b0c4de;
    border-bottom: 1px solid #b0c4de;
    padding: 32px 0;
    background: #fff;
}

.info-title {
    font-size: 28px;
    font-weight: 800;
    color: #111;
    text-align: center;
    line-height: 1.3;
    margin-bottom: 8px;
    opacity: 0;
}

.info-subtitle {
    font-size: 13px;
    color: #6C757D;
    text-align: center;
    margin: 0;
    opacity: 0;
}

    /* ===== FOOTER TABEL ===== */
    .tabel-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 20px;
        border-top: 1px solid #DEE2E6;
        flex-wrap: wrap;
        gap: 10px;
    }

    .tabel-info {
        font-size: 12.5px;
        color: #6C757D;
    }

    /* ===== PAGINATION ===== */
    .pagination-wrap {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .pagination-wrap .page-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 32px;
        height: 30px;
        padding: 0 8px;
        border: 1px solid #DEE2E6;
        border-radius: 6px;
        background: #fff;
        color: #212529;
        font-size: 12.5px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        transition: background 0.15s, color 0.15s, border-color 0.15s;
    }

    .pagination-wrap .page-btn:hover {
        background: #E3F2FD;
        border-color: #90CAF9;
        color: #1565C0;
    }

    .pagination-wrap .page-btn.active {
        background: #1565C0;
        border-color: #1565C0;
        color: #fff;
        cursor: default;
    }

    .pagination-wrap .page-btn.disabled {
        opacity: 0.4;
        cursor: not-allowed;
        pointer-events: none;
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        text-align: center;
        padding: 48px 20px;
        color: #6C757D;
    }

    .empty-state i {
        font-size: 36px;
        margin-bottom: 12px;
        color: #DEE2E6;
        display: block;
    }

    .empty-state p {
        font-size: 14px;
        margin: 0;
    }
</style>
@endpush

@section('content')

<section class="page-section">
    <div class="container">

        {{-- HEADER --}}
        <div class="page-header">
            <h1>Daya Tampung Panti</h1>
            <p>Penyediaan informasi daya tampung panti dimaksudkan untuk mendukung aksesibilitas masyarakat
               terhadap layanan panti sosial secara tepat berdasarkan jenis layanan dan kedekatan wilayah.</p>
        </div>

        {{-- CARD TABEL --}}
        <div class="card-tabel">

            {{-- TOOLBAR --}}
            <div class="tabel-toolbar">
                <span class="toolbar-title">Daya Tampung Panti</span>
                <div class="search-wrap">
                    <label>Search:</label>
                    <div class="search-input-wrap">
                        <form method="GET" action="{{ route('daya-tampung-panti') }}" id="form-search">
                            <input
                                type="text"
                                name="search"
                                class="search-input"
                                placeholder="Cari nama panti..."
                                value="{{ $search }}"
                                id="input-search"
                            >
                            <i class="fas fa-search"></i>
                        </form>
                    </div>
                </div>
            </div>

            {{-- TABLE --}}
            <table class="tabel-panti">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Panti <i class="fas fa-sort ms-1" style="font-size:10px;opacity:0.6;"></i></th>
                        <th class="center">Kuota</th>
                        <th class="center">Laki-Laki</th>
                        <th class="center">Perempuan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($panti as $index => $item)
                    <tr>
                        <td class="no">{{ $panti->firstItem() + $index }}</td>
                        <td class="nama">
                            <a href="#">{{ $item->nama_panti }}</a>
                        </td>
                        <td class="center">{{ number_format($item->kuota) }}</td>
                        <td class="center">{{ number_format($item->laki_laki) }}</td>
                        <td class="center">{{ number_format($item->perempuan) }}</td>
                        <td class="td-arrow"><i class="fas fa-chevron-right"></i></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <i class="fas fa-search"></i>
                                <p>Tidak ada data panti yang sesuai dengan pencarian "<strong>{{ $search }}</strong>"</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- FOOTER TABEL --}}
            <div class="tabel-footer">
                <span class="tabel-info">
                    Menampilkan {{ $panti->firstItem() ?? 0 }} - {{ $panti->lastItem() ?? 0 }} dari {{ $panti->total() }} data
                </span>

                {{-- PAGINATION --}}
                <div class="pagination-wrap">
                    {{-- Previous --}}
                    @if($panti->onFirstPage())
                        <span class="page-btn disabled">Previous</span>
                    @else
                        <a class="page-btn" href="{{ $panti->previousPageUrl() }}">Previous</a>
                    @endif

                    {{-- Angka halaman --}}
                    @foreach($panti->getUrlRange(1, $panti->lastPage()) as $page => $url)
                        @if($page == $panti->currentPage())
                            <span class="page-btn active">{{ $page }}</span>
                        @else
                            <a class="page-btn" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if($panti->hasMorePages())
                        <a class="page-btn" href="{{ $panti->nextPageUrl() }}">Next</a>
                    @else
                        <span class="page-btn disabled">Next</span>
                    @endif
                </div>
            </div>

        </div>{{-- /card-tabel --}}
    </div>
</section>

{{-- INFO SECTION --}}
<section class="info-section">
    <div class="container">
        <h2 class="info-title">DATA TUNGGAL SOSIAL DAN EKONOMI NASIONAL<br>PROVINSI JAWA TENGAH</h2>
        <p class="info-subtitle">Berdasarkan data Penetapan : KEPMENSOS/21/HUK/2022 (BULAN FEBRUARI TAHUN 2022)</p>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Auto-submit search saat berhenti mengetik (debounce 400ms)
    let searchTimer;
    document.getElementById('input-search').addEventListener('input', function () {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => {
            document.getElementById('form-search').submit();
        }, 400);
    });

    // Scroll animation INFO SECTION
    const opts = { threshold: 0.15, rootMargin: '0px 0px -30px 0px' };
    const scrollObs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            if (el.classList.contains('info-title')) {
                el.style.animation = 'fadeInUp 0.6s ease both';
                el.style.opacity   = '1';
            } else if (el.classList.contains('info-subtitle')) {
                el.style.animation = 'fadeInUp 0.6s ease 0.18s both';
                el.style.opacity   = '1';
            } else if (el.classList.contains('footer-logo-item')) {
                const delay = (el.dataset.logoIdx || 0) * 120;
                el.style.animation = `fadeInScale 0.5s ease ${delay}ms both`;
                el.style.opacity   = '1';
            } else if (el.classList.contains('footer-bottom-inner')) {
                el.style.animation = 'slideInBottom 0.6s ease both';
                el.style.opacity   = '1';
            }
            scrollObs.unobserve(el);
        });
    }, opts);

    document.querySelector('.info-title')    && scrollObs.observe(document.querySelector('.info-title'));
    document.querySelector('.info-subtitle') && scrollObs.observe(document.querySelector('.info-subtitle'));
    document.querySelectorAll('.footer-logo-item').forEach((el, i) => {
        el.dataset.logoIdx = i;
        scrollObs.observe(el);
    });
    document.querySelector('.footer-bottom-inner') && scrollObs.observe(document.querySelector('.footer-bottom-inner'));
</script>
@endpush