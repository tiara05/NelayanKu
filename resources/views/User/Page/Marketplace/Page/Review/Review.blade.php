@extends('User.Page.Marketplace.Master')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center ">
          <h2>Review produk</h2>
          <ol>
            <li><a href="">Marketplace</a></li>
            <li>Revieww Produk</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="about p-3">
        <div class="container" data-aos="fade-up">
                <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                <h4>Review Produk</h4>

                <?php 
                    $count=1;
                ;?>
                @foreach($trans as $ts)
                <form class="form form-horizontal mt-4" action=" {{ route('review.create', $ts->produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_pembayaran" value="{{$order->id}}" id="id_pembayaran">
                    <input type="hidden" name="no_order" value="{{$ts->no_order}}" id="no_order">
                    <div class="row g-0" style="margin-bottom: 50px">
                        <div class="col-md-4  ">
                            <div class="img-wrapper" style="width: 80%">
                                <img
                                    src="{{ asset('dataproduk/' . $ts->produk->foto_produk) }}"
                                    alt="Sample photo"
                                    class="img-fluid "
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"
                                />
                            </div>
                        </div>
                        <div class="col-md-8">
                            
                            <h3><b>{{$ts->produk->nama_produk}}</b></h3>
                            <input type="hidden" name="produk[{{$count}}]" value="{{$ts->produk->id}}" id="produk">
                            
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Review Produk</label>
                                    <textarea class="form-control" id="review" name="review[{{$count}}]" rows="5" value="{{old('review')}}"></textarea>
                                </div>

                        </div>
                    </div>
                    <?php $count++; ?>
                    @endforeach
                    <div class="d-grid gap-2" style=" margin-top: 30px;margin-bottom:30px;">
                        <button  class="btn btn-outline-light" name="hapus" style="background-color: #128FE2; color: white">Submit Review</a>
                    </div>
                </form>
                </div>
        </div>
    </section>

@endsection