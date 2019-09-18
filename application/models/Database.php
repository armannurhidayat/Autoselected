<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Model {

	public function select()
	{
		return $this->db->get('tbl_provinsi');
	}

	public function insert()
	{
		$data =[
			'provinsi_id'	=> $this->input->post('provinsi', TRUE),
			'kabkot_id'		=> $this->input->post('kota', TRUE),
			'kecamatan_id'	=> $this->input->post('kecamatan', TRUE),
			'kelurahan_id'	=> $this->input->post('kelurahan', TRUE)
		];
		$this->db->insert('hasil_insert', $data);
	}

	public function select_wilayah()
	{
		$this->db->join('tbl_provinsi', 'tbl_provinsi.id = hasil_insert.provinsi_id', 'LEFT');
		$this->db->join('tbl_kabkot', 'tbl_kabkot.id = hasil_insert.kabkot_id', 'LEFT');
		$this->db->join('tbl_kecamatan', 'tbl_kecamatan.id = hasil_insert.kecamatan_id', 'LEFT');
		$this->db->join('tbl_kelurahan', 'tbl_kelurahan.id = hasil_insert.kelurahan_id', 'LEFT');
		return $this->db->get('hasil_insert');
	}
}