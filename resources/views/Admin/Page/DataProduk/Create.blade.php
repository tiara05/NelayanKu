                    <form class="form form-horizontal mb-4" action="{{ route('dataproduk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Nama Produk</label>
                          <input type="text" id="namaproduk" name="namaproduk" class="form-control" placeholder="Enter Name" required />
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Stok Produk</label>
                          <div class="input-group">
                            <input type="number" id="stokproduk" name="stokproduk" class="form-control" placeholder="14 " required>
                            <span class="input-group-text">Kg</span>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Harga Produk</label>
                          <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" id="hargaproduk" name="hargaproduk" class="form-control" placeholder="14000 " required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Kategori Produk</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">== Select Kategori ==</option>
                                @foreach ($kategori as $id )
                                    <option value="{{$id->id}}">{{$id->nama_kategori}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Nama Nelayan</label>
                            <select name="nelayan" id="nelayan" class="form-control">
                                <option value="">== Select Nelayan ==</option>
                                @foreach ($nelayan as $id )
                                    <option value="{{$id->id}}">{{$id->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Detail Produk</label>
                          <textarea class="form-control" rows="3" id="detailproduk" name="detailproduk"></textarea>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Foto Produk</label>
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

                        <button class="btn btn-primary" type="submit" style="float: right">Save</button>
                    </form>