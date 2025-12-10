@extends('partials.header')
@section('content')
    <!--==========================
        Intro Section
        ============================-->
    <section id="intro" class="intro-page">
        <div class="intro-container">
            <div id="introCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="carousel-background"><img src="{{ asset('img/intro-carousel/1.png') }}" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2>{{ $certification->title }}</h2>
                                <p>{{ $certification->certificationType->type }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main id="main">
        <section id="certification-detail" class="section-bg py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body p-5">
                                <h1 class="mb-4" style="font-size: 2rem; font-weight: 700; color: #152B5B;">
                                    {{ $certification->title }}
                                </h1>
                                
                                <div class="mb-4">
                                    <span class="badge badge-primary px-3 py-2" style="background-color: #00B2D6; font-size: 1rem;">
                                        {{ $certification->certificationType->type }}
                                    </span>
                                </div>

                                <div class="content mt-4">
                                    <h3 style="font-size: 1.5rem; font-weight: 600; color: #152B5B; margin-bottom: 1rem;">Deskripsi</h3>
                                    <p style="font-size: 1.1rem; line-height: 1.8; color: #666;">
                                        {{ $certification->description ?? 'Tidak ada deskripsi tersedia untuk sertifikasi ini.' }}
                                    </p>
                                </div>

                                <div class="mt-5">
                                    <h3 style="font-size: 1.5rem; font-weight: 600; color: #152B5B; margin-bottom: 1rem;">Informasi Tambahan</h3>
                                    <ul style="font-size: 1.1rem; line-height: 2; color: #666;">
                                        <li>Kategori: <strong>{{ $certification->certificationType->type }}</strong></li>
                                        <li>Status: <strong>Tersedia</strong></li>
                                    </ul>
                                </div>

                                <div class="mt-5">
                                    <a href="https://wa.me/6281220183537/?text=Halo%20Saya%20Ingin%20Mendaftar%20Pelatihan%20{{ urlencode($certification->title) }}" target="_blank" class="btn btn-lg text-white font-weight-bold shadow-lg rounded-pill px-5 py-3" style="background-color: #25D366; font-size: 1.1rem;">
                                        <i class="fa fa-whatsapp"></i> Daftar Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card shadow-sm sticky-top" style="top: 200px; z-index: 10;">
                            <div class="card-header" style="background: linear-gradient(135deg, #00B2D6 0%, #0096b8 100%); color: white;">
                                <h5 class="mb-0" style="font-weight: 600;">Informasi Pendaftaran</h5>
                            </div>
                            <div class="card-body">
                                <p style="font-size: 0.95rem; color: #666; line-height: 1.6;">
                                    Untuk informasi lebih lanjut atau pendaftaran, silakan hubungi kami melalui:
                                </p>
                                
                                <div class="mt-3">
                                    <p class="mb-2"><i class="fa fa-phone" style="color: #00B2D6;"></i> <strong>(021) 5964 5419</strong></p>
                                    <p class="mb-2"><i class="fa fa-whatsapp" style="color: #25D366;"></i> <strong>+62 812-2018-3537</strong></p>
                                    <p class="mb-2"><i class="fa fa-envelope" style="color: #00B2D6;"></i> <strong>sampurna.maju.bersama2024@gmail.com</strong></p>
                                </div>

                                <hr>

                                <div class="text-center" style="position: relative;">
                                    <button onclick="toggleJadwalInfoMenu()" class="btn btn-outline-primary btn-block" style="display: flex; align-items: center; justify-content: center; gap: 8px;">
                                        <i class="fa fa-calendar"></i> Lihat Jadwal Pelatihan
                                        <svg class="w-4 h-4" id="jadwalInfoArrow" fill="currentColor" viewBox="0 0 20 20" style="width: 16px; height: 16px; transition: transform 0.2s;">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div id="dropdown-jadwal-info" class="dropdown-jadwal-info" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 8px; background: white; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); z-index: 1000; border: 1px solid #e5e7eb;">
                                        @if(isset($timetableTypes) && $timetableTypes->count() > 0)
                                            @foreach($timetableTypes as $type)
                                                <button onclick="openJadwalPDF({{ $type->id }}, '{{ $type->type }}')" class="jadwal-dropdown-item" style="display: block; width: 100%; text-align: left; padding: 12px 20px; border: none; background: none; cursor: pointer; transition: background-color 0.2s; color: #374151;">
                                                    {{ $type->type }}
                                                </button>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <style>
        .jadwal-dropdown-item {
            color: #374151;
        }
        
        .jadwal-dropdown-item:hover {
            background-color: #f3f4f6;
            color: #2563eb;
        }
        
        /* Dark mode styles */
        body.dark-mode .dropdown-jadwal-info {
            background: #1f2937 !important;
            border-color: #374151 !important;
        }
        
        body.dark-mode .jadwal-dropdown-item {
            color: #e5e7eb !important;
        }
        
        body.dark-mode .jadwal-dropdown-item:hover {
            background-color: #374151 !important;
            color: #60a5fa !important;
        }
    </style>

    <script>
        function toggleJadwalInfoMenu() {
            const menu = document.getElementById('dropdown-jadwal-info');
            const arrow = document.getElementById('jadwalInfoArrow');
            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'block';
                arrow.style.transform = 'rotate(180deg)';
            } else {
                menu.style.display = 'none';
                arrow.style.transform = 'rotate(0deg)';
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('dropdown-jadwal-info');
            const button = event.target.closest('button[onclick="toggleJadwalInfoMenu()"]');
            
            if (!button && !dropdown.contains(event.target)) {
                dropdown.style.display = 'none';
                document.getElementById('jadwalInfoArrow').style.transform = 'rotate(0deg)';
            }
        });
    </script>
@endsection
