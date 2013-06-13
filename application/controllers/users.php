<?php
class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
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
		
		$data['users'] = $this->users_model->get_users();
		
		$data['title'] = 'FTP Users';
		$data['def_path'] = $this->users_model->get_path(4);
		
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('user', 'Username', 'required');
		$this->form_validation->set_rules('upass', 'Password', 'required');
		$this->form_validation->set_rules('repass', 'Password Confirmation', 'required');

		
		if ($this->form_validation->run() === FALSE)
	{
		$this->load->view('templates/header', $data);
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
		
	}
	else
	{
		$this->users_model->new_user();

		header( "Location: /index.php/users/" );
	}
		
	}

	
	public function delete($id)
	{
	$this->users_model->delete_user($id);
	$this->load->view('users/delete');
		
	}
	
	public function edit($slug)
	{
		$data['user_item'] = $this->users_model->get_users($slug);
		
		if (empty($data['user_item']))
		{
		show_404();
		}
		
	$data['disk1']  = $this->disk_model->get_space('disk1');
	$data['disk2']  = $this->disk_model->get_space('disk2');
	$data['disk3']  = $this->disk_model->get_space('disk3');
		
	$data['def_path'] = $this->users_model->get_path(4);
	$data['getdisk1'] = $this->users_model->get_path(6);
	$data['getdisk2'] = $this->users_model->get_path(7);
		
		
		$data['checkpath'] = "";
		if ($data['user_item']['path'] == 'none') $data['checked'] = 1;
		else{
			$find = strpos($data['user_item']['path'], $data['getdisk1']);
				if ($find !== false) 
				{ 
						$data['checked'] = 2;
						$data['checkpath'] = substr($data['user_item']['path'],strlen($data['getdisk1']));
				}

				$find = strpos($data['user_item']['path'], $data['getdisk2']);
				if ($find !== false) 
				{ 
						$data['checked'] = 3;
						$data['checkpath'] = substr($data['user_item']['path'],strlen($data['getdisk2']));
				}

		}

	$data['title'] = 'Edit User '.$data['user_item']['username'];

	$this->load->view('templates/header', $data);
	$this->load->view('users/edit', $data);
	$this->load->view('templates/footer');
	}
	
	
	public function create()
	{
	$this->load->helper('form');
	$this->load->library('form_validation');
	
	
	
	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('text', 'text', 'required');
	
	if ($this->form_validation->run() === FALSE)
	{
		$this->load->view('templates/header', $data);	
		$this->load->view('users/create');
		$this->load->view('templates/footer');
		
	}
	else
	{
		$this->news_model->set_news();
		$this->load->view('users/create');
		
	}
	
	}
	
	public function change()
	{
	
	
	
	$this->users_model->change();
	header( "Location: /index.php/users/" );
	
	}
	
	
		public function changepass()
	{

	$this->users_model->changepass();
	header( "Location: /index.php/users/" );
	
	}

	
	
	
	
	
	
}