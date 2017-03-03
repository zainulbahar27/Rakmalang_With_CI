<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {
	public function  __construct(){
		parent:: __construct();
		$this->load->model('ProductModel');
		$this->load->model('membermodel');
		$this->load->library('session');
		
		
	}
	function login(){
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$password=md5($password);
			$result =$this->membermodel->login($email)->result();
			$mail="";
			$pass="";
			
				foreach ($result as $row) {
					 $mail=$row->email;
					 $pass=$row->passwd;

				}
			
			if ($email==$mail && $password==$pass) {
				if($result){
			     $sess_array = array();
			     foreach($result as $row){
			       $sess_array = array(
			         'id_member' => $row->id_member,
			         'email' => $row->email
			       );
			       $this->session->set_userdata('logged_in', $sess_array);
			       $this->membermodel->setLastLogin($row->id_member);
			     }
			   }
			  
				$this->session->set_flashdata('info', "login berhasil");
			 redirect('productcontroll/melihatdaftaralatkemah');
			}
			else{
				 $this->session->set_flashdata('info', "login gagal");
				redirect('productcontroll/melihatdaftaralatkemah','refresh');
			}
		}
	function logout(){
		$this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('productcontroll/melihatdaftaralatkemah','refresh');
	   
	}
	function register(){
		$session_data = $this->session->userdata('logged_in');
		$data['id_member']= $session_data['id_member'];
		$data['kategori']= $this->ProductModel->getKategoriProduct();
		$data['product']= $this->ProductModel->getProductList();

		$this->load->view('head');
		$this->load->view('navbar',$data);
		$this->load->view('form_new_account', $data);
		$this->load->view('footer');
		$this->load->view('js');
	}
	function setRegister(){
		$name= $this->input->post('name');
		$email= $this->input->post('email');
		$password= $this->input->post('password');
		$password = md5($password);
		$birthday= $this->input->post('birthday');
		$gender= $this->input->post('Gender');
		$phone= $this->input->post('phone');
		$poss= $this->input->post('poss');
		$alamat= $this->input->post('alamat');
		$mail= $this->membermodel->cekEmail();
		foreach ($mail->result() as $key) {
			if ($email== $key->email) {
				$cek= $key->email;
			}
		}

		if ($cek == $email) {
			$this->session->set_flashdata('info_email', "email sudah digunakan");
			redirect('register/register');
			
		}else {
			
			$this->membermodel->InsertRegister($name, $email, $password, $birthday, $gender, $phone,$poss, $alamat);
			$result =$this->membermodel->login($email)->result();
			$mail="";
			$pass="";
			
				foreach ($result as $row) {
					 $mail=$row->email;
					 $pass=$row->passwd;

				}
			
			if ($email==$mail && $password==$pass) {
				if($result){
			     $sess_array = array();
			     foreach($result as $row){
			       $sess_array = array(
			         'id_member' => $row->id_member,
			         'email' => $row->email
			       );
			       $this->session->set_userdata('logged_in', $sess_array);
			     }
			   }
			 }
			$this->session->set_userdata('logged_in', $sess_array);
			$this->session->set_flashdata('info', "registrasi berhasil");
			
			redirect('productcontroll/melihatdaftaralatkemah');
		}
	}
	
	
}