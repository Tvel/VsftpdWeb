<?php
class Log_model extends CI_Model {

	public function __construct()
	{
		
		$this->load->database();
		parent::__construct();
	}
	

	public function get_settings($id) {
	
	$query = $this->db->get_where('settings', array('id' => $id));

	$query = $query->row_array(0);
	$query1 = $query['value'];
	return $query1;
	}

}

?>