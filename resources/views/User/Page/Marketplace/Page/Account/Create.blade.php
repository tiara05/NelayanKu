                    <form class="form form-horizontal" action="{{route('account.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
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

                        <button class="btn btn-primary" type="submit" style="float: right">Save</button>
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