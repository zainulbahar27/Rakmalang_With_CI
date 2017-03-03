
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class memberControll extends CI_Controller {
	public function  __construct(){
		parent:: __construct();
		$this->load->model('membermodel');
		$this->load->model('ProductModel');
		$this->load->library('cart');
	}
	function getEditMember(){
		$session_data = $this->session->userdata('logged_in');
		$data['id_member']= $session_data['id_member'];
		$id_member= $data['id_member'];
		$data['profile'] = $this->membermodel->getMember($id_member);
		$this->load->view('head');
		$this->load->view('navbar', $data);
		$this->load->view('edit_profile', $data);
		$this->load->view('footer');
		$this->load->view('js');
	
	}
	function setProfilmember(){
		$session_data = $this->session->userdata('logged_in');
		$id_member =$session_data['id_member'];
		$nama =$this->input->post('nama');
		$password = $this->input->post('password');
		$password= md5($password);
		$nomor_telfon= $this->input->post('nomor_telfon');
		$alamat = $this->input->post('alamat');
		$kode_pos = $this->input->post('kode_pos');
		$data = $this->membermodel->setProfileNew($id_member, $password, $nomor_telfon, $alamat, $kode_pos, $nama);
		$this->session->set_flashdata('info', "profile berhasil diperbarui");
		redirect('productcontroll/melihatDaftarAlatKemah');
	}
	function getlistMember(){
		$data['listmember']= $this->membermodel->listmember();
		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('member', $data);
		$this->load->view('js-admin');
	}
	function deleteMember($id_member){
		$this->membermodel->deleteMember($id_member);
		$this->session->set_flashdata('info', "User telah berhasil dihapus!");
		redirect('memberControll/getlistMember');	
	}
}