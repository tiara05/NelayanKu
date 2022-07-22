@extends('User.Page.Marketplace.Master')

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<style>

    .file-upload{
        display: inline-block;
        padding: 0 12px;
        width: 180px;
        height: 40px;
        line-height: 40px;
        color: white;
        background-color: #128FE2;
        cursor: pointer;
        border-radius: 10px;
        position: relative;
        overflow: hidden;
    }
    .file-upload input[type="file"]{
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Account</h2>
          <ol>
            <li><a href="">Marketplace</a></li>
            <li>Account</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

            <!-- Content -->
    <section class="about p-3">
        <div class="container" data-aos="fade-up">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <h4 class="">Profile Details</h4>
                    <form action="{{route('account.update')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Account -->
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center">
                            <div class="card-body ">
                                <div class="align-items-center align-items-sm-center gap-4">
                                    <img
                                    src="{{ asset('datauser/' . $account->foto) }}"
                                    alt="user-avatar"
                                    class="d-block rounded"
                                    height="150"
                                    width="150"
                                    id="uploadedAvatar"
                                    />
                                    <div class="file-upload text-center" style="margin-top: 30px">
                                        <input type="file" value="{{old('foto')}}" name="foto"> Choose File
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                
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
                                            value="{{($account->telepon)}}"
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
                                    <button type="submit" class="btn me-2" style="background-color: #128FE2; color:white">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /Account -->
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- / Content -->
        </div>
    </section>

            
@endsection