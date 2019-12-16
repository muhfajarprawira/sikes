<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Data_obat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_data_obat');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{

		$data['data_obat'] = $this->m_data_obat->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = 'Data Obat';
		$this->load->view('data_obat/index', $data);
	}

	public function tambah_data_obat()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = 'Tambah Data Obat';
		$this->load->view('data_obat/tambah', $data);
	}

	public function tambah_data_action()
	{
		$this->form_validation->set_rules('kode_obat', 'Kode Obat', 'required|trim', ['required' => 'Kode Obat Harus Di Isi!']);
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required|trim', ['required' => 'Nama Obat Harus Di Isi!']);
		$this->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'required|trim', ['required' => 'Jenis Obat Harus Di Isi!']);
		$this->form_validation->set_rules('dosis_aturan_obat', 'Dosis Aturan Obat', 'required|trim', ['required' => 'Dosis Aturan Obat Harus Di Isi!']);
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim', ['required' => 'Satuan Harus Di Isi!']);

		$kode_obat         = $this->input->post('kode_obat');
		$nama_obat         = $this->input->post('nama_obat');
		$jenis_obat        = $this->input->post('jenis_obat');
		$dosis_aturan_obat = $this->input->post('dosis_aturan_obat');
		$satuan            = $this->input->post('satuan');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors());
			redirect('data_obat/tambah_data_obat');
		} else {
			$data = array(
				'kode_obat'         => $kode_obat,
				'nama_obat'         => $nama_obat,
				'jenis_obat'        => $jenis_obat,
				'dosis_aturan_obat' => $dosis_aturan_obat,
				'satuan'            => $satuan,
			);

			$this->m_data_obat->input_data($data, 'data_obat');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
			redirect('data_obat');
		}
	}

	public function edit($kode_obat)
	{

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('kode_obat' => $kode_obat);
		$data['title'] = 'Edit Data Obat';
		$data['data_obat'] = $this->m_data_obat->edit_data($where, 'data_obat')->row();
		$this->load->view('data_obat/edit', $data);
	}

	public function aksi_edit()
	{
		$kode_obat         = $this->input->post('kode_obat');
		$nama_obat         = $this->input->post('nama_obat');
		$jenis_obat        = $this->input->post('jenis_obat');
		$dosis_aturan_obat = $this->input->post('dosis_aturan_obat');
		$satuan            = $this->input->post('satuan');

		$data = array(
			'kode_obat'         => $kode_obat,
			'nama_obat'         => $nama_obat,
			'jenis_obat'        => $jenis_obat,
			'dosis_aturan_obat' => $dosis_aturan_obat,
			'satuan'            => $satuan,

		);
		$where = array(
			'kode_obat' => $kode_obat
		);

		$this->m_data_obat->update_data_obat($where, $data, 'data_obat');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah!</div>');
		redirect('data_obat');
	}

	public function hapus($kode_obat)
	{
		$where = array('kode_obat' => $kode_obat);
		$this->m_data_obat->hapus_data($where, 'data_obat');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus!</div>');
		redirect('data_obat');
	}
}
