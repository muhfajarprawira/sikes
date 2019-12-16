<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Data_dokter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_data_dokter');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['data_dokter'] = $this->m_data_dokter->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Dokter';
		$this->load->view('data_dokter/index', $data);
	}

	public function tambah_data_dokter()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = 'Tambah Data Dokter';
		$this->load->view('data_dokter/tambah', $data);
	}

	public function tambah_data_action()
	{
		$this->form_validation->set_rules('kode_dokter', 'Kode Dokter', 'required|trim', ['required' => 'ID Pegawai Harus Di Isi!']);
		$this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|trim', ['required' => 'Nama Dokter Harus Di Isi!']);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', ['required' => 'Jenis Kelamin Harus Di Isi!']);
		$this->form_validation->set_rules('nomor_induk_dokter', 'Nomor Induk Dokter', 'required|trim', ['required' => 'Nomor Induk Dokter Harus Di Isi!']);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', ['required' => 'Tempat Lahir Harus Di Isi!']);
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', ['required' => 'Tanggal Lahir Harus Di Isi!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat Harus Di Isi!']);
		$this->form_validation->set_rules('id_poli', 'ID Poli', 'required|trim', ['required' => 'ID Poli Harus Di Isi!']);

		$kode_dokter        = $this->input->post('kode_dokter');
		$nama_dokter        = $this->input->post('nama_dokter');
		$jenis_kelamin      = $this->input->post('jenis_kelamin');
		$nomor_induk_dokter = $this->input->post('nomor_induk_dokter');
		$tempat_lahir       = $this->input->post('tempat_lahir');
		$tgl_lahir          = $this->input->post('tgl_lahir');
		$alamat             = $this->input->post('alamat');
		$id_poli            = $this->input->post('id_poli');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors());
			redirect('data_dokter');
		} else {
			$data = array(
				'kode_dokter'        => $kode_dokter,
				'nama_dokter'        => $nama_dokter,
				'jenis_kelamin'      => $jenis_kelamin,
				'nomor_induk_dokter' => $nomor_induk_dokter,
				'tempat_lahir'       => $tempat_lahir,
				'tgl_lahir'          => $tgl_lahir,
				'alamat'             => $alamat,
				'id_poli'            => $id_poli,
			);
			$this->m_data_dokter->input_data($data, 'data_dokter');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Tambah!</div>');
			redirect('data_dokter');
		}
	}

	public function edit($kode_dokter)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('kode_dokter' => $kode_dokter);
		$data['title'] = 'Edit Data Dokter';
		$data['data_dokter'] = $this->m_data_dokter->edit_data($where, 'data_dokter')->row();
		$this->load->view('data_dokter/edit', $data);
	}

	public function aksi_edit()
	{
		$kode_dokter        = $this->input->post('kode_dokter');
		$nama_dokter        = $this->input->post('nama_dokter');
		$jenis_kelamin      = $this->input->post('jenis_kelamin');
		$nomor_induk_dokter = $this->input->post('nomor_induk_dokter');
		$tempat_lahir       = $this->input->post('tempat_lahir');
		$tgl_lahir          = $this->input->post('tgl_lahir');
		$alamat             = $this->input->post('alamat');
		$id_poli            = $this->input->post('id_poli');

		$data = array(
			'kode_dokter'        => $kode_dokter,
			'nama_dokter'        => $nama_dokter,
			'jenis_kelamin'      => $jenis_kelamin,
			'nomor_induk_dokter' => $nomor_induk_dokter,
			'tempat_lahir'       => $tempat_lahir,
			'tgl_lahir'          => $tgl_lahir,
			'alamat'             => $alamat,
			'id_poli'            => $id_poli,
		);
		$where = array(
			'kode_dokter' => $kode_dokter
		);

		$this->m_data_dokter->update_data_dokter($where, $data, 'data_dokter');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah!</div>');
		redirect('data_dokter');
	}

	public function hapus($kode_dokter)
	{
		$where = array('kode_dokter' => $kode_dokter);
		$this->m_data_dokter->hapus_data($where, 'data_dokter');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus!</div>');
		redirect('data_dokter');
	}
}
