                    <form class="form form-horizontal" action="{{route('preorder.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="idproduk" name="idproduk" class="form-control" value="{{$produk->id}}" required  />
                        <input type="hidden" id="idnelayan" name="idnelayan" class="form-control" value="{{$produk->id_nelayan}}" required  />

                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Jumlah</label>
                          <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Mau Berapa Jumlahnya" required />
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Tanggal Pesanan</label>
                          <input type="date" id="tanggalpesan" name="tanggalpesan" class="form-control" placeholder="Pesan Untuk Tanggal Berapa" required />
                        </div>

                        <button class="btn btn-primary" type="submit" style="float: right">Save</button>
                    </form>