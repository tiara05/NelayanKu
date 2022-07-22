@extends('User.Page.Marketplace.Master')
<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Checkout</h2>
          <ol>
            <li><a href="">Marketplace</a></li>
            <li>Checkout</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="about p-3">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 ">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-borderless text-nowrap mb-4">
                            <thead >
                                <tr class="border-bottom ">
                                    <th scope="col" colspan="4" style="font-size: 25px">Alamat Pengiriman</th>
                                    <td class="text-end" style="color: red; font-weight:400">
                                            <h6>*Shipping using Paxel</h6>
                                        </td>
                                </tr>
                                @foreach($user as $us)
                                <tr>
                                    <td>Nama Penerima</td> 
                                    <td class="">: {{$us->name}}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td class="">: {{$us->telepon}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Penerima</td>
                                    <td colspan="" style="text-transform: lowercase;">: {{$us->alamat}}</td>  
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-borderless text-nowrap mb-4">
                            
                            <thead >
                                <tr class="border-bottom mt-4">
                                    <th scope="col" colspan="3" style="font-size: 25px">Produk Dipesan</th>
                                    <td class="text-center"><span style="color: #BDBDBD;">Harga Satuan</span></td>
                                    <td class="text-center"><span style="color: #BDBDBD;">Jumlah</span></td>
                                    <td class="text-center"><span style="color: #BDBDBD;">Subtotal Produk</span></td>
                                </tr>
                                
                            </thead>
                            <tbody>
                                {{-- jdjd --}}
                                <?php
                                    $no = 0;
                                ?>
                                @foreach($ca as $or)
                                        <tr>
                                            <th colspan="5" style="line-height: 3rem">Nama Nelayan : {{$or->name}}</th>
                                        </tr>
                                    @foreach($rt as $ts)
                                        @if($ts ->id_nelayan == $or->id)
                                            <?php
                                                $no += 1;
                                            ?>
                                                <tr class="align-middle text-center">
                                                    <td style="">{{$no}}</td>
                                                    <td style=""><center><img src="{{ asset('dataproduk/' . $ts->produk->foto_produk) }}" alt="foto" class="img-fluid" style="height: 8rem; padding-right: 0;"><center></td>
                                                    <td style="">{{$ts->produk->nama_produk}}</td>
                                                    <td style="">@currency($ts->produk->harga)</td>
                                                    <td style="">{{$ts->jumlah}}</td>
                                                    <td style="">Rp {{$ts->produk->harga * $ts->jumlah}}</td>
                                                </tr>
                                        @endif  
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <h4><a href="">Metode Pembayaran</a></h4>
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                                <img src="{{ asset('mandiri.png') }}" alt class="mt-2" style="width: 50px;" />
                            </div>
                            </div>
                        
                            <div class="flex-grow-1">
                            <p class="d-block mb-0 mt-1" style="font-size: 14px">Nomor Rekening Mandiri</p>
                            </div>
                        </div>
                    </div>
                    <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <h4><a href="">Total Amount</a></h4>
                        <div class="row">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <p>Sub Total </p>
                                    <p>Diskon</p>
                                    <p>Ongkos Kirim</p>
                                </div>
                            
                                <div class="flex-grow-1 text-end">
                                    <p>@currency($tot)</p> 
                                    <p>@currency(0)</p> 
                                    <p>@currency(25000)</p> 
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="row">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                <h6>Grand Total</h6>
                                </div>
                            
                                <div class="flex-grow-1 text-end">
                                    <h6>@currency($tot+0)</h6> 
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <a href="{{ route('checkout.create') }}" class="btn" type="button" style="background-color: #128FE2; color: white">BAYAR SEKARANG</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection