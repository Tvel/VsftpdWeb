<?php
class Disk_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		parent::__construct();
	}
	
	
	public function get_space($disk) {
	
	$query = $this->db->get_where('settings', array('name' => $disk) );

	$query = $query->row_array(0);
	$query1['disk'] = $query['defval'];
	
	$bytes = disk_free_space($query['value']); 
    $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    $query1['space'] =  sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
	
	
	return $query1;
	}
	
	
}
	
	
?>