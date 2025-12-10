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
                        <div class="carousel-background">
                            <img src="{{ asset('img/intro-carousel/8.jpeg') }}" alt="">
                            <div class="overlay-gradient"></div>
                        </div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate-fade-in-up">Tentang Kami</h2>
                                <p class="animate-fade-in-up-delay">PT Sampurna Maju Bersama</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <main id="main">
        <!--==========================
        About Us Section
        ============================-->
        <section id="about" class="modern-about-section">
            <div class="container">
                <!-- Header Section -->
                <header class="section-header text-center mb-5">
                    <h3 class="section-title">Tentang PT SMB</h3>
                    <p class="section-description">{{$profile->description}}</p>
                </header>

                <!-- Vision & Mission Cards -->
                <div class="row g-4 mt-4">
                    <!-- Vision Card -->
                    <div class="col-lg-6 col-md-12">
                        <div class="vision-mission-card vision-card wow fadeInLeft" data-wow-delay="0.2s">
                            <div class="card-icon-wrapper">
                                <div class="icon-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="card-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="card-content">
                                <h2 class="card-title">Visi Kami</h2>
                                <div class="card-divider"></div>
                                <p class="card-text">{{$profile->vision}}</p>
                            </div>
                            <div class="card-decoration"></div>
                        </div>
                    </div>

                    <!-- Mission Card -->
                    <div class="col-lg-6 col-md-12">
                        <div class="vision-mission-card mission-card wow fadeInRight" data-wow-delay="0.4s">
                            <div class="card-icon-wrapper">
                                <div class="icon-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="card-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="card-content">
                                <h2 class="card-title">Misi Kami</h2>
                                <div class="card-divider"></div>
                                <p class="card-text">{{$profile->mission}}</p>
                            </div>
                            <div class="card-decoration"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <style>
        /* Hero Section Enhancements */
        .intro-page .carousel-background {
            position: relative;
        }
        
        .overlay-gradient {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 178, 214, 0.8) 0%, rgba(0, 89, 107, 0.9) 100%);
            z-index: 1;
        }
        
        .intro-page .carousel-content {
            position: relative;
            z-index: 2;
        }
        
        .intro-page .carousel-content h2 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .intro-page .carousel-content p {
            font-size: 1.5rem;
            font-weight: 300;
            opacity: 0.95;
        }
        
        /* Animations */
        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out;
        }
        
        .animate-fade-in-up-delay {
            animation: fadeInUp 1s ease-out 0.3s both;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Modern About Section */
        .modern-about-section {
            background: url("{{ asset('img/about-bg.jpg') }}") center top no-repeat fixed;
            background-size: cover;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }
        
        .modern-about-section::before {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.92);
            z-index: 9;
        }
        
        .modern-about-section::after {
            content: none;
        }
        
        .modern-about-section .container {
            position: relative;
            z-index: 10;
        }
        
        /* Section Header */
        .section-badge {
            display: inline-block;
            background: linear-gradient(135deg, #00b2d6 0%, #0097b8 100%);
            color: white;
            padding: 8px 24px;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 1rem;
            box-shadow: 0 4px 15px rgba(0, 178, 214, 0.3);
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 1rem;
            position: relative;
        }
        
        .title-underline {
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, #00b2d6, #0097b8);
            border-radius: 2px;
            margin-bottom: 1.5rem;
        }
        
        .section-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        
        /* Vision & Mission Cards */
        .vision-mission-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            height: 100%;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid rgba(0, 178, 214, 0.1);
        }
        
        .vision-mission-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 178, 214, 0.2);
        }
        
        .card-decoration {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, rgba(0, 178, 214, 0.05) 0%, transparent 100%);
            border-radius: 50%;
            transition: all 0.4s ease;
        }
        
        .vision-mission-card:hover .card-decoration {
            transform: scale(1.5);
            opacity: 0.5;
        }
        
        .card-icon-wrapper {
            margin-bottom: 24px;
        }
        
        .icon-circle {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #00b2d6 0%, #0097b8 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(0, 178, 214, 0.3);
            transition: all 0.3s ease;
        }
        
        .vision-mission-card:hover .icon-circle {
            transform: rotate(10deg) scale(1.1);
            box-shadow: 0 12px 30px rgba(0, 178, 214, 0.4);
        }
        
        .card-icon {
            width: 40px;
            height: 40px;
            color: white;
            stroke-width: 2.5;
        }
        
        .card-content {
            position: relative;
            z-index: 2;
        }
        
        .card-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 16px;
        }
        
        .card-divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, #00b2d6, #0097b8);
            border-radius: 2px;
            margin-bottom: 20px;
        }
        
        .card-text {
            font-size: 1rem;
            line-height: 1.8;
            color: #666;
            text-align: justify;
        }
        
        /* Mission Card Variant */
        .mission-card .icon-circle {
            background: linear-gradient(135deg, #0097b8 0%, #007a9a 100%);
        }
        
        /* Responsive Design */
        @media (max-width: 991px) {
            .section-title {
                font-size: 2rem;
            }
            
            .intro-page .carousel-content h2 {
                font-size: 2.5rem;
            }
            
            .intro-page .carousel-content p {
                font-size: 1.2rem;
            }
            
            .vision-mission-card {
                margin-bottom: 2rem;
            }
        }
        
        @media (max-width: 767px) {
            .modern-about-section {
                padding: 60px 0;
            }
            
            .section-title {
                font-size: 1.75rem;
            }
            
            .intro-page .carousel-content h2 {
                font-size: 2rem;
            }
            
            .intro-page .carousel-content p {
                font-size: 1rem;
            }
            
            .section-description {
                font-size: 1rem;
                padding: 0 15px;
            }
            
            .vision-mission-card {
                padding: 30px 20px;
            }
            
            .card-title {
                font-size: 1.5rem;
            }
            
            .icon-circle {
                width: 70px;
                height: 70px;
            }
            
            .card-icon {
                width: 35px;
                height: 35px;
            }
        }
        
        /* Dark Mode Support */
        body.dark-mode .modern-about-section::before {
            background: rgba(26, 26, 26, 0.95);
        }
        
        body.dark-mode .section-title {
            color: #e0e0e0;
        }
        
        body.dark-mode .section-description {
            color: #b0b0b0;
        }
        
        body.dark-mode .vision-mission-card {
            background: #2d2d2d;
            border-color: rgba(0, 178, 214, 0.2);
        }
        
        body.dark-mode .card-title {
            color: #e0e0e0;
        }
        
        body.dark-mode .card-text {
            color: #b0b0b0;
        }
        
        body.dark-mode .vision-mission-card:hover {
            box-shadow: 0 20px 60px rgba(0, 178, 214, 0.3);
        }
    </style>
@endsection