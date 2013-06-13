<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    public function index(){
        // Load our view to be displayed
        // to the user
        $this->load->view('login_view');
    }
	
	 public function process(){
		$msg = "";
        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid password.</font><br />';
            $this->index($msg);
        }else{
            // If user did validate, 
            // Send them to members area
			header('Location: /index.php') ;
			
        }        
    }
}
?>