<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AbsenModel extends CI_Model{
	public function __construct()
	{
		parent::__construct();
	}

	public function lihat_absen(){
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('karyawan', 'karyawan.karyawan_id = absen.absen_karyawan_id');
		$this->db->order_by('absen_date_created','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_satu_absen($id){
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('karyawan', 'karyawan.karyawan_id = absen.absen_karyawan_id');
		$this->db->where('absen_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function tambah_absen($data){
		$this->db->insert('absen', $data);
		return $this->db->affected_rows();
	}

	public function cek_absen($id,$tanggal){
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->where('absen_karyawan_id',$id);
		$this->db->like('absen_date_created',$tanggal);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_absen($id,$data){
		$this->db->where('absen_id', $id);
		$this->db->update('absen', $data);
		return $this->db->affected_rows();
	}
}
