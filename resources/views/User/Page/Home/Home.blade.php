@extends('User.Master')

@section('content')
<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang Kami</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
            NelayanKu merupakan sebuah aplikasi e-commerce yang menyediakan ikan segar maupun olahan disertai dengan edukasi untuk memenuhi kebutuhan, meningkatkan kecerdasan masyarakat serta meningkatkan konsumsi ikan pada masyarakat agar dapat hidup sehat dengan berkecukupan protein. 
            </p>
            
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <center><img src="logobesar.png" class="img-fluid" alt=""></center>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= About Section ======= -->
    <section id="about2" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Bagaimana Kami Bekerja ?</h2>
          <p>Bagaimana cara website nelayanku ini bekerja dari pelanggan memilih barang hingga proses pembelian.</p>
        </div>

        <div class="row content">
          <img src="assetscust/how.png" class="img-fluit" alt="">
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">
        <div class="text-center">
          <h3>Mari Bermitra dengan Kami</h3>
          <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a class="cta-btn" href="{{route('registernelayan')}}">Daftar Nelayan</a>
        </div>
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimoni</h2>
         
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    NelayanKu membantu saya sebagai nelayan untuk menjual ikan hasil tangkapan saya ke berbagai daerah. Selain itu, prosesnya juga mudah.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="testi1.png" class="testimonial-img" alt="">
                <h3>Asep Sudrajat J</h3>
                <h4>Nelayan</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Dengan NelayanKu saya dengan mudah mendapatkan ikan yang diinginkan. Ikan yang sampaipun kualitasnya masih segar. Terima kasih NelayanKu
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="testi2.png" class="testimonial-img" alt="">
                <h3>Ailsha Daria K</h3>
                <h4>Ibu Rumah Tangga</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Tidak hanya ikan segar saja yang dijual di NelayanKu, keripik atau hasil olahan ikan pun dijual di NelayanKu. Dapat membantu mencari cemilan hasil olahan ikan dengan mudah!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="testi3.png" class="testimonial-img" alt="">
                <h3>Revya Quentya H</h3>
                <h4>Pelajar</h4>
              </div>
            </div><!-- End testimonial item -->


          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->
</main>
@endsection