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
			<h6 class="m-0 font-weight-bold text-primary">Jadwal Praktek Dokter</h6>
		</div><br>
		<div class="col-sm-4 justify-content-end"><a href="<?= base_url('jadwal/tambah_jadwal'); ?>" class="btn btn-sm btn-primary ml-2"><i class="fas fa-plus fa-sm"></i> Tambah Jadwal</a></div>
		<div class="card-body">
			<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Dokter</th>
							<th>Hari</th>
							<th>Jam Mulai</th>
							<th>Jam Selesai</th>
							<th>Poli</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($jadwal as $key) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $key->nama_dokter; ?></td>
								<td><?= $key->hari; ?></td>
								<td><?= $key->jam_mulai; ?></td>
								<td><?= $key->jam_selesai; ?></td>
								<td><?= $key->poli; ?></td>
								<td>
									<a href="<?= site_url('jadwal/edit/' . $key->id_jadwal); ?>" class="badge badge-success">Ubah</a>
									<a onclick="return confirm('Hapus Data?');" href="<?= site_url('jadwal/hapus/' . $key->id_jadwal); ?>" class="badge badge-danger">Hapus</a>
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
