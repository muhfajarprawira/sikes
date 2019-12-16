<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pegawai extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_pegawai');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['pegawai'] = $this->m_pegawai->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Pegawai';
		$this->load->view('pegawai/index', $data);
	}

	public function tambah_pegawai()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Pegawai';
		$this->load->view('pegawai/tambah', $data);
	}

	public function tambah_data_action()
	{
		$this->form_validation->set_rules('id_pegawai', 'ID Pegawai', 'required|trim', ['required' => 'ID Pegawai Harus Di Isi!']);
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim', ['required' => 'Nama Pegawai Harus Di Isi!']);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', ['required' => 'Jenis Kelamin Harus Di Isi!']);
		$this->form_validation->set_rules('npwp', 'NPWP', 'required|trim', ['required' => 'NPWP Harus Di Isi!']);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', ['required' => 'Tempat Lahir Harus Di Isi!']);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim', ['required' => 'Tanggal Lahir Harus Di Isi!']);
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', ['required' => 'Jabatan Harus Di Isi!']);
		$this->form_validation->set_rules('bidang', 'Bidang', 'required|trim', ['required' => 'Bidang Harus Di Isi!']);

		$id_pegawai    = $this->input->post('id_pegawai');
		$nama_pegawai  = $this->input->post('nama_pegawai');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$npwp 		   = $this->input->post('npwp');
		$tempat_lahir  = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jabatan 	   = $this->input->post('jabatan');
		$bidang 	   = $this->input->post('bidang');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors());
			redirect('pegawai/tambah_pegawai');
		} else {
			$data = array(
				'id_pegawai'    => $id_pegawai,
				'nama_pegawai'  => $nama_pegawai,
				'jenis_kelamin' => $jenis_kelamin,
				'npwp'          => $npwp,
				'tempat_lahir'  => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'jabatan'       => $jabatan,
				'bidang'        => $bidang,
			);
			$this->m_pegawai->input_data($data, 'pegawai');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Tambah!</div>');
			redirect('pegawai');
		}
	}

	public function edit($id_pegawai)
	{

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('id_pegawai' => $id_pegawai);
		$data['title'] = 'Edit Pegawai';
		$data['pegawai'] = $this->m_pegawai->edit_data($where, 'pegawai')->row();
		$this->load->view('pegawai/edit', $data);
	}

	public function aksi_edit()
	{
		$id_pegawai    = $this->input->post('id_pegawai');
		$nama_pegawai  = $this->input->post('nama_pegawai');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$npwp 		   = $this->input->post('npwp');
		$tempat_lahir  = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jabatan 	   = $this->input->post('jabatan');
		$bidang 	   = $this->input->post('bidang');

		$data = array(
			'id_pegawai'    => $id_pegawai,
			'nama_pegawai'  => $nama_pegawai,
			'jenis_kelamin' => $jenis_kelamin,
			'npwp'          => $npwp,
			'tempat_lahir'  => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jabatan'       => $jabatan,
			'bidang'        => $bidang,
		);
		$where = array(
			'id_pegawai' => $id_pegawai
		);

		$this->m_pegawai->update_pegawai($where, $data, 'pegawai');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah!</div>');
		redirect('pegawai');
	}

	public function hapus($id_pegawai)
	{
		$where = array('id_pegawai' => $id_pegawai);
		$this->m_pegawai->hapus_data($where, 'pegawai');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus!</div>');
		redirect('pegawai');
	}
}
