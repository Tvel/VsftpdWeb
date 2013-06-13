<?php
class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('settings_model');
		$this->load->model('disk_model');
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
		
		//$data['users'] = $this->users_model->get_users();
		
		$data['title'] = 'FTP Settings';
		
		
	$data['site_url'] = $this->settings_model->get_settings(3);
	$data['def_path'] = $this->settings_model->get_settings(4);
	$data['getdisk1'] = $this->settings_model->get_settings(5);
	$data['getdisk2'] = $this->settings_model->get_settings(6);
	$data['getdisk3'] = $this->settings_model->get_settings(7);
	$data['log_path'] = $this->settings_model->get_settings(8);
	$data['def_path_def'] = $this->settings_model->get_settings_def(4);
	$data['getdisk1_def'] = $this->settings_model->get_settings_def(5);
	$data['getdisk2_def'] = $this->settings_model->get_settings_def(6);
	$data['getdisk3_def'] = $this->settings_model->get_settings_def(7);
		

	
		$this->load->view('templates/header', $data);
		$this->load->view('settings/index', $data);
		$this->load->view('templates/footer');

		
	}
	
	public function change()
	{
	
		
	$this->settings_model->change();

	header( "Location: /index.php/settings/" );
		
	}
	public function changepass()
	{
	
	
	
	$this->form_validation->set_rules('adminpass', 'Password', 'matches[repass]');
	
		
	if ($this->form_validation->run() == false)
		{
		
			$data['disk1']  = $this->disk_model->get_space('disk1');
			$data['disk2']  = $this->disk_model->get_space('disk2');
			$data['disk3']  = $this->disk_model->get_space('disk3');
		
			$this->load->view('templates/header', $data);
			$this->load->view('settings/error');
			$this->load->view('templates/footer');
		}
	else if ($this->form_validation->run() == true) {	
		$this->settings_model->changepass();
		header( "Location: /index.php/settings/" );
		}
	
	}

	
	
	
	
	
	
}