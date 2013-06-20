<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller{
    
    function __construct(){
        parent::__construct();
		$this->load->model('mail_model');
    }
    
    public function index(){
       
	   $data['log_path'] = $this->mail_model->get_settings('log_path');
	   
	   $data['mail_server'] = $this->mail_model->get_settings('mail_server');
	   $data['mail_port'] = $this->mail_model->get_settings('mail_port');
	   $data['mail_user'] = $this->mail_model->get_settings('mail_user');
	   $data['mail_password'] = $this->mail_model->get_settings('mail_password');
	   $data['mail_from'] = $this->mail_model->get_settings('mail_from');
	   
		$theday = date("j")-1 ;
		$yesterday = date("D M ").$theday;
		$yesterday_short = date("D M  ").$theday ;
	   
	   
	   
	   foreach ( $this->mail_model->get_mails() as $mail)
	   {
	   
		// $myfile should be log file path
		$myfile = $data['log_path'];
		//exec("tac $myfile /var/www/ftp/temp.txt");
		$ic = 0;
		$ic_max = 200;  // stops after this number of rows
		$handle = popen( "tac $myfile " , "r");
	   
		$data['users'] = $this->mail_model->get_users($mail['email']);
	   
		$data['load'] = "";
		$count_log = 0;	
	   
	   
					
        $config = array(
         'protocol' => 'mail',
         'smtp_host' => $data['mail_server'],
         'smtp_port' => $data['mail_port'],
         'smtp_user' => $data['mail_user'],
         'smtp_pass' => $data['mail_password'],
         'mailtype' =>'html'
          );
         $this->load->library('email', $config);
         $this->email->set_newline("\r\n");

         $this->email->from($data['mail_user'], $data['mail_from']);
         $this->email->to($mail['email']);   
         $this->email->subject(exec('hostname -f').' FTP Report');
				
				
	
				
				
			while (!feof($handle) && ++$ic<=$ic_max) {
			$buffer = fgets($handle, 4096);
		
		
		
		
				//size
			$size_log = strstr($buffer, "/", true);
			$pos_log = strrpos($size_log, ".")+ 1;
		
			$size_log = substr($size_log,$pos_log);
			$size_log = strstr($size_log, " ");
		
				$si_prefix_log = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
				$base_log = 1024;
				$class_log = min((int)log((int)$size_log , $base_log) , count($si_prefix_log) - 1);
				$msize_log= sprintf('%1.2f' , $size_log / pow($base_log,$class_log)) . ' ' . $si_prefix_log[$class_log];
				//
		
				//name
			$name_log = strstr($buffer, "/");
			$name_log = strstr($name_log, " _ ", true);
			$name_log = substr($name_log,0,-1);
				//

				//state and user
			$state_log = strstr($buffer, " _ ");
			$user_log = $state_log;
			$state_log = strstr($state_log, "g", true);
			$state_log = substr($state_log,3, -1);
			if ($state_log == 'i') $state_log = 'Uploaded';
			else if ($state_log == 'o') $state_log = 'Downloaded';
		
			$user_log = strstr($user_log, "g");
			$user_log = strstr($user_log, "ftp", true);
			$user_log = substr($user_log,2, -1);
			//b _ i
	
			$info_log = strstr($buffer, $size_log, true);
		
		
			
			if ( strstr($info_log, $yesterday) || strstr($info_log, $yesterday_short) ) 
				{
			
				foreach( $data['users'] as $user) 
					{ 
					if ($user['username'] == $user_log) 
						{
		
		
						$data['load'] = $data['load']."<tr>".
						"<td>".$info_log."</td>".
						"<td>".$msize_log."</td>".
						"<td>".$state_log."</td>".
						"<td>".$user_log."</td>".
						"<td>".$name_log."</td>".
						"</tr>";
						$count_log++;
				
						}
					}
				}
		}
		
				
				
				
				
				
				if ($count_log != 0 ) {
						$this->email->message($this->load->view('email/mail', $data, true));
						echo "load passed $yesterday for ".$mail['email']." </br>";
			  
						if (!$this->email->send())
						show_error($this->email->print_debugger());
				  }
				else {
				echo "no activity form $yesterday for ".$mail['email']." </br>";
				}
		pclose($handle);
		}
		
		
		
		
		
    }
	
	 
}
?>