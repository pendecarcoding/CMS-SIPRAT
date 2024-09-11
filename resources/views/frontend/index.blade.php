@extends('frontend.template.design')
@section('content')
<section id="hero" class="section hero light-background">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
        <h1>Sistem Informasi Pemantauan Rapat Anggota Tahunan</h1>
        <p>Koperasi Kabupaten Bengkalis</p>
        <div class="d-flex">
          <a href="index.html#about" class="btn-get-started">Get Started</a>
          <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="assets/img/hero-img.svg" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="section about">
    <div class="container">
        <div class="row gy-3">
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/about-img.svg" alt="" class="img-fluid">
        </div>

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="about-content ps-0 ps-lg-3">
            <h3>Sistem Informasi Pemantauan Rapat Anggota Tahunan</h3>
            <p class="fst-italic">
                Aplikasi ini digunakan untuk memantau jalannya Rapat Anggota Tahunan (RAT) dari setiap koperasi. Dengan
                Sistem Informasi Pemantauan ini, anggota koperasi dapat memantau, mengikuti, dan mendapatkan informasi terkait
                pelaksanaan RAT dengan lebih mudah dan efisien.
            </p>
            <ul>
                <li>
                <i class="bi bi-diagram-3"></i>
                <div>
                    <h4>Monitoring Rapat secara Real-time</h4>
                    <p>Aplikasi ini menyediakan pemantauan rapat secara langsung, memberikan informasi terkini kepada seluruh anggota koperasi.</p>
                </div>
                </li>
                <li>
                <i class="bi bi-fullscreen-exit"></i>
                <div>
                    <h4>Rekapitulasi Hasil Rapat</h4>
                    <p>Semua keputusan dan hasil rapat akan direkapitulasi secara otomatis dan dapat diakses kapan saja oleh para anggota.</p>
                </div>
                </li>
            </ul>
            <p>
                Sistem ini dirancang untuk mempermudah proses pelaporan dan transparansi, sehingga setiap anggota koperasi
                dapat terlibat secara aktif dalam pengambilan keputusan penting di setiap rapat anggota tahunan.
            </p>
            </div>
        </div>
        </div>
    </div>
    </section>
    <!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
    <h2>Berita & Artikel</h2>
    </div><!-- End Section Title -->

    <div class="container">

    <div class="row gy-4">

        @foreach($posts as $i => $v)
        <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
            @if($v->hasMedia('feature_image'))
            <img style="width:100%" src="{{ $v->getFirstMediaUrl('feature_image') }}" alt="Feature Image">
            @endif 
            <br><h4><a href="{{url('detail-page/'.$v->slug)}}" class="stretched-link">{{ $v->title }}</a></h4>
            <br>
            <p>{{ $v->getExcerpt(100) }}</p>
        </div>
        </div>
        @endforeach

    

    </div>

    </div>

    </section><!-- /Services Section -->

    @endsection

