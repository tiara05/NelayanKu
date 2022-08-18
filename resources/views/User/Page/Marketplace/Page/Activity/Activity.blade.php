@extends('User.Page.Marketplace.Master')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/cdb.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>
@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center mt-4">
          <h2>Histori Aktivitas</h2>
          <ol>
            <li><a href="">Marketplace</a></li>
            <li>Aktivitas</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="about p-3">
        <div class="container" data-aos="fade-up">
            <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation" style="color: #128FE2;">
                    <a
                    class="nav-link active"
                    id="ex3-tab-1"
                    data-toggle="tab"
                    href="#ex3-tabs-1"
                    role="tab"
                    aria-controls="ex3-tabs-1"
                    aria-selected="true"
                    >Semua</a
                    >
                </li>
                <li class="nav-item" role="presentation">
                    <a
                    class="nav-link"
                    id="ex3-tab-2"
                    data-toggle="tab"
                    href="#ex3-tabs-2"
                    role="tab"
                    aria-controls="ex3-tabs-2"
                    aria-selected="false"
                    >Belum Bayar</a
                    >
                </li>
                <li class="nav-item" role="presentation">
                    <a
                    class="nav-link"
                    id="ex3-tab-3"
                    data-toggle="tab"
                    href="#ex3-tabs-3"
                    role="tab"
                    aria-controls="ex3-tabs-3"
                    aria-selected="false"
                    >Di Kemas</a
                    >
                </li>
                <li class="nav-item" role="presentation">
                    <a
                    class="nav-link"
                    id="ex3-tab-4"
                    data-toggle="tab"
                    href="#ex3-tabs-4"
                    role="tab"
                    aria-controls="ex3-tabs-4"
                    aria-selected="false"
                    >Di Kirim</a
                    >
                </li>
                <li class="nav-item" role="presentation">
                    <a
                    class="nav-link"
                    id="ex3-tab-5"
                    data-toggle="tab"
                    href="#ex3-tabs-5"
                    role="tab"
                    aria-controls="ex3-tabs-5"
                    aria-selected="false"
                    >Selesai</a
                    >
                </li>
            </ul>
                <div class="tab-content" id="ex2-content">
                    <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                        <?php
                            $no = 0;
                        ?>
                        @if($trans->isEmpty())
                            <center><h5>Maaf... Belum Ada Pesanan...</h5></center>
                        @else
                        @foreach($trans as $or)
                        <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <h4 ><a href="" style="font-size: 22px;">Nomor Order : {{$or->no_order}}</a></h4>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <h4 style="">{{$or->status}}</h4>
                                </div>
                            </div>      <div class="table-responsive text-nowrap">
                                            <table class="table table-borderless text-nowrap mb-4">
                                                <thead >
                                                    <tr class="border-bottom mt-4">
                                                        <th scope="col" colspan="2"></th>
                                                        <td class="text-center"><span style="color: #BDBDBD;">Nama Produk</span></td>
                                                        <td class="text-center"><span style="color: #BDBDBD;">Harga Satuan</span></td>
                                                        <td class="text-center"><span style="color: #BDBDBD;">Jumlah</span></td>
                                                        <td class="text-center"><span style="color: #BDBDBD;">Pengolahan</span></td>
                                                        <td class="text-center"><span style="color: #BDBDBD;">Subtotal Produk</span></td>
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    {{-- jdjd --}}
                                                    <?php
                                                        $no = 0;
                                                    ?>
                                                    @foreach($order as $ts)
                                                        @if($ts -> no_order == $or -> no_order)
                                                        <?php
                                                            $no += 1;
                                                        ?>
                                                            <tr>
                                                                <th scope="row" style="line-height: 8rem; text-align: center">{{$no}}</th>
                                                                <td style="line-height: 8rem;text-align: center"><center><img src="{{ asset('dataproduk/' . $ts->produk->foto_produk) }}" alt="foto" class="img-fluid" style="height: 8rem; padding-right: 0;"><center></td>
                                                                <td style="line-height: 8rem;text-align: center">{{$ts->produk->nama_produk}}</td>
                                                                <td style="line-height: 8rem;text-align: center">@currency($ts->produk->harga)</td>
                                                                <td style="line-height: 8rem;text-align: center">{{$ts->jumlah}}</td>
                                                                <td style="line-height: 8rem;text-align: center">{{$ts->pengolahan}}</td>
                                                                @if($ts->pengolahan == "Langsung")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargalangsung * $ts->jumlah)</td>
                                                                @elseif($ts->pengolahan == "Dibersihkan")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargabersih * $ts->jumlah)</td>
                                                                @elseif($ts->pengolahan == "Fillet")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargafillet * $ts->jumlah)</td>
                                                                @endif
                                                                
                                                            </tr>
                                                            @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <h4 class="text-end"><a href="" style="font-size: 22px;">Total Pesanan : @currency($or->total)</a></h4>
                                        <div class="d-flex justify-content-end mt-4 ">
                                            @if ($or->status == 'On Prosess')
                                                <a class="btn btn-lg btn-block" href="{{route('bayar.index', $or->id)}}" style="background-color: #128FE2; color: white;">Bayar Sekarang</a>
                                            @elseif($or->status == 'Barang Dikirim')
                                                <a class="btn" href="{{route('activity.barangsampai', $or->id)}}" style="background-color: #128FE2; color: white;">Barang Sampai</a>
                                            @elseif($or->status == 'Selesai')
                                                <a href="{{route('review.index', $or->id)}}" class="btn" style="background-color: #128FE2; color: white;">Review Product</a>
                                                <a class="btn" href="{{route('activity.cetaknota', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Nota</a>
                                            @elseif($or->status == 'Done')
                                                <a class="btn" href="{{route('activity.cetaknota', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Nota</a>
                                            @endif
                                        </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                        @if($blmbayar->isEmpty())
                            <center><h5>Maaf... Belum Ada Pesanan...</h5></center>
                        @else
                        <?php
                            $no = 0;
                        ?>
                        @foreach($blmbayar as $or)
                        <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <h4 ><a href="" style="font-size: 22px;">Nomor Order : {{$or->no_order}}</a></h4>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <h4 style="">{{$or->status}}</h4>
                                </div>
                            </div>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-borderless text-nowrap mb-4">
                                            <thead >
                                                <tr class="border-bottom mt-4">
                                                    <th scope="col" colspan="2"></th>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Nama Produk</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Harga Satuan</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Jumlah</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Pengolahan</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Subtotal Produk</span></td>
                                                </tr>
                                                
                                            </thead>
                                            <tbody>
                                                {{-- jdjd --}}
                                                <?php
                                                    $no = 0;
                                                ?>
                                                @foreach($order as $ts)
                                                    @if($ts -> no_order == $or -> no_order)
                                                    <?php
                                                        $no += 1;
                                                    ?>
                                                        <tr>
                                                            <th scope="row" style="line-height: 8rem; text-align: center">{{$no}}</th>
                                                            <td style="line-height: 8rem;text-align: center"><center><img src="{{ asset('dataproduk/' . $ts->produk->foto_produk) }}" alt="foto" class="img-fluid" style="height: 8rem; padding-right: 0;"><center></td>
                                                            <td style="line-height: 8rem;text-align: center">{{$ts->produk->nama_produk}}</td>
                                                            <td style="line-height: 8rem;text-align: center">@currency($ts->produk->harga)</td>
                                                            <td style="line-height: 8rem;text-align: center">{{$ts->jumlah}}</td>
                                                            <td style="line-height: 8rem;text-align: center">{{$ts->pengolahan}}</td>
                                                                @if($ts->pengolahan == "Langsung")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargalangsung * $ts->jumlah)</td>
                                                                @elseif($ts->pengolahan == "Dibersihkan")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargabersih * $ts->jumlah)</td>
                                                                @elseif($ts->pengolahan == "Fillet")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargafillet * $ts->jumlah)</td>
                                                                @endif
                                                            
                                                        </tr>
                                                        @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                        <hr>
                                        <h4 class="text-end"><a href="" style="font-size: 22px;">Total Pesanan : @currency($or->total)</a></h4>
                                        <div class="d-flex justify-content-end mt-4 ">
                                            @if ($or->status == 'On Prosess')
                                                <a class="btn btn-lg btn-block" href="{{route('bayar.index', $or->id)}}" style="background-color: #128FE2; color: white;">Bayar Sekarang</a>
                                            @elseif($or->status == 'Barang Dikirim')
                                                <a class="btn" href="{{route('activity.barangsampai', $or->id)}}" style="background-color: #128FE2; color: white;">Barang Sampai</a>
                                            @elseif($or->status == 'Selesai')
                                                <a href="{{route('review.index', $or->id)}}" class="btn" style="background-color: #128FE2; color: white;">Review Product</a>
                                                <a class="btn" href="{{route('activity.cetaknota', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Nota</a>
                                            @elseif($or->status == 'Done')
                                                <a class="btn" href="{{route('activity.cetaknota', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Nota</a>
                                            @endif
                                        </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                        @if($kemas->isEmpty())
                            <center><h5>Maaf... Belum Ada Pesanan...</h5></center>
                        @else
                        <?php
                            $no = 0;
                        ?>
                        @foreach($kemas as $or)
                        <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <h4 ><a href="" style="font-size: 22px;">Nomor Order : {{$or->no_order}}</a></h4>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <h4 style="">{{$or->status}}</h4>
                                </div>
                            </div>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-borderless text-nowrap mb-4">
                                            <thead >
                                                <tr class="border-bottom mt-4">
                                                    <th scope="col" colspan="2"></th>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Nama Produk</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Harga Satuan</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Jumlah</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Pengolahan</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Subtotal Produk</span></td>
                                                </tr>
                                                
                                            </thead>
                                            <tbody>
                                                {{-- jdjd --}}
                                                <?php
                                                    $no = 0;
                                                ?>
                                                @foreach($order as $ts)
                                                    @if($ts -> no_order == $or -> no_order)
                                                    <?php
                                                        $no += 1;
                                                    ?>
                                                        <tr>
                                                            <th scope="row" style="line-height: 8rem; text-align: center">{{$no}}</th>
                                                            <td style="line-height: 8rem;text-align: center"><center><img src="{{ asset('dataproduk/' . $ts->produk->foto_produk) }}" alt="foto" class="img-fluid" style="height: 8rem; padding-right: 0;"><center></td>
                                                            <td style="line-height: 8rem;text-align: center">{{$ts->produk->nama_produk}}</td>
                                                            <td style="line-height: 8rem;text-align: center">@currency($ts->produk->harga)</td>
                                                            <td style="line-height: 8rem;text-align: center">{{$ts->jumlah}}</td>
                                                            <td style="line-height: 8rem;text-align: center">{{$ts->pengolahan}}</td>
                                                                @if($ts->pengolahan == "Langsung")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargalangsung * $ts->jumlah)</td>
                                                                @elseif($ts->pengolahan == "Dibersihkan")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargabersih * $ts->jumlah)</td>
                                                                @elseif($ts->pengolahan == "Fillet")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargafillet * $ts->jumlah)</td>
                                                                @endif
                                                            
                                                        </tr>
                                                        @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                        <hr><h4 class="text-end"><a href="" style="font-size: 22px;">Total Pesanan : @currency($or->total)</a></h4>
                                        <div class="d-flex justify-content-end mt-4 ">
                                            @if ($or->status == 'On Prosess')
                                                <a class="btn btn-lg btn-block" href="{{route('bayar.index', $or->id)}}" style="background-color: #128FE2; color: white;">Bayar Sekarang</a>
                                            @elseif($or->status == 'Barang Dikirim')
                                                <a class="btn" href="{{route('activity.barangsampai', $or->id)}}" style="background-color: #128FE2; color: white;">Barang Sampai</a>
                                            @elseif($or->status == 'Selesai')
                                                <a href="{{route('review.index', $or->id)}}" class="btn" style="background-color: #128FE2; color: white;">Review Product</a>
                                                <a class="btn" href="{{route('activity.cetaknota', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Nota</a>
                                            @elseif($or->status == 'Done')
                                                <a class="btn" href="{{route('activity.cetaknota', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Nota</a>
                                            @endif
                                        </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="tab-pane fade" id="ex3-tabs-4" role="tabpanel" aria-labelledby="ex3-tab-4">
                        @if($kirim->isEmpty())
                            <center><h5>Maaf... Belum Ada Pesanan...</h5></center>
                        @else
                        <?php
                            $no = 0;
                        ?>
                        @foreach($kirim as $or)
                        <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <h4 ><a href="" style="font-size: 22px;">Nomor Order : {{$or->no_order}}</a></h4>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <h4 style="">{{$or->status}}</h4>
                                </div>
                            </div>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-borderless text-nowrap mb-4">
                                            <thead >
                                                <tr class="border-bottom mt-4">
                                                    <th scope="col" colspan="2"></th>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Nama Produk</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Harga Satuan</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Jumlah</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Pengolahan</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Subtotal Produk</span></td>
                                                </tr>
                                                
                                            </thead>
                                            <tbody>
                                                {{-- jdjd --}}
                                                <?php
                                                    $no = 0;
                                                ?>
                                                @foreach($order as $ts)
                                                    @if($ts -> no_order == $or -> no_order)
                                                    <?php
                                                        $no += 1;
                                                    ?>
                                                        <tr>
                                                            <th scope="row" style="line-height: 8rem; text-align: center">{{$no}}</th>
                                                            <td style="line-height: 8rem;text-align: center"><center><img src="{{ asset('dataproduk/' . $ts->produk->foto_produk) }}" alt="foto" class="img-fluid" style="height: 8rem; padding-right: 0;"><center></td>
                                                            <td style="line-height: 8rem;text-align: center">{{$ts->produk->nama_produk}}</td>
                                                            <td style="line-height: 8rem;text-align: center">@currency($ts->produk->harga)</td>
                                                            <td style="line-height: 8rem;text-align: center">{{$ts->jumlah}}</td>
                                                            <td style="line-height: 8rem;text-align: center">{{$ts->pengolahan}}</td>
                                                                @if($ts->pengolahan == "Langsung")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargalangsung * $ts->jumlah)</td>
                                                                @elseif($ts->pengolahan == "Dibersihkan")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargabersih * $ts->jumlah)</td>
                                                                @elseif($ts->pengolahan == "Fillet")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargafillet * $ts->jumlah)</td>
                                                                @endif
                                                            
                                                        </tr>
                                                        @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                        <hr>
                                        <h4 class="text-end"><a href="" style="font-size: 22px;">Total Pesanan : @currency($or->total)</a></h4>
                                        <div class="d-flex justify-content-end mt-4 ">
                                            @if ($or->status == 'On Prosess')
                                                <a class="btn btn-lg btn-block" href="{{route('bayar.index', $or->id)}}" style="background-color: #128FE2; color: white;">Bayar Sekarang</a>
                                            @elseif($or->status == 'Barang Dikirim')
                                                <a class="btn" href="{{route('activity.barangsampai', $or->id)}}" style="background-color: #128FE2; color: white;">Barang Sampai</a>
                                            @elseif($or->status == 'Selesai')
                                                <a href="{{route('review.index', $or->id)}}" class="btn" style="background-color: #128FE2; color: white;">Review Product</a>
                                                <a class="btn" href="{{route('activity.cetaknota', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Nota</a>
                                            @elseif($or->status == 'Done')
                                                <a class="btn" href="{{route('activity.cetaknota', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Nota</a>
                                            @endif
                                        </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="tab-pane fade" id="ex3-tabs-5" role="tabpanel" aria-labelledby="ex3-tab-5">
                        @if($selesai->isEmpty())
                            <center><h5>Maaf... Belum Ada Pesanan...</h5></center>
                        @else
                        <?php
                            $no = 0;
                        ?>
                        @foreach($selesai as $or)
                        <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <h4 ><a href="" style="font-size: 22px;">Nomor Order : {{$or->no_order}}</a></h4>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <h4 style="">{{$or->status}}</h4>
                                </div>
                            </div>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-borderless text-nowrap mb-4">
                                            <thead >
                                                <tr class="border-bottom mt-4">
                                                    <th scope="col" colspan="2"></th>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Nama Produk</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Harga Satuan</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Jumlah</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Pengolahan</span></td>
                                                    <td class="text-center"><span style="color: #BDBDBD;">Subtotal Produk</span></td>
                                                </tr>
                                                
                                            </thead>
                                            <tbody>
                                                {{-- jdjd --}}
                                                <?php
                                                    $no = 0;
                                                ?>
                                                @foreach($order as $ts)
                                                    @if($ts -> no_order == $or -> no_order)
                                                    <?php
                                                        $no += 1;
                                                    ?>
                                                        <tr>
                                                            <th scope="row" style="line-height: 8rem; text-align: center">{{$no}}</th>
                                                            <td style="line-height: 8rem;text-align: center"><center><img src="{{ asset('dataproduk/' . $ts->produk->foto_produk) }}" alt="foto" class="img-fluid" style="height: 8rem; padding-right: 0;"><center></td>
                                                            <td style="line-height: 8rem;text-align: center">{{$ts->produk->nama_produk}}</td>
                                                            <td style="line-height: 8rem;text-align: center">@currency($ts->produk->harga)</td>
                                                            <td style="line-height: 8rem;text-align: center">{{$ts->jumlah}}</td>
                                                            <td style="line-height: 8rem;text-align: center">{{$ts->pengolahan}}</td>
                                                                @if($ts->pengolahan == "Langsung")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargalangsung * $ts->jumlah)</td>
                                                                @elseif($ts->pengolahan == "Dibersihkan")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargabersih * $ts->jumlah)</td>
                                                                @elseif($ts->pengolahan == "Fillet")
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->hargafillet * $ts->jumlah)</td>
                                                                @endif
                                                            
                                                        </tr>
                                                        @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                        <hr>
                                        <h4 class="text-end"><a href="" style="font-size: 22px;">Total Pesanan : @currency($or->total)</a></h4>
                                        <div class="d-flex justify-content-end mt-4 ">
                                            @if ($or->status == 'On Prosess')
                                                <a class="btn btn-lg btn-block" href="{{route('bayar.index', $or->id)}}" style="background-color: #128FE2; color: white;">Bayar Sekarang</a>
                                            @elseif($or->status == 'Barang Dikirim')
                                                <a class="btn" href="{{route('activity.barangsampai', $or->id)}}" style="background-color: #128FE2; color: white;">Barang Sampai</a>
                                            @elseif($or->status == 'Selesai')
                                                <a href="{{route('review.index', $or->id)}}" class="btn" style="background-color: #128FE2; color: white;">Review Product</a>
                                                <a class="btn" href="{{route('activity.cetaknota', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Nota</a>
                                            @elseif($or->status == 'Done')
                                                <a class="btn" href="{{route('activity.cetaknota', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Nota</a>
                                            @endif
                                        </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
        </div>
    </section>

@endsection