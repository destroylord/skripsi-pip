@extends('templates.app')

@push('styles')
    <link rel="stylesheet" href="front/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="front/assets/css/owl.theme.default.min.css">
@endpush

@push('scripts')
    <script src="front/assets/js/owl.carousel.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endpush
@section('content')
        <!-- ========================= preloader start ========================= -->
        <x-spinner />
        <!-- preloader end -->
        <!-- ========================= hero-section start ========================= -->
        <section id="home" class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="hero-content-wrapper">
                            {{-- <h2 class="mb-25 wow fadeInDown" data-wow-delay=".2s"></h2> --}}
                            <h1 class="mb-25 wow fadeInDown" data-wow-delay=".2s">Selamat Datang di SDN Kotakulon 3 Bondowoso</h1>
                            <p class="mb-35 wow fadeInLeft" data-wow-delay=".4s">Mewujudkan generasi yang unggul dan berdaya saing dalam bidang pendidikan dan kehidupan</p>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="hero-img">
                            <div class="d-inline-block hero-img-right">
                                <img src="front/assets/img/hero/hero.jpg" alt="" class="image wow fadeInRight" data-wow-delay=".5s">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========================= hero-section end ========================= -->

        <!-- ========================= feature-section start ========================= -->
        <section class="feature-section pt-130">
            <div class="container">
                <div class="row">

                    @php
                        $data = [
                            [
                                'title' => 'PPDB',
                                'description' => 'PPDB Sekolah Dasar adalah proses penerimaan siswa baru di sekolah. Kami memastikan semua anak mendapatkan kesempatan yang sama. Tujuan kami adalah menciptakan lingkungan pendidikan yang inklusif dan adil bagi semua anak.',
                            ],
                            [
                                'title' => 'Profile',
                                'description' => 'Sekolah Dasar adalah tempat di mana anak-anak memulai perjalanan pendidikan formal mereka. Di sini, kami berkomitmen untuk memberikan pendidikan yang menyenangkan, aman, dan berpusat pada siswa. Kami mendorong setiap anak untuk mencapai potensi mereka yang penuh, baik dalam hal akademis maupun pengembangan kepribadian.',
                            ],
                            [
                                'title' => 'Eskul',
                                'description' => 'Ekstrakurikuler di sekolah dasar adalah kegiatan tambahan di luar jam pelajaran yang membantu anak-anak mengembangkan minat, bakat, dan keterampilan mereka di berbagai bidang. Dalam ekstrakurikuler, anak-anak dapat belajar secara aktif, bersosialisasi dengan teman sebaya, dan menjelajahi minat mereka di luar mata pelajaran biasa.',
                            ]
                        ];
                    @endphp


                    @foreach ($data as $item)
                    <div class="col-lg-4 col-md-6 feature-box-height">
                        <div class="feature-box box-style">
                            <div class="box-content-style feature-content h-100 d-flex flex-column justify-content-center">
                                <h4>{{ $item['title'] }}</h4>
                                <p class="text-left">{{ $item['description'] }}</p>
                                <a href="{{ $item['title'] == 'PPDB' ? 'ppdb' : '#' }}" class="btn btn-outline-primary mt-4 ">{{ $item['title'] == 'PPDB' ? 'Daftar Sekarang' : 'Selengkapnya' }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ========================= feature-section end ========================= -->

        
        <!--========================= sambutan-kelapa-sekolah start========================= -->
        <section id="about" class="pt-100">
            <div class="about-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                          <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/3_NZRBahmb0?si=xJlGlIzHQVMczUTC" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <div class="about-content-wrapper">
                                <div class="section-title">
                                    <h2 class="mb-40 wow fadeInRight" data-wow-delay=".4s">Sambutan Kepala Sekolah</h2>
                                </div>
                                <div class="about-content">
                                    <p class="mb-45 wow fadeInUp" data-wow-delay=".6s">
                                        Kepala sekolah UPTD SPF SDN Kotakulon 3 Bondowoso mengucapkan terima kasih kepada Allah SWT atas pertolongan dan keberkahan yang telah dilimpahkan kepada kita sekolah ini. Kami berharap dengan kerja keras dan gotong royong dari keluarga besar UPTD SPF SDN Kotakulon 3 Bondowoso, kita dapat menyelesaikan semua masalah yang ada dan menjadikan UPTD SPF SDN Kotakulon 3 Bondowoso sebagai salah satu SMP yang terbaik di kabupaten Banyuwangi. Selamat menempuh pendidikan di UPTD SPF SDN Kotakulon 3 Bondowoso. Semoga Allah SWT memberkahkan kita semua.

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--========================= sambutan-kelapa-sekolah end========================= -->

        <!--========================= Berita ========================= -->
        <section id="berita" class="pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-55">
                            <h2>Berita</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        @for ($i = 0; $i < 10; $i++)
                            <div class="card shadow-md">
                                <img src="{{ asset('img/berita-1.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4>Judul</h4>
                                    <p style="font-size: 15px">Ini adalah isi card body, bisa diisi dengan deskripsi tentang berita terbaru.</p>
                                </div>
                                <div class="p-3 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary btn-sm">Baca Selanjutnya</button>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>
        <!--========================= Berita ========================= -->

        <!-- ========================= visi-misistart ========================= -->
        <section id="contact" class="visi-misicta-bg img-bg pt-110 pb-100" style="background-color: #1f1f1f">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="section-title mb-60">
                            <div class="d-flex justify-content-center">
                                <h2 class="text-white wow fadeInUp text-center" data-wow-delay=".4s">Visi</h2>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p class="text-white wow fadeInUp" data-wow-delay=".6s">
                                    Terwujudnnya warga sekolah yang beriman dan bertakwa, berprestasi, berkarakter dan peduli lingkungan
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="section-title mb-60">
                            <h2 class="text-white wow fadeInUp text-center" data-wow-delay=".4s">Misi</h2>
                            <p class="text-white wow fadeInUp" data-wow-delay=".6s">
                                
                                    1. Menumbuhkan suasana sekolah yang religius dan menempatkan nilai-nilai agama sebagai sumber kearifan dalam bertindak. <br>
                                    2. Meningkatkan profesionalisme pendidik dan tenaga kependidikan agar memiliki pengetahuan dan keterampilan serta etos kerja yang tinggi. <br>
                                    3. Mengembangkan pembelajaran PAIKEM sesuai denaikan potensi yang dimiliki peserta didik. <br>
                                    4. Mengembangkan kegiatan ekstrakurikuler untuk meningkatkan prestasi akademik dan non akademik. <br>
                                    5. Membadayakan perilaku sopan, santun, dan berbudi pekerti luhur melalui kegiatan pembiasaan sehari-hari. <br>
                                    6. Membudayakan hidup bersih dan sehat, serta peduli lingkungan melalui kegiatan pembiasaan sehari-hari. <br>
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========================= contact-section end ========================= -->

        <!-- ========================= service-section start ========================= -->
        <section id="service" class="service-section pt-130 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-9 mx-auto">
                        <div class="section-title text-center mb-55">
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Lokasi Sekolah</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <img src="img/perpus.jpg" alt="" class="w-100">
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div style="position: relative; padding-bottom: 100%; height: 0; overflow: hidden;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.859829877331!2d113.80874667500632!3d-7.909708092113548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6dd0c96063627%3A0x240fbcf5b19e18d0!2sSD%20Negeri%20Kotakulon%203%20Bondowoso!5e0!3m2!1sen!2sid!4v1716122875191!5m2!1sen!2sid"
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 75%; border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========================= service-section end ========================= -->

        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top">
            <i class="lni lni-arrow-up"></i>
        </a>
        

@endsection