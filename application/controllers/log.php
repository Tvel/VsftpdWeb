<?php
class Log extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('disk_model');
		$this->load->model('log_model');
		$this->check_isvalidated();
		$this->disk_space();
	}
	
	public function disk_space() {
	
	
	}
	
	private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }

	public function index()
	{
		$data['disk1']  = $this->disk_model->get_space('disk1');
		$data['disk2']  = $this->disk_model->get_space('disk2');
		$data['disk3']  = $this->disk_model->get_space('disk3');
		
		$data['log_path'] = $this->log_model->get_settings(8);
		
		$data['title'] = 'FTP LOG';
		
		$this->load->view('templates/header', $data);
		$this->load->view('log/index', $data);
		$this->load->view('templates/footer');
		
	}

	
	

	
	
	
	
	
	
}