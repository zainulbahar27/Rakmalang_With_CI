<?php 

class bookingmodel extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		
	}
	public function bookinglist($idbooking, $id_product, $qty, $subtotal){
		$this->load->database();
		$data = array('order_id_bookinglist' => $idbooking,
		'product_id_product' => $id_product,
		'jumlah' => $qty,
		'total' => $subtotal );
		$this->db->insert('booking_list', $data);
	}
	public function order($idbooking, $id_member, $batas_bayar, $tgl_ambil, $tgl_kembali, $status_order, $total){
		$this->load->database();
		$data = array(
			'id_bookinglist' => $idbooking,
			'member_id' => $id_member,
			'tgl_pemesanan' => $tgl_ambil,
			'tgl_pengembalian' => $tgl_kembali,
			'batas_pembayaran' => $batas_bayar,
			'status_order' => $status_order, 
			'total_pembayaran' => $total);
		$this->db->insert('order', $data);
	}
	public function idorder(){
		$this->load->database();
		$query = $this->db->query("SELECT id_bookinglist from  `order` order by id_bookinglist desc LIMIT 1 ;");
		return $query;
	}
	public function getbookinglist(){
		$this->load->database();
		$query = $this->db->query("SELECT booking_list.order_id_bookinglist, booking_list.product_id_product, booking_list.jumlah, product.nama_product FROM booking_list JOIN product ON product_id_product= id_product;");
		return $query;
	}
	public function intotal($idbooking, $total){
		$this->load->database();
		$data = array('total_pembayaran' => $total);
		$this->db->where('id_bookinglist', $idbooking);
		$this->db->update('order',$data);
	}

	public function getMyorder($id_member){
		$this->load->database();
		$query=$this->db->query("SELECT id_bookinglist, member_id, tgl_pemesanan, tgl_pengembalian, batas_pembayaran, status_order, total_pembayaran from `order` where member_id = $id_member order by id_bookinglist desc;");
		return $query;
		
	}

	public function confirmpayment($id_bookinglist, $idmember, $acc_name, $bank_asal, $bank_des, $jumlah, $paymentdate, $foto){
		$this->load->database();
		$data = array('order_id_bookinglist' => $id_bookinglist,
			'id_member' => $idmember,
			'nama_akun' => $acc_name,
			'bank_asal' => $bank_asal,
			'bank_destinasi' => $bank_des,
			'payment_date' => $paymentdate,
			'bukti_transfer' => $foto,
			'jumlah_transfer' => $jumlah
		 );
		$this->db->insert('payment', $data);
	}

	public function setStatus($id_bookinglist, $status){
		$this->load->database();
		$data = array('status_order' => $status);
		$this->db->where('id_bookinglist', $id_bookinglist);
		$this->db->update('order', $data);
	}
	public function allorder(){
		$this->load->database();
		$result = $this->db->query("select payment.id_payment, payment.id_member, payment.nama_akun,payment.order_id_bookinglist,
  				payment.payment_date, payment.bukti_transfer, payment.jumlah_transfer, `order`.batas_pembayaran,
   				`order`.status_order FROM  `order` RIGHT JOIN payment ON id_bookinglist = order_id_bookinglist;");
		return $result;
	}
	


}