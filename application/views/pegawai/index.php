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
			<h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
		</div><br>
		<div class="col-sm-4 justify-content-end"><a href="<?= base_url('pegawai/tambah_pegawai'); ?>" class="btn btn-sm btn-primary ml-2"><i class="fas fa-plus fa-sm"></i> Tambah Data Pegawai</a></div>
		<div class="card-body">
			<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>ID Pegawai</th>
							<th>Nama Pegawai</th>
							<th>Jenis Kelamin</th>
							<th>NPWP</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>Jabatan</th>
							<th>Bidang</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($pegawai as $key) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $key->id_pegawai; ?></td>
								<td><?= $key->nama_pegawai; ?></td>
								<td><?= $key->jenis_kelamin; ?></td>
								<td><?= $key->npwp; ?></td>
								<td><?= $key->tempat_lahir; ?></td>
								<td><?= $key->tanggal_lahir; ?></td>
								<td><?= $key->jabatan; ?></td>
								<td><?= $key->bidang; ?></td>
								<td>
									<a href="<?= site_url('pegawai/edit/' . $key->id_pegawai); ?>" class="badge badge-success">Ubah</a>
									<a onclick="return confirm('Hapus Data?');" href="<?= site_url('pegawai/hapus/' . $key->id_pegawai); ?>" class="badge badge-danger">Hapus</a>
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
