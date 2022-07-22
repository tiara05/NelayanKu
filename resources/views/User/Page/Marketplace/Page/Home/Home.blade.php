@extends('User.Page.Marketplace.Master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/cdb.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>
@section('content')

<section id="hero" class="pb-4">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up" data-aos-delay="100">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="../Iklan.png" class="img-fluid d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                <img src="../Iklan.png" class="img-fluid d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                <img src="../Iklan.png" class="img-fluid d-block w-100" alt="">
                </div>
            </div>
        </div>
</section>


<!-- ======= Services Section ======= -->
<section id="services" class="services p-0 pt-4">
      <div class="container" data-aos="fade-up">
        <div class="row d-flex justify-content-center" >
            <div class="row d-flex justify-content-center" >
                <div class="col-lg-3 ">
                    <div
                    class="nav  nav-tabs flex-column mb-4 "
                    id="v-tabs-tab"
                    role="tablist"
                    aria-orientation="vertical"
                    >
                    <a
                        class="nav-link active "
                        id="v-tabs-home-tab"
                        data-toggle="tab"
                        href="#v-tabs-home"
                        role="tab"
                        aria-controls="v-tabs-home" 
                        style="color: black; font-size: 17px"
                        aria-selected="true"
                        >All Produk</a
                    >
                    <a
                        class="nav-link"
                        id="v-tabs-profile-tab"
                        data-toggle="tab"
                        href="#v-tabs-profile"
                        role="tab"
                        aria-controls="v-tabs-profile"
                        style="color: black; font-size: 17px"
                        aria-selected="false"
                        >Ikan Air Laut</a
                    >
                    <a
                        class="nav-link"
                        id="v-tabs-messages-tab"
                        data-toggle="tab"
                        href="#v-tabs-messages"
                        role="tab"
                        aria-controls="v-tabs-messages"
                        style="color: black; font-size: 17px"
                        aria-selected="false"
                        >Ikan Air Tawar</a
                    >
                    <a
                        class="nav-link"
                        id="v-tabs-ola-tab"
                        data-toggle="tab"
                        href="#v-tabs-ola"
                        role="tab"
                        aria-controls="v-tabs-ola"
                        style="color: black; font-size: 17px"
                        aria-selected="false"
                        >Olahan Ikan</a
                    >
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="tab-content" id="v-tabs-tabContent">
                    <div
                        class="tab-pane fade show active"
                        id="v-tabs-home"
                        role="tabpanel"
                        aria-labelledby="v-tabs-home-tab"
                    >
                            <div class="row d-flex justify-content-center" >
                                @if($produk->isEmpty())
                                <center><h5 class="mt-4">Maaf... Barang lagi Sold Out Nih...</h5></center>
                                @else
                                    @foreach($produk as $pr)
                                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5" data-aos="zoom-in" data-aos-delay="100">
                                    <a href="{{route('detail.index', $pr->id)}}">    
                                        <div class="icon-box iconbox-blue border rounded" >
                                            <div class="icon">
                                                <img src="{{ asset('dataproduk/' . $pr->foto_produk) }}" class="card-img-top" alt="..." >
                                            </div>
                                            <h5 class="card-title fw-bold p-2">{{$pr->nama_produk}}</h5>
                                            <p class="card-text p-2" style="color: red;">@currency($pr->harga)</p>
                                            <p class="p-2 text-end" href="#" style=" color: #4F4F4F; font-size: 12px"><i class="fa fa-map-marker me-1" aria-hidden="true"></i>{{$pr->nelayan->kotakab}}</p>
                                        </div>
                                    </a>
                                    </div>
                                    @endforeach
                                @endif
                                <div class="d-flex justify-content-center mt-2">{!! $produk->links() !!}</div>
                            </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="v-tabs-profile"
                        role="tabpanel"
                        aria-labelledby="v-tabs-profile-tab"
                    >
                            <div class="row d-flex justify-content-center" >
                                @if($laut->isEmpty())
                                <center><h5 class="mt-4">Maaf... Barang lagi Sold Out Nih...</h5></center>
                                @else
                                    @foreach($laut as $pr)
                                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
                                    <a href="{{route('detail.index', $pr->id)}}">    
                                        <div class="icon-box iconbox-blue border rounded" >
                                            <div class="icon">
                                                <img src="{{ asset('dataproduk/' . $pr->foto_produk) }}" class="card-img-top" alt="..." >
                                            </div>
                                            <h5 class="card-title fw-bold p-2">{{$pr->nama_produk}}</h5>
                                            <p class="card-text p-2" style="color: red;">@currency($pr->harga)</p>
                                            <p class="p-2 text-end" href="#" style=" color: #4F4F4F; font-size: 12px"><i class="fa fa-map-marker me-1" aria-hidden="true"></i>{{$pr->nelayan->kotakab}}</p>
                                        </div>
                                    </a>
                                    </div>
                                    @endforeach
                                @endif
                                <div class="d-flex justify-content-center mt-2">{!! $produk->links() !!}</div>
                            </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="v-tabs-messages"
                        role="tabpanel"
                        aria-labelledby="v-tabs-messages-tab"
                    >
                            <div class="row d-flex justify-content-center" >
                                @if($tawar->isEmpty())
                                <center><h5 class="mt-4">Maaf... Barang lagi Sold Out Nih...</h5></center>
                                @else
                                    @foreach($tawar as $pr)
                                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
                                    <a href="{{route('detail.index', $pr->id)}}">    
                                        <div class="icon-box iconbox-blue border rounded" >
                                            <div class="icon">
                                                <img src="{{ asset('dataproduk/' . $pr->foto_produk) }}" class="card-img-top" alt="..." >
                                            </div>
                                            <h5 class="card-title fw-bold p-2">{{$pr->nama_produk}}</h5>
                                            <p class="card-text p-2" style="color: red;">@currency($pr->harga)</p>
                                            <p class="p-2 text-end" href="#" style=" color: #4F4F4F; font-size: 12px"><i class="fa fa-map-marker me-1" aria-hidden="true"></i>{{$pr->nelayan->kotakab}}</p>
                                        </div>
                                    </a>
                                    </div>
                                    @endforeach
                                @endif
                                <div class="d-flex justify-content-center mt-2">{!! $produk->links() !!}</div>
                            </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="v-tabs-ola"
                        role="tabpanel"
                        aria-labelledby="v-tabs-ola-tab"
                    >
                            <div class="row d-flex justify-content-center" >
                                @if($olahan->isEmpty())
                                <center><h5 class="mt-4">Maaf... Barang lagi Sold Out Nih...</h5></center>
                                @else
                                    @foreach($olahan as $pr)
                                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
                                    <a href="{{route('detail.index', $pr->id)}}">    
                                        <div class="icon-box iconbox-blue border rounded" >
                                            <div class="icon">
                                                <img src="{{ asset('dataproduk/' . $pr->foto_produk) }}" class="card-img-top" alt="..." >
                                            </div>
                                            <h5 class="card-title fw-bold p-2">{{$pr->nama_produk}}</h5>
                                            <p class="card-text p-2" style="color: red;">@currency($pr->harga)</p>
                                            <p class="p-2 text-end" href="#" style=" color: #4F4F4F; font-size: 12px"><i class="fa fa-map-marker me-1" aria-hidden="true"></i>{{$pr->nelayan->kotakab}}</p>
                                        </div>
                                    </a>
                                    </div>
                                    @endforeach
                                @endif
                                <div class="d-flex justify-content-center mt-2">{!! $produk->links() !!}</div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section><!-- End Sevices Section -->

@endsection