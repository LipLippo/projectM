@extends('layouts.app')

@section('title', 'Data Kebutuhan Intervensi Penanggulangan Kemiskinan')

@push('styles')
<style>
    /* ===== PAGE HEADER ===== */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInScale {
        from { opacity: 0; transform: scale(0.82) translateY(16px); }
        to   { opacity: 1; transform: scale(1) translateY(0); }
    }
    @keyframes slideInBottom {
        from { opacity: 0; transform: translateY(36px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .footer-logo-item, .footer-bottom-inner {
        opacity: 0;
    }

    .dt-header {
        text-align: center;
        padding: 40px 20px 28px;
        background: #fff;
        animation: fadeInUp 0.5s ease both;
    }

    .dt-header h1 {
        font-size: 26px;
        font-weight: 800;
        color: #111;
        margin: 0 0 10px;
        letter-spacing: 0.5px;
    }

    .dt-header .dt-subtitle {
        font-size: 14px;
        color: #6C757D;
        margin-top: 5px;
    }

    /* ===== TABLE CARD ===== */
    .table-card {
        background: #fff;
        border: 1px solid #DEE2E6;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 28px;
        animation: fadeInUp 0.5s ease 0.1s both;
    }

    .table-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 20px;
        border-bottom: 1px solid #DEE2E6;
        flex-wrap: wrap;
        gap: 10px;
    }

    .table-card-header .tbl-title {
        font-size: 16px;
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
        white-space: nowrap;
    }

    .search-input {
        border: 1px solid #C9D8EC;
        border-radius: 7px;
        padding: 6px 12px 6px 32px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13px;
        color: #212529;
        /* magnifying glass icon inline */
        background: #f8f9fa url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%231565C0' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cpath d='m21 21-4.35-4.35'/%3E%3C/svg%3E") no-repeat 10px center;
        width: 220px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .search-input:focus {
        outline: none;
        border-color: #1565C0;
        box-shadow: 0 0 0 3px rgba(21,101,192,0.10);
    }

    /* ===== TABLE ===== */
    .dt-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }

    .dt-table thead tr {
        background: #1565C0; 
        color: #fff;
    }

    .dt-table thead th {
        padding: 11px 14px;
        font-weight: 700;
        font-size: 13px;
        white-space: nowrap;
        border: none;
        vertical-align: middle;
        text-align: center;
    }

    /* Arrows logic layout */
    .th-sort-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
    }

    .dt-table tbody tr {
        border-bottom: 1px solid #F1F3F5;
        transition: background 0.15s;
    }

    .dt-table tbody tr:hover {
        background: #F0F7FF;
    }

    .dt-table tbody td {
        padding: 10px 14px;
        color: #212529;
        vertical-align: middle;
    }

    .dt-table tbody td.td-no {
        color: #6C757D;
        text-align: center;
    }

    .dt-table tbody td.td-num {
        text-align: right;
        font-variant-numeric: tabular-nums;
    }

    /* ===== PAGINATION ===== */
    .pagination-wrap {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 20px;
        border-top: 1px solid #DEE2E6;
        flex-wrap: wrap;
        gap: 8px;
    }

    .pagination-info {
        font-size: 12.5px;
        color: #6C757D;
    }

    .pagination-btns {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .page-btn {
        background: #f8f9fa;
        border: 1px solid #DEE2E6;
        border-radius: 6px;
        padding: 4px 10px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 12.5px;
        color: #212529;
        cursor: pointer;
        transition: background 0.15s, color 0.15s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .page-btn:hover {
        background: #E3F2FD;
        color: #1565C0;
        border-color: #90CAF9;
    }

    .page-btn.active {
        background: #1565C0;
        color: #fff;
        border-color: #1565C0;
    }

    .page-btn.disabled {
        opacity: 0.45;
        pointer-events: none;
    }

    /* Keterangan and Info Section */
    .keterangan-section {
        margin-top: 24px;
        margin-bottom: 24px;
        font-size: 13.5px;
        line-height: 1.8;
        animation: fadeInUp 0.5s ease 0.2s both;
    }
    
    .keterangan-section strong {
        display: block;
        color: #111;
        margin-bottom: 4px;
    }

    .btn-permohonan {
        display: inline-block;
        background-color: #03A9F4;
        color: white;
        text-transform: uppercase;
        font-weight: 700;
        font-size: 12px;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        margin-bottom: 16px;
        border: none;
        cursor: pointer;
        transition: background 0.2s, transform 0.2s;
        animation: fadeInUp 0.5s ease 0.3s both;
    }

    .btn-permohonan:hover {
        background-color: #0288D1;
        color: white;
        transform: translateY(-2px);
    }

    .syarat-info {
        font-size: 13.5px;
        font-weight: 600;
        line-height: 1.7;
        color: #212529;
        animation: fadeInUp 0.5s ease 0.4s both;
    }

    .syarat-list {
        margin-top: 4px;
        padding-left: 0;
        list-style: none;
        font-size: 13.5px;
        font-weight: 600;
        line-height: 1.7;
        color: #212529;
    }

    .syarat-list li {
        margin-bottom: 4px;
    }
    
    hr {
        border: none;
        border-top: 1px solid #C9D8EC;
        margin: 24px 0;
        animation: fadeInUp 0.5s ease 0.25s both;
    }
</style>
@endpush

@section('content')

{{-- PAGE HEADER --}}
<div class="dt-header">
    <h1>Data Kebutuhan Intervensi Penanggulangan Kemiskinan</h1>
    <h1>Jawa Tengah</h1>
    <div class="dt-subtitle">Sumber: Penetapan DT Jateng 10 April 2023</div>
</div>

<div class="container pb-5">
    
    {{-- TABLE WRAPPER --}}
    <div class="table-card">
        <div class="table-card-header">
            <span class="tbl-title">Data Kabupaten</span>
            <div class="search-wrap">
                <label for="search">Search:</label>
                <input type="text" id="search" class="search-input"
                       placeholder=""
                       value="{{ $search }}">
            </div>
        </div>

        <div style="overflow-x:auto;">
            <table class="dt-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th style="text-align: left;">
                            <div class="th-sort-wrapper" style="justify-content: flex-start;">
                                Kabupaten <i class="fas fa-sort" style="opacity: 0.5; font-size:10px;"></i>
                            </div>
                        </th>
                        <th>
                            <div class="th-sort-wrapper">
                                RTLH <i class="fas fa-sort" style="opacity: 0.5; font-size:10px;"></i>
                            </div>
                        </th>
                        <th>
                            <div class="th-sort-wrapper">
                                RTLH P1 <i class="fas fa-sort" style="opacity: 0.5; font-size:10px;"></i>
                            </div>
                        </th>
                        <th>
                            <div class="th-sort-wrapper">
                                RTLH P2 <i class="fas fa-sort" style="opacity: 0.5; font-size:10px;"></i>
                            </div>
                        </th>
                        <th>
                            <div class="th-sort-wrapper">
                                Listrik <i class="fas fa-sort" style="opacity: 0.5; font-size:10px;"></i>
                            </div>
                        </th>
                        <th>
                            <div class="th-sort-wrapper">
                                Air <i class="fas fa-sort" style="opacity: 0.5; font-size:10px;"></i>
                            </div>
                        </th>
                        <th>
                            <div class="th-sort-wrapper">
                                Jamban <i class="fas fa-sort" style="opacity: 0.5; font-size:10px;"></i>
                            </div>
                        </th>
                        <th>
                            <div class="th-sort-wrapper">
                                ATS <i class="fas fa-sort" style="opacity: 0.5; font-size:10px;"></i>
                            </div>
                        </th>
                        <th>
                            <div class="th-sort-wrapper" style="font-size:11px; white-space:normal; line-height:1.2; text-align:center;">
                                Tidak<br>Bekerja <i class="fas fa-sort" style="opacity: 0.5; font-size:10px;"></i>
                            </div>
                        </th>
                        <th>
                            <div class="th-sort-wrapper">
                                % ART <i class="fas fa-sort" style="opacity: 0.5; font-size:10px;"></i>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dtJateng as $i => $row)
                        <tr>
                            <td class="td-no">{{ $dtJateng->firstItem() + $i }}</td>
                            <td style="text-align: left; text-transform: uppercase;">
                                {{ str_replace(['Kabupaten ', 'Kota '], '', $row->kabupaten->nama ?? '-') }}
                            </td>
                            <td class="td-num">{{ number_format($row->rtlh, 0, ',', ',') }}</td>
                            <td class="td-num">{{ number_format($row->rtlh_p1, 0, ',', ',') }}</td>
                            <td class="td-num">{{ number_format($row->rtlh_p2, 0, ',', ',') }}</td>
                            <td class="td-num">{{ number_format($row->listrik, 0, ',', ',') }}</td>
                            <td class="td-num">{{ number_format($row->air, 0, ',', ',') }}</td>
                            <td class="td-num">{{ number_format($row->jamban, 0, ',', ',') }}</td>
                            <td class="td-num">{{ number_format($row->ats, 0, ',', ',') }}</td>
                            <td class="td-num">{{ number_format($row->tidak_bekerja, 0, ',', ',') }}</td>
                            <td class="td-num">{{ number_format((float)$row->pct_art, 2, ',', '.') }}%</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center py-4 text-muted">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">
            <div class="pagination-info">
                @php
                    $from = $dtJateng->total() > 0 ? $dtJateng->firstItem() : 0;
                    $to   = $dtJateng->total() > 0 ? $dtJateng->lastItem() : 0;
                    $total = $dtJateng->total();
                @endphp
                Showing {{ $from }} to {{ $to }} of {{ $total }} entries
            </div>
            
            @if($dtJateng->hasPages())
            <div class="pagination-btns">
                <a href="{{ $dtJateng->previousPageUrl() }}" class="page-btn {{ $dtJateng->onFirstPage() ? 'disabled' : '' }}">Previous</a>
                
                @if($dtJateng->lastPage() <= 5)
                    @for($p=1; $p<=$dtJateng->lastPage(); $p++)
                        <a href="{{ $dtJateng->url($p) }}" class="page-btn {{ $dtJateng->currentPage() == $p ? 'active' : '' }}">{{ $p }}</a>
                    @endfor
                @else
                    {{-- Standard simple numeric loop assuming <= ~4 pages visual --}}
                    @php
                        $start = max(1, $dtJateng->currentPage() - 1);
                        $end = min($dtJateng->lastPage(), $dtJateng->currentPage() + 1);
                    @endphp
                    @if($start > 1) <a href="{{ $dtJateng->url(1) }}" class="page-btn">1</a> @if($start > 2) <span style="color:#6C757D">...</span> @endif @endif
                    
                    @for($p=$start; $p<=$end; $p++)
                        <a href="{{ $dtJateng->url($p) }}" class="page-btn {{ $dtJateng->currentPage() == $p ? 'active' : '' }}">{{ $p }}</a>
                    @endfor
                    
                    @if($end < $dtJateng->lastPage()) @if($end < $dtJateng->lastPage() - 1) <span style="color:#6C757D">...</span> @endif <a href="{{ $dtJateng->url($dtJateng->lastPage()) }}" class="page-btn">{{ $dtJateng->lastPage() }}</a> @endif
                @endif
                
                <a href="{{ $dtJateng->nextPageUrl() }}" class="page-btn {{ !$dtJateng->hasMorePages() ? 'disabled' : '' }}">Next</a>
            </div>
            @else
            <div class="pagination-btns">
                <a href="#" class="page-btn disabled">Previous</a>
                <a href="#" class="page-btn active">1</a>
                <a href="#" class="page-btn disabled">Next</a>
            </div>
            @endif
        </div>
    </div>

    {{-- KETERANGAN & INFO PENGAJUAN DATA --}}
    <div class="keterangan-section">
        <strong>Keterangan:</strong>
        <strong>KRT = Kepala Rumah Tangga</strong>
        <strong>ART = Anggota Rumah Tangga</strong>
    </div>

    <hr>

    <a href="#" class="btn-permohonan">PERMOHONAN DATA</a>
    
    <div class="syarat-info">
        Untuk kebutuhan intervensi data dapat diakses dengan syarat dan ketentuan sebagai berikut :
        <ol class="syarat-list">
            <li>1. Mengajukan permohonan kepada Kepala Dinas Sosial Prov Jateng</li>
            <li>2. Melampirkan profil lembaga/organisasi yang akan memberikan intervensi.</li>
            <li>3. Akan dilakukan verifikasi terkait permohonan data oleh dinas sosial</li>
            <li>4. Data akan diserahkan setelah seluruh persyaratan terpenuhi.</li>
        </ol>
    </div>

</div>

@endsection

@push('scripts')
<script>
// Live Search Debounce
let timer;
document.getElementById('search').addEventListener('input', function() {
    clearTimeout(timer);
    const val = this.value;
    timer = setTimeout(() => {
        const url = new URL(window.location.href);
        if(val) {
            url.searchParams.set('search', val);
        } else {
            url.searchParams.delete('search');
        }
        url.searchParams.delete('page');
        window.location.href = url.toString();
    }, 600);
});

// ===== Animasi Scroll =====
const opts = { threshold: 0.15, rootMargin: '0px 0px -30px 0px' };

const scrollObs = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el = entry.target;

        if (el.classList.contains('footer-logo-item')) {
            const delay = (el.dataset.logoIdx || 0) * 120;
            el.style.animation = `fadeInScale 0.5s ease ${delay}ms both`;
            el.style.opacity   = '1';
        }
        else if (el.classList.contains('footer-bottom-inner')) {
            el.style.animation = 'slideInBottom 0.6s ease both';
            el.style.opacity   = '1';
        }

        scrollObs.unobserve(el);
    });
}, opts);

document.querySelectorAll('.footer-logo-item').forEach((el, i) => {
    el.dataset.logoIdx = i;
    scrollObs.observe(el);
});

const footerBottomInner = document.querySelector('.footer-bottom-inner');
if (footerBottomInner) scrollObs.observe(footerBottomInner);
</script>
@endpush
