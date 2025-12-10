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
                        <div class="carousel-background"><img src="{{ asset('img/intro-carousel/7.jpeg') }}"
                                alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2>Tim Kami</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main id="main">
        <!--==========================
        Team Section
        ============================-->
        <section id="team-structure" class="section-bg">
            <div class="container">
                <header class="section-header">
                    <h3>Struktur Organisasi</h3>
                    <p>Tim profesional kami yang berpengalaman siap melayani kebutuhan pelatihan dan sertifikasi Anda</p>
                </header>

                <!-- Top Management -->
                <div class="org-chart">
                    <div class="org-level top-level">
                        <div class="org-item ceo-box">
                            <div class="member-card">
                                <h4>Maman Suparman</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                        </div>
                        <div class="org-item commissioner-box">
                            <div class="member-card">
                                <h4>Anindya Damayanti</h4>
                                <span>Commissioner</span>
                            </div>
                        </div>
                    </div>

                    <!-- Connector Line -->
                    <div class="vertical-line"></div>

                    <!-- Middle Management -->
                    <div class="org-level middle-level">
                        <div class="org-item">
                            <div class="member-card card-blue">
                                <h4>Yunitiar Resti Pratiwi</h4>
                                <span>Account Executive</span>
                            </div>
                        </div>
                        <div class="org-item">
                            <div class="member-card card-blue">
                                <h4>Tasya Indriani</h4>
                                <span>Follow Up & Admin</span>
                            </div>
                        </div>
                        <div class="org-item has-child">
                            <div class="member-card card-green">
                                <h4>Agustiani Silvi</h4>
                                <h4>Reni Heriantini</h4>
                                <span>Finance & Accounting</span>
                            </div>
                            <!-- Bottom Level - directly under Finance -->
                            <div class="child-item">
                                <div class="member-card card-purple">
                                    <h4>Resnawati</h4>
                                    <span>Admin Sertifikat</span>
                                </div>
                            </div>
                        </div>
                        <div class="org-item">
                            <div class="member-card card-blue">
                                <h4>Aditya NS</h4>
                                <span>Desain Grafis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection