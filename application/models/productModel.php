<?php 

class ProductModel extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		
	}
	public function setNewProduct($nama_produk, $id_kategori, $foto, $stok, $deskripsi, $harga){
		$this->load->database();
		$data = array(
            'id_kategori'      => $id_kategori,
            'nama_product'         => $nama_produk,
            'gambar'         => $foto,
            'stok'         => $stok,
            'deskripsi'         => $deskripsi,
            'harga_sewa'         => $harga
        );
        $this->db->insert('product', $data);
		}
	public function setNewKategori($nama_kategori, $deskripsi){
		$this->load->database();
		$data = array('nama_kategori' => $nama_kategori,
		'deskripsi' => $deskripsi  );
		$this->db->insert('kategori', $data);
	}
	public function getKategoriProduct(){
		$this->load->database();
		$this->db->select('id_kategori,nama_kategori');
		$this->db->from('kategori');
		$query=$this->db->get();
		$result=$query->result();

		return $result;
	}
	public function getProductList(){
		$this->load->database();
		$query= $this->db->query("SELECT product.id_product, product.nama_product, kategori.nama_kategori, product.gambar, product.harga_sewa, product.stok, product.deskripsi 
  		FROM product INNER JOIN kategori ON kategori.id_kategori= product.id_kategori;");
		return $query;	
	}
	public function getKategoriList(){
		$this->load->database();
		$query= $this->db->query("SELECT * from kategori;");
		return $query;

	}
	public function getProductKategori($id_kategori){
		$this->load->database();
		$query = $this->db->query("SELECT product.id_product, product.nama_product, kategori.nama_kategori, product.gambar, product.harga_sewa, product.stok, product.deskripsi 
  		FROM product INNER JOIN kategori ON kategori.id_kategori= product.id_kategori where product.id_kategori= $id_kategori");
		return $query;
	}

	public function getProduct($id_product){
		$this->load->database();
		$query = $this->db->query("SELECT product.id_product, product.nama_product, product.id_kategori, kategori.nama_kategori, product.gambar, product.harga_sewa, product.stok, product.deskripsi 
  		FROM product INNER JOIN kategori ON kategori.id_kategori= product.id_kategori WHERE product.id_product= $id_product ;");
		return $query;
	}
	public function setEditProduct($id_product, $nama_product, $harga, $gambar, $stok, $deskripsi){
		$this->load->database();
		$data = array('nama_product' => $nama_product,
		'harga_sewa' => $harga,
		'deskripsi' => $deskripsi ,
		'stok' => $stok,
		'gambar' => $gambar );
		$this->db->where('id_product',$id_product);
		$this->db->update('product',$data);
	}
	public function setEditProductNo($id_product, $nama_product, $harga, $stok, $deskripsi){
		$this->load->database();
		$data = array('nama_product' => $nama_product,
		'harga_sewa' => $harga,
		'deskripsi' => $deskripsi ,
		'stok' => $stok);
		$this->db->where('id_product',$id_product);
		$this->db->update('product',$data);
	}
	public function setHapusProduct($id_product){
		$this->load->database();
		$this->db->where('id_product',$id_product);
		$this->db->delete('product');
	}
	public function getSearch($key){
		$this->load->database();
		$query = $this->db->query("SELECT product.id_product, product.nama_product, product.id_kategori, kategori.nama_kategori, product.gambar, product.harga_sewa, product.stok, product.deskripsi 
  		FROM product INNER JOIN kategori ON kategori.id_kategori= product.id_kategori WHERE nama_product LIKE '%$key%' ;");
		return $query;
	}
	public function minstok($id_product, $stok){
		$this->load->database();
		$data = array('stok' => $stok);
		$this->db->where('id_product',$id_product);
		$this->db->update('product',$data);

	}
}
