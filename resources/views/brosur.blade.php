@extends('partials.header')
@section('content')
    <!--==========================
        Intro Section
        ============================-->
    <section id="intro" class="intro-page">
        <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="carousel-background"><img src="{{ asset('img/intro-carousel/1.png') }}" alt="">
                        </div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2>Brosur Pelatihan</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main id="main">
        <section id="portfolio" class="section-bg">
            <div class="container">

                <header class="section-header">
                    <h3 class="section-title">Brosur Pelatihan</h3>
                </header>

                <!-- Filter Kota Slider -->
                <div class="city-filter-slider-wrapper mb-4 wow fadeInUp" id="brosur-page-city-filter-wrapper">
                    <button class="city-slider-nav-btn city-slider-nav-prev" id="brosur-page-slider-prev">
                        <i class="fa fa-chevron-left"></i>
                    </button>
                    
                    <div class="city-filter-slider-container">
                        <div class="city-filter-slider" id="brosur-page-city-filter-slider">
                            <div class="city-filter-item">
                                <button class="city-filter-btn active" data-filter="*" data-filter-type="brosur-page">Semua</button>
                            </div>
                            @foreach($cities as $city)
                                <div class="city-filter-item">
                                    <button class="city-filter-btn" data-filter=".filter-{{ strtolower($city->name) }}" data-filter-type="brosur-page">{{ $city->name }}</button>
                                </div>
                            @endforeach
                            <div class="city-filter-item">
                                <button class="city-filter-btn" data-filter=".filter-online" data-filter-type="brosur-page">Online</button>
                            </div>
                        </div>
                    </div>
                    
                    <button class="city-slider-nav-btn city-slider-nav-next" id="brosur-page-slider-next">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
                <div class="row portfolio-container">
                    @foreach ($brochures as $brochure)
                        @php
                            // Ambil relasi city dari brochure
                            $city = $brochure->city;
                            $filterClass = $brochure->is_online == 1 ? 'filter-online' : ($city ? 'filter-' . strtolower($city->name) : '');
                        @endphp

                        <div class="portfolio-item {{ $filterClass }} wow fadeInUp col-lg-4 col-md-6 col-sm-12" style="margin-bottom: 24px;">
                            <div class="brochure-card" style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease; display: flex; flex-direction: column;">
                                <div class="brochure-image-wrapper" style="width: 100%; height: 700px; padding: 20px; background: linear-gradient(135deg, #00B2D6 0%, #0096b8 100%); display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                    <a href="{{ url('storage/' . $brochure->image) }}" data-lightbox="portfolio" title="{{ $brochure->title }}" style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%;">
                                        <img src="{{ url('storage/' . $brochure->image) }}" 
                                             alt="{{ $brochure->title }}"
                                             style="max-width: 100%; max-height: 100%; width: auto; height: auto; display: block; border-radius: 12px; box-shadow: 0 8px 16px rgba(0,0,0,0.15); object-fit: contain;">
                                    </a>
                                </div>
                                <div class="brochure-content" style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                    <div>
                                        <h4 style="font-size: 1.1rem; font-weight: 700; color: #1a1a1a; margin-bottom: 8px; line-height: 1.4;">
                                            {{ $brochure->title }}
                                        </h4>
                                        @if ($brochure->is_online == 1)
                                            <span style="display: inline-block; padding: 4px 12px; background: #00B2D6; color: white; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">Online</span>
                                        @elseif($city)
                                            <span style="display: inline-block; padding: 4px 12px; background: #00B2D6; color: white; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">{{ $city->name }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <style>
                    .portfolio-container {
                        display: flex !important;
                        flex-wrap: wrap !important;
                        margin: 0 -12px !important;
                    }
                    
                    .portfolio-item {
                        padding: 0 12px !important;
                        float: none !important;
                    }
                    
                    .brochure-card:hover {
                        transform: translateY(-8px);
                        box-shadow: 0 12px 24px rgba(0,0,0,0.15);
                    }
                    
                    .brochure-image-wrapper {
                        position: relative;
                        overflow: hidden;
                    }
                    
                    .brochure-image-wrapper img {
                        transition: transform 0.3s ease;
                    }
                    
                    .brochure-card:hover .brochure-image-wrapper img {
                        transform: scale(1.05);
                    }
                    
                    /* Dark mode support */
                    body.dark-mode .brochure-card {
                        background: #1f2937 !important;
                        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
                    }
                    
                    body.dark-mode .brochure-card:hover {
                        box-shadow: 0 12px 24px rgba(0,0,0,0.4);
                    }
                    
                    body.dark-mode .brochure-content h4 {
                        color: #e5e7eb !important;
                    }
                    
                    .brochure-card {
                        height: 100%;
                    }
                    
                    /* Responsive */
                    @media (max-width: 768px) {
                        .brochure-image-wrapper {
                            height: 350px !important;
                            padding: 15px !important;
                        }
                        
                        .brochure-content {
                            padding: 15px !important;
                        }
                        
                        .brochure-content h4 {
                            font-size: 1rem !important;
                        }
                    }
                </style>

                <!-- Pagination Links -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-center mt-4">
                            {{ $brochures->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
