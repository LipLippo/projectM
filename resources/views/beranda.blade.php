@extends('layouts.app')

@section('title', 'Beranda - DTSEN Jawa Tengah')

@push('styles')
<style>
    /* ===== HERO ===== */
    .hero-section {
        background: #ffffff;
        padding: 40px 0 44px;
    }

    /* ===== ILUSTRASI ===== */
    .ilustrasi-col {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 340px;
    }

    .ilustrasi-col img {
        width: 220px;
        max-width: 100%;
    }

    .btn-survey {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 20px;
        background: #1565C0;
        color: #fff;
        border: none;
        border-radius: 20px;
        padding: 7px 18px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 12.5px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-survey:hover {
        background: #0D47A1;
        color: #fff;
        text-decoration: none;
    }

    /* ===== JUDUL CEK ===== */
    .cek-title {
        font-size: 26px;
        font-weight: 800;
        color: #1565C0;
        margin-bottom: 2px;
    }

    .cek-subtitle {
        font-size: 13px;
        color: #6C757D;
        margin-bottom: 20px;
    }

    /* ===== CARD ===== */
    .card-cek {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #DEE2E6;
        overflow: hidden;
    }

    /* ===== TABS ===== */
    .tab-cek {
        display: flex;
        border-bottom: 1px solid #DEE2E6;
    }

    .tab-btn {
        flex: 1;
        padding: 14px 16px;
        background: #f8f9fa;
        border: none;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13px;
        font-weight: 600;
        color: #6C757D;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border-bottom: 2px solid transparent;
        margin-bottom: -1px;
        transition: all 0.2s;
    }

    .tab-btn.active {
        background: #fff;
        color: #1565C0;
        border-bottom: 2px solid #1565C0;
    }

    .tab-btn .tab-icon {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        background: #E3F2FD;
        color: #1565C0;
    }

    .tab-btn.active .tab-icon {
        background: #1565C0;
        color: #fff;
    }

    .tab-btn.spmb .tab-icon {
        background: #E8F5E9;
        color: #2E7D32;
    }

    .tab-btn.spmb.active .tab-icon {
        background: #2E7D32;
        color: #fff;
    }

    /* ===== FORM ===== */
    .tab-body {
        padding: 20px;
    }

    .tab-label {
        font-size: 13px;
        font-weight: 700;
        color: #1565C0;
        margin-bottom: 14px;
    }

    .form-select-dtsen,
    .form-control-dtsen {
        width: 100%;
        border: 1px solid #C9D8EC;
        border-radius: 8px;
        padding: 10px 14px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13.5px;
        color: #212529;
        background-color: #fff;
        margin-bottom: 10px;
        appearance: none;
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%231565C0' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 14px center;
        padding-right: 36px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-control-dtsen {
        background-image: none;
        padding-right: 14px;
    }

    .form-select-dtsen:focus,
    .form-control-dtsen:focus {
        outline: none;
        border-color: #1565C0;
        box-shadow: 0 0 0 3px rgba(21,101,192,0.10);
    }

    .nik-wrapper {
        position: relative;
        margin-bottom: 10px;
    }

    .nik-wrapper .nik-icon {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #90CAF9;
        font-size: 13px;
    }

    .nik-wrapper .form-control-dtsen {
        padding-left: 36px;
        margin-bottom: 0;
    }

    .btn-cari {
        background: #1565C0;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 10px 24px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13.5px;
        font-weight: 700;
        cursor: pointer;
        margin-top: 4px;
        transition: background 0.2s;
    }

    .btn-cari:hover { background: #0D47A1; }

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
    }

    .info-subtitle {
        font-size: 13px;
        color: #6C757D;
        text-align: center;
        margin: 0;
    }
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="hero-section">
    <div class="container">
        <div class="row align-items-stretch">

            {{-- ILUSTRASI --}}
            <div class="col-md-4 col-lg-3">
                <div class="ilustrasi-col">
                    <img src="{{ asset('assets/icon1.png') }}" alt="Ilustrasi">
                    <a href="#" class="btn-survey">
                        <i class="fas fa-star" style="font-size:10px;color:#FFC107;"></i>
                        Survey Kepuasan
                    </a>
                </div>
            </div>

            {{-- FORM --}}
            <div class="col-md-8 col-lg-9">
                <h1 class="cek-title">Cek Kepesertaan DTSEN</h1>
                <p class="cek-subtitle">Masukkan wilayah dan NIK untuk mengecek data</p>

                <div class="card-cek">
                    {{-- TABS --}}
                    <div class="tab-cek">
                        <button class="tab-btn active" onclick="switchTab('nik', this)">
                            <span class="tab-icon"><i class="fas fa-id-card"></i></span>
                            Cek Kepesertaan DTSEN (NIK)
                        </button>
                        <button class="tab-btn spmb" onclick="switchTab('spmb', this)">
                            <span class="tab-icon"><i class="fas fa-check-circle"></i></span>
                            Cek Status Afirmasi SPMB 2026
                        </button>
                    </div>

                    {{-- TAB NIK --}}
                    <div id="tab-nik" class="tab-body">
                        <p class="tab-label">CEK Kepesertaan DT Jateng Berdasarkan NIK</p>
                        <form action="{{ route('cek.kepesertaan') }}" method="GET">
                            <select name="kabupaten" class="form-select-dtsen" id="sel-kabupaten" required>
                                <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                                @foreach($kabupaten ?? [] as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>

                            <select name="kecamatan" class="form-select-dtsen" id="sel-kecamatan" required>
                                <option value="" disabled selected>Pilih Kecamatan</option>
                            </select>

                            <select name="desa" class="form-select-dtsen" id="sel-desa" required>
                                <option value="" disabled selected>Pilih Desa/Kelurahan</option>
                            </select>

                            <div class="nik-wrapper">
                                <i class="fas fa-fingerprint nik-icon"></i>
                                <input type="text" name="nik" class="form-control-dtsen"
                                    placeholder="NIK" maxlength="16" pattern="\d{16}">
                            </div>

                            <button type="submit" class="btn-cari">
                                <i class="fas fa-search me-1"></i> Cari
                            </button>
                        </form>
                    </div>

                    {{-- TAB SPMB --}}
                    <div id="tab-spmb" class="tab-body" style="display:none;">
                        <p class="tab-label" style="color:#2E7D32;">CEK Status Afirmasi SPMB 2026</p>
                        <form action="{{ route('cek.spmb') }}" method="GET">
                            <select name="kabupaten_spmb" class="form-select-dtsen" required>
                                <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                                @foreach($kabupaten ?? [] as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>

                            <div class="nik-wrapper">
                                <i class="fas fa-fingerprint nik-icon"></i>
                                <input type="text" name="nik_spmb" class="form-control-dtsen"
                                    placeholder="NIK" maxlength="16">
                            </div>

                            <button type="submit" class="btn-cari" style="background:#2E7D32;">
                                <i class="fas fa-search me-1"></i> Cari
                            </button>
                        </form>
                    </div>
                </div>{{-- /card-cek --}}
            </div>

        </div>
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
function switchTab(tab, btn) {
    document.getElementById('tab-nik').style.display  = 'none';
    document.getElementById('tab-spmb').style.display = 'none';
    document.getElementById('tab-' + tab).style.display = 'block';
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
}

document.getElementById('sel-kabupaten').addEventListener('change', function () {
    const id = this.value;
    const kec = document.getElementById('sel-kecamatan');
    const desa = document.getElementById('sel-desa');
    kec.innerHTML  = '<option value="" disabled selected>Memuat...</option>';
    desa.innerHTML = '<option value="" disabled selected>Pilih Desa/Kelurahan</option>';
    fetch(`/api/kecamatan/${id}`)
        .then(r => r.json())
        .then(data => {
            kec.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';
            data.forEach(k => kec.innerHTML += `<option value="${k.id}">${k.nama}</option>`);
        });
});

document.getElementById('sel-kecamatan').addEventListener('change', function () {
    const id = this.value;
    const desa = document.getElementById('sel-desa');
    desa.innerHTML = '<option value="" disabled selected>Memuat...</option>';
    fetch(`/api/desa/${id}`)
        .then(r => r.json())
        .then(data => {
            desa.innerHTML = '<option value="" disabled selected>Pilih Desa/Kelurahan</option>';
            data.forEach(d => desa.innerHTML += `<option value="${d.id}">${d.nama}</option>`);
        });
});
</script>
@endpush