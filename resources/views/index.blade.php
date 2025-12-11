@extends('partials.header')
@section('content')
<!--==========================
Intro Section
============================-->
<section id="intro">
    <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <!-- <ol class="carousel-indicators"></ol> -->

            <div class="carousel-inner" role="listbox">
                @foreach($profile->hero_images as $index => $image)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="carousel-background">
                            <img src="{{ url('storage/' . $image) }}" alt="">
                        </div>
                        <div class="carousel-container">
                            <div class="carousel-content" style="display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                                <div style="flex-grow: 1; display: flex; flex-direction: column; justify-content: center;">
                                    <h2 class="wow fadeInUp">{{ $profile->title }}</h2>
                                    <p class="wow fadeInUp">{{ $profile->description }}</p>
                                    <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; margin-top: 30px;" class="wow fadeInUp">
                                        <a href="#training-calendar" onclick="scrollToCalendar(event)" style="padding: 12px 30px; font-size: 1.1rem; background-color: #00B2D6 !important; color: white !important; text-decoration: none; border-radius: 5px; transition: all 0.3s ease; border: none; display: inline-block;">
                                            Cari Pelatihan
                                        </a>
                                        <a href="/pendaftaran" target="_blank" style="padding: 12px 30px; font-size: 1.1rem; background-color: #28353B !important; color: white !important; text-decoration: none; border-radius: 5px; transition: all 0.3s ease; border: none; display: inline-block;">
                                            Daftar Sekarang
                                        </a>
                                    </div>
                                </div>
                                
                                <!-- Statistics Section with Overlay at Bottom -->
                                <div class="hero-statistics-wrapper" style="max-width: 1000px; margin: 0 auto; background: rgba(255, 255, 255, 0.3); backdrop-filter: blur(-1px); padding: 25px 20px; border-radius: 12px; position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); width: 85%;">
                                    <div class="statistics-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px;">
                                        
                                        <!-- Pelatihan Terlaksana -->
                                        <div style="text-align: center;">
                                            <h3 style="font-size: 1.75rem; font-weight: bold; color: white; margin-bottom: 5px;">
                                                <span class="counter" data-target="500">0</span>+
                                            </h3>
                                            <p style="font-weight: 600; font-size: 0.9rem; width: 100%;">Pelatihan Terlaksana</p>
                                        </div>

                                        <!-- Lulusan Kompeten -->
                                        <div style="text-align: center;">
                                            <h3 style="font-size: 1.75rem; font-weight: bold; color: white; margin-bottom: 5px;">
                                                <span class="counter" data-target="5000">0</span>+
                                            </h3>
                                            <p style="color: white; font-weight: 600; font-size: 0.9rem;">Lulusan Kompeten</p>
                                        </div>

                                        <!-- Mitra Perusahaan -->
                                        <div style="text-align: center;">
                                            <h3 style="font-size: 1.75rem; font-weight: bold; color: white; margin-bottom: 5px;">
                                                <span class="counter" data-target="150">0</span>+
                                            </h3>
                                            <p style="color: white; font-weight: 600; font-size: 0.9rem;">Mitra Perusahaan</p>
                                        </div>

                                        <!-- Skema Pelatihan -->
                                        <div style="text-align: center;">
                                            <h3 style="font-size: 1.75rem; font-weight: bold; color: white; margin-bottom: 5px;">
                                                <span class="counter" data-target="50">0</span>+
                                            </h3>
                                            <p style="color: white; font-weight: 600; font-size: 0.9rem;">Skema Pelatihan</p>
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<!--==========================
Profile Section
============================-->
<section id="profile" style="padding: 60px 20px; background-color: #f9f9f9;">
    <div class="container">
        <!-- Header Section -->
        <div style="text-align: center; margin-bottom: 50px;" class="wow fadeInUp">
            <h2 style="font-size: 2.5rem; margin-bottom: 10px;">
                <span style="color: #00B2D6; font-weight: bold;">Mengapa Memilih</span>
            </h2>
            <h2 style="font-size: 2.5rem; margin-bottom: 15px;">
                <span style="color: #152B5B; font-weight: bold;">Sampurna Maju Bersama</span>
            </h2>
            <p style="font-size: 1.1rem; color: #666; max-width: 800px; margin: 0 auto;">
                Rekam jejak, Kualitas dan terakreditasi sebagai mitra terpercaya
            </p>
        </div>

        <div class="row align-items-start">
            <!-- Gambar Perusahaan -->
            <div class="col-lg-6 wow fadeInLeft" style="margin-bottom: 30px;">
                @if($profile->hero_images)
                    <img src="{{ url('storage/' . $profile->hero_images[0]) }}" alt="{{ $profile->title }}" style="width: 100%; height: auto; max-height: 400px; object-fit: cover; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                @endif
            </div>
            <!-- Konten Teks -->
            <div class="col-lg-6 wow fadeInRight" style="padding-left: 30px; padding-top: 65px;">
                <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 20px; color: #111;">
                    {{ $profile->title }}
                </h2>
                <p style="font-size: 1.1rem; color: #666; line-height: 1.8; margin-bottom: 30px;">
                    {{ $profile->description }}
                </p>
            </div>
        </div>

        <!-- Cards Validitas -->
        <div class="wow fadeInUp" style="margin-top: 50px;">
            <!-- Row 1: 2 Cards -->
            <div class="feature-cards-row-2" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 20px;">
                <div class="feature-card" style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: bold; color: #007bff; margin-bottom: 15px;">
                        <i class="fa fa-certificate"></i>
                    </div>
                    <h4 style="margin: 10px 0 15px 0; font-size: 1.2rem; color: #111; font-weight: bold;">Kualitas dan Reputasi</h4>
                    <p style="color: #666; font-size: 0.95rem; line-height: 1.6;">Pelatihan dengan kualitas tinggi, sertifikasi resmi dari BNSP, serta reputasi yang baik untuk meningkatkan kepercayaan diri dan kredibilitas Anda.</p>
                </div>
                <div class="feature-card" style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: bold; color: #28a745; margin-bottom: 15px;">
                        <i class="fa fa-book"></i>
                    </div>
                    <h4 style="margin: 10px 0 15px 0; font-size: 1.2rem; color: #111; font-weight: bold;">Materi Pelatihan Terkini</h4>
                    <p style="color: #666; font-size: 0.95rem; line-height: 1.6;">Materi pelatihan selalu diperbarui sesuai dengan perkembangan terbaru di industri, sehingga Anda memperoleh pengetahuan dan keterampilan terkini yang relevan dengan keahlian Anda.</p>
                </div>
            </div>
            
            <!-- Row 2: 3 Cards -->
            <div class="feature-cards-row-3" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                <div class="feature-card" style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: bold; color: #00b2d6; margin-bottom: 15px;">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <h4 style="margin: 10px 0 15px 0; font-size: 1.2rem; color: #111; font-weight: bold;">Pembelajaran Interaktif</h4>
                    <p style="color: #666; font-size: 0.95rem; line-height: 1.6;">Metode pelatihan efektif, inovatif & interaktif untuk peserta Online maupun Offline</p>
                </div>
                <div class="feature-card" style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: bold; color: #ffc107; margin-bottom: 15px;">
                        <i class="fa fa-trophy"></i>
                    </div>
                    <h4 style="margin: 10px 0 15px 0; font-size: 1.2rem; color: #111; font-weight: bold;">Tingkat Kelulusan Tinggi</h4>
                    <p style="color: #666; font-size: 0.95rem; line-height: 1.6;">Tingkat kelulusan yang tinggi dalam sertifikasi yang kami tawarkan meningkatkan peluang Anda untuk berhasil lulus ujian sertifikasi.</p>
                </div>
                <div class="feature-card" style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: bold; color: #dc3545; margin-bottom: 15px;">
                        <i class="fa fa-briefcase"></i>
                    </div>
                    <h4 style="margin: 10px 0 15px 0; font-size: 1.2rem; color: #111; font-weight: bold;">Pengalaman dan Keahlian</h4>
                    <p style="color: #666; font-size: 0.95rem; line-height: 1.6;">Dengan pengalaman luas dalam pelatihan dan hasil yang memuaskan, pengajar yang ahli di bidang yang terkait dengan pelatihan yang kami tawarkan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==========================
