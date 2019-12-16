<!-- Begin Page Content -->
<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>

<div class="container-fluid">
	<!-- table -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Obat</h6>
		</div><br>
		<div class="col-sm-4 justify-content-end"><a href="<?= base_url('data_obat/tambah_data_obat'); ?>" class="btn btn-sm btn-primary ml-2"><i class="fas fa-plus fa-sm"></i> Tambah Data Obat</a></div>
		<div class="card-body">
			<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>Kode Obat</th>
							<th>Nama Obat</th>
							<th>Jenis Obat</th>
							<th>Dosis Aturan Obat</th>
							<th>Satuan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data_obat as $key) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $key->kode_obat; ?></td>
								<td><?= $key->nama_obat; ?></td>
								<td><?= $key->jenis_obat; ?></td>
								<td><?= $key->dosis_aturan_obat; ?></td>
								<td><?= $key->satuan; ?></td>
								<td>
									<a href="<?= site_url('data_obat/edit/' . $key->kode_obat); ?>" class="badge badge-success">ubah</a>
									<a onclick="return confirm('Hapus Data?');" href="<?= site_url('data_obat/hapus/' . $key->kode_obat); ?>" class="badge badge-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
<?php
$this->load->view('templates/footer');
?>
<!-- End of Main Content -->
