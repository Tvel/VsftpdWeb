<?php
class Mail_model extends CI_Model {

	public function __construct()
	{
		
		$this->load->database();
		parent::__construct();
	}
	

	public function get_settings($name) {
	
	$query = $this->db->get_where('settings', array('name' => $name));

	$query = $query->row_array(0);
	$query1 = $query['value'];
	return $query1;
	}

	public function get_mails() {
	
	$query = $this->db->query("SELECT DISTINCT email FROM mail; ");
	$query = $query->result_array();
	return $query;
	
	
	}
	
	public function get_users($mail) {
	
	$query = $this->db->query("SELECT username FROM accounts, mail WHERE accounts.id = mail.users_id AND mail.email = '$mail'; ");
	$query = $query->result_array();
	return $query;
	
	}
	
}

?>