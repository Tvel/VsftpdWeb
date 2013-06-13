<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct(){
		$this->load->database();
        parent::__construct();
    }
    
    public function validate(){
        // grab user input
       // $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Prep the query
		//if ($username != 'admin') return false;
        
        
        
        // Run the query
        $query = $this->db->query("select * from settings where name = 'admin' AND value = password('".$password."')");
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
			
            $data = array(
                    'username' => $row->name,
				    
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
			
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}
?>