Jadwal Pelatihan Calendar Section
============================-->
<section id="training-calendar" class="py-5 bg-white">
    <div class="container">
        <header class="section-header wow fadeInUp text-center mb-5">
            <h2 style="font-size: 2.5rem; margin-bottom: 10px;">
                <span style="color: #00B2D6; font-weight: bold;">Jadwal Pelatihan</span>
            </h2>
            <h2 style="font-size: 2.5rem; margin-bottom: 15px;">
                <span style="color: #152B5B; font-weight: bold;">Bulan Ini</span>
            </h2>
            <p style="font-size: 1.1rem; color: #666; max-width: 800px; margin: 0 auto;">
                Temukan jadwal pelatihan yang sesuai dengan kebutuhan Anda
            </p>
        </header>

        <!-- Calendar Navigation -->
        <div class="calendar-nav-new mb-4 wow fadeInUp">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="calendar-nav-left">
                    <button id="todayBtn" class="btn btn-outline-secondary">
                        Today
                    </button>
                    <button id="prevMonth" class="btn btn-nav-arrow">
                        <i class="fa fa-chevron-left"></i>
                    </button>
                    <button id="nextMonth" class="btn btn-nav-arrow">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                    <h3 id="currentMonth" class="calendar-month-display"></h3>
                </div>
                <div class="calendar-nav-right">
                    <button id="monthViewBtn" class="btn btn-view-selector active">
                        Month
                    </button>
                    <div class="calendar-date-selector">
                        <i class="fa fa-calendar-alt"></i>
                        <span>Date</span>
                        <input type="date" id="dateSelector" class="date-input">
                        <i class="fa fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calendar Grid -->
        <div class="calendar-container-new wow fadeInUp">
            <div class="calendar-header-new">
                <div class="calendar-day-name">MON</div>
                <div class="calendar-day-name">TUE</div>
                <div class="calendar-day-name">WED</div>
                <div class="calendar-day-name">THU</div>
                <div class="calendar-day-name">FRI</div>
                <div class="calendar-day-name">SAT</div>
                <div class="calendar-day-name">SUN</div>
            </div>
            <div class="calendar-body-new" id="calendarBody">
                <!-- Calendar days will be generated by JavaScript -->
            </div>
        </div>

        <!-- Buttons for Timetable Types -->
        <div class="text-center mt-5 wow fadeInUp">
            <div class="d-flex justify-content-center flex-wrap gap-3">
                @foreach($timetableTypes as $index => $type)
                    <button class="btn btn-lg text-white font-weight-bold shadow-lg rounded-pill px-4 py-3 timetable-btn" 
                            data-type-id="{{ $type->id }}" 
                            style="background-color: #00B2D6 !important; font-size: 1.1rem; margin: 5px;">
                        {{ $type->type }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- PDF Modal -->
        <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="max-width: 100%; margin: 0; height: 100vh;">
                <div class="modal-content" style="height: 100vh; border-radius: 0; border: none;">
                    <div class="modal-header" style="background-color: #00B2D6; color: white; padding: 15px 20px;">
                        <h5 class="modal-title" id="pdfModalTitle">Jadwal Pelatihan</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: white; opacity: 1;">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 0; height: calc(100vh - 60px); overflow: hidden;">
                        <div id="pdf-content" style="width: 100%; height: 100%;">
                            <div style="padding: 40px; text-align: center; color: #666;">
                                <p>Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Timetables data from PHP
    const timetablesData = @json($timetables);

    // Handle timetable button clicks
    document.querySelectorAll('.timetable-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const typeId = this.dataset.typeId;
            const timetable = timetablesData[typeId];
            const modalTitle = this.textContent.trim();
            
            document.getElementById('pdfModalTitle').textContent = 'Jadwal Pelatihan - ' + modalTitle;
            
            if (timetable && timetable.files) {
                // Handle both string and array format for files
                let filePath = '';
                if (typeof timetable.files === 'string') {
                    filePath = timetable.files;
                } else if (Array.isArray(timetable.files) && timetable.files.length > 0) {
                    filePath = timetable.files[0];
                }
                
                if (filePath) {
                    const pdfUrl = "{{ url('storage') }}/" + filePath;
                    document.getElementById('pdf-content').innerHTML = 
                        '<iframe src="' + pdfUrl + '" width="100%" height="100%" style="border: none;"></iframe>';
                } else {
                    document.getElementById('pdf-content').innerHTML = 
                        '<div style="padding: 40px; text-align: center; color: #666;"><p>Jadwal pelatihan belum tersedia. Silakan hubungi kami untuk informasi lebih lanjut.</p></div>';
                }
            } else {
                document.getElementById('pdf-content').innerHTML = 
                    '<div style="padding: 40px; text-align: center; color: #666;"><p>Jadwal pelatihan belum tersedia. Silakan hubungi kami untuk informasi lebih lanjut.</p></div>';
            }
            
            $('#pdfModal').modal('show');
        });
    });
