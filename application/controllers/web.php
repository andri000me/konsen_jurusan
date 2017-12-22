<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {
	function __construct(){
		parent:: __construct();	
		$this->load->model('Web_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('date');
	}

	public function index(){
		$data['login']			=	$this->session->userdata('login',TRUE);
		if($data['login']==FALSE) redirect(base_url('web/login'));

			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Home Page";
			$id_pengguna			=	$this->session->userdata('id_pengguna');
			$data['pengguna']		=	$this->Web_model->data_pengguna($id_pengguna);
			$data['content']		=	'home';
			$this->load->view('templete',$data);
	}
	
	public function login(){
		$this->load->view('login');
	}

	function proses_login(){
		$nip			= trim(strip_tags($this->input->post('nip')));
		$password		= md5($this->input->post('password'));
		$hasil 			= $this->Web_model->login($nip,$password);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result_array() as $data) {
				$session_id			=	$data['id_pengguna'];
				$session_nip		=	$data['nip'];
				$session_nama		=	$data['nama'];
				$session_userfile	=	$data['userfile'];
			}
			$sess_user = array(
								'id_pengguna'=>$session_id,
								'nip'=>$session_nip,
								'nama'=>$session_nama,
								'userfile'=>$session_userfile
				);
			$this->session->set_userdata($sess_user,TRUE);
			$this->session->set_userdata('login',TRUE);
			redirect(base_url('web'),'refresh');
		}
		else {
			echo "<script> alert('User dan Password yang anda masukkan salah');</script>";
			redirect(base_url('web'),'refresh');
		}
	}

	function logout(){
		$this->session->unset_userdata('login');
		redirect(base_url('web'), 'refresh');
	}

	public function input_data_mahasiswa(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Data Mahasiswa";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);		
			$data['content']		= 	'input_data_mahasiswa';
			$this->load->view('template',$data);
	}

	function submit_data_mahasiswa(){	
		$data 						= array();
		$data['nim']				= $this->input->post('nim');
		$data['nama']				= $this->input->post('nama');
		$data['ttl']				= $this->input->post('ttl');
		$data['gender']				= $this->input->post('gender');
		$data['ipk']				= $this->input->post('ipk');
		$data['telepon']			= $this->input->post('telepon');
		$data['alamat']				= $this->input->post('alamat');

		$this->form_validation->set_rules('nim','No Induk Mahasiswa','required');
		$this->form_validation->set_rules('nama','Nama Mahasiswa','required');
		$this->form_validation->set_rules('ttl','Tempat, Tanggal Lahir','required');
		$this->form_validation->set_rules('gender','Jenis Kelamin','required');
		$this->form_validation->set_rules('ipk','Indeks Prestasi Akademik','required');
		$this->form_validation->set_rules('telepon','no hp','required');
		$this->form_validation->set_rules('alamat','Alamat','required');

		if($this->form_validation->run() == FALSE){
			$this->view_data_mahasiswa();
		}
		else{	
			$this->Web_model->input_mahasiswa($data);
			echo "<script> alert('Data Mahasiswa Berhasil disimpan.');</script>";
			redirect(base_url('web/view_data_mahasiswa'), 'refresh');
		}
    }

	public function view_data_mahasiswa(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Data Mahasiswa";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['data_mhs']		=	$this->Web_model->mahasiswa();
			$data['content']		= 	'view_data_mahasiswa';
			$this->load->view('templete',$data);
	}

	function hapus_data_mahasiswa(){
		$nim			= $this->uri->segment(3);
		$this->Web_model->hapus_mahasiswa($nim);
		echo "<script> alert('Data Mahasiswa Berhasil didelete.');</script>";
		redirect(base_url('web/view_data_mahasiswa'), 'refresh');
	}

	public function edit_data_mahasiswa(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Edit Data Mahasiswa";
			$nim					=	$this->uri->segment(3);
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['edit_mhs']	 	= 	$this->Web_model->edit_mahasiswa($nim);
			$data['content']		= 	'edit_data_mahasiswa';
			$this->load->view('templete',$data);
	}

	function update_data_mahasiswa(){	
		$data 						= array();
		$nim						= $this->input->post('nim');
		$data['nim']				= $this->input->post('nim');
		$data['nama']				= $this->input->post('nama');
		$data['ttl']				= $this->input->post('ttl');
		$data['gender']				= $this->input->post('gender');
		$data['ipk']				= $this->input->post('ipk');
		$data['telepon']			= $this->input->post('telepon');
		$data['alamat']				= $this->input->post('alamat');

		$this->form_validation->set_rules('nim','No Induk Mahasiswa','required');
		$this->form_validation->set_rules('nama','Nama Mahasiswa','required');
		$this->form_validation->set_rules('ttl','Tempat, Tanggal Lahir','required');
		$this->form_validation->set_rules('gender','Jenis Kelamin','required');
		$this->form_validation->set_rules('ipk','Indeks Prestasi Akademik','required');
		$this->form_validation->set_rules('telepon','no hp','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		if($this->form_validation->run() == FALSE){
			$this->edit_data_mahasiswa();
		}
		else{
			$this->Web_model->update_mahasiswa($data,$nim);
			echo "<script> alert('Data Mahasiswa Berhasil diupdate.');</script>";
			redirect(base_url('web/view_data_mahasiswa'), 'refresh');
		}
    }

	public function input_data_nilai(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Data Nilai";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);		
			$data['content']		= 	'input_data_nilai';
			$this->load->view('template',$data);
	}

	function submit_data_nilai(){	
		$data 						= 	array();
		$data['nilai_angka']		= 	$this->input->post('nilai_angka');
		$data['nilai_huruf']		= 	$this->input->post('nilai_huruf');

		$this->form_validation->set_rules('nilai_angka','Nilai Angka','required');
		$this->form_validation->set_rules('nilai_huruf','nilai_huruf','required');

		if($this->form_validation->run() == FALSE){
			$this->view_data_nilai();
		}
		else{	
			$this->Web_model->input_data_nilai($data);
			echo "<script> alert('Data Nilai Berhasil disimpan.');</script>";
			redirect(base_url('web/view_data_nilai'), 'refresh');
		}
    }

	public function view_data_nilai(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Data Nilai";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['nilai']			=	$this->Web_model->data_nilai();
			$data['content']		= 	'view_data_nilai';
			$this->load->view('templete',$data);
	}

	function hapus_data_nilai(){
		$id_nilai			= $this->uri->segment(3);
		$this->Web_model->hapus_nilai($id_nilai);
		echo "<script> alert('Data Nilai Berhasil didelete.');</script>";
		redirect(base_url('web/view_data_nilai'), 'refresh');
	}

	public function edit_data_nilai(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Edit Data Nilai";
			$id_nilai				=	$this->uri->segment(3);
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['edit_nilai']	 	= 	$this->Web_model->edit_data_nilai($id_nilai);
			$data['content']		= 	'edit_data_nilai';
			$this->load->view('templete',$data);
	}

	function update_data_nilai(){	
		$data 						= array();
		$id_nilai 					= $this->input->post('id_nilai');
		$data['nilai_angka']		= 	$this->input->post('nilai_angka');
		$data['nilai_huruf']		= 	$this->input->post('nilai_huruf');

		$this->form_validation->set_rules('nilai_angka','Nilai Angka','required');
		$this->form_validation->set_rules('nilai_huruf','nilai_huruf','required');

		if($this->form_validation->run() == FALSE){
			$this->edit_data_nilai();
		}
		else{
			$this->Web_model->update_data_nilai($data,$id_nilai);
			echo "<script> alert('Data Nilai Berhasil diupdate.');</script>";
			redirect(base_url('web/view_data_nilai'), 'refresh');
		}
    }

	function submit_data_mk(){
		$data 						= array();
		$data['kode_mk']			= $this->input->post('kode_mk');
		$data['nama_mk']			= $this->input->post('nama_mk');
		$data['sks']				= $this->input->post('sks');
		
		$this->form_validation->set_rules('kode_mk','Kode Mata Kuliah','required');
		$this->form_validation->set_rules('nama_mk','Nama Mata Kuliah','required');
		$this->form_validation->set_rules('sks','Satuan Kredit Semester','required');

		if($this->form_validation->run() == FALSE){
			$this->view_data_mk();
		}
		else{	
			$this->Web_model->input_data_mk($data);
			echo "<script> alert('Data Mata Kuliah Berhasil disimpan.');</script>";
			redirect(base_url('web/view_data_mk'), 'refresh');
		}
    }

	public function view_data_mk(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Data Mata Kuliah";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['data_mk']		=	$this->Web_model->data_mk();
			$data['content']		= 	'view_data_mk';
			$this->load->view('templete',$data);
	}

	function hapus_data_mk(){
		$id_mk			= $this->uri->segment(3);
		$this->Web_model->hapus_data_mk($id_mk);
		echo "<script> alert('Data Mata Kuliah Berhasil didelete.');</script>";
		redirect(base_url('web/view_data_mk'), 'refresh');
	}

	public function edit_data_mk(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Edit Data Mata Kuliah";
			$id						=	$this->uri->segment(3);
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['edit_mk']	 	= 	$this->Web_model->edit_data_mk($id);
			$data['content']		= 	'edit_data_mk';
			$this->load->view('templete',$data);
	}

	function update_data_mk(){
		$data 						= array();
		$id							= $this->input->post('id_mk');
		$data['kode_mk']			= $this->input->post('kode_mk');
		$data['nama_mk']			= $this->input->post('nama_mk');
		$data['sks']				= $this->input->post('sks');

		$this->form_validation->set_rules('kode_mk','Kode Mata Kuliah','required');
		$this->form_validation->set_rules('nama_mk','Nama Mata Kuliah','required');
		$this->form_validation->set_rules('sks','Satuan Kredit Semester','required');
		if($this->form_validation->run() == FALSE){
			$this->edit_data_mk();
		}
		else{
			$this->Web_model->update_data_mk($data,$id);
			echo "<script> alert('Data Mata Kuliah Berhasil diupdate.');</script>";
			redirect(base_url('web/view_data_mk'), 'refresh');
		}
    }

	public function view_penilaian(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Data penilaian Mahasiswa";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['mhs']			=	$this->Web_model->mahasiswa();
			$data['data_mk']		=	$this->Web_model->data_mk();
			$data['nilai']			=	$this->Web_model->data_nilai();
			$data['penilaian']		=	$this->Web_model->penilaian();
			$data['all_penilaian']	=	$this->Web_model->all_penilaian();
			$data['angkabyid']		=	$this->Web_model->get_nilaiangkabyID();
			$data['content']		= 	'view_penilaian';
			$this->load->view('templete',$data);
	}

	public function submit_penilaian(){
		$data 						= 	array();
		$data['nim']				= 	$this->input->post('nim');
		$data['kode_mk']			= 	$this->input->post('kode_mk');
		$data['nilai_angka']		= 	$this->input->post('nilai_angka');
		$data['nilai_huruf']		=	$this->input->post('nilai_huruf');
		
		$this->form_validation->set_rules('nim','No Induk Mahasiswa','required');
		$this->form_validation->set_rules('kode_mk','Kode Mata Kuliah','required');
		$this->form_validation->set_rules('nilai_angka','Nilai Angka','required');
		$this->form_validation->set_rules('nilai_huruf','Nilai Huruf','required');

		if($this->form_validation->run() == FALSE){
			$this->view_penilaian();
		}
		else{	
			$this->Web_model->input_penilaian($data);
			echo "<script> alert('Data penilaian Mahasiswa Berhasil disimpan.');</script>";
			redirect(base_url('web/view_penilaian'), 'refresh');
		}
	}

	public function penilaian_jurusan(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Input penilaian Penjurusan Konsentrasi Mahasiswa";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['mhs']			=	$this->Web_model->mahasiswa();
			$data['penilaian']		=	$this->Web_model->penilaian_jurusan();
			$data['all_penilaian']	=	$this->Web_model->all_penilaian_jurusan();
			$data['content']		= 	'penilaian_jurusan';
			$this->load->view('templete',$data);
	}

	public function submit_penilaian_jurusan(){
		$data 						= 	array();
		$data['nim']				= 	$this->input->post('nim');
		$data['gedung']				= 	$this->input->post('gedung');
		$data['air']				= 	$this->input->post('air');
		$data['transportasi']		=	$this->input->post('transportasi');
		
		$this->form_validation->set_rules('nim','No Induk Mahasiswa','required');
		$this->form_validation->set_rules('gedung','Nilai Konsentrasi Bangunan Gedung','required');
		$this->form_validation->set_rules('air','Nilai Konsentrasi Bangunan Air','required');
		$this->form_validation->set_rules('transportasi','Nilai Konsentrasi Bangunan Transportasi','required');

		if($this->form_validation->run() == FALSE){
			$this->penilaian_jurusan();
		}
		else{	
			$this->Web_model->input_penilaian_jurusan($data);
			echo "<script> alert('Data penilaian Penjurusan Mahasiswa Berhasil disimpan.');</script>";
			redirect(base_url('web/penilaian_jurusan'), 'refresh');
		}
	}

	public function rekomendasi_sugeno(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Rekomendasi Penjurusan Algoritma Fuzzy Sugeno";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['mhs']			=	$this->Web_model->mahasiswa();
			$data['data_mk']		=	$this->Web_model->data_mk();
			$data['nilai']			=	$this->Web_model->data_nilai();
			$data['penilaian']		=	$this->Web_model->penilaian();
			$data['all_penilaian']	=	$this->Web_model->all_penilaian();
			$data['angkabyid']		=	$this->Web_model->get_nilaiangkabyID();
			$data['content']		= 	'rekomendasi_sugeno';
			$this->load->view('templete',$data);	
	}

	public function rekomendasi_tsukamoto(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Rekomendasi Penjurusan Algoritma Tsukamoto";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['mhs']			=	$this->Web_model->mahasiswa();
			$data['data_mk']		=	$this->Web_model->data_mk();
			$data['nilai']			=	$this->Web_model->data_nilai();
			$data['penilaian']		=	$this->Web_model->penilaian();
			$data['all_penilaian']	=	$this->Web_model->all_penilaian();
			$data['angkabyid']		=	$this->Web_model->get_nilaiangkabyID();
			$data['content']		= 	'rekomendasi_tsukamoto';
			$this->load->view('templete',$data);	
	}

	public function rekomendasi_all(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Rekomendasi Penjurusan Algoritma Tsukamoto";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['mhs']			=	$this->Web_model->mahasiswa();
			$data['data_mk']		=	$this->Web_model->data_mk();
			$data['nilai']			=	$this->Web_model->data_nilai();
			$data['penilaian']		=	$this->Web_model->penilaian();
			$data['all_penilaian']	=	$this->Web_model->all_penilaian();
			$data['angkabyid']		=	$this->Web_model->get_nilaiangkabyID();
			$data['content']		= 	'rekomendasi_all';
			$this->load->view('templete',$data);	
	}

	public function detail_fuzzyfikasi(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Rekomendasi Penjurusan Algoritma Fuzzy Sugeno";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['mhs']			=	$this->Web_model->mahasiswa();
			$data['data_mk']		=	$this->Web_model->data_mk();
			$data['nilai']			=	$this->Web_model->data_nilai();
			$data['penilaian']		=	$this->Web_model->penilaian();
			$data['all_penilaian']	=	$this->Web_model->all_penilaian();
			$nim					=	$this->uri->segment(3);
			$data['detail']			= 	$this->Web_model->detail_fuzzy($nim);
			$data['angkabyid']		=	$this->Web_model->get_nilaiangkabyID();
			$data['content']		= 	'detail_fuzzyfikasi';
			$this->load->view('templete',$data);	
	}

	public function huruf_nilai(){
		$nilai 						= 	$this->input->post('nilai_angka') ;
		$cek_nilai					= 	$this->Web_model->cek_nilai_huruf($nilai);

		foreach ($cek_nilai->result() as $data) {
			echo $data->nilai_huruf;
		}
	}

	public function penilaian_mahasiswa(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Data Penilaian Mahasiswa";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['mhs']			=	$this->Web_model->mahasiswa();
			$data['data_mk']		=	$this->Web_model->data_mk();
			$data['nilai']			=	$this->Web_model->data_nilai();
			$data['penilaian']		=	$this->Web_model->penilaian();
			$data['all_penilaian']	=	$this->Web_model->all_penilaian();
			$data['angkabyid']		=	$this->Web_model->get_nilaiangkabyID();
			$data['content']		= 	'penilaian_mahasiswa';
			$this->load->view('templete',$data);
	}

	public function error_rate(){
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
			$data['title']			=	"Home Page | Konsentrasi Jurusan Teknik Sipil Polsri";
			$data['board']			=	"Home";
			$data['page']			=	"Perbandingan Hasil Pembagian Konsentrasi";
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['mhs']			=	$this->Web_model->mahasiswa();
			$data['data_mk']		=	$this->Web_model->data_mk();
			$data['nilai']			=	$this->Web_model->data_nilai();
			$data['penilaian']		=	$this->Web_model->penilaian();
			$data['all_penilaian']	=	$this->Web_model->all_penilaian_jurusan();
			$data['angkabyid']		=	$this->Web_model->get_nilaiangkabyID();
			$data['content']		= 	'error_rate';
			$this->load->view('templete',$data);	
	}
}


