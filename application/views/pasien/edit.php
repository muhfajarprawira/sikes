<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="clearfix">
		<h5 class="h3 mb-4 text-gray-800 float-left">Ubah Data Pasien</h5>
		<a href="<?= base_url('pasien'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>
	<hr>
	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<form action="<?= base_url('pasien/aksi_edit'); ?>" method="post">
				<div class="form-group">
					<label for="text">No Rekam Medis</label>
					<input type="text" name="no_rekamedis" value="<?php echo $pasien->no_rekamedis ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">No Ktp</label>
					<input type="text" name="no_ktp" value="<?php echo $pasien->no_ktp ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">No Bpjs</label>
					<input type="text" name="no_bpjs" value="<?php echo $pasien->no_bpjs ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Nama Pasien</label>
					<input type="text" name="nama_pasien" value="<?php echo $pasien->nama_pasien ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control">
						<option><?= $pasien->jenis_kelamin; ?></option>
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
				</div>

				<div class="form-group">
					<label for="text">Tempat Lahir</label>
					<input type="text" name="tempat_lahir" value="<?php echo $pasien->tempat_lahir ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Tanggal Lahir</label>
					<input type="date" name="tanggal_lahir" value="<?php echo $pasien->tanggal_lahir ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Alamat</label>
					<input type="text" name="alamat" value="<?php echo $pasien->alamat ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Status Pasien</label>
					<select name="status_pasien" class="form-control">
						<option><?= $pasien->status_pasien; ?></option>
						<option>UMUM</option>
						<option>BPJS</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary btn-sm" name="simpan"><i class="fas fa-save"></i> Simpan</button>
				<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</button>
		</div>
	</div>
</div>
</div>
<?php
$this->load->view('templates/footer');
?>
