<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('adminlogin') && $this->uri->segment(2) && $this->uri->segment(2)!="login"){
			redirect('admin');
		}

	}
	public function index()
	{
		if($this->session->userdata('adminlogin')){redirect('admin/panel');}
		$this->load->view('back/login');
	}
	public function login()
	{
		$exist=Yonetim::find(['mail'=>$this->input->post("email"),
			'password'=>$this->input->post("sifre")]);
		if($exist){
			$this->session->set_userdata('adminlogin',true);
			$this->session->set_userdata('admininfo',$exist);
			redirect('admin/panel');

		}else{
			$hata="Email veya Şifre Hatalıdır!";
			$this->session->set_flashdata('error',$hata);
			redirect('admin');
		}
	}
	public function panel(){
		$data['head']="Panel";
		$this->load->view('back/panel',$data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}
	public function settings(){
		$data['head']="Ayarlar";
		$this->load->view('back/config',$data);
	}
}
