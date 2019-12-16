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
			<h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
		</div><br>
		<div class="col-sm-4 justify-content-end"><a href="<?= base_url('pasien/tambah_pasien'); ?>" class="btn btn-sm btn-primary ml-2"><i class="fas fa-plus fa-sm"></i> Tambah Data Pasien</a></div>
		<div class="card-body">
			<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>No Rekam Medis</th>
							<th>No Ktp</th>
							<th>No Bpjs</th>
							<th>Nama Pasien</th>
							<th>Jenis Kelamin</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>Alamat</th>
							<th>Status Pasien</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($pasien as $key) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $key->no_rekamedis; ?></td>
								<td><?= $key->no_ktp; ?></td>
								<td><?= $key->no_bpjs; ?></td>
								<td><?= $key->nama_pasien; ?></td>
								<td><?= $key->jenis_kelamin; ?></td>
								<td><?= $key->tempat_lahir; ?></td>
								<td><?= $key->tanggal_lahir; ?></td>
								<td><?= $key->alamat; ?></td>
								<td><?= $key->status_pasien; ?></td>
								<td>
									<a href="<?= site_url('pasien/edit/' . $key->no_rekamedis); ?>" class="badge badge-success">Ubah</a>
									<a onclick="return confirm('Hapus Data?');" href="<?= site_url('pasien/hapus/' . $key->no_rekamedis); ?>" class="badge badge-danger">Hapus</a>
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
