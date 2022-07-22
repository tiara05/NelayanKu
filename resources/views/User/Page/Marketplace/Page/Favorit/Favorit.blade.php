@extends('User.Page.Marketplace.Master')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Produk Favorit</h2>
          <ol>
            <li><a href="">Marketplace</a></li>
            <li>Produk Favorit</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="about pb-0">
      <div class="container" data-aos="fade-up">
        <div class="table-responsive text-nowrap">
        @if($favorit->isEmpty())
          <tr colspan="5" >
            <th class="text-center"><center><h4 class="mt-4">Maaf... Belum Ada Produk di Favorit...</h4></center></th>
          <tr>
        @else
          <table class="table table-borderless text-nowrap text-center">
              <thead>
                <tr class="border-bottom ">
                  <th scope="col"><center>No</center></th>
                  <th scope="col"><center>Gambar Produk</center></th>
                  <th scope="col"><center>Nama Produk</center></th>
                  <th scope="col"><center>Harga</center></th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0 ">
                <?php
                      $no = 0;
                ?>
                
                @foreach($favorit as $or)
                <?php
                      $no += 1;
                ?>
                @if($or->produk->status == 'Diarsipkan')
                @else
                  <tr class="align-middle">
                    <th>{{$no}}</th>
                    <td><img src="{{ asset('dataproduk/' . $or->produk->foto_produk) }}" class="img-fluid mx-auto d-block" style="height: 8rem; padding-right: 0;"/></td>
                    <td>{{$or->produk->nama_produk}}</td>
                    <td>@currency($or->produk->harga) / kg</td>
                    <td>
                      <a class="btn btn-danger" href="{{route('favorit.delete', $or->id)}}" onclick="return confirm('Are you sure?')" style="font-color:white;"><i class="fa fa-times me-2" aria-hidden="true"></i> Hapus</a>
                    </td>
                  </tr>
                @endif
                @endforeach
                
              </tbody>
              {!! $favorit->links() !!}
          </table>
          @endif
        </div>
      </div>
    </section>


@endsection