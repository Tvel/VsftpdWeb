<?php
class Settings_model extends CI_Model {

	public function __construct()
	{
		$this->load->helper('url');
		$this->load->database();
		parent::__construct();
	}
	

	public function get_settings($id) {
	
	$query = $this->db->get_where('settings', array('id' => $id));

	$query = $query->row_array(0);
	$query1 = $query['value'];
	return $query1;
	}
	
	public function get_settings_def($id) {
	
	$query = $this->db->get_where('settings', array('id' => $id));

	$query = $query->row_array(0);
	$query1 = $query['defval'];
	return $query1;
	}



	public function change()
	{
	
			$temp = $this->input->post('site_url');
			$q="UPDATE settings SET value = '$temp' WHERE name = 'site_url'; " ;
			$this->db->query($q);
			
			$temp = $this->input->post('user_path');
			$q="UPDATE settings SET value = '$temp' WHERE name = 'user_path' ;";
			$this->db->query($q);
			
			$temp = $this->input->post('log_path');
			$q="UPDATE settings SET value = '$temp' WHERE name = 'log_path' ;";
			$this->db->query($q);
			
			$temp = $this->input->post('disk1');
			$q="UPDATE settings SET value = '$temp' WHERE name = 'disk1' ;";
			$this->db->query($q);
			$temp = $this->input->post('disk1n');
			$q="UPDATE settings SET defval = '$temp' WHERE name = 'disk1' ;";
			$this->db->query($q);
			
			$temp = $this->input->post('disk2');
			$q="UPDATE settings SET value = '$temp' WHERE name = 'disk2' ;";
			$this->db->query($q);
			$temp = $this->input->post('disk2n');
			$q="UPDATE settings SET defval = '$temp' WHERE name = 'disk2' ;";
			$this->db->query($q);
			
			$temp = $this->input->post('disk3');
			$q="UPDATE settings SET value = '$temp' WHERE name = 'disk3' ;";
			$this->db->query($q);
			$temp = $this->input->post('disk3n');
			$q="UPDATE settings SET defval = '$temp' WHERE name = 'disk3' ;";
			$this->db->query($q);
			
			
			

	}
	
	public function changepass()
	{
	
	$pass = $this->input->post('adminpass');
	$q="UPDATE settings SET value = PASSWORD('$pass') WHERE id = 1; " ;
	$this->db->query($q);
	}

}

?>