@extends('User.Page.Marketplace.Master')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Produk preorder</h2>
          <ol>
            <li><a href="">Marketplace</a></li>
            <li>Produk preorder</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="about pb-0">
      <div class="container" data-aos="fade-up">
        <div class="table-responsive text-nowrap">
        @if($preorder->isEmpty())
          <tr colspan="5" >
            <th class="text-center"><center><h4 class="mt-4">Maaf... Belum Ada Produk di preorder...</h4></center></th>
          <tr>
        @else
          <table class="table table-borderless text-nowrap text-center">
              <thead>
                <tr class="border-bottom ">
                  <th scope="col"><center>No</center></th>
                  <th scope="col"><center>Gambar Produk</center></th>
                  <th scope="col"><center>Nama Produk</center></th>
                  <th scope="col"><center>Jumlah Order</center></th>
                  <th scope="col"><center>Tanggal Pengiriman</center></th>
                  <th scope="col"><center>Harga</center></th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0 ">
                <?php
                      $no = 0;
                ?>

                @foreach($preorder as $or)
                <?php
                      $no += 1;
                ?>
                @if($or->produk->status == 'Diarsipkan')
                @else
                  <tr class="align-middle">
                    <th>{{$no}}</th>
                    <td><img src="{{ asset('dataproduk/' . $or->produk->foto_produk) }}" class="img-fluid mx-auto d-block" style="height: 8rem; padding-right: 0;"/></td>
                    <td>{{$or->produk->nama_produk}}</td>
                    <td>@currency($or->produk->harga) / Kg</td>
                    <td>{{$or->jumlah}} Kg</td>
                    <td>{{$or->tanggalpesan}}</td>
                  </tr>
                @endif
                @endforeach
                
              </tbody>
              {!! $preorder->links() !!}
          </table>
          @endif
        </div>
      </div>
    </section>


@endsection