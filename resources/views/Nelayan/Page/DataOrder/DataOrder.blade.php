@extends('Nelayan.Master')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/cdb.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>

@section('content')
            <div class="card">
                <h5 class="card-header">Data Order Customer</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-secondary alert-block mt-2 ms-4 mx-4 mb-4">   
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
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
                                    </div>
                                            <div class="table-responsive text-nowrap">
                                                <table class="table table-borderless text-nowrap mb-4">
                                                    <thead >
                                                        <tr class="border-bottom mt-4">
                                                            <th scope="col" colspan="2"></th>
                                                            <td class="text-center"><span style="color: #BDBDBD;">Nama Produk</span></td>
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
                                                                    <td style="line-height: 8rem;text-align: center">@currency($ts->produk->harga * $ts->jumlah)</td>
                                                                    
                                                                </tr>
                                                                @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                                <hr>
                                                <h4 class="text-end"><a href="" style="font-size: 22px;">Total Pesanan : @currency($or->total)</a></h4>
                                                <div class="d-flex justify-content-end mt-4 ">
                                                    @if ($or->status == 'On Prosess' || $or->status == 'Sudah Upload Bukti Pembayaran')
                                                        <a class="btn btn-lg btn-block" href="{{ route('transaksinelayan.index') }}" style="background-color: #128FE2; color: white;">Cek Pembayaran</a>
                                                    @elseif($or->status == 'Barang Dikemas')
                                                        <a class="btn" href="{{route('ordernelayan.cetakpesanan', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Pesanan</a>
                                                        <a class="btn" href="{{route('ordernelayan.barangkirim', $or->id)}}" style="background-color: #128FE2; color: white;">Barang Dikirim</a>
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
                                                            <td style="line-height: 8rem;text-align: center">@currency($ts->produk->harga * $ts->jumlah)</td>
                                                            
                                                        </tr>
                                                        @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                        <hr>
                                        <h4 class="text-end"><a href="" style="font-size: 22px;">Total Pesanan : @currency($or->total)</a></h4>
                                        <div class="d-flex justify-content-end mt-4 ">
                                            @if ($or->status == 'On Prosess' || $or->status == 'Sudah Upload Bukti Pembayaran')
                                                <a class="btn btn-lg btn-block" href="{{ route('transaksinelayan.index') }}" style="background-color: #128FE2; color: white;">Cek Pembayaran</a>
                                            @elseif($or->status == 'Barang Dikemas')
                                                <a class="btn" href="{{route('ordernelayan.cetakpesanan', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Pesanan</a>
                                                <a class="btn" href="{{route('ordernelayan.barangkirim', $or->id)}}" style="background-color: #128FE2; color: white;">Barang Dikirim</a>
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
                                                            <td style="line-height: 8rem;text-align: center">@currency($ts->produk->harga * $ts->jumlah)</td>
                                                            
                                                        </tr>
                                                        @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                        <hr><h4 class="text-end"><a href="" style="font-size: 22px;">Total Pesanan : @currency($or->total)</a></h4>
                                        <div class="d-flex justify-content-end mt-4 ">
                                            @if ($or->status == 'On Prosess' || $or->status == 'Sudah Upload Bukti Pembayaran')
                                                <a class="btn btn-lg btn-block" href="{{ route('transaksinelayan.index') }}" style="background-color: #128FE2; color: white;">Cek Pembayaran</a>
                                            @elseif($or->status == 'Barang Dikemas')
                                                <a class="btn" href="{{route('ordernelayan.cetakpesanan', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Pesanan</a>
                                                <a class="btn" href="{{route('ordernelayan.barangkirim', $or->id)}}" style="background-color: #128FE2; color: white;">Barang Dikirim</a>
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
                                                            <td style="line-height: 8rem;text-align: center">@currency($ts->produk->harga * $ts->jumlah)</td>
                                                            
                                                        </tr>
                                                        @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                        <hr>
                                        <h4 class="text-end"><a href="" style="font-size: 22px;">Total Pesanan : @currency($or->total)</a></h4>
                                        <div class="d-flex justify-content-end mt-4 ">
                                            @if ($or->status == 'On Prosess' || $or->status == 'Sudah Upload Bukti Pembayaran')
                                                <a class="btn btn-lg btn-block" href="{{ route('transaksinelayan.index') }}" style="background-color: #128FE2; color: white;">Cek Pembayaran</a>
                                            @elseif($or->status == 'Barang Dikemas')
                                                <a class="btn" href="{{route('ordernelayan.cetakpesanan', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Pesanan</a>
                                                <a class="btn" href="{{route('ordernelayan.barangkirim', $or->id)}}" style="background-color: #128FE2; color: white;">Barang Dikirim</a>
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
                                                            <td style="line-height: 8rem;text-align: center">@currency($ts->produk->harga * $ts->jumlah)</td>
                                                            
                                                        </tr>
                                                        @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                        <hr>
                                        <h4 class="text-end"><a href="" style="font-size: 22px;">Total Pesanan : @currency($or->total)</a></h4>
                                        <div class="d-flex justify-content-end mt-4 ">
                                            @if ($or->status == 'On Prosess' || $or->status == 'Sudah Upload Bukti Pembayaran')
                                                <a class="btn btn-lg btn-block" href="{{ route('transaksinelayan.index') }}" style="background-color: #128FE2; color: white;">Cek Pembayaran</a>
                                            @elseif($or->status == 'Barang Dikemas')
                                                <a class="btn" href="{{route('ordernelayan.cetakpesanan', $or->no_order)}}" style="background-color: #128FE2; color: white;">Cetak Pesanan</a>
                                                <a class="btn" href="{{route('ordernelayan.barangkirim', $or->id)}}" style="background-color: #128FE2; color: white;">Barang Dikirim</a>
                                            @endif
                                        </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

              </div>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">Data Nelayan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                      <div id="page" class="p-2"></div>
                    </div>
                  </div>
                </div>
              </div>

      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script>

        // Untuk modal halaman create
        function create() {
            $.get("{{ url('admin/datanelayan/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Add Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');

            });
        }

        // Untuk modal halaman update
        function show(id) {
            $.get("{{ url('admin/datanelayan/show') }}/"+ id, {}, function(data, status) {
                $("#exampleModalLabel").html('Ubah Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

    </script>
  

@endsection