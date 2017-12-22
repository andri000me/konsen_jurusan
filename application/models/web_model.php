<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Web_model extends CI_Model {
	function __construct(){
        parent::__construct();
    }

	function login($nip,$password){
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->where('p.nip', $nip); 
		$this->db->where('p.password', $password);  
		$q = $this->db->get();
		return $q;
	}

	function data_pengguna($id_pengguna){
		$this->db->select('*');
		$this->db->from('pengguna p');
		$this->db->where('p.id_pengguna', $id_pengguna);
		$q	=	$this->db->get();
		return $q;
	}

	function data_mk(){
		$this->db->select('*');
		$this->db->from('mata_kuliah');
		$q	=	$this->db->get();
		return $q;
	}
	function input_data_mk($data){
		$q	=	$this->db->insert('mata_kuliah', $data);
		return $q;
	}

	function edit_data_mk($id){
		$this->db->select('*');
		$this->db->from('mata_kuliah'); 
		$this->db->where('id_mk', $id);
		$q = $this->db->get();
		return $q;
	}

	function update_data_mk($data,$id){
		$this->db->where('id_mk', $id);
		$this->db->update('mata_kuliah', $data);
	}

	function hapus_data_mk($id_mk){
		$this->db->where('id_mk', $id_mk);
		$this->db->delete('mata_kuliah');
	}

	function mahasiswa(){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$q	=	$this->db->get();
		return $q;
	}
	function input_mahasiswa($data){
		$q	=	$this->db->insert('mahasiswa', $data);
		return $q;
	}

	function edit_mahasiswa($nim){
		$this->db->select('*');
		$this->db->from('mahasiswa'); 
		$this->db->where('nim', $nim);
		$q = $this->db->get();
		return $q;
	}

	function update_mahasiswa($data,$nim){
		$this->db->where('nim', $nim);
		$this->db->update('mahasiswa', $data);
	}

	function hapus_mahasiswa($nim){
		$this->db->where('nim', $nim);
		$this->db->delete('mahasiswa');
	}

	function data_nilai(){
		$this->db->select('*');
		$this->db->from('nilai');
		$q	=	$this->db->get();
		return $q;
	}

	function input_data_nilai($data){
		$q	=	$this->db->insert('nilai', $data);
	}

	function hapus_nilai($id_nilai){
		$this->db->where('id_nilai', $id_nilai);
		$this->db->delete('nilai');
	}

	function update_data_nilai($data,$id_nilai){
		$this->db->where('id_nilai', $id_nilai);
		$this->db->update('nilai', $data);
	}

	function edit_data_nilai($id_nilai){
		$this->db->select('*');
		$this->db->from('nilai'); 
		$this->db->where('id_nilai', $id_nilai);
		$q = $this->db->get();
		return $q;
	}

	function input_penilaian($data){
		$q	=	$this->db->insert('penilaian', $data);
	}

	function penilaian(){
		$this->db->select('*');
		$this->db->from('penilaian');
		$q	=	$this->db->get();
		return $q;
	}

	function all_penilaian(){
		$this->db->select('*');
		$this->db->from('penilaian pn');
		$this->db->join('mahasiswa m', 'm.nim=pn.nim');
		$this->db->join('mata_kuliah mk', 'mk.kode_mk=pn.kode_mk');
		$this->db->join('nilai_jurusan nj', 'nj.nim=m.nim');
		$q	=	$this->db->get();
		return $q;
	}

	function penilaian_jurusan(){
		$this->db->select('*');
		$this->db->from('nilai_jurusan');
		$q	=	$this->db->get();
		return $q;
	}

	function input_penilaian_jurusan($data){
		$q	=	$this->db->insert('nilai_jurusan', $data);
	}

	function all_penilaian_jurusan(){
		$this->db->select('*');
		$this->db->from('nilai_jurusan nj');
		$this->db->join('mahasiswa m', 'm.nim=nj.nim');
		$q	=	$this->db->get();
		return $q;
	}

	function get_nim($id){
		$this->db->select('nama');
		$this->db->from('mahasiswa');
		$this->db->where('nim',$id);
		$q =	$this->db->get();
		return $q;
	}

	function hitung_ipk(){
		$q	=	$this->db->query("SELECT nim, nama, sum(mutu*sks) AS kredit_sks FROM penilaian,mata_kuliah,nilai WHERE penilaian.kode_mk=mata_kuliah.kode_mk AND penilaian.nilai_huruf=nilai.nilai_huruf GROUP BY nim");
		return $q;
	}

	function get_nilaiangkabyID(){
		$q 	=	$this->db->query("SELECT * FROM penilaian pn JOIN mahasiswa m ON pn.nim=m.nim JOIN mata_kuliah mk ON pn.kode_mk=mk.kode_mk GROUP BY id_penilaian");
		return $q;
	}

	function detail_fuzzy($nim){
		$this->db->select('*');
		$this->db->from('penilaian pn');
		$this->db->join('mata_kuliah mk', 'mk.kode_mk=pn.kode_mk');
		$this->db->where('nim',$nim);
		$q	=	$this->db->get();
		return $q;
	}

	function cek_nilai_huruf($nilai){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->where('nilai_angka',$nilai);
		$q	=	$this->db->get();
		return $q;
	}
}