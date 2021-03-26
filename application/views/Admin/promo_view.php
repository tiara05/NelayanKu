<div class="main-content">
	<div class="container-fluid">
		<h3 class="page-title">Data Promo Marketplace</h3>
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

						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_kategori">Tambah Promo</button><br>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Promo</th>
									<th>Detail Promo</th>
									<th>Tanggal Mulai</th>
									<th>Tanggal Selesai</th>
									<th>Aksi</th>
									
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								foreach ($kategori as $b) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$b->namapromo.'</td>
											<td>'.$b->detailpromo.'</td>
											<td>'.$b->tanggal_mulai.'</td>
											<td>'.$b->tanggal_selesai.'</td>
											<td>
												<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_kategori" onclick="prepare_ubah_kategori('.$b->id_promo.')">Ubah</a>
												<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_kategori" onclick="prepare_hapus_kategori('.$b->id_promo.')">Hapus</a>
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
<div id="modal_tambah_kategori" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Promo</h4>
      </div>
      <form action="<?php echo base_url('index.php/Promo_admin/tambah'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="text" class="form-control" placeholder="Nama" name="namapromo">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Detail Promo" name="detailpromo">
	        	<br>
	        	<input type="date" class="form-control" placeholder="Tanggal Mulai" name="tanggal_mulai">
	        	<br>
	        	<input type="date" class="form-control" placeholder="Tanggal Selesai" name="tanggal_selesai">
	        	<br>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<div id="modal_ubah_kategori" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Promo</h4>
      </div>
      <form action="<?php echo base_url('index.php/Promo_admin/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="ubah_id" id="ubah_id">
	        	<input type="text" class="form-control" placeholder="Nama" name="ubah_namapromo" id="ubah_namapromo">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Detail Promo" name="ubah_detailpromo" id="ubah_detailpromo">
	        	<br>
	        	<input type="date" class="form-control" placeholder="Tanggal Mulai" name="ubah_tanggal_mulai" id="ubah_tanggal_mulai">
	        	<br>
	        	<input type="date" class="form-control" placeholder="Tanggal Selesai" name="ubah_tanggal_selesai" id="ubah_tanggal_selesai">
	        	<br>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_hapus_kategori" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus Promo</h4>
      </div>
      <form action="<?php echo base_url('index.php/Promo_admin/hapus'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="hidden" name="hapus_id"  id="hapus_id">
	        	<p>Apakah anda yakin menghapus Promo <b><span id="hapus_nama"></span></b> ?</p>
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
	
	function prepare_ubah_kategori(id)
	{
		$("#ubah_id").empty();
		$("#ubah_namapromo").empty();
		$("#ubah_detailpromo").empty();
		$("#ubah_tanggal_mulai").empty();
		$("#ubah_tanggal_selesai").empty();


		$.getJSON('<?php echo base_url(); ?>index.php/Promo_admin/get_data_promo_by_id/' + id,  function(data){
			$("#ubah_id").val(data.id_promo);
			$("#ubah_namapromo").val(data.namapromo);
			$("#ubah_detailpromo").val(data.detailpromo);
			$("#ubah_tanggal_mulai").val(data.tanggal_mulai);
			$("#ubah_tanggal_selesai").val(data.tanggal_selesai);

		});
	}

	function prepare_hapus_kategori(id)
	{
		$("#hapus_id").empty();
		$("#hapus_nama").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/Promo_admin/get_data_promo_by_id/' + id,  function(data){
			$("#hapus_id").val(data.id_promo);
			$("#hapus_nama").text(data.namapromo);
		});
	}
</script>
