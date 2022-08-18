@extends('Nelayan.Master')

@section('content')
            <div class="card">
                <h5 class="card-header">Data Produk</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-secondary alert-block mt-2 ms-4 mx-4 mb-4">   
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <button type="button" class="btn btn-primary ms-4 mx-4 mb-4" onClick="create()"><i class="bx bx-add me-1"></i>Add Produk</button>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga /kg</th>
                        <th>Harga Langsung</th>
                        <th>Harga Dibersihkan</th>
                        <th>Harga Fillet</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                        $no = 0;
                      ?>
                        @foreach($produk as $pr)
                      <?php
                        $no += 1;
                      ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{$no}}</td>
                        <td>{{$pr->nama_produk}}</td>
                        <td>
                        {{$pr->stok_produk}}
                        </td>
                        <td>@currency($pr->harga)</td>
                        <td>@currency($pr->hargalangsung)</td>
                        <td>@currency($pr->hargabersih)</td>
                        <td>@currency($pr->hargafillet)</td>
                        <td>
                        <button type="button" class="btn btn-warning" onClick="show({{ $pr->id }})">
                        <i class="bx bx-edit-alt me-2"></i>Ubah
                        </button>
                        <a href="{{route('produknelayan.delete', $pr->id)}}" type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                        <i class="bx bx-trash me-2"></i>Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    {!! $produk->links() !!}
                  </table>
                </div>
              </div>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">Data Produk</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div id="page" class="p-2"></div>
                    </div>
                  </div>
                </div>
              </div>

      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script>

        // Untuk modal halaman create
        function create() {
            $.get("{{ url('nelayan/produknelayan/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Add Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');

            });
        }

        // Untuk modal halaman update
        function show(id) {
            $.get("{{ url('nelayan/produknelayan/show') }}/"+ id, {}, function(data, status) {
                $("#exampleModalLabel").html('Ubah Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');

            });
        }

    </script>
  

@endsection