@extends('User.Page.Marketplace.Master')
<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
          $("#langsung").click(function(){
            $("#hargalangsung").fadeIn();
            $("#hargaasli").hide();
            $("#hargabersih").hide();
            $("#hargafillet").hide();
          });
        });
        $(document).ready(function(){
          $("#bersih").click(function(){
            $("#hargabersih").fadeIn();
            $("#hargaasli").hide();
            $("#hargalangsung").hide();
            $("#hargafillet").hide();
          });
        });
        $(document).ready(function(){
          $("#fillet").click(function(){
            $("#hargafillet").fadeIn();
            $("#hargaasli").hide();
            $("#hargabersih").hide();
            $("#hargalangsung").hide();
          });
        });

    </script>
@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Produk Details</h2>
          <ol>
            <li><a href="">Marketplace</a></li>
            <li>Produk Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
     <!-- ======= About Section ======= -->
    <section id="about" class="about pt-5">
        <div class="container" data-aos="fade-up">

            <div class="container">
                <div class="row g-0">
                    <div class="col-md-5  ">
                        <div class="img-wrapper" style="width: 80%">
                            <img
                                src="{{ asset('dataproduk/' . $produk->foto_produk) }}"
                                alt="Sample photo"
                                class="img-fluid "
                                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"
                            />
                        </div>
                    </div>
                    <div class="col-md-7">
                        
                            <h2><b>{{$produk->nama_produk}}</b></h2>
                            <br>
                            <div id="hargaasli">
                                <h4 style="color:red">@currency($produk->harga) / kg</h4>
                            </div>
                            <div id="hargalangsung" style="display:none;">
                                <h4 style="color:red">@currency($produk->hargalangsung) / kg</h4>
                            </div>
                            <div id="hargabersih" style="display:none;">
                                <h4 style="color:red">@currency($produk->hargabersih) / kg</h4>
                            </div>
                            <div id="hargafillet" style="display:none;">
                                <h4 style="color:red">@currency($produk->hargafillet) / kg</h4>
                            </div>
                            <h6 style="margin-top: 5%"><b>Deskripsi Produk :</b></h6>
                            <p>{{$produk->detail_produk}}</p>
                            <hr style="margin-top: 2%">
                            <form class="form form-horizontal" action="{{ route('cart.create', $produk->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                @if($produk->id_kategori != 3)
                                    <h6 style="margin-top: 5%;margin-bottom: 2%"><b>Jenis Pengolahan :</b></h6>
                                    <div class="form-check" >
                                        <input class="form-check-input" type="radio" data-filter=".langsung" id="langsung" value="Langsung" name="pengolahan">
                                        <label class="form-check-label" for="langsung">
                                        Langsung
                                        </label>
                                    </div>
                                    <div class="form-check" >
                                        <input class="form-check-input" type="radio" data-filter=".bersih" id="bersih" value="Dibersihkan" name="pengolahan">
                                        <label class="form-check-label" for="bersih">
                                        Dibersihkan
                                        </label>
                                    </div>
                                    <div class="form-check" >
                                        <input class="form-check-input" type="radio" data-filter=".fillet" id="fillet" value="Fillet" name="pengolahan">
                                        <label class="form-check-label" for="fillet">
                                        Fillet Tanpa Tulang
                                        </label>
                                    </div>
                                @endif
                                <h6 style="margin-top: 5%;margin-bottom: 2%"><b>Jumlah Pesanan / kg :</b></h6>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="d-flex">
                                            <button type="button" id="sub" class="sub btn btn-link px-2"><i class="fa fa-minus"></i></button>
                                            <input type="number" id="jumlah" name="jumlah" value="1" min="1" max="100"  class="form-control text-center"/>
                                            
                                            <button type="button" id="add" class="add btn btn-link px-2"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <p style="margin-top: 1%">Tersedia : <b>{{$produk->stok_produk}} Kg</b></p>
                                    </div>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-danger alert-block" style="margin-top: 10px">   
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif

                                </div>
                                <div class="pb-4 mt-4">
                                    @if(session()->has('user'))
                                        @if($pro->isEmpty())
                                            <a href="{{route('favorit.create', $produk->id)}}" class="btn md-2 " style="margin-right: 3%; border-color: #128FE2; width: 20%; color: #0E6BAA;"> <i class="fa fa-heart-o" size:9x aria-hidden="true" style=" margin-right: 5%"></i>Favorit</a>   
                                        @else    
                                            @foreach($pro as $p)
                                                @if($produk->id == $p->id_produk)
                                                    <a href="{{route('favorit.create', $produk->id)}}" class="btn md-2 " style="margin-right: 3%; border-color: #128FE2; width: 20%; color: #0E6BAA;"> <i class="fa fa-heart" size:9x aria-hidden="true" style=" margin-right: 5%"></i>Favorit</a> 
                                                @endif   
                                            @endforeach
                                    @endif
                                    @else
                                        <a href="{{route('favorit.create', $produk->id)}}" class="btn md-2 " style="margin-right: 3%; border-color: #128FE2; width: 20%; color: #0E6BAA;"> <i class="fa fa-heart-o" size:9x aria-hidden="true" style=" margin-right: 5%"></i>Favorit</a>           
                                    @endif
                                        <button type="submit" class="btn" name="cart" style="background-color: #128FE2; font-color:white; width:40%; color: white; "><i class="fa fa-cart-plus" aria-hidden="true" style="margin-right: 5%"></i>Masukkan Keranjang</button>
                                    
                                </div>  
                            </form>
                            <h6 style="" class=""><b>Mitra</b></h6><br>
                            <div class="d-flex">
                                    <img
                                        src="{{ asset('datanelayan/' . $produk->nelayan->foto) }}"
                                        alt="Sample photo"
                                        class="img-fluid rounded-circle"
                                        style="height: 4rem; width: 4rem; margin-right:5%"
                                    />
                                    <div class="row-">
                                        <h5><b>{{$produk->nelayan->name}}</b></h5>
                                        <h6 style="color:#BDBDBD; text-transform: lowercase;">{{$produk->nelayan->kotakab}}, Provinsi {{$produk->nelayan->provinsi}}</h6>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <h5 class="text-center">Review Produk</h5>
                    @if($review->isEmpty())
                        <center><p class="mt-4">Maaf... Belum Ada Review dari customer...</p></center>
                    @else
                        @foreach($review as $rev)
                            <div class="container mt-4" style="border-style:solid; border-width:1px; border-color: #7F9B6E;border-radius: 5px;">
                                <p class="mt-3"> <img src="{{ asset('datauser/' . $rev->user->foto) }}" width="50" height="50" alt="" style="margin-right: 2%; border-radius: 25px;" ><b>{{$rev->user->name}}</b></p>
                                <p>{{$rev->komentar}}</p>
                                <p style="text-align: right; color: #b3b3b3">{{date('d-m-Y', strtotime($rev->created_at));}}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            


            <script>
            
            $('.add').click(function () {
                
                $(this).prev().val(+$(this).prev().val() + 1);
                
            });
            $('.sub').click(function () {
                    if ($(this).next().val() > 1) {
                    $(this).next().val(+$(this).next().val() - 1);
                    }
            });
            
            </script>
        </div>
    </section><!-- End About Section -->

@endsection