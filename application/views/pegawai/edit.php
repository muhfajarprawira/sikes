<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="clearfix">
		<h5 class="h3 mb-4 text-gray-800 float-left">Ubah Data Pegawai</h5>
		<a href="<?= base_url('pegawai'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>
	<hr>
	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<form action="<?= base_url('pegawai/aksi_edit'); ?>" method="post">
				<div class="form-group">
					<label for="text">NIP</label>
					<input type="text" name="id_pegawai" value="<?php echo $pegawai->id_pegawai ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Nama Pegawai</label>
					<input type="text" name="nama_pegawai" value="<?php echo $pegawai->nama_pegawai ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control">
						<option><?= $pegawai->jenis_kelamin; ?></option>
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
				</div>

				<div class="form-group">
					<label for="text">NPWP</label>
					<input type="text" name="npwp" value="<?php echo $pegawai->npwp ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Tempat Lahir</label>
					<input type="text" name="tempat_lahir" value="<?php echo $pegawai->tempat_lahir ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Tanggal Lahir</label>
					<input type="date" name="tanggal_lahir" value="<?php echo $pegawai->tanggal_lahir ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Jabatan</label>
					<input type="text" name="jabatan" value="<?php echo $pegawai->jabatan ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Bidang</label>
					<input type="text" name="bidang" value="<?php echo $pegawai->bidang ?>" class="form-control">
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
