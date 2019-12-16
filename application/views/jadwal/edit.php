<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="clearfix">
		<h5 class="h3 mb-4 text-gray-800 float-left">Ubah Jadwal</h5>
		<a href="<?= base_url('jadwal'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>
	<hr>
	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<form action="<?= base_url('jadwal/aksi_edit'); ?>" method="post">
				<div class="form-group">
					<label for="text">Nama Dokter</label>
					<input type="text" name="nama_dokter" value="<?php echo $jadwal->nama_dokter ?>" class="form-control">
					<input type="hidden" name="id_jadwal" value="<?php echo $jadwal->id_jadwal ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Hari</label>
					<select name="hari" class="form-control">
						<option><?= $jadwal->hari; ?></option>
						<option>Senin</option>
						<option>Selasa</option>
						<option>Rabu</option>
						<option>Kamis</option>
						<option>Jumat</option>
						<option>Sabtu</option>
					</select>
				</div>

				<div class="form-group">
					<label for="text">Jam Mulai</label>
					<input type="text" name="jam_mulai" value="<?php echo $jadwal->jam_mulai ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Jam Selesai</label>
					<input type="text" name="jam_selesai" value="<?php echo $jadwal->jam_selesai ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Poli</label>
					<select name="poli" class="form-control">
						<option><?= $jadwal->poli; ?></option>
						<option>POLI GIGI</option>
						<option>POLI UMUM</option>
						<option>POLI KIA</option>
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
