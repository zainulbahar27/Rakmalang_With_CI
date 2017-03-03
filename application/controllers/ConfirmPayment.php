<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConfirmPayment extends CI_Controller {
	public function  __construct(){
		parent:: __construct();
		$this->load->model('bookingmodel');
		
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->library('image_lib');
	}

	function menampilkan_order(){
		$data['order'] = $this->bookingmodel->allorder();
		$data['booking_list'] = $this->bookingmodel->getbookinglist();

		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('orders', $data);
		$this->load->view('js-admin');
	
	}
	
	function confirmPayment($id_bookinglist, $status){
		
		$this->bookingmodel->setStatus($id_bookinglist, $status);
		$this->session->set_flashdata('info', " Pembayaran telah berhasil terkonfirmasi! ");
		redirect ('ConfirmPayment/menampilkan_order');


	}

	function declinePayment($id_bookinglist, $status){
		
		$this->bookingmodel->setStatus($id_bookinglist, $status);
		$this->session->set_flashdata('info', " Konfirmasi pembayaran ditolak! ");
		redirect ('ConfirmPayment/menampilkan_order');


	}


	function sendconfirmpayment(){
		
		$config['image_library'] = 'gd2';
		$config['upload_path'] = 'upload/token/';
		$config['allowed_types']='gif|jpeg|png|jpg';
		$config['max_size']= '10000';
		$config['max_height']= 1024;
		$config['encrypt_name']= TRUE;
		$id_bookinglist = $this->input->post('id_bookinglist');
		// $resizefoto = new ClassPendukung();

		$this->upload->initialize($config);

			if ($this->upload->do_upload('gambar_token')) {
				$dok =$this->upload->data();
				$this->ResizeUkuranFoto($dok['file_name']);
			$foto = $dok['file_name'];
			
			$id_member = $this->input->post('id_member');
			$id_bookinglist = $this->input->post('id_bookinglist');
			$acc_name= $this->input->post('acc_name');
			$bank_asal= $this->input->post('bank_asal');
			$bank_des= $this->input->post('bank_tar');
			$jumlah = $this->input->post('jumlah');
			$paymentdate = $this->input->post('paymentdate');
			$status = 'Waiting for Confirmation';
			$this->bookingmodel->setStatus($id_bookinglist, $status);
			
			$this->bookingmodel->confirmpayment($id_bookinglist, $id_member, $acc_name, $bank_asal, $bank_des, $jumlah, $paymentdate, $foto);
			
			$this->session->set_flashdata('info', "Konfirmasi terkirim!");
			redirect('bookingcontroll/my_order');
			}else{
				$data['error'] = $this->upload->display_errors();
			}

		
		
			$this->session->set_flashdata('info', "Ukuran Gambar terlalu besar");
			redirect('bookingcontroll/payment_confirmation/'.$id_bookinglist);

		
	}
	function ResizeUkuranFoto ($foto){
 		$config =array();
 		$config['image_library'] = 'gd2';
 		$config['source_image'] = './upload/token/' . $foto;
        $config['new_image'] = './upload/token/' . $foto;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 900;
        $config['height'] = 600;
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
 	}
}