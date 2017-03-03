<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function index(){
		
	
	}
	 

	function new_categories()
	{
		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('new_categories');
		$this->load->view('js-admin');
	}
	function add_new_product()
	{
		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('add_new_product');
		$this->load->view('js-admin');
	}
	
	function orders()
	{
		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('orders');
		$this->load->view('js-admin');
	}
	function member()
	{
		$this->load->view('head-admin');
		$this->load->view('navbar-admin');
		$this->load->view('member');
		$this->load->view('js-admin');
	}
	
}
