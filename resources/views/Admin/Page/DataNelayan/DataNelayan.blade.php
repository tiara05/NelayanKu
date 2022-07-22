@extends('Admin.Master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
            <div class="card">
                <h5 class="card-header">Data Nelayan</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-secondary alert-block mt-2 ms-4 mx-4 mb-4">   
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
                <button type="button" class="btn btn-primary ms-4 mx-4 mb-4" onClick="create()"><i class="bx bx-add me-1"></i>Pendaftaran Nelayan</button>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Nelayan</th>
                        <th>Alamat Nelayan</th>
                        <th>Foto Nelayan</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                        $no = 0;
                      ?>
                        @foreach($nelayan as $pr)
                      <?php
                        $no += 1;
                      ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{$no}}</td>
                        <td>{{$pr->name}}</td>
                        <td>
                          {{$pr->alamat}}
                        </td>
                        <td><img src="{{ asset('datanelayan/' . $pr->foto) }}" alt="foto" class="img-fluid" style="height: 3rem;"></td>
                        <td>
                        @if($pr->status == 'Non Aktif')
                          <a href="{{route('datanelayan.update', $pr->id)}}" class="btn btn-info" ><i class="fa fa-power-off"  aria-hidden="true" style="margin-right: 5px"></i>Aktif</a>
                        @endif  
                        <button type="button" class="btn btn-warning" onClick="show({{ $pr->id }})">
                        <i class="bx bx-edit-alt me-2"></i>Show Detail
                        </button>
                        <a href="{{route('datanelayan.delete', $pr->id)}}" type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                        <i class="bx bx-trash me-2"></i>Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    {!! $nelayan->links() !!}
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