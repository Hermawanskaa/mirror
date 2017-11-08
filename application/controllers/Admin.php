<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

public function __construct() {
		parent::__construct();
		$this->load->Model('adminModel');
		}

public function validation(){
	if($this->session->userdata('login')){
		redirect('login','refresh');
	}
}

public function index(){
	$this->validation();
	$this->template->render('admin/home');
}

public function list_mhs(){
	$this->validation();
	$data['mahasiswa'] = $this->adminModel->get_all('mahasiswa');
	$this->template->render('admin/mahasiswa/list',$data);
}

public function edit_mhs($id){
	$this->validation();
	$data['jurusan'] = $this->adminModel->get_all('jurusan');
	$data['edit'] = $this->adminModel->get_all_where('mahasiswa','id_member',$id);
	$this->template->render('admin/mahasiswa/edit',$data);
}

public function save_mhs(){
	$this->validation();
	$this->adminModel->save_mahasiswa();
	redirect('admin/list_mhs');
}

public function detail_list(){
	$this->validation();
	$data['judul'] = $this->adminModel->get_all_where('judul','status','0');
	$this->template->render('admin/approval/detail_list', $data);
}

public function stujui($id){
	$this->validation();
	$this->adminModel->stujui($id);
	redirect('admin/approval');
}

public function tolak($id){
	$this->validation();
	$this->adminModel->tolak($id);
	redirect('admin/approval');
}

public function list_cekjudul(){
	$this->validation();
	$data['cek_judul'] = $this->adminModel->get_all('cek_judul');
	$this->template->render('admin/cek_judul/home', $data);
}

public function edit_cekjudul($id){
	$this->validation();
	$data['edit'] = $this->adminModel->get_all_where('cek_judul','id_skripsi',$id);
	$this->template->render('admin/cek_judul/edit',$data);
 }

public function save_cekjudul(){
	$this->validation();
	$this->adminModel->save_cekjudul();
	redirect('admin/list_cekjudul');
}

public function del_cekjudul($id){
	$this->validation();
	$this->adminModel->del_cekjudul($id);
	redirect('admin/list_cekjudul');
}

public function lihat_judul(){
	$this->validation();
	$data['cek_judul'] = $this->adminModel->get_all_where('cek_judul','id_skripsi',$id);
}

public function save_download(){
	$this->validation();
	$config['Upload_path'] = '.assets/file/akademik';
	$config['allowed_types'] = 'pdf|docx|doc|rar|xlsx|xls|jpeg|jpg|png|zip|pptx|ppt';
	$this->load->library('Upload',$config);
	if (!$this->Upload->do_Upload()){
		$error = array('error'=>$this->Upload->display_errors());
		$file = null;
		redirect('admin/list_download');}
		else{
			$data = array('Upload_data'=>$this->Upload->data());
			$nama = $this->input->post('Nama');
			$tgl_post = date('Y-m-d');
			$jam_post = date('H:i:s');
			$Upload_data = $this->Upload->data();
			$Upload_data['file_name'];
			$file = $Upload_data['file_name'];
			$this->adminModel->save_download($nama,$tgl_post,$jam_post,$file);
			redirect('admin/list_download');}
	}

public function del_download($id){
	$this->validation();
	$this->adminModel->del_download($id);
	redirect('admin/list_download');
}

public function request_ujian(){
	$this->validation();
	$data['jadwal'] = $this->adminModel->get_all_where('jadwal','status',0);
	$data['jadw'] = $this->adminModel->get_all_where('jadwal','status',0);
	$this->template->render('admin/request_ujian',$data);
}

public function proses_jadwal($id){
	$this->validation();
	$data['dosen'] = $this->adminModel->get_all('dosen');
	$data['jadwal'] = $this->adminModel->get_all_where('jadwal','id_jadwal',$id);
}

public function update_jadwal(){
	$this->validation();
	$this->adminModel->update_jadwal();
	$this->redirect('admin/request_ujian');
}

public function kuota(){
	$this->validation();
	$data['dosen'] = $this->adminModel->kuota();
	$this->template->render('admin/kuota',$data);
}

public function profile(){
	$this->validation();
	$session = $this->session->userdata('login');
	$data['admin'] = $this->adminModel->get_all_where('admin','id_member', $session['id_member']);
	$this->template->render('admin/profile', $data);
}

//selesai
public function do_Upload($gambar){
	$config = array('allowed_types'=>'jpg|jpeg|png|gif',
					'Upload_path'=>'./assets/foto/admin','max_size'=>30000);
	$this->load->library('Upload',$config);
	$this->Upload->do_Upload($gambar);
	$images = $this->Upload->data($gambar);
	$images_data = $this->Upload->data($gambar);
	$images_name = $image_data['file_name'];
	$config = array('source_image'=>$images_data['full_path'],
					'maintain_ratio'=>true,'width'=>300,'height'=>1,'master_dim'=>'width');
	$this->load->library('image_lib',$config);
	$this->image_lib->resize();
	return  $image_name;
}

public function update_pass(){
	$gambar = $this->do_Upload('gambar');
	$this->adminModel->simpanProfil($gambar);
	redirect('login/logout');
	}
}
  
?>