</script>

<!-- Modal Detail Training -->
<div class="modal fade" id="trainingModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trainingModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body" id="trainingModalBody">
                <!-- Training details will be inserted here -->
            </div>
            <div class="modal-footer">
                <a href="https://wa.me/6281220183537/?text=Halo%20Saya%20Ingin%20Mendaftar%20Pelatihan" target="_blank" class="btn btn-primary">
                    Daftar Sekarang
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!--==========================
Brochure Section
============================-->
<section id="brochure" class="py-5 bg-white">
    <div class="container">
        <header class="section-header wow fadeInUp text-center mb-5">
            <h1 style="font-size: 1.5rem; margin-bottom: 10px;">
                <span style="color: #00B2D6; font-weight: bold;">Brosur</span>
            </h1>
            <h1 style="font-size: 1.5rem; margin-bottom: 15px;">
                <span style="color: #152B5B; font-weight: bold;">Sampurna Maju Bersama</span>
            </h1>
        </header>

        <!-- Filter Kota Slider -->
        <div class="city-filter-slider-wrapper mb-4 wow fadeInUp" id="brochure-city-filter-wrapper">
            <button class="city-slider-nav-btn city-slider-nav-prev" id="brochure-slider-prev">
                <i class="fa fa-chevron-left"></i>
            </button>
            
            <div class="city-filter-slider-container">
                <div class="city-filter-slider" id="brochure-city-filter-slider">
                    <div class="city-filter-item">
                        <button class="city-filter-btn active" data-filter="*" data-filter-type="brochure">Semua</button>
                    </div>
                    @foreach($cities as $city)
                        <div class="city-filter-item">
                            <button class="city-filter-btn" data-filter="{{ $city->id }}" data-filter-type="brochure">{{ $city->name }}</button>
                        </div>
                    @endforeach
                    <div class="city-filter-item">
                        <button class="city-filter-btn" data-filter="online" data-filter-type="brochure">Online</button>
                    </div>
                </div>
            </div>
            
            <button class="city-slider-nav-btn city-slider-nav-next" id="brochure-slider-next">
                <i class="fa fa-chevron-right"></i>
            </button>
        </div>

        <!-- Carousel Wrapper -->
        <div class="brochure-carousel-wrapper position-relative wow fadeInUp">
            <button class="carousel-btn carousel-btn-prev position-absolute" onclick="scrollBrochures('prev')">
                <i class="fa fa-chevron-left"></i>
            </button>
            
            <div class="brochure-carousel-overflow">
                <div class="brochure-carousel-container">
                    <div class="brochure-carousel" id="brochure-carousel">
                        @foreach($brochures as $brochure)
                        <div class="brochure-item mx-3" 
                             data-city="{{ $brochure->city_id }}" 
                             data-online="{{ $brochure->is_online }}">
                            <div class="card shadow-sm h-100 border-0 rounded-lg overflow-hidden hover:shadow-xl transition-all">
                                <img src="{{ url('storage/' . $brochure->image) }}" 
                                     class="card-img-top" 
                                     alt="{{ $brochure->title }}"
                                     style="height: 400px; object-fit: cover; cursor: pointer;"
                                     onclick="openBrochureModal('{{ url('storage/' . $brochure->image) }}', '{{ $brochure->title }}')">
                                <div class="card-body text-center p-3">
                                    <h5 class="card-title mb-2 font-weight-bold" style="font-size: 1rem;">{{ $brochure->title }}</h5>
                                    @if($brochure->is_online)
                                        <span class="badge badge-primary">Online</span>
                                    @elseif($brochure->city)
                                        <span class="badge badge-info">{{ $brochure->city->name }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <button class="carousel-btn carousel-btn-next position-absolute" onclick="scrollBrochures('next')">
                <i class="fa fa-chevron-right"></i>
            </button>
        </div>

        <!-- Button Lihat Brosur -->
        <div class="text-center mt-5 wow fadeInUp">
            <a href="/brosur" class="btn btn-lg text-white font-weight-bold shadow-lg hover:shadow-xl transition-all rounded-pill px-5 py-3" style="background-color: #00B2D6; font-size: 1.1rem;">
                Lihat Semua Brosur
            </a>
        </div>
    </div>
</section>

<!-- Modal untuk Preview Brosur -->
<div class="modal fade" id="brochureModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="close position-absolute text-white" data-dismiss="modal" style="right: -15px; top: -15px; font-size: 2rem; z-index: 1000; text-shadow: 0 0 5px rgba(0,0,0,0.5);">
                    <span>&times;</span>
                </button>
                <img id="brochureModalImage" src="" class="img-fluid rounded" alt="">
            </div>
        </div>
    </div>
</div>

<!--==========================
Klien Kami Section
============================-->
<section id="clients" class="wow fadeInUp" style="padding: 60px 20px; background-color: #f9f9f9;">
    <div class="container">
        <header class="section-header">
            <h3>Klien Kami</h3>
        </header>
    </div>
    <!-- Carousel Full Width - Kiri -->
    <div class="carousel-klien">
        <div class="group-klien">
            <div class="card-klien">
                @foreach($clients as $index => $client)
                    <img src="{{ url('storage/' . $client->image) }}" alt="{{$client->name}}">
                @endforeach
            </div>
            <!-- Duplicate untuk seamless loop -->
            <div class="card-klien">
                @foreach($clients as $index => $client)
                    <img src="{{ url('storage/' . $client->image) }}" alt="{{$client->name}}">
                @endforeach
            </div>
        </div>
    </div>

    <!-- Carousel Full Width - Kanan -->
    <div class="carousel-klien carousel-klien-right">
        <div class="group-klien group-klien-right">
            <div class="card-klien">
                @foreach($clients as $index => $client)
                    <img src="{{ url('storage/' . $client->image) }}" alt="{{$client->name}}">
                @endforeach
            </div>
            <!-- Duplicate untuk seamless loop -->
            <div class="card-klien">
                @foreach($clients as $index => $client)
                    <img src="{{ url('storage/' . $client->image) }}" alt="{{$client->name}}">
                @endforeach
            </div>
        </div>
    </div>
</section>

<!--==========================
Alur Pelatihan Section
============================-->
<!-- <section id="alur-pelatihan" class="py-5 bg-white">
    <div class="container">
        <header class="section-header wow fadeInUp">
            <h3 class="section-title">Alur Pelatihan</h3>
        </header>

        <div class="row justify-content-center wow fadeInUp">
            <div class="col-lg-10">
                <div class="text-center">
                    <img src="{{ asset('img/alur-pelatihan.png') }}" 
                         alt="Alur Pelatihan Sampurna Maju Bersama" 
                         class="img-fluid"
                         style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>
</section> -->

<!--==========================
Gallery Section
============================-->
<section id="portfolio" class="py-5 section-bg">
    <div class="container">
        <header class="text-center section-header wow fadeInUp">
            <h2 style="font-size: 1.5rem; margin-bottom: 10px;">
                <span style="color: #00B2D6; font-weight: bold;">Galeri Kami</span>
            </h2>
            <h2 style="font-size: 1.5rem; margin-bottom: 15px;">
                <span style="color: #152B5B; font-weight: bold;">Sampurna Maju Bersama</span>
            </h2>
            <p style="font-size: 1.1rem; color: #666; max-width: 800px; margin: 0 auto;">
                Rekam jejak, Kualitas dan terakreditasi sebagai mitra terpercaya
            </p>
        </header>

        <!-- Filter Kota Slider -->
        <div class="city-filter-slider-wrapper mb-4 wow fadeInUp" id="activity-city-filter-wrapper">
            <button class="city-slider-nav-btn city-slider-nav-prev" id="activity-slider-prev">
                <i class="fa fa-chevron-left"></i>
            </button>
            
            <div class="city-filter-slider-container">
                <div class="city-filter-slider" id="activity-city-filter-slider">
                    <div class="city-filter-item">
                        <button class="city-filter-btn active" data-filter="*" data-filter-type="activity">Semua</button>
                    </div>
                    @foreach($cities as $city)
                        <div class="city-filter-item">
                            <button class="city-filter-btn" data-filter="{{ $city->id }}" data-filter-type="activity">{{ $city->name }}</button>
                        </div>
                    @endforeach
                    <div class="city-filter-item">
                        <button class="city-filter-btn" data-filter="online" data-filter-type="activity">Online</button>
                    </div>
                </div>
            </div>
            
            <button class="city-slider-nav-btn city-slider-nav-next" id="activity-slider-next">
                <i class="fa fa-chevron-right"></i>
            </button>
        </div>

        <!-- Carousel Wrapper -->
        <div class="activity-carousel-wrapper position-relative wow fadeInUp">
            <button class="carousel-btn carousel-btn-prev position-absolute" onclick="scrollActivities('prev')">
                <i class="fa fa-chevron-left"></i>
            </button>
            
            <div class="activity-carousel-overflow">
                <div class="activity-carousel-container">
                    <div class="activity-carousel" id="activity-carousel">
                        @foreach($activities as $activity)
                        <div class="activity-item mx-3" 
                             data-city="{{ $activity->city_id }}" 
                             data-online="{{ $activity->is_online }}">
                            <div class="card shadow-sm h-100 border-0 rounded-lg overflow-hidden hover:shadow-xl transition-all">
                                <img src="{{ url('storage/' . $activity->image) }}" 
                                     class="card-img-top" 
                                     alt="{{ $activity->title }}"
                                     style="height: 400px; object-fit: cover; cursor: pointer;"
                                     onclick="openActivityModal('{{ url('storage/' . $activity->image) }}', '{{ $activity->title }}')">
                                <div class="card-body text-center p-3">
                                    <h5 class="card-title mb-2 font-weight-bold" style="font-size: 1rem;">{{ $activity->title }}</h5>
                                    @if($activity->is_online)
                                        <span class="badge badge-primary">Online</span>
                                    @elseif($activity->city)
                                        <span class="badge badge-info">{{ $activity->city->name }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <button class="carousel-btn carousel-btn-next position-absolute" onclick="scrollActivities('next')">
                <i class="fa fa-chevron-right"></i>
            </button>
        </div>

        <!-- Button Lihat Galeri -->
        <div class="text-center mt-5 wow fadeInUp">
            <a href="/galeri" class="btn btn-lg text-white font-weight-bold shadow-lg hover:shadow-xl transition-all rounded-pill px-5 py-3" style="background-color: #00B2D6; font-size: 1.1rem;">
                Lihat Semua Foto Kegiatan
            </a>
        </div>
    </div>
</section>

<!-- Modal untuk Preview Foto Kegiatan -->
<div class="modal fade" id="activityModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="close position-absolute text-white" data-dismiss="modal" style="right: -15px; top: -15px; font-size: 2rem; z-index: 1000; text-shadow: 0 0 5px rgba(0,0,0,0.5);">
                    <span>&times;</span>
                </button>
                <img id="activityModalImage" src="" class="img-fluid rounded" alt="">
            </div>
        </div>
    </div>
</div>

<!--==========================
CTA Section
============================-->
<section id="cta" style="padding: 80px 20px; background-color: #f9f9f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="cta-box rounded-lg shadow-2xl p-5 text-center wow fadeInUp" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ url('storage/' . ($profile->hero_images[0] ?? '')) }}'); background-size: cover; background-position: center;">
                    <h2 class="text-white font-bold mb-4" style="font-size: 2.5rem; line-height: 1.4;">
                        Jadilah Ahli dengan Mengikuti Pelatihan<br>
                        Kompetensi yang Berkualitas!
                    </h2>
                    <div class="d-flex flex-wrap justify-content-center gap-3 mt-5">
                        <a href="/pendaftaran" 
                           target="_blank" 
                           class="btn btn-lg text-white font-weight-bold shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all rounded-pill px-5 py-3" 
                           style="background-color: #00B2D6; font-size: 1.1rem;">
                            Daftar Sekarang
                        </a>
                        <a href="/kontak" 
                           target="_blank" 
                           class="btn btn-lg font-weight-bold shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all rounded-pill px-5 py-3" 
                           style="color: white !important; font-size: 1.1rem; background-color: #28353B !important;">
                            Hubungi Kami Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Calendar Styles -->
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}?v={{ time() }}">

<!-- Calendar Scripts with inline data -->
<script>
    // Training data from Laravel
    const trainingsData = @json($trainings ?? []);
    
    // Smooth scroll to calendar section
    function scrollToCalendar(event) {
        event.preventDefault();
        const calendarSection = document.getElementById('training-calendar');
        if (calendarSection) {
            calendarSection.scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
        }
    }
</script>
<script src="{{ asset('js/calendar.js') }}?v={{ time() }}"></script>

@endsection