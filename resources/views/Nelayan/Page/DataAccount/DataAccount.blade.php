@extends('Nelayan.Master')

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

@section('content')
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="{{ asset('datanelayan/' . $account->foto) }}"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form action="{{route('accountnelayan.update')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="nama" class="form-label">Nama Nelayan</label>
                            <input
                              class="form-control"
                              type="text"
                              id="nama"
                              name="nama"
                              value="{{($account->name)}}"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="{{($account->email)}}"
                              placeholder="john.doe@example.com"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="nomor">Nomor Telepon</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">+62</span>
                              <input
                                type="text"
                                id="telepon"
                                name="telepon"
                                class="form-control"
                                placeholder="202 555 0111"
                                value="{{($account->nomortelepon)}}"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="alamat" class="form-label">Alamat Domisili</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{($account->alamat)}}" placeholder="Address" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{($account->provinsi)}}" readonly />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="kotakab" class="form-label">Kota/Kabupaten</label>
                            <input type="text" class="form-control" id="kota" name="kota" value="{{($account->kotakab)}}" readonly />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{($account->kecamatan)}}" readonly />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="desa" class="form-label">Desa</label>
                            <input type="text" class="form-control" id="desa" name="desa" value="{{($account->desa)}}" readonly />
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- / Content -->

            <script>
        function onChangeSelect(url, id, name) {
            // send ajax request to get the cities of the selected province and append to the select tag
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function (data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>==Pilih Salah Satu==</option>');

                    $.each(data, function (key, value) {
                        $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
        $(function () {
            $('#provinsi').on('change', function () {
                onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota');
            });
            $('#kota').on('change', function () {
                onChangeSelect('{{ route("districts") }}', $(this).val(), 'kecamatan');
            })
            $('#kecamatan').on('change', function () {
                onChangeSelect('{{ route("villages") }}', $(this).val(), 'desa');
            })
        });
      </script>
@endsection