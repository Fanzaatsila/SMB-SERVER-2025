@extends('partials.header')
@section('content')
    <!--==========================
    Intro Section
    ============================-->
    <section id="intro">
        <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item active">
                        <div class="carousel-background"><img src="{{ asset('img/intro-carousel/7.jpeg') }}"
                                alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2>Layanan Non-Sertifikasi</h2>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <main id="main">
        <!--==========================
        Non-Certification Section
        ============================-->
        <section class="services-section">
            <h2 class="section-title">Layanan Non-Sertifikasi Kami</h2>
            <p class="section-subtitle">SAMPURNA MAJU BERSAMA</p>
            <div class="services-container">
                @foreach($certifications as $index => $certification)
                    <div class="service-item">
                        <h3>{{$certification->title}}</h3>
                        <p>{{$certification->description}}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
