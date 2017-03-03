<?php 

class membermodel extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		
	}
	public function login ($email){
		$this->load->database();
		$result = $this->db->query(" SELECT member.id_member, member.email, member.passwd from member WHERE member.email = '$email';");
			return $result; 

	}

	public function InsertRegister($nama, $email, $password, $birthday, $gender, $phone, $poss, $alamat){
		$this->load->database();
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'passwd' => $password,
			'tgl_lahir' => $birthday,
			'jenis_kelamin' => $gender,
			'nomor_telfon' => $phone,
			'alamat' => $alamat,
			'kode_pos' => $poss
			);
		$this->db->insert('member', $data);
	}
	public function cekEmail(){
		$this->load->database();
		$query = $this->db->query("SELECT * FROM MEMBER;");
		return $query;
	}
	public function getMember($id_member){
		$this->load->database();
		$query = $this->db->query("SELECT * FROM MEMBER WHERE id_member= '$id_member';");
		return $query;
	}
	public function setProfileNew($id_member, $passwd, $nomor_telfon, $alamat, $kode_pos, $nama){
		$this->load->database();
		if ($passwd== '') {
			$data = array(
			'nomor_telfon' => $nomor_telfon,
			'alamat' => $alamat,
			'nama' => $nama,
			'kode_pos' => $kode_pos );
		}else{
			$data = array('passwd' => $passwd,
			'nomor_telfon' => $nomor_telfon,
			'alamat' => $alamat,
			'nama' => $nama,
			'kode_pos' => $kode_pos );
		}
		
		$this->db->where('id_member', $id_member);
		$this->db->update('member', $data);
	}
	public function deleteMember($id_member){
		$this->load->database();
		$query = $this->db->query("DELETE FROM MEMBER WHERE id_member= '$id_member';");
	}

	public function listMember(){
		$this->load->database();
		$query = $this->db->query("SELECT * FROM MEMBER;");
		return $query;
	}
	public function setLastLogin($id_member){
		$this->load->database();
		$query = $this->db->query(" update MEMBER set last_login=now() WHERE id_member = '$id_member' ;");
		return $query;
	}
}