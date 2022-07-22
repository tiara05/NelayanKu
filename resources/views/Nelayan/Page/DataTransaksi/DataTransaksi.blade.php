@extends('Nelayan.Master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
        .mainwrapper {
            background: #fefefe;
            display: flex;
            width: 100%;
            height: 650px;
            justify-content: center;
            align-items: center;
        }

        img.imgthumb {
            width: 150px;
            border-radius: 10px;
        }

        /* overlay by webprogramminunpas and modified by nelayankode.com*/
        .overlay {
            width: 0;
            height: 0;
            overflow: hidden;
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0);
            z-index: 9999;
            transition: .8s;
            text-align: center;
            padding: 150px 0;
        }

        .overlay:target {
            width: auto;
            height: auto;
            bottom: 0;
            right: 0;
            background: rgba(0, 0, 0, .7);
        }

        .overlay img {
            max-height: 100%;
            box-shadow: 2px 2px 7px rgba(0, 0, 0, .5);
        }

        .overlay:target img {
            animation: zoomDanFade 1s;
        }

        .overlay .close {
            position: absolute;
            top: 2%;
            right: 2%;
            margin-left: -20px;
            color: white;
            text-decoration: none;
            line-height: 14px;
            padding: 5px;
            opacity: 0;
        }

        .overlay:target .close {
            animation: slideDownFade .5s .5s forwards;
        }

        /* animasi */
        @keyframes zoomDanFade {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes slideDownFade {
            0% {
                opacity: 0;
                margin-top: -20px;
            }

            100% {
                opacity: 1;
                margin-top: 0;
            }
        }
</style>
@section('content')
            <div class="card">
                <h5 class="card-header">Data Transaksi Customer</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-secondary alert-block mt-2 ms-4 mx-4 mb-4">   
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nomor Order</th>
                        <th>Nama Customer</th>
                        <th>Bukti Pembayaran</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                        $no = 0;
                      ?>
                        @foreach($trans as $pr)
                      <?php
                        $no += 1;
                      ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{$no}}</td>
                        <td>{{$pr->no_order}}</td>
                        <td>
                          {{$pr->user->name}}
                        </td>
                        <td><a href="#gambar-1"><img src="{{ asset('buktipembayaran/' . $pr->buktibayar) }}" alt="foto" class="img-fluid" style="height: 5rem;"></a></td>
                        @if($pr->status == 'Sudah Upload Bukti Pembayaran')
                        <td>
                          <a href="{{route('transaksinelayan.aprovepem', $pr->id)}}" type="button" class="btn btn-warning" style="color:white">
                          <i class="fa fa-check-circle-o me-2" aria-hidden="true"></i>Pembayaran Oke</a>
                          
                        </td>
                        @endif
                      </tr>
                      <div class="overlay" id="gambar-1">
                          <a href="#" class="close">
                              <svg style="width:47px;height:47px" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                              </svg>
                          </a>
                          <img src="{{ asset('buktipembayaran/' . $pr->buktibayar) }}" alt="Nelayan Kode">
                      </div>
                      @endforeach
                    </tbody>
                  </table>
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