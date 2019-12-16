<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="clearfix">
		<h5 class="h3 mb-4 text-gray-800 float-left">Tambah Jadwal</h5>
		<a href="<?= base_url('jadwal'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>
	<hr>
	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<form action="<?= base_url('jadwal/tambah_data_action'); ?>" method="post">
				<?php if ($this->session->flashdata('message')) : ?>
					<div class="alert alert-danger"><?php echo $this->session->flashdata('message'); ?></div>
				<?php endif ?>

				<div class="form-group">
					<label for="text">Nama Dokter</label>
					<input type="text" name="nama_dokter" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Hari</label>
					<select name="hari" class="form-control">
						<option>Senin</option>
						<option>Selasa</option>
						<option>Rabu</option>
						<option>Kamis</option>
						<option>Jumat</option>
						<option>Sabtu</option>
					</select>
					<br>
					<div class="form-group">
						<label for="text">Jam Mulai</label>
						<input type="text" name="jam_mulai" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Jam Selesai</label>
						<input type="text" name="jam_selesai" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Poli</label>
						<select name="poli" class="form-control">
							<option>--Silahkan Pilih--</option>
							<option>POLI GIGI</option>
							<option>POLI UMUM</option>
							<option>POLI KIA</option>
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
