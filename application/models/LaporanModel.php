<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model{
	public function __construct()
	{
		parent::__construct();
	}

	public function lihat_laporan($tanggal){
		$this->db->select('*');
		$this->db->from('gaji');
		$this->db->join('karyawan', 'karyawan.karyawan_id = gaji.gaji_karyawan_id');
		$this->db->join('jabatan', 'jabatan.jabatan_id = karyawan.karyawan_jabatan_id');
		$this->db->like('gaji_tanggal',$tanggal);
		$this->db->where('gaji_status','sudah');
		$this->db->order_by('gaji_bulan_ke','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
}
