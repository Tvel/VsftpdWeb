<?php

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->check_isvalidated();
	}
	
	
	private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
		header('Location: /index.php/login/') ; 
           
        }
    }
	
	public function do_logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

	public function view($page = 'home')
	{
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
		// Whoops, we don't have a page for that!
		show_404();
		}
	
	if($page == 'logout') $this->do_logout();
	
	$data['title'] = ucfirst($page); // Capitalize the first letter
	
	$this->load->view('templates/header', $data);
	$this->load->view('pages/'.$page, $data);
	$this->load->view('templates/footer', $data);
	
	}
}


?>