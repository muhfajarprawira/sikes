<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading --> 
	<div class="clearfix">
		<h5 class="h3 mb-4 text-gray-800 float-left">Tambah Data Dokter</h5>
		<a href="<?= base_url('data_dokter'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>
	<hr>
	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<form action="<?= base_url('data_dokter/tambah_data_action'); ?>" method="post">
				<?php if ($this->session->flashdata('message')) : ?>
					<div class="alert alert-danger"><?php echo $this->session->flashdata('message'); ?></div>
				<?php endif ?>
				<div class="form-group">
					<label for="text">Kode Dokter</label>
					<input type="text" name="kode_dokter" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Nama Dokter</label>
					<input type="text" name="nama_dokter" class="form-control">
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control">
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
					<br>
					<div class="form-group">
						<label for="text">Nomor Induk Dokter</label>
						<input type="text" name="nomor_induk_dokter" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Tempat Lahir</label>
						<input type="text" name="tempat_lahir" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Tanggal Lahir</label>
						<input type="date" name="tgl_lahir" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Alamat</label>
						<input type="text" name="alamat" class="form-control">
					</div>

					<div class="form-group">
						<label>Bagian Poli</label>
						<select name="id_poli" class="form-control">
							<option>--Silahkan Pilih--</option>
							<option>Poli GIGI</option>
							<option>Poli UMUM</option>
							<option>Poli KIA</option>
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
