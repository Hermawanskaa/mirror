<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('LoginModel');
  }

  function index() {
    $this->load->view('login'); //login/model
  }

public function logout(){
  $this->session->unset_userdata('login');
  redirect('login','refresh');
}

public function m_login(){
$result = $this->LoginModel->mahasiswa();
if(! $result){
  $result = $this->LoginModel->dosen();
  if(!$result){
    $result = $this->LoginModel->kajur();
    if(!$result){
      $result = $this->LoginModel->admin();
      if (!$result) {
        redirect('login/error');
      }else{
        redirect('admin');
        }
      }
      else{
        redirect('kajur');
          }
      }
      else{
        redirect('dosen');
      }
      }else{
  redirect('mahasiswa');
      };
}

public function error(){
  $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
        redirect(base_url('login'));
  $this->load->view('Login/error');
}


  function proses() {
    $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('login');
    } else {
      $usr = $this->input->post('username');
      $psw = $this->input->post('password');
      $u = $usr;
      $p = $psw;
      $cek = $this->Mod_Login->cek($u, $p);
      if ($cek->num_rows() > 0) {
        //login berhasil, buat session
        foreach ($cek->result() as $qad) {
          $sess_data['id_member'] = $qad->id_member;
          $sess_data['pass'] = $qad->pass;
          $sess_data['nama'] = $qad->nama;
          $this->session->set_userdata($sess_data);
        }
        $this->session->set_flashdata('success', 'Login Berhasil !');
        redirect(base_url('admin'));
      } else {
        $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
        redirect(base_url('login'));
      }
    }
  }
}
