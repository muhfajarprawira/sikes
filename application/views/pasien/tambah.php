<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="clearfix">
		<h5 class="h3 mb-4 text-gray-800 float-left">Tambah Data Pasien</h5>
		<a href="<?= base_url('pasien'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>
	<hr>
	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<form action="<?= base_url('pasien/tambah_data_action'); ?>" method="post">
				<?php if ($this->session->flashdata('message')) : ?>
					<div class="alert alert-danger"><?php echo $this->session->flashdata('message'); ?></div>
				<?php endif ?>
				<div class="form-group">
					<label for="text">No Rekam Medis</label>
					<input type="text" name="no_rekamedis" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">No Ktp</label>
					<input type="text" name="no_ktp" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">No Bpjs</label>
					<input type="text" name="no_bpjs" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Nama Pasien</label>
					<input type="text" name="nama_pasien" class="form-control">
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control">
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
					<br>
					<div class="form-group">
						<label for="text">Tempat Lahir</label>
						<input type="text" name="tempat_lahir" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Tanggal Lahir</label>
						<input type="date" name="tanggal_lahir" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Alamat</label>
						<input type="text" name="alamat" class="form-control">
					</div>

					<div class="form-group">
						<label>Status Pasien</label>
						<select name="status_pasien" class="form-control">
							<option>-- Pilih --</option>
							<option>UMUM</option>
							<option>BPJS</option>
						</select>
						<br>
						<button type="submit" class="btn btn-primary btn-sm" name="simpan"><i class="fas fa-save"></i> Simpan</button>
						<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</button>

					</div>
				</div>
		</div>
	</div>
	<?php
	$this->load->view('templates/footer');
	?>
