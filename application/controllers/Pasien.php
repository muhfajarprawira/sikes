<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pasien extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_pasien');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['pasien'] = $this->m_pasien->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Pasien';
		$this->load->view('pasien/index', $data);
	}

	public function tambah_pasien()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Data';
		$this->load->view('pasien/tambah', $data);
	}

	public function tambah_data_action()
	{
		$this->form_validation->set_rules('no_rekamedis', ' No Rekam Medis', 'required|trim', ['required' => 'No Rekam Medis Harus Di Isi!']);
		$this->form_validation->set_rules('no_ktp', 'No Ktp', 'required|trim', ['required' => 'No Ktp Harus Di Isi!']);
		$this->form_validation->set_rules('no_bpjs', 'No Bpjs', 'required|trim', ['required' => 'No Bpjs Harus Di Isi!']);
		$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required|trim', ['required' => 'Nama Pasien Harus Di Isi!']);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', ['required' => 'Jenis Kelamin Harus Di Isi!']);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', ['required' => 'Tempat Lahir Harus Di Isi!']);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim', ['required' => 'Tanggal Lahir Harus Di Isi!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat Harus Di Isi!']);
		$this->form_validation->set_rules('status_pasien', 'Status Pasien', 'required|trim', ['required' => 'Status Pasien Harus Di Isi!']);

		$no_rekamedis  = $this->input->post('no_rekamedis');
		$no_ktp        = $this->input->post('no_ktp');
		$no_bpjs       = $this->input->post('no_bpjs');
		$nama_pasien   = $this->input->post('nama_pasien');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir  = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat        = $this->input->post('alamat');
		$status_pasien = $this->input->post('status_pasien');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors());
			redirect('pasien/tambah_pasien');
		} else {
			$data = array(
				'no_rekamedis'  => $no_rekamedis,
				'no_ktp'        => $no_ktp,
				'no_bpjs'       => $no_bpjs,
				'nama_pasien'   => $nama_pasien,
				'jenis_kelamin' => $jenis_kelamin,
				'tempat_lahir'  => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'alamat'        => $alamat,
				'status_pasien' => $status_pasien,
			);
			$this->m_pasien->input_data($data, 'pasien');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
			redirect('pasien');
		}
	}

	public function edit($no_rekamedis)
	{

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('no_rekamedis' => $no_rekamedis);
		$data['title'] = 'Edit Data Pasien';
		$data['pasien'] = $this->m_pasien->edit_data($where, 'pasien')->row();
		$this->load->view('pasien/edit', $data);
	}

	public function aksi_edit()
	{
		$no_rekamedis  = $this->input->post('no_rekamedis');
		$no_ktp        = $this->input->post('no_ktp');
		$no_bpjs       = $this->input->post('no_bpjs');
		$nama_pasien   = $this->input->post('nama_pasien');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir  = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat        = $this->input->post('alamat');
		$status_pasien = $this->input->post('status_pasien');

		$data = array(
			'no_rekamedis'  => $no_rekamedis,
			'no_ktp'        => $no_ktp,
			'no_bpjs'       => $no_bpjs,
			'nama_pasien'   => $nama_pasien,
			'jenis_kelamin' => $jenis_kelamin,
			'tempat_lahir'  => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'alamat'        => $alamat,
			'status_pasien' => $status_pasien,
		);
		$where = array(
			'no_rekamedis' => $no_rekamedis
		);

		$this->m_pasien->update_pasien($where, $data, 'pasien');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah!</div>');
		redirect('pasien');
	}

	public function hapus($no_rekamedis)
	{
		$where = array('no_rekamedis' => $no_rekamedis);
		$this->m_pasien->hapus_data($where, 'pasien');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus!</div>');
		redirect('pasien');
	}
}
