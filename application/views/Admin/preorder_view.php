<div class="main-content">
	<div class="container-fluid">
		<h3 class="page-title">Data Pre Order</h3>
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

						
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Barang</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Nomor Telepon</th>
									<th>Jumlah</th>
									<th>Tamggal Kirim</th>
									<th>Status</th>
									<th>Aksi</th>
									
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								foreach ($preorder as $b) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$b->namabarang.'</td>
											<td>'.$b->nama.'</td>
											<td>'.$b->alamat.'</td>
											<td>'.$b->telepon.'</td>
											<td>'.$b->jumlah.'</td>
											<td>'.$b->kirim.'</td>
											<td>'.$b->status.'</td>
											<td>
												<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_kategori" onclick="prepare_ubah_kategori('.$b->id_preeorder.')">Konfirmasi</a>
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


<div id="modal_ubah_kategori" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Status Pre Order</h4>
      </div>
      <form action="<?php echo base_url('index.php/Preorder_admin/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="ubah_id" id="ubah_id">
	        	<br>
	        	<input  class="form-control" type="hidden" name="ubah_status" id="ubah_status">

	        	<select name="ubah_status" class="form-control" id="ubah_status">
				  <option value="Pending">Pending</option>
				  <option value="Setuju">Setuju</option>
				  <option value="Kirim">Kirim</option>
				  <option value="Selesai">Selesai</option>
				</select>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
	
	function prepare_ubah_kategori(id)
	{
		$("#ubah_id").empty();
		$("#ubah_status").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/Preorder_admin/get_data_preorder_by_id/' + id,  function(data){
			$("#ubah_id").val(data.id_preeorder);
			$("#ubah_status").val(data.status);
		});
	}

	
</script>
