<div class="main-content">
	<div class="container-fluid">
		<h3 class="page-title">Data Barang Jualan</h3>
		<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
		?>
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">

						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_buku">Tambah Barang</button>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Barang</th>
									<th>Foto</th>
									<th>Stok</th>
									<th>Kategori</th>
									<th>Nama Nelayan/UMKM</th>
									<th>Harga</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								foreach ($buku as $b) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$b->namabarang.'</td>
											<td><img src="'.base_url().'assets/Admin/fotoikan/'.$b->fotoikan.'" width="100px" height="70px" /></td>
											<td>'.$b->stok.'</td>
											<td>'.$b->namakategori.'</td>
											<td>'.$b->namanelayan.'</td>
											<td>Rp '.$b->harga.',-</td>
											<td>
												<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_buku" onclick="prepare_ubah_buku('.$b->id_barang.')">Ubah</a>
												
											</td>
										</tr>
									';
									$no++;
								}
							?>
								
							</tbody>
						</table>

					</div>
				</div>
				<!-- END TABLE STRIPED -->
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="modal_tambah_buku" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Barang</h4>
      </div>
      <form action="<?php echo base_url('index.php/Barang_admin/tambah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	      		<input type="text" class="form-control" placeholder="Nama barang" name="nama_barang">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Stok" name="stok">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Harga" name="harga">
	        	<br>
	        	<select name="kategori" class="form-control">
					<?php
						foreach ($kategori as $k) {
							echo '
								<option value="'.$k->id_kategori.'">'.$k->namakategori.'</option>
							';
						}
					?>	        		
	        	</select>
	        	<br>
	        	<select name="nelayan" class="form-control">
					<?php
						foreach ($nelayan as $n) {
							echo '
								<option value="'.$n->id_nelayan.'">'.$n->namanelayan.'</option>
							';
						}
					?>	        		
	        	</select>
	        	<br>
	        	<input type="text" class="form-control" placeholder="Foto" name="fotoikan">

	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<div id="modal_ubah_buku" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Buku</h4>
      </div>
      <form action="<?php echo base_url('index.php/Barang_admin/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	      		<input type="hidden" class="form-control"  name="ubah_id" id="ubah_id">
	        	<input type="text" class="form-control" placeholder="Nama barang" name="ubah_nama_barang" id="ubah_nama_barang">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Stok" name="ubah_stok" id="ubah_stok">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Harga" name="ubah_harga" id="ubah_harga">
	        	<br>
	        	<select name="ubah_kategori" class="form-control" id="ubah_kategori">
					<?php
						foreach ($kategori as $k) {
							echo '
								<option value="'.$k->id_kategori.'">'.$k->namakategori.'</option>
							';
						}
					?>	        		
	        	</select>
	        	<br>
	        	<select name="ubah_nelayan" class="form-control" id="ubah_nelayan">
					<?php
						foreach ($nelayan as $n) {
							echo '
								<option value="'.$n->id_nelayan.'">'.$n->namanelayan.'</option>
							';
						}
					?>	        		
	        	</select>
	        	<br>
	        	<div id="data_foto"></div>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_hapus_buku" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus Buku</h4>
      </div>
      <form action="<?php echo base_url('index.php/Barang_admin/hapus'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="hidden" name="hapus_id_barang"  id="hapus_id_barang">
	        	<p>Apakah anda yakin menghapus barang <b><span id="hapus_nama"></span></b> ?</p>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<script type="text/javascript">
	
	function prepare_ubah_buku(id)
	{
		$("#ubah_id").empty();
		$("#ubah_nama_barang").empty();
		$("#ubah_stok").empty();
		$("#ubah_harga").empty();	
		$("#ubah_kategori").val();
		$("#ubah_nelayan").val();
		$("#data_foto").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/Barang_admin/get_data_buku_by_id/' + id,  function(data){
			$("#ubah_id").val(data.id_barang);
			$("#ubah_nama_barang").val(data.namabarang);
			$("#ubah_stok").val(data.stok);
			$("#ubah_harga").val(data.harga);
			$("#ubah_kategori").val(data.id_kategori);
			$("#ubah_nelayan").val(data.id_nelayan);
			$("#data_foto").html('<img src="<?php echo base_url(); ?>assets/Admin/fotoikan/' + data.fotoikan + '" width="100px" >');
		});
	}

	function prepare_hapus_buku(id)
	{
		$("#hapus_id_barang").empty();
		$("#hapus_nama").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/Barang_admin/get_data_buku_by_id/' + id,  function(data){
			$("#hapus_id_barang").val(data.id_barang);
			$("#hapus_nama").text(data.namabarang);
		});
	}
</script>
