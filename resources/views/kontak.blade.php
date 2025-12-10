@extends('partials.header')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/kontak.css') }}">
@endpush

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
                        <div class="carousel-background"><img src="{{ asset('img/intro-carousel/5.png') }}"
                                alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2>Kontak</h2>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <main id="main">
        <!--==========================
        Contact Section
        ============================-->
        <section id="contact" class="section-bg wow fadeInUp">
            <div class="container">
                <div class="row">
                    <!-- Left Column: Contact Info -->
                    <div class="col-lg-5 col-md-6">
                        <div class="contact-left">
                            <h3 class="mb-4" style="font-weight: 700;">Hubungi Kami Sekarang</h3>
                            <p style="margin-bottom: 30px;">Memiliki pertanyaan atau butuh bantuan? Gunakan formulir untuk menghubungi kami atau hubungi kami di bawah ini.</p>
                            
                            <div class="contact-info-item mb-3">
                                <i class="ion-ios-email-outline" style="font-size: 24px; color: #007bff; margin-right: 15px;"></i>
                                <div style="display: inline-block; vertical-align: top;">
                                    <a href="mailto:sampurna.maju.bersama2024@gmail.com" style="text-decoration: none;">sampurna.maju.bersama2024@gmail.com</a>
                                </div>
                            </div>
                            
                            <div class="contact-info-item mb-4">
                                <i class="ion-social-whatsapp-outline" style="font-size: 24px; color: #007bff; margin-right: 15px;"></i>
                                <div style="display: inline-block; vertical-align: top;">
                                    <a href="https://wa.me/6281220183537" style="text-decoration: none;">+62 812-2018-3537</a>
                                </div>
                            </div>
                            
                            <div class="contact-info-item mb-4">
                                <i class="ion-ios-location-outline" style="font-size: 24px; color: #007bff; margin-right: 15px;"></i>
                                <div style="display: inline-block; vertical-align: top;">
                                    <span>Jl. Karapitan No.1 Paledang, Kec. Lengkong, Kota Bandung, Jawa Barat 40261</span>
                                </div>
                            </div>
                            
                            <!-- Embed Google Maps -->
                            <div class="map-container mt-4">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1665.276745424094!2d107.61719773733564!3d-6.924285405141892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e62a302d4069%3A0x8cbb7128af0eb1b6!2sGg.%20Karapitan%20I%2C%20Paledang%2C%20Kec.%20Lengkong%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040261!5e0!3m2!1sen!2sid!4v1734627312477!5m2!1sen!2sid"
                                    width="100%" height="300" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Column: Contact Form -->
                    <div class="col-lg-7 col-md-6">
                        <div class="contact-form">
                            <form id="contactForm" onsubmit="sendToWhatsApp(event)">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control form-input" id="name" placeholder="" required>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control form-input" id="email" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="phone" class="form-label">No Telepon/HP</label>
                                            <input type="text" name="phone" class="form-control form-input" id="phone" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <input type="text" name="subject" class="form-control form-input" id="subject" placeholder="" required>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="message" class="form-label">Pesan</label>
                                    <textarea class="form-control form-input" name="message" id="message" rows="6" placeholder="" required></textarea>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="submit-btn">Kirim Pesan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/kontak.js') }}"></script>
@endpush
