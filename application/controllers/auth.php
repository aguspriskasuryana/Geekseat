<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        
		
		$this->load->library('csrf');
		$this->load->model('account_model');
    }
	public function index()
	{
		$this->load->view('login_page');
	}
	
	public function login()
	{
		if(!$this->input->post()) {
			$this->load->view('login_page');
		}
		else {
			
			$user_data = $this->account_model->login($this->input->post('username'), "xx-".$this->input->post('pwd')."-xx");
			if(!empty($user_data)) {
				unset($user_data['password']);
				//var_dump($user_data);
				$this->session->set_userdata('user_data', $user_data);
				$alerts[] = array('message', 'Hai '.$user_data['username'].', Welcome back!');
				$this->session->set_flashdata('alerts', $alerts);
				if($this->input->get('dst')) {
					redirect(rawurldecode($this->input->get('dst')));
				}
				$this->account_model->login_log("1");
				redirect('test');
			} else {
				$alerts[] = array('error', '<font color=red>Username dan Password tidak cocok</font>');
				$this->session->set_flashdata('alerts', $alerts);
				if($this->input->get('dst')) {
					redirect('auth/login?dst='.$this->input->get('dst'));
				}
				else {
					redirect('auth/login');
				}
			}
			
		}
		
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	
	public function check_sess_ajax()
	{
		if($this->session->userdata('user_data')) {
			echo json_encode(true);
		}
		else {
			echo json_encode(false);
		}
	}
	
	public function cek_login(){
		echo json_encode(false);
	}
	
	
	
}

/* End of file mater_perencana.php */
/* Location: ./application/controllers/master/master_perencana.php */