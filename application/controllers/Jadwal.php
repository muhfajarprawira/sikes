<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jadwal extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_jadwal');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['jadwal'] = $this->m_jadwal->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Jadwal Praktek Dokter';
		$this->load->view('jadwal/index', $data);
	}

	public function tambah_jadwal()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = 'Tambah Jadwal';
		$this->load->view('jadwal/tambah', $data);
	}

	public function tambah_data_action()
	{
		$this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|trim', ['required' => 'Nama Dokter Harus Di Isi!']);
		$this->form_validation->set_rules('hari', 'Hari', 'required|trim', ['required' => 'Hari Harus Di Isi!']);
		$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim', ['required' => 'Jam Mulai Harus Di Isi!']);
		$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim', ['required' => 'Jam Selesai Harus Di Isi!']);
		$this->form_validation->set_rules('poli', 'Poli', 'required|trim', ['required' => 'Poli Harus Di Isi!']);

		$nama_dokter = $this->input->post('nama_dokter');
		$hari        = $this->input->post('hari');
		$jam_mulai   = $this->input->post('jam_mulai');
		$jam_selesai = $this->input->post('jam_selesai');
		$poli        = $this->input->post('poli');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors());
			redirect('jadwal/tambah_jadwal');
		} else {
			$data = array(
				'nama_dokter' => $nama_dokter,
				'hari'        => $hari,
				'jam_mulai'   => $jam_mulai,
				'jam_selesai' => $jam_selesai,
				'poli'        => $poli,

			);
			$this->m_jadwal->input_data($data, 'jadwal');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
			redirect('jadwal');
		}
	}

	public function edit($id_jadwal)
	{

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('id_jadwal' => $id_jadwal);
		$data['title'] = 'Edit jadwal';
		$data['jadwal'] = $this->m_jadwal->edit_data($where, 'jadwal')->row();
		$this->load->view('jadwal/edit', $data);
	}

	public function aksi_edit()
	{
		$id_jadwal   = $this->input->post('id_jadwal');
		$nama_dokter = $this->input->post('nama_dokter');
		$hari        = $this->input->post('hari');
		$jam_mulai   = $this->input->post('jam_mulai');
		$jam_selesai = $this->input->post('jam_selesai');
		$poli        = $this->input->post('poli');

		$data = array(
			'nama_dokter' => $nama_dokter,
			'hari'        => $hari,
			'jam_mulai'   => $jam_mulai,
			'jam_selesai' => $jam_selesai,
			'poli'        => $poli,

		);
		$where = array(
			'id_jadwal' => $id_jadwal
		);

		$this->m_jadwal->update_jadwal($where, $data, 'jadwal');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah!</div>');
		redirect('jadwal');
	}

	public function hapus($id_jadwal)
	{
		$where = array('id_jadwal' => $id_jadwal);
		$this->m_jadwal->hapus_data($where, 'jadwal');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus!</div>');
		redirect('jadwal');
	}
}
