<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingControll extends CI_Controller {
	public function  __construct(){
		parent:: __construct();
		$this->load->model('bookingmodel');
		$this->load->model('ProductModel');
		$this->load->library('cart');
		error_reporting(0);
	}

	

	function addtobookinglistcart($id_product){
		
		$get = $this->ProductModel->getProduct($id_product)->row();
		$all =$this->ProductModel->getProductList();
		$data['products'] = array(
	        array(
	                'id'      => $get->id_product,
	                'qty'     => 1,
	                'price'   => $get->harga_sewa,
	                'name'    => $get->nama_product
	        )
		);
		$this->cart->insert($data['products']);
		redirect('productcontroll/melihatdaftaralatkemah');

		
	}
	function bookinglist(){
		$session_data = $this->session->userdata('logged_in');
		$data['id_member']= $session_data['id_member'];
		$id_member= $data['id_member'];
		$data['kategori']= $this->ProductModel->getKategoriProduct();
		$data['product']= $this->ProductModel->getProductList();


		$this->load->view('head');
		$this->load->view('navbar',$data);
		$this->load->view('booking_list', $data);
		$this->load->view('footer');
		$this->load->view('js');
	}
	function updatebookinglist(){
		$rowid = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		$update = array(
			'rowid' => $rowid,
			'qty' => $qty );
		$this->cart->update($update);

		redirect('BookingControll/bookinglist');

	}
	function bookingconfirm(){
		$session_data = $this->session->userdata('logged_in');
		$data['id_member']= $session_data['id_member'];
		$id_member= $data['id_member'];
		$data['kategori']= $this->ProductModel->getKategoriProduct();
		$data['product']= $this->ProductModel->getProductList();

		$this->load->view('head');
		$this->load->view('navbar',$data);
		$this->load->view('booking_confirm', $data);
		$this->load->view('footer');
		$this->load->view('js');
	}
	function bookingAlat(){

		$session_data = $this->session->userdata('logged_in');
		$long_rent= $this->input->post('long_rent');
		$long_rent= $long_rent;
		
		$tgl_ambil= $this->input->post('tgl_ambil');
		$tgl_ambil = date("Y/m/d", strtotime($tgl_ambil));

		$tgl_kembali = $this->input->post('tgl_kembali');
		$tgl_kembali = date("Y/m/d", strtotime($tgl_kembali));
		$id_member = $session_data['id_member'];
		$total=0;
		$query = $this->bookingmodel->idorder()->row();
		$idorder =$query->id_bookinglist;
		$idorder++;
		$selisih = ((abs(strtotime ($tgl_kembali) - strtotime ($tgl_ambil)))/(24*60*60));
		echo $selisih;
	
			$status= "Pending";

			$batas_bayar = date('Y-m-d', strtotime('-1 days', strtotime($tgl_ambil))); //operasi penjumlahan tanggal sebanyak 6 hari
			
			
			$this->bookingmodel->order($idorder, $id_member, $batas_bayar, $tgl_ambil, $tgl_kembali, $status, $total);

			
			foreach ($this->cart->contents() as $row) {
			 	$total = $total + $row['subtotal'];
			 	$min= $row['qty'];
			 	$id= $row['id'] ;
			 	$this->bookingmodel->bookinglist($idorder, $row['id'], $row['qty'], $row['subtotal']);
			 	$product = $this->ProductModel->getProduct($row['id']);
				foreach ($product->result() as $row) {
				 	$jumlah = $row->stok;
				 	
				 	$new = $jumlah - $min;
				 	$this->ProductModel->minstok($id, $new);

				 }
			 }
			 $total = $total * $selisih;
			 $this->bookingmodel->intotal($idorder, $total);
			 $this->cart->destroy();
			 redirect('BookingControll/my_order');

		

	}
	 function my_order()
	{
		
		$session_data = $this->session->userdata('logged_in');
		$data['id_member']= $session_data['id_member'];
		$id_member= $data['id_member'];
		$session_data = $this->session->userdata('logged_in');
		$data['kategori']= $this->ProductModel->getKategoriProduct();
		$id_member = $session_data['id_member'];
		$data['order']= $this->bookingmodel->getMyorder($id_member);
		$this->load->view('head');
		$this->load->view('navbar', $data);
		$this->load->view('my_order', $data);
		$this->load->view('footer');
		$this->load->view('js');

	}
	function payment_confirmation($id_bookinglist)
	{
		$session_data = $this->session->userdata('logged_in');
		$data['id_member']= $session_data['id_member'];
		$id_member= $data['id_member'];
		$session_data = $this->session->userdata('logged_in');
		$data['kategori']= $this->ProductModel->getKategoriProduct();
		$id_member = $session_data['id_member'];
		$data['id_bookinglist']= $id_bookinglist;
		$data['id_member']= $id_member;
		$this->load->view('head');
		$this->load->view('navbar', $data);
		$this->load->view('payment_confirmation',$data);
		$this->load->view('footer');
		$this->load->view('js');
	}
	
}