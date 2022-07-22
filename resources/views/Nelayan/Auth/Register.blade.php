<html
  lang="en"
  class="light-style customizer-hide"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Register - Admin | NelayanKu</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../favicon.png" />

    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assetsadmin/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assetsadmin/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assetsadmin/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assetsadmin/css/demo.css" />
 
    <link rel="stylesheet" href="../assetsadmin/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assetsadmin/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assetsadmin/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl mb-2">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-body fw-bolder">nelayanku</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Welcome to NelayanKu! 👋</h4><br>

              <form class="form form-horizontal mb-4" action="{{ route('proses_registernelayan') }}" method="POST" enctype="multipart/form-data">
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
                        <div class="mb-3 form-password-toggle">
                          <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password<span> (min. 8 Karaketer)</span></label>
                          </div>
                          <div class="input-group input-group-merge">
                            <input
                              type="password"
                              id="password"
                              name="password"
                              class="form-control"
                              pattern=".{8,}"
                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                              aria-describedby="password"
                            />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">No Telepon</label>
                          <div class="input-group">
                            <input type="number" id="telepon" name="telepon" class="form-control" placeholder="Enter Telepon" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Alamat Domisili</label>
                          <div class="input-group">
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Enter Address" required>
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

                        <div class="mt-2">
                          <button class="btn btn-primary d-grid w-100" type="submit" onclick="return confirm('Harap Tunggu 1 x 24 Jam Untuk Verfikasi Data Oleh Admin')">Sign Up</button>
                        </div>
                    </form>

                    <p class="text-center">
                      <span>Sudah Memiliki Akun?</span>
                      <a href="{{ route('loginnelayan') }}">
                        <span>Langsung Login Aja</span>
                      </a>
                    </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->

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
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assetsadmin/vendor/js/bootstrap.js"></script>
    <script src="../assetsadmin/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assetsadmin/js/main.js"></script>

  </body>
</html>
