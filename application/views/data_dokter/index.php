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
			<h6 class="m-0 font-weight-bold text-primary">Data Dokter</h6>
		</div><br>
		<div class="col-sm-4 justify-content-end"><a href="<?= base_url('data_dokter/tambah_data_dokter'); ?>" class="btn btn-sm btn-primary ml-2"><i class="fas fa-plus fa-sm"></i> Tambah Data Dokter</a></div>
		<div class="card-body">
			<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>Kode Dokter</th>
							<th>Nama Dokter</th>
							<th>Jenis Kelamin</th>
							<th>Nomor Induk Dokter</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>Alamat</th>
							<th>ID Poli</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data_dokter as $key) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $key->kode_dokter; ?></td>
								<td><?= $key->nama_dokter; ?></td>
								<td><?= $key->jenis_kelamin; ?></td>
								<td><?= $key->nomor_induk_dokter; ?></td>
								<td><?= $key->tempat_lahir; ?></td>
								<td><?= $key->tgl_lahir; ?></td>
								<td><?= $key->alamat; ?></td>
								<td><?= $key->id_poli; ?></td>
								<td>
									<a href="<?= site_url('data_dokter/edit/' . $key->kode_dokter); ?>" class="badge badge-success">Ubah</a>
									<a onclick="return confirm('Hapus Data?');" href="<?= site_url('data_dokter/hapus/' . $key->kode_dokter); ?>" class="badge badge-danger">Hapus</a>
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
