<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Database');
	}

	public function index()
	{
		$data['provinsi']	= $this->Database->select()->result_array();
		$data['wilayah']	= $this->Database->select_wilayah()->result_array();
		$this->load->view('welcome_message', $data);
	}

	public function get_kota()
	{
		$id_provinsi = $_POST['provinsi']; // Menampung id Provinsi

		$data['kota'] = $this->db->query("SELECT * FROM tbl_kabkot WHERE provinsi_id = '$id_provinsi' ")->result_array();

		echo "<option value=''>- Pilih Kota -</option>";

		foreach ($data['kota'] as $value) {
			echo "<option value='".$value['id']."'>".$value['kabupaten_kota']."</option>";
		}
	}

	public function get_kecamatan()
	{
		$id_kota = $_POST['kota']; // Menampung id Kota

		$data['kecamatan'] = $this->db->query("SELECT * FROM tbl_kecamatan WHERE kabkot_id = '$id_kota' ")->result_array();

		echo "<option value=''>- Pilih Kecamatan -</option>";

		foreach ($data['kecamatan'] as $value) {
			echo "<option value='".$value['id']."'>".$value['kecamatan']."</option>";
		}
	}

	public function get_kelurahan()
	{
		$id_kec = $_POST['kecamatan']; // Menampung id Kecamatan

		$data['kelurahan'] = $this->db->query("SELECT * FROM tbl_kelurahan WHERE kecamatan_id = '$id_kec' ")->result_array();

		echo "<option value=''>- Pilih Kelurahan -</option>";

		foreach ($data['kelurahan'] as $value) {
			echo "<option value='".$value['id']."'>".$value['kelurahan']."</option>";
		}
	}

	public function insert()
	{
		$this->Database->insert();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Berhasil menambahkan data.');
			redirect(base_url());
		}
	}

}
