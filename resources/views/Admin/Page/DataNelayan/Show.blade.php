
    <div class="row g-0">
      <div class="col-md-4">
        <img class="card-img-top" src="{{ asset('datanelayan/' . $nelayan->foto) }}" alt="Card image cap" style="height: 15rem;" />
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h4 class="card-title">{{$nelayan->name}}</h4>
          <div class="row">
            <div class="col-lg-4">
                <p>No Telepon</p>
            </div>
            <div class="col-lg-8">
              <p>: {{$nelayan->nomortelepon}} </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
                <p>Alamat Domisili</p>
            </div>
            <div class="col-lg-8">
              <p>: {{$nelayan->alamat}} </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
                <p>Provinsi</p>
            </div>
            <div class="col-lg-8">
              <p>: {{$nelayan->provinsi}} </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
                <p>Kota/Kabupaten</p>
            </div>
            <div class="col-lg-8">
              <p>: {{$nelayan->kotakab}} </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
                <p>Kecamatan</p>
            </div>
            <div class="col-lg-8">
              <p>: {{$nelayan->kecamatan}} </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
                <p>Desa</p>
            </div>
            <div class="col-lg-8">
              <p>: {{$nelayan->desa}} </p>
            </div>
          </div>
        </div>
      </div>
   </div>
                