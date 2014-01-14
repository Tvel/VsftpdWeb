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
		
		
	$data['site_url'] = $this->settings_model->get_settings('site_url');
	$data['def_path'] = $this->settings_model->get_settings('user_path');
	$data['getdisk1'] = $this->settings_model->get_settings('disk1');
	$data['getdisk2'] = $this->settings_model->get_settings('disk2');
	$data['getdisk3'] = $this->settings_model->get_settings('disk3');
	$data['log_path'] = $this->settings_model->get_settings('log_path');
	$data['def_path_def'] = $this->settings_model->get_settings_def('user_path');
	$data['getdisk1_def'] = $this->settings_model->get_settings_def('disk1');
	$data['getdisk2_def'] = $this->settings_model->get_settings_def('disk2');
	$data['getdisk3_def'] = $this->settings_model->get_settings_def('disk3');
		
	$data['mail_server'] = $this->settings_model->get_settings('mail_server');
	$data['mail_port'] = $this->settings_model->get_settings('mail_port');
	$data['mail_user'] = $this->settings_model->get_settings('mail_user');
	$data['mail_password'] = $this->settings_model->get_settings('mail_password');
	$data['mail_from'] = $this->settings_model->get_settings('mail_from');	
		

	
		$this->load->view('templates/header', $data);
		$this->load->view('settings/index', $data);
		$this->load->view('templates/footer');

		
	}
	
	public function change()
	{
	
		
	$this->settings_model->change();

	header( "Location: ".base_url()."index.php/settings" );
		
	}
	public function changepass()
	{
	
	
	
	$this->form_validation->set_rules('adminpass', 'Password', 'matches[repass]|min_length[4]');
	
		
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
		header( "Location: ".base_url()."index.php/settings" );
		}
	
	}

	
	
	
	
	
	
}
