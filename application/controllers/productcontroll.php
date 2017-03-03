<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class productcontroll extends CI_Controller {
 public function __construct(){
		parent::__construct();
		$this->load->model('ProductModel');
		$this->load->library('cart');
		$this->load->library('upload');
		$this->load->library('image_lib');
		
	}
public function ResizeUkuranFoto ($foto){
 		$config =array();
 		$config['image_library'] = 'gd2';
 		$config['source_image'] = './upload/produk/' . $foto;
        $config['new_image'] = './upload/produk/' . $foto;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 900;
        $config['height'] = 600;
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
 	}
 function new_categories(){
 		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('new_categories');
		$this->load->view('js-admin');
 }
 function submit_kategori(){
 	$nama_kategori= $this->input->post('nama_kategori');
 	$deskripsi = $this->input->post('deskripsi');
 	$this->ProductModel->setNewKategori($nama_kategori, $deskripsi);
 	redirect('productcontroll/new_categories');
 }
 function existing_product(){
 		$data['product']= $this->ProductModel->getProductList();
 		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('existing_product', $data);
		$this->load->view('js-admin');
 }
  function existing_kategori(){
 		$data['kategori']= $this->ProductModel->getKategoriList();
 		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('existing_ketegori', $data);
		$this->load->view('js-admin');
 }
function addnewproduct()
	{ 
		$config['image_library'] = 'gd2';
		$config['upload_path'] = 'upload/product/';
		$config['allowed_types']='gif|jpeg|png|jpg';
		$config['max_size']= 2000;
		$config['max_height']= 2000;
		$config['encrypt_name']= TRUE;
		// $resizefoto = new ClassPendukung();

		$this->upload->initialize($config);

			if ($this->upload->do_upload('gambar_product')) {
				$dok =$this->upload->data();
				$this->ResizeUkuranFoto($dok['file_name']);
			$foto = $dok['file_name'];
			$kategori =$this->input->post('id_kategori');
			$nama_product=$this->input->post('nama_product');
			$input_deskripsi=$this->input->post('deskripsi');
			$input_stok=$this->input->post('jumlah_stok');
			$input_harga= $this->input->post('harga_product');
			
			$url_title = url_title($nama_product);

			$this->ProductModel->setNewProduct($url_title, $kategori ,$foto , $input_stok, $input_deskripsi, $input_harga);
			$this->session->set_flashdata('info', "product berhasil di Publish");
			redirect('productcontroll/existing_product');
			}else{
				$data['error'] = $this->upload->display_errors();
			}

		$data['error'] = $this->upload->display_errors();
		$data['kategori'] = $this->ProductModel->getKategoriProduct();
		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('add_new_product', $data);
		$this->load->view('js-admin');
	}
function newproduct()
	{	
		$data['error'] = "";
		$data['kategori'] = $this->ProductModel->getKategoriProduct();
		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('add_new_product', $data);
		$this->load->view('js-admin');
	}

function edit_product()
	{
		$id_product= $this->input->get('id_product');
		$product= $this->ProductModel->getProduct($id_product);
		$data['product']=$product;
		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('edit_product', $data);
		$this->load->view('js-admin');
	}
function save_edit_product(){
		$config['image_library'] = 'gd2';
		$config['upload_path'] = 'upload/product/';
		$config['allowed_types']='gif|jpeg|png|jpg';
		$config['max_size']= 2000;
		$config['max_height']= 2000;
		$config['encrypt_name']= TRUE;
		// $resizefoto = new ClassPendukung();
		$id_product = $this->input->post('id_product');
		$this->upload->initialize($config);

		if ($this->upload->do_upload('gambar')) {
			//unlink gambar
			$query = $this->ProductModel->getProduct($id_product)->row();						
			if ($query->gambar != "" || $query->gambar != NULL ){
				if(file_exists('./upload/product/' . $query->gambar)) {
					$do = unlink('./upload/product/'. $query->gambar); //menghapus gambar semula di folder
				}
			}
			$dok =$this->upload->data();
			$this->ResizeUkuranFoto($dok['file_name']);
			$foto = $dok['file_name'];
			$input_nama_product = $this->input->post('nama_product');
			$input_deskripsi = $this->input->post('deskripsi');
			$input_stok=$this->input->post('jumlah_stok');
			$input_harga= $this->input->post('harga_product');
			$ganti = array("'");
			$oleh = "&#039;";
			$nama_product= str_replace($ganti, $oleh, $input_nama_product);
			$url_title = url_title($nama_product);

			$this->ProductModel->setEditProduct($id_product, $url_title ,$input_harga , $foto, $input_stok, $input_deskripsi);
			$this->session->set_flashdata('info', "product berhasil di perbarui");
			redirect('productcontroll/existing_product');
			}else{
				$input_nama_product = $this->input->post('nama_product');
				$input_deskripsi = $this->input->post('deskripsi');
				$input_stok=$this->input->post('jumlah_stok');
				$input_harga= $this->input->post('harga_product');
				$ganti = array("'");
				$oleh = "&#039;";
				$nama_product= str_replace($ganti, $oleh, $input_nama_product);
				$url_title = url_title($nama_product);

				$this->ProductModel->setEditProductNo($id_product, $url_title ,$input_harga , $input_stok, $input_deskripsi);
				$this->session->set_flashdata('info', "product berhasil di perbarui");
				redirect('productcontroll/existing_product');
			}

		$data['error'] = $this->upload->display_errors();
		$data['product'] = $this->ProductModel->getProduct($id_product);
		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('edit_product', $data);
		$this->load->view('js-admin');

}
function hapus_product($id_product)
	{
		//unlink gambar
			$query = $this->ProductModel->getProduct($id_product)->row();						
			if ($query->gambar != "" || $query->gambar != NULL ){
				if(file_exists('./upload/product/' . $query->gambar)) {
					$do = unlink('./upload/product/'. $query->gambar); //menghapus gambar semula di folder
				}
			}
		$this->ProductModel->setHapusProduct($id_product);
		 $this->session->set_flashdata('info', "Produk telah berhasil dihapus.");
		 redirect('productcontroll/existing_product');
	} 

	function melihatDaftarAlatKemah(){
		$session_data = $this->session->userdata('logged_in');
		$data['id_member']= $session_data['id_member'];
		$data['kategori']= $this->ProductModel->getKategoriProduct();
		$data['product']= $this->ProductModel->getProductList();
		
		$this->load->view('head');
		$this->load->view('navbar', $data);
		$this->load->view('home_visitor', $data);
		$this->load->view('footer');
		$this->load->view('js');

		
	}
	function kategori($id_kategori){
		$session_data = $this->session->userdata('logged_in');
		$data['id_member']= $session_data['id_member'];
		$id_member= $data['id_member'];
		$data['kategori']= $this->ProductModel->getKategoriProduct();
		$data['product']= $this->ProductModel->getProductKategori($id_kategori);
		
		$this->load->view('head');
		$this->load->view('navbar', $data);
		$this->load->view('kategori', $data);
		$this->load->view('footer');
		$this->load->view('js');
	}
	function search(){
		$session_data = $this->session->userdata('logged_in');
		$data['id_member']= $session_data['id_member'];
		$id_member= $data['id_member'];
		$data['kategori']= $this->ProductModel->getKategoriProduct();
		$key= $this->input->get('search');
		$query =$this->ProductModel->getSearch($key)->row();
		$data['product']= $this->ProductModel->getSearch($key);
		$data['key'] = $key;
		
		$this->load->view('head');
		$this->load->view('navbar', $data);
		$this->load->view('result', $data);
		$this->load->view('footer');
		$this->load->view('js');
	}

}
