<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sampurna Maju Bersama</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset('favicon.png') }}?v={{ time() }}" rel="shortcut icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-jadwal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-services.css') }}" rel="stylesheet">
    <link href="{{ asset('css/statistics.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel-clients.css') }}" rel="stylesheet">
    <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
    ======================================================= -->

    <!-- brosur -->
     <link rel="stylesheet" href="{{ asset('css/brochure.css') }}">
     <!-- activity/gallery -->
     <link rel="stylesheet" href="{{ asset('css/activity.css') }}">
     <!-- Responsive CSS for Mobile -->
     <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
     <!-- City Filter Slider CSS -->
     <link rel="stylesheet" href="{{ asset('css/city-filter-slider.css') }}">
     
     @stack('styles')
</head>

<body>
    <!-- Top Bar (Hilang saat scroll) -->
    <div id="top-bar" class="bg-gray-100 border-b border-gray-200 py-3 transition-all duration-300">
        <div class="container mx-auto px-4">
            <!-- Desktop & Tablet View -->
            <div id="top-bar-desktop" class="flex justify-between items-center text-sm text-gray-700">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">Senin - Jum'at: 08.00-17.00</span>
                </div>
                <div class="flex items-center gap-6">
                    <a href="tel:+622159645419" class="flex items-center gap-2 hover:text-blue-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>0822 6008 3300</span>
                    </a>
                    <a href="mailto:sampurna.maju.bersama2024@gmail.com" class="flex items-center gap-2 hover:text-blue-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>sampurna.maju.bersama2024@gmail.com</span>
                    </a>
                </div>
            </div>
            
            <!-- Mobile View - Single Line -->
            <div id="top-bar-mobile" style="display: none;">
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center; font-size: 0.7rem; gap: 0.5rem; flex-wrap: nowrap; color: #374151;">
                    <svg style="width: 12px; height: 12px; flex-shrink: 0; color: #2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span style="white-space: nowrap;">Sen-Jum: 08.00-17.00</span>
                    <span style="color: #9ca3af;">|</span>
                    <a href="tel:+622159645419" style="display: flex; align-items: center; gap: 0.25rem; white-space: nowrap; text-decoration: none; color: inherit;">
                        <svg style="width: 12px; height: 12px; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span>021-5964 5419</span>
                    </a>
                    <span style="color: #9ca3af;">|</span>
                    <a href="mailto:sampurna.maju.bersama2024@gmail.com" style="display: flex; align-items: center; gap: 0.25rem; white-space: nowrap; text-decoration: none; color: inherit;">
                        <svg style="width: 12px; height: 12px; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>Email</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation (Sticky) -->
    <header id="main-header" class="bg-white shadow-md sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/">
                        <img src="{{ asset('img/SMB.png') }}" alt="Logo Sampurna Maju Bersama" style="height: 80px; width: auto;">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 font-medium transition nav-link">Beranda</a>
                    
                    <!-- Tentang Kami Dropdown -->
                    <div class="relative dropdown-wrapper" id="tentangDropdown">
                        <button type="button" class="text-gray-700 hover:text-blue-600 font-medium transition nav-link flex items-center gap-1" onclick="toggleTentangMenu()">
                            Tentang Kami
                            <svg class="w-4 h-4 transition-transform" id="tentangArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="dropdown-tentang" class="dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; margin-top: 8px; background: white; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); min-width: 200px; z-index: 1000; border: 1px solid #e5e7eb; overflow: visible;">
                            <a href="/profil" class="dropdown-item" style="display: block; padding: 12px 20px; color: #374151; text-decoration: none; transition: all 0.2s; background: transparent;">
                                Profil
                            </a>
                            <a href="/tim" class="dropdown-item" style="display: block; padding: 12px 20px; color: #374151; text-decoration: none; transition: all 0.2s; background: transparent;">
                                Tim
                            </a>
                            <a href="/kontak" class="dropdown-item" style="display: block; padding: 12px 20px; color: #374151; text-decoration: none; transition: all 0.2s; background: transparent;">
                                Kontak
                            </a>
                        </div>
                    </div>
                    
                    <!-- Layanan Kami Dropdown -->
                    <div class="relative dropdown-wrapper" id="layananDropdown">
                        <button type="button" class="text-gray-700 hover:text-blue-600 font-medium transition nav-link flex items-center gap-1 dropdown-trigger" id="layananButton" onclick="toggleLayananMenu()">
                            Layanan Kami
                            <svg class="w-4 h-4 transition-transform dropdown-arrow" id="layananArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <!-- Mega Dropdown Menu -->
                        <div id="layananMenu" class="dropdown-layanan" style="display: none; position: fixed; left: 0; right: 0; top: 175px; z-index: 999999; width: 100vw; box-shadow: 0 10px 40px rgba(0,0,0,0.3); overflow: hidden;">
                            @if(isset($certificationTypes) && $certificationTypes->count() > 0)
                                <!-- Tabs Navigation -->
                                <div class="dropdown-tabs" style="display: flex; gap: 0; padding: 0;">
                                    @foreach($certificationTypes as $index => $type)
                                        <button type="button" class="certification-tab-btn {{ $index === 0 ? 'active' : '' }}" data-tab="tab-{{ $type->id }}" onclick="switchTab(event, 'tab-{{ $type->id }}')" style="flex: 1; padding: 20px 24px; font-weight: 600; font-size: 15px; border: none; cursor: pointer; transition: all 0.3s; text-align: center;">
                                            {{ $type->type }}
                                        </button>
                                    @endforeach
                                </div>
                                
                                <!-- Tab Contents -->
                                @foreach($certificationTypes as $index => $type)
                                    <div class="certification-tab-content" id="tab-{{ $type->id }}" style="display: {{ $index === 0 ? 'block' : 'none' }}; padding: 32px;">
                                        <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 24px;">{{ $type->type }}</h3>
                                        
                                        @if($type->certifications->count() > 0)
                                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; row-gap: 12px;">
                                                @foreach($type->certifications as $certification)
                                                    <a href="{{ route('certification.detail', $certification->id) }}" class="certification-link" style="display: block; padding: 0; font-size: 14px; text-decoration: none; transition: all 0.2s; line-height: 1.6;">
                                                        {{ $certification->title }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="empty-message" style="text-align: center; padding: 40px; font-size: 14px;">Belum ada data untuk kategori {{ $type->type }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div style="padding: 40px; text-align: center;">
                                    <p style="color: #ef4444; font-size: 16px; font-weight: 600;">Data tidak tersedia</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <a href="/pendaftaran" target="_blank" class="text-gray-700 hover:text-blue-600 font-medium transition nav-link">Pendaftaran</a>
                    
                    <!-- Dark Mode Toggle -->
                    <button id="theme-toggle" class="p-2.5 rounded-lg border-2 border-gray-300 hover:border-blue-600 transition" title="Toggle Dark Mode">
                        <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    
                    <!-- Jadwal Pelatihan Dropdown -->
                    <div class="dropdown-wrapper-jadwal" style="position: relative;">
                        <button onclick="toggleJadwalMenu()" class="text-white px-6 py-2.5 rounded-lg font-medium transition shadow-md hover:shadow-lg flex items-center gap-2" style="background-color: #00B2D6;">
                            Jadwal Pelatihan
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div id="dropdown-jadwal" class="dropdown-jadwal" style="display: none; position: absolute; top: 100%; right: 0; margin-top: 8px; background: white; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); min-width: 250px; z-index: 1000;">
                            @if(isset($timetableTypes) && $timetableTypes->count() > 0)
                                @foreach($timetableTypes as $type)
                                    <button onclick="openJadwalPDF({{ $type->id }}, '{{ $type->type }}')" class="jadwal-dropdown-item" style="display: block; width: 100%; text-align: left; padding: 12px 20px; border: none; background: none; cursor: pointer; transition: background-color 0.2s;">
                                        {{ $type->type }}
                                    </button>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </nav>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="lg:hidden text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden lg:hidden pb-4">
                <div class="flex flex-col gap-3">
                    <a href="/" class="text-gray-700 hover:text-blue-600 font-medium py-2 border-b border-gray-200 transition nav-link">Beranda</a>
                    
                    <!-- Tentang Kami Mobile Dropdown -->
                    <div class="border-b border-gray-200">
                        <button onclick="toggleTentangMobileMenu()" class="w-full flex items-center justify-between py-2 font-medium transition nav-link">
                            <span>Tentang Kami</span>
                            <svg id="tentang-mobile-arrow" class="w-4 h-4 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div id="dropdown-tentang-mobile" class="hidden pl-4">
                            <a href="/profil" class="block py-2 text-gray-600 hover:text-blue-600 transition">Profil</a>
                            <a href="/tim" class="block py-2 text-gray-600 hover:text-blue-600 transition">Tim</a>
                            <a href="/kontak" class="block py-2 text-gray-600 hover:text-blue-600 transition">Kontak</a>
                        </div>
                    </div>
                    
                    <!-- Layanan Kami Mobile Dropdown -->
                    <div class="border-b border-gray-200">
                        <button onclick="toggleLayananMobileMenu()" class="w-full flex items-center justify-between py-2 font-medium transition nav-link">
                            <span>Layanan Kami</span>
                            <svg id="layanan-mobile-arrow" class="w-4 h-4 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div id="dropdown-layanan-mobile" class="hidden pl-4">
                            @if(isset($certificationTypes) && $certificationTypes->count() > 0)
                                @foreach($certificationTypes as $type)
                                    <div class="py-2 border-b border-gray-100">
                                        <div class="font-semibold text-gray-700 text-sm mb-2">{{ $type->type }}</div>
                                        @if($type->certifications->count() > 0)
                                            <div class="pl-3">
                                                @foreach($type->certifications as $certification)
                                                    <a href="{{ route('certification.detail', $certification->id) }}" class="block py-1.5 text-xs text-gray-600 hover:text-blue-600 transition">
                                                        {{ $certification->title }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <p class="text-xs text-gray-500 py-2">Belum ada data</p>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Pendaftaran Mobile -->
                    <a href="/pendaftaran" target="_blank" class="text-gray-700 hover:text-blue-600 font-medium py-2 border-b border-gray-200 transition nav-link">Pendaftaran</a>
                    
                    <!-- Dark Mode Toggle Mobile -->
                    <button id="theme-toggle-mobile" class="flex items-center justify-center gap-2 py-2 border-b border-gray-200 font-medium transition nav-link">
                        <svg id="theme-icon-mobile" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                        <span id="theme-text-mobile">Mode Gelap</span>
                    </button>
                    
                    <!-- Jadwal Pelatihan Mobile Dropdown -->
                    <div class="border-b border-gray-200">
                        <button onclick="toggleJadwalMobileMenu()" class="w-full flex items-center justify-between py-2 font-medium transition nav-link">
                            <span>Jadwal Pelatihan</span>
                            <svg id="jadwal-mobile-arrow" class="w-4 h-4 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div id="dropdown-jadwal-mobile" class="hidden pl-4">
                            @if(isset($timetableTypes) && $timetableTypes->count() > 0)
                                @foreach($timetableTypes as $type)
                                    <button onclick="openJadwalPDF({{ $type->id }}, '{{ $type->type }}')" class="block w-full text-left py-2 text-gray-600 hover:text-blue-600 transition">
                                        {{ $type->type }}
                                    </button>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <style>
        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }
        
        /* Mobile Top Bar Optimization */
        @media (max-width: 1023px) {
            #top-bar {
                padding-top: 0.25rem !important;
                padding-bottom: 0.25rem !important;
            }
            
            #top-bar .container {
                padding-left: 0.5rem !important;
                padding-right: 0.5rem !important;
            }
            
            #top-bar-desktop {
                display: none !important;
            }
            
            #top-bar-mobile {
                display: block !important;
            }
        }
        
        @media (min-width: 1024px) {
            #top-bar-desktop {
                display: flex !important;
            }
            
            #top-bar-mobile {
                display: none !important;
            }
        }
        
        /* Dropdown Menu Styles */
        .dropdown-wrapper {
            position: relative;
        }
        
        .dropdown-trigger {
            cursor: pointer;
        }
        
        .dropdown-arrow {
            transition: transform 0.3s ease;
        }
        
        .dropdown-menu {
            max-height: 600px;
            overflow-y: auto;
        }
        
        .dropdown-menu.hidden {
            display: none !important;
        }
        
        .certification-tab {
            cursor: pointer;
            white-space: nowrap;
        }
        
        .certification-tab.active-tab {
            color: #2563eb !important;
            border-bottom-color: #2563eb !important;
        }
        
        .certification-tab-content {
            display: none;
            animation: fadeIn 0.3s ease-in-out;
        }
        
        .certification-tab-content.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Dropdown Light Mode (Default) */
        .dropdown-layanan {
            background: white;
            border: 1px solid #e5e7eb;
        }
        
        .dropdown-tabs {
            background: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .certification-tab-btn {
            color: #6b7280;
            background: transparent;
            border-bottom: 3px solid transparent;
        }
        
        .certification-tab-btn:hover {
            color: #2563eb;
            background: #f3f4f6;
        }
        
        .certification-tab-btn.active {
            color: #2563eb;
            background: white;
            border-bottom: 3px solid #2563eb;
        }
        
        .certification-tab-content {
            background: white;
            color: #374151;
        }
        
        .certification-tab-content h3 {
            color: #111827;
        }
        
        .certification-link {
            color: #4b5563;
        }
        
        .certification-link:hover {
            color: #2563eb;
        }
        
        .empty-message {
            color: #9ca3af;
        }
        
        /* Dropdown Dark Mode */
        body.dark-mode .dropdown-layanan {
            background: #2d2d2d;
            border: 1px solid #3d3d3d;
        }
        
        body.dark-mode .dropdown-tabs {
            background: #1a1a1a;
            border-bottom: 1px solid #3d3d3d;
        }
        
        body.dark-mode .certification-tab-btn {
            color: #9ca3af;
        }
        
        body.dark-mode .certification-tab-btn:hover {
            color: #00B2D6;
            background: #3d3d3d;
        }
        
        body.dark-mode .certification-tab-btn.active {
            color: #00B2D6;
            background: #2d2d2d;
            border-bottom: 3px solid #00B2D6;
        }
        
        body.dark-mode .certification-tab-content {
            background: #2d2d2d;
            color: #e0e0e0;
        }
        
        body.dark-mode .certification-tab-content h3 {
            color: #f3f4f6;
        }
        
        body.dark-mode .certification-link {
            color: #d1d5db;
        }
        
        body.dark-mode .certification-link:hover {
            color: #00B2D6;
        }
        
        body.dark-mode .empty-message {
            color: #6b7280;
        }
        
        /* Jadwal Dropdown Styles */
        .dropdown-jadwal {
            border: 1px solid #e5e7eb;
        }
        
        .jadwal-dropdown-item:hover {
            background-color: #f3f4f6;
            color: #00B2D6;
        }
        
        .jadwal-dropdown-item:first-child {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        
        .jadwal-dropdown-item:last-child {
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        
        body.dark-mode .dropdown-jadwal {
            background-color: #1f2937 !important;
            border-color: #374151 !important;
        }
        
        body.dark-mode .jadwal-dropdown-item {
            color: #e5e7eb !important;
        }
        
        body.dark-mode .jadwal-dropdown-item:hover {
            background-color: #374151 !important;
            color: #00B2D6 !important;
        }
        
        /* Tentang Kami Dropdown Styles */
        .dropdown-item:hover {
            background-color: #f3f4f6;
            color: #00B2D6;
        }
        
        .dropdown-item:first-child {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        
        .dropdown-item:last-child {
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        
        body.dark-mode .dropdown-menu {
            background-color: #1f2937 !important;
            border-color: #374151 !important;
        }
        
        body.dark-mode .dropdown-item {
            color: #e5e7eb !important;
        }
        
        body.dark-mode .dropdown-item:hover {
            background-color: #374151 !important;
            color: #00B2D6 !important;
        }
        
        /* Hide scrollbar tetapi tetap bisa scroll */
        body::-webkit-scrollbar {
            width: 10px;
        }
        
        body::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        body::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5px;
        }
        
        body::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Dark Mode Styles */
        body.dark-mode {
            background-color: #1a1a1a !important;
            color: #e0e0e0 !important;
        }

        body.dark-mode #main-header {
            background-color: #2d2d2d !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5) !important;
        }

        body.dark-mode #top-bar {
            background-color: #2d2d2d !important;
            border-color: #3d3d3d !important;
        }

        body.dark-mode #top-bar,
        body.dark-mode #top-bar span,
        body.dark-mode #top-bar a {
            color: #e0e0e0 !important;
        }

        body.dark-mode .nav-link {
            color: #e0e0e0 !important;
        }

        body.dark-mode .nav-link:hover {
            color: #00B2D6 !important;
        }

        body.dark-mode #theme-toggle {
            border-color: #4d4d4d;
            color: #e0e0e0;
        }

        body.dark-mode #theme-toggle:hover {
            border-color: #00B2D6;
        }

        /* Sections */
        body.dark-mode .section-bg {
            background-color: #2d2d2d !important;
        }

        body.dark-mode section {
            background-color: #1a1a1a !important;
        }

        body.dark-mode #profile,
        body.dark-mode #brochure,
        body.dark-mode #alur-pelatihan,
        body.dark-mode #portfolio {
            background-color: #1a1a1a !important;
        }

        body.dark-mode #clients {
            background-color: #2d2d2d !important;
        }

        body.dark-mode #clients .card-klien,
        body.dark-mode .card-klien,
        body.dark-mode .carousel-klien {
            background-color: #2d2d2d !important;
        }

        body.dark-mode #clients img,
        body.dark-mode .card-klien img {
            filter: brightness(0.9);
            background-color: #2d2d2d !important;
        }

        body.dark-mode #cta {
            background-color: #2d2d2d !important;
        }

        /* Cards & Portfolio */
        body.dark-mode .card {
            background-color: #2d2d2d !important;
            border-color: #3d3d3d !important;
        }

        body.dark-mode .card-body {
            background-color: #2d2d2d !important;
            color: #e0e0e0 !important;
        }

        body.dark-mode .portfolio-wrap {
            background-color: #2d2d2d !important;
            border-color: #3d3d3d !important;
        }

        body.dark-mode .portfolio-info {
            background-color: #2d2d2d !important;
            color: #e0e0e0 !important;
        }

        /* Text Colors */
        body.dark-mode .card-title,
        body.dark-mode h1, body.dark-mode h2, body.dark-mode h3, 
        body.dark-mode h4, body.dark-mode h5, body.dark-mode h6 {
            color: #e0e0e0 !important;
        }

        body.dark-mode p,
        body.dark-mode span {
            color: #b0b0b0 !important;
        }

        body.dark-mode .section-header h3,
        body.dark-mode .section-title {
            color: #e0e0e0 !important;
        }

        /* Intro/Hero Section */
        body.dark-mode #intro {
            background-color: #1a1a1a !important;
        }

        body.dark-mode .carousel-content h2,
        body.dark-mode .carousel-content p {
            color: white !important;
        }

        body.dark-mode .statistics-grid p {
            color: white !important;
        }

        /* Profile Section Cards */
        body.dark-mode #profile > div > div:last-child > div > div,
        body.dark-mode #profile .card,
        body.dark-mode #profile > div > div:last-child > div > div > div {
            background-color: #2d2d2d !important;
            color: #e0e0e0 !important;
        }

        body.dark-mode #profile h4,
        body.dark-mode #profile p {
            color: #e0e0e0 !important;
        }

        /* Filters */
        body.dark-mode #brochure-filters .nav-link,
        body.dark-mode #activity-filters .nav-link,
        body.dark-mode #portfolio-flters li {
            background-color: #3d3d3d !important;
            color: #e0e0e0 !important;
            border-color: #4d4d4d !important;
        }

        body.dark-mode #brochure-filters .nav-link:hover,
        body.dark-mode #activity-filters .nav-link:hover,
        body.dark-mode #portfolio-flters li:hover {
            background-color: #4d4d4d !important;
        }

        body.dark-mode #brochure-filters .nav-link.active,
        body.dark-mode #activity-filters .nav-link.active,
        body.dark-mode #portfolio-flters li.filter-active {
            background-color: #00B2D6 !important;
            color: white !important;
        }

        /* Buttons */
        body.dark-mode .carousel-btn {
            background-color: #00B2D6 !important;
        }

        body.dark-mode .btn {
            color: white !important;
        }

        /* Borders */
        body.dark-mode .border-b {
            border-color: #3d3d3d !important;
        }

        body.dark-mode .border,
        body.dark-mode .border-gray-200 {
            border-color: #3d3d3d !important;
        }

        /* Modals */
        body.dark-mode .modal-content {
            background-color: #2d2d2d !important;
        }

        body.dark-mode .popup-overlay {
            background-color: rgba(0, 0, 0, 0.8) !important;
        }

        body.dark-mode .popup-content {
            background-color: #2d2d2d !important;
            color: #e0e0e0 !important;
        }

        body.dark-mode .popup-content h2 {
            color: #e0e0e0 !important;
        }

        body.dark-mode .popup-content a {
            background-color: #25D366 !important;
            color: white !important;
        }

        body.dark-mode .close-popup {
            background-color: #4d4d4d !important;
            color: #e0e0e0 !important;
        }

        /* Footer */
        body.dark-mode footer,
        body.dark-mode #footer {
            background-color: #2d2d2d !important;
            color: #e0e0e0 !important;
        }

        body.dark-mode footer h3,
        body.dark-mode footer h4,
        body.dark-mode footer p,
        body.dark-mode footer a,
        body.dark-mode footer span {
            color: #e0e0e0 !important;
        }

        body.dark-mode .footer-top,
        body.dark-mode .footer-bottom {
            background-color: #2d2d2d !important;
            border-color: #3d3d3d !important;
        }

        /* Container backgrounds */
        body.dark-mode .container,
        body.dark-mode .row {
            background-color: transparent !important;
        }

        /* WhatsApp Button */
        body.dark-mode .whatsapp-chat {
            background-color: #25D366 !important;
        }

        /* Badges */
        body.dark-mode .badge {
            color: white !important;
        }

        /* CTA Section */
        body.dark-mode #cta .cta-box {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('{{ url('storage/' . ($profile->hero_images[0] ?? '')) }}') !important;
        }

        /* Smooth transition */
        body, #main-header, #top-bar, .card, .portfolio-wrap, .section-bg, section {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
    </style>

    <script>
        // Toggle Mobile Menu
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Hide Top Bar on Scroll
        let lastScroll = 0;
        const topBar = document.getElementById('top-bar');
        
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 50) {
                topBar.style.transform = 'translateY(-100%)';
                topBar.style.opacity = '0';
            } else {
                topBar.style.transform = 'translateY(0)';
                topBar.style.opacity = '1';
            }
            
            lastScroll = currentScroll;
        });

        // Dark Mode Toggle
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleMobileBtn = document.getElementById('theme-toggle-mobile');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        const themeIconMobile = document.getElementById('theme-icon-mobile');
        const themeTextMobile = document.getElementById('theme-text-mobile');

        // Check for saved theme preference or default to light mode
        const currentTheme = localStorage.getItem('theme') || 'light';
        
        if (currentTheme === 'dark') {
            document.body.classList.add('dark-mode');
            themeToggleDarkIcon.classList.remove('hidden');
            themeToggleLightIcon.classList.add('hidden');
            updateMobileIcon('dark');
        } else {
            document.body.classList.remove('dark-mode');
            themeToggleDarkIcon.classList.add('hidden');
            themeToggleLightIcon.classList.remove('hidden');
            updateMobileIcon('light');
        }

        function updateMobileIcon(theme) {
            if (theme === 'dark') {
                themeIconMobile.innerHTML = '<path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>';
                themeTextMobile.textContent = 'Mode Terang';
            } else {
                themeIconMobile.innerHTML = '<path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>';
                themeTextMobile.textContent = 'Mode Gelap';
            }
        }

        function toggleTheme() {
            if (document.body.classList.contains('dark-mode')) {
                document.body.classList.remove('dark-mode');
                localStorage.setItem('theme', 'light');
                themeToggleDarkIcon.classList.add('hidden');
                themeToggleLightIcon.classList.remove('hidden');
                updateMobileIcon('light');
            } else {
                document.body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark');
                themeToggleDarkIcon.classList.remove('hidden');
                themeToggleLightIcon.classList.add('hidden');
                updateMobileIcon('dark');
            }
        }

        themeToggleBtn.addEventListener('click', toggleTheme);
        themeToggleMobileBtn.addEventListener('click', toggleTheme);
        
        // Global function for Layanan Menu Toggle
        function toggleLayananMenu() {
            const menu = document.getElementById('layananMenu');
            const arrow = document.getElementById('layananArrow');
            
            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'block';
                arrow.style.transform = 'rotate(180deg)';
                console.log('Menu opened');
            } else {
                menu.style.display = 'none';
                arrow.style.transform = 'rotate(0deg)';
                console.log('Menu closed');
            }
        }
        
        // Global function for Tab Switching
        function switchTab(event, tabId) {
            event.preventDefault();
            event.stopPropagation();
            
            // Remove active from all tabs
            document.querySelectorAll('.certification-tab-btn').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Add active to clicked tab
            event.target.classList.add('active');
            
            // Hide all contents
            document.querySelectorAll('.certification-tab-content').forEach(content => {
                content.style.display = 'none';
            });
            
            // Show target content
            const targetContent = document.getElementById(tabId);
            if (targetContent) {
                targetContent.style.display = 'block';
                console.log('Switched to tab:', tabId);
            }
        }
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('layananDropdown');
            const menu = document.getElementById('layananMenu');
            const arrow = document.getElementById('layananArrow');
            
            if (dropdown && menu && !dropdown.contains(e.target)) {
                menu.style.display = 'none';
                arrow.style.transform = 'rotate(0deg)';
            }
            
            // Close tentang dropdown when clicking outside
            const tentangDropdown = document.getElementById('tentangDropdown');
            const tentangMenu = document.getElementById('dropdown-tentang');
            const tentangArrow = document.getElementById('tentangArrow');
            if (tentangDropdown && tentangMenu && !tentangDropdown.contains(e.target)) {
                tentangMenu.style.display = 'none';
                if (tentangArrow) tentangArrow.style.transform = 'rotate(0deg)';
            }
            
            // Close jadwal dropdown when clicking outside
            const jadwalDropdown = document.querySelector('.dropdown-wrapper-jadwal');
            const jadwalMenu = document.getElementById('dropdown-jadwal');
            if (jadwalDropdown && jadwalMenu && !jadwalDropdown.contains(e.target)) {
                jadwalMenu.style.display = 'none';
            }
        });
        
        // Tentang Kami Dropdown Toggle
        function toggleTentangMenu() {
            const menu = document.getElementById('dropdown-tentang');
            const arrow = document.getElementById('tentangArrow');
            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'block';
                arrow.style.transform = 'rotate(180deg)';
            } else {
                menu.style.display = 'none';
                arrow.style.transform = 'rotate(0deg)';
            }
        }
        
        // Tentang Kami Mobile Dropdown Toggle
        function toggleTentangMobileMenu() {
            const menu = document.getElementById('dropdown-tentang-mobile');
            const arrow = document.getElementById('tentang-mobile-arrow');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                arrow.style.transform = 'rotate(180deg)';
            } else {
                menu.classList.add('hidden');
                arrow.style.transform = 'rotate(0deg)';
            }
        }
        
        // Jadwal Pelatihan Dropdown Toggle
        function toggleJadwalMenu() {
            const menu = document.getElementById('dropdown-jadwal');
            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'block';
            } else {
                menu.style.display = 'none';
            }
        }
        
        // Jadwal Mobile Dropdown Toggle
        function toggleJadwalMobileMenu() {
            const menu = document.getElementById('dropdown-jadwal-mobile');
            const arrow = document.getElementById('jadwal-mobile-arrow');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                arrow.style.transform = 'rotate(180deg)';
            } else {
                menu.classList.add('hidden');
                arrow.style.transform = 'rotate(0deg)';
            }
        }
        
        // Layanan Mobile Dropdown Toggle
        function toggleLayananMobileMenu() {
            const menu = document.getElementById('dropdown-layanan-mobile');
            const arrow = document.getElementById('layanan-mobile-arrow');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                arrow.style.transform = 'rotate(180deg)';
            } else {
                menu.classList.add('hidden');
                arrow.style.transform = 'rotate(0deg)';
            }
        }
    </script>
    @yield('content')
    @include('partials.footer')
    <!-- Back to Top Button -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- Uncomment below i you want to use a preloader -->
    <div id="preloader"></div>
    <!-- JavaScript Libraries -->
    <script></script>
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/superfish/hoverIntent.js') }}"></script>
    <script src="{{ asset('lib/superfish/superfish.min.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/touchSwipe/jquery.touchSwipe.min.js') }}"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>
    <!-- Template Main Javascript File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Statistics Counter Animation -->
    <script src="{{ asset('js/statistics.js') }}"></script>
    <!-- brosur -->
    <script src="{{ asset('js/brochure.js') }}"></script>
    <!-- activity/gallery -->
    <script src="{{ asset('js/activity.js') }}"></script>
    <!-- Responsive JS for Mobile -->
    <script src="{{ asset('js/responsive.js') }}"></script>
    <!-- City Filter Slider JS -->
    <script src="{{ asset('js/city-filter-slider.js') }}"></script>
    
    <!-- Jadwal Pelatihan PDF Modal Script -->
    <script>
        // Open PDF Modal from Jadwal Dropdown
        function openJadwalPDF(typeId, typeName) {
            const timetablesData = @json($timetables ?? []);
            const timetable = timetablesData[typeId];
            
            document.getElementById('pdfModalTitle').textContent = 'Jadwal Pelatihan - ' + typeName;
            
            if (timetable && timetable.files) {
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
            
            // Close dropdowns after opening modal
            const jadwalMenu = document.getElementById('dropdown-jadwal');
            const jadwalMobileMenu = document.getElementById('dropdown-jadwal-mobile');
            if (jadwalMenu) jadwalMenu.style.display = 'none';
            if (jadwalMobileMenu) jadwalMobileMenu.classList.add('hidden');
        }
    </script>
    
    @stack('scripts')
</body>

</html>
