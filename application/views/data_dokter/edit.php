<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="clearfix">
		<h5 class="h3 mb-4 text-gray-800 float-left">Ubah Data Dokter</h5>
		<a href="<?= base_url('data_dokter'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>
	<hr>
	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<form action="<?= base_url('data_dokter/aksi_edit'); ?>" method="post">
				<div class="form-group">
					<label for="text">Kode Dokter</label>
					<input type="text" name="kode_dokter" value="<?php echo $data_dokter->kode_dokter ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Nama Dokter</label>
					<input type="text" name="nama_dokter" value="<?php echo $data_dokter->nama_dokter ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control" value="<?= $data_dokter->jenis_kelamin; ?>">
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
				</div>

				<div class="form-group">
					<label for="text">Nomor Induk Dokter</label>
					<input type="text" name="nomor_induk_dokter" value="<?php echo $data_dokter->nomor_induk_dokter ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Tempat Lahir</label>
					<input type="text" name="tempat_lahir" value="<?php echo $data_dokter->tempat_lahir ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Tanggal Lahir</label>
					<input type="date" name="tgl_lahir" value="<?php echo $data_dokter->tgl_lahir ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Alamat</label>
					<input type="text" name="alamat" value="<?php echo $data_dokter->alamat ?>" class="form-control">
				</div> 

				<div class="form-group">
					<label>Bagian Poli</label>
					<select name="id_poli" class="form-control" value="<?= $data_dokter->id_poli; ?>">
						<option>Poli GIGI</option>
						<option>Poli UMUM</option>
						<option>Poli KIA</option>
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
