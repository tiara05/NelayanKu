                    <form class="form form-horizontal mb-4" action="{{ route('datanelayan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Nama Nelayan</label>
                          <input type="text" id="nama" name="nama" class="form-control" placeholder="Enter Name" required />
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Email</label>
                          <div class="input-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Username</label>
                          <div class="input-group">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Password</label>
                          <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password " required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">No Telepon</label>
                          <div class="input-group">
                            <input type="number" id="telepon" name="telepon" class="form-control" placeholder="Enter Telepon" required>
                          </div>
                        </div>
                        <div class="row g-2 mb-2">
                          <div class="col mb-0">
                            <label for="emailLarge" class="form-label">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="">== Select Province ==</option>
                                @foreach ($provinces as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col mb-0">
                            <label for="dobLarge" class="form-label">Kota/Kabupaten</label>
                            <select name="kota" id="kota" class="form-control">
                                <option value="">== Select City ==</option>
                            </select>
                          </div>
                        </div>
                        <div class="row g-2 mb-2">
                          <div class="col mb-0">
                            <label for="emailLarge" class="form-label">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="">== Select District ==</option>
                            </select>
                          </div>
                          <div class="col mb-0">
                            <label for="dobLarge" class="form-label">Desa</label>
                            <select name="desa" id="desa" class="form-control">
                                <option value="">== Select Village ==</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Alamat Domisili</label>
                          <div class="input-group">
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Enter Address" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Foto Nelayan</label>
                          <div class="input-group">
                          <label for="upload" class="btn btn-primary me-2 mb-2" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload" name="foto"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          </div>
                        </div>

                        <button class="btn btn-primary " type="submit" style="float: right;">Save</button>
                    </form>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
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