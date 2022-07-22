@extends('User.Page.Marketplace.Master')
<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Keranjang</h2>
          <ol>
            <li><a href="">Marketplace</a></li>
            <li>Keranjang</li>
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
                                    <th scope="col" colspan="3" style="font-size: 25px">List Keranjang</th>
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
                                @if($ca->isEmpty())
                                    <tr colspan="5" >
                                        <th class="text-center"><center><p class="mt-4">Maaf... Belum Ada Produk di Cart...</p></center></th>
                                    <tr>
                                @else
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
                                                    <td style="">
                                                        <div class="d-flex " >
                                                            <a href="{{ route('cart.updatemin', $ts->id_produk) }}" type="button" id="sub" class="sub btn btn-link px-2"><i class="fa fa-minus"></i></a>
                                                            <input type="number" id="jumlah" name="jumlah" value="{{$ts->jumlah}}" min="1" max="100"  class="form-control text-center"/>
                                                            
                                                            <a href="{{ route('cart.updateplus', $ts->id_produk) }}" type="button" id="add" class="add btn btn-link px-2"><i class="fa fa-plus"></i></a>
                                                        </div>
                                                    </td>
                                                    <td style="">Rp {{$ts->produk->harga * $ts->jumlah}}</td>
                                                    <td style="">{{$ts->status}}</td>
                                                    <td style=""><a href="{{route('cart.delete', $ts->id)}}" type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                                </tr>
                                        @endif  
                                    @endforeach
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <h4><a href="">Total Amount</a></h4>
                        <div class="row">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <p>Sub Total </p>
                                    <p>Diskon</p>
                                </div>
                            
                                <div class="flex-grow-1 text-end">
                                    <p>@currency($tot)</p> 
                                    <p>@currency(0)</p>  
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
                        @if($ca->isEmpty())
                            <a href="{{route('marketplace.index')}}" class="btn " type="button" style="border-color: #128FE2;  color: #0E6BAA;">BELANJA LAGI</a>
                        @else
                            <a href="{{route('marketplace.index')}}" class="btn " type="button" style="border-color: #128FE2;  color: #0E6BAA;">BELANJA LAGI</a>
                            <a href="{{route('checkout.checkout')}}" class="btn" type="button" style="background-color: #128FE2; color: white">CHECKOUT</a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

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
@endsection