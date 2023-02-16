<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(is_null($this->session->userdata('user_data'))) {
			redirect(site_url()."/login");
		}
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('csrf');
		$this->load->model('user_model');
		$this->load->model('role_model');


    }
	
	public function index()
	{
			redirect(site_url()."/user/get_list_user");
	}
	public function get_list_user()
	{	
		$time = date('Y-m-d H:i:s');
		//var_dump($time);

		$data['list_user'] = $this->user_model->get_all_user_complete();
		$id = $this->session->userdata('user_data');
		
		$data['page_title'] = 'Daftar User';
		$data['css_arr'] = array('datatables.css');
		$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
		$data['id']= $this->session->userdata('user_data');
			
		$this->load->view('main/1head', $data);
		$this->load->view('main/2sidebar', $data);
		$detect = new Mobile_Detect();		
    			if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
					$this->load->view('main/3topnavigation', $data);
				} 
		$this->load->view('list_user', $data);
		$this->load->view('main/5footer', $data);
		$this->load->view('main/6bottom', $data);
	
	}

	public function get_log_user()
	{	
		$time = date('Y-m-d H:i:s');
		//var_dump($time);

		$data['list_log_user'] = $this->user_model->get_log_user();
		$id = $this->session->userdata('user_data');
		
		$data['page_title'] = 'Daftar User Log';
		$data['css_arr'] = array('datatables.css');
		$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
		$data['id']= $this->session->userdata('user_data');
			
		$this->load->view('main/1head', $data);
		$this->load->view('main/2sidebar', $data);
		$detect = new Mobile_Detect();		
    			if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
					$this->load->view('main/3topnavigation', $data);
				} 
		$this->load->view('list_log_user', $data);
		$this->load->view('main/5footer', $data);
		$this->load->view('main/6bottom', $data);
	
	}
	
	function tambah_user()
	{
		
		$data['page_title'] = 'Form Tambah User';
		$data['css_arr'] = array(
			'fuelux.css',
			'select2.css',
			'datepicker.css',
			'rab.css',
			'fileinput.css',
			'dropzone.css',
			'jquery-ui-autocomplete.css'
		);
		$data['js_arr'] = array(
			'parsley/parsley.min.js',
			'parsley/parsley.extend.js',
			'select2/select2.min.js',
			'datepicker/bootstrap-datepicker.js',
			'fileinput.min.js',
			'dropzone.min.js',
			'jquery-ui-autocomplete.js'
		);
		//if(!$this->input->post()) {
			//$data['team'] = $this->user_model->get_all_team();
			$data['role'] = $this->user_model->get_all_role();
			$data['id']= $this->session->userdata('user_data');
			//var_dump($data['team']);
			
			$this->load->view('main/1head', $data);
			$this->load->view('main/2sidebar', $data);
			$detect = new Mobile_Detect();
    			if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
					$this->load->view('main/3topnavigation', $data);
				} 
			$this->load->view('form_tambah_user', $data);
			$this->load->view('main/5footer', $data);
			$this->load->view('main/6bottom', $data);
			
	}
		
		function edit_user($id_user)
	    {
		
	        $data['page_title'] = 'Form edit User';
	        $this->load->model('user_model');

	        $data['query']= $this->user_model->get($id_user);
	        $data['id']= $this->session->userdata('user_data');
	        //$this->load->helper('tanggal');

	
			$this->load->view('main/1head', $data);
			$this->load->view('main/2sidebar', $data);
			$detect = new Mobile_Detect();
    			if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
					$this->load->view('main/3topnavigation', $data);
				} 
			$this->load->view('form_edit_user', $data);
			$this->load->view('main/5footer', $data);
			$this->load->view('main/6bottom', $data);

		
	    }

	    function edit_user_detail($id_user)
	    {
		

			$id = $this->session->userdata('user_data');
			$data['role'] = $this->role_model->get_all_role();
	        $data['page_title'] = 'Form edit User';
	        $this->load->model('user_model');

	        $data['query']=  $this->user_model->get($id_user);
	        //$this->load->helper('tanggal');
			$data['id']= $this->session->userdata('user_data');
	        
	        $this->load->view('main/1head', $data);
			$this->load->view('main/2sidebar', $data);
			$detect = new Mobile_Detect();
    			if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
					$this->load->view('main/3topnavigation', $data);
				} 
			$this->load->view('form_edit_user_detail', $data);
			$this->load->view('main/5footer', $data);
			$this->load->view('main/6bottom', $data);
		
	    }
		
		function aksi_upload(){
		$id = $this->session->userdata('user_data');

		
		$img = "./images/".$id['id_user'];
		//var_dump($img);
		if (file_exists($img.".jpg")) {
        	unlink($img.".jpg");
    	}
    	if (file_exists($img.".png")) {
        	unlink($img.".png");
    	}
    	if (file_exists($img.".gif")) {
        	unlink($img.".gif");
    	}
		$config['upload_path']          = './images/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 7224;
		$config['max_height']           = 4268;
		$config['file_name']            = $id['id_user'];
 
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data(); 
			$file_name = $upload_data['file_name'];
	        $this->user_model->update_data_detail_photos($id['id_user'],$file_name);
			//$this->load->view('v_upload_sukses', $data);
		}

			
			$data['role'] = $this->role_model->get_all_role();
	        $data['page_title'] = 'Form edit User';
	        $this->load->model('user_model');

	        $data['query']= $this->user_model->get($id['id_user']);

	        $user_data = $this->user_model->get($id['id_user']);
			$this->session->set_userdata('user_data', $user_data);
	        
	        $data['id']= $this->session->userdata('user_data');
	        
			$this->load->view('main/1head', $data);
			$this->load->view('main/2sidebar', $data);
			$detect = new Mobile_Detect();
    			if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
					$this->load->view('main/3topnavigation', $data);
				} 
			$this->load->view('form_edit_user_detail', $data);
		    $this->load->view('main/5footer', $data);
			$this->load->view('main/6bottom', $data);

	}

		function simpan_data()
		{
		
	        $this->load->model('user_model');
			$username = $this->user_model->cek_username($this->input->post('nama_user'));
			if($username){
			//$data['notifikasi']='Username sudah digunakan, coba username lain!';
			}else{
	        $this->user_model->simpan_data();
			}
	        //$data['notifikasi']='Data Berhasil Disimpan';
	       // $data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/user");
	        //$this->load->view('input/tambah',$data);
		
	    }
	    function update_data()
		{
		
	        $this->load->model('user_model');
	        $this->user_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/user");
	        //$this->load->view('input/tambah',$data);
		
	     }

	      function update_data_detail_password()
		{
		
	        $this->load->model('user_model');
	        $this->user_model->update_data();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        redirect(site_url()."/user/update_data_detail");
	        //$this->load->view('input/tambah',$data);
		
	     }

	     function update_data_detail()
		{
		
	        $this->load->model('user_model');
	        $this->user_model->update_data_detail();
	        $alerts[] = array('message', 'Data berhasil disimpan!');
			$this->session->set_flashdata('alerts', $alerts);
	        //$data['judul']='Insert Data Berhasil';
	        //redirect(site_url()."/user/update_data_detail");
	        //$this->load->view('input/tambah',$data);
	        $id = $this->session->userdata('user_data');
			$data['role'] = $this->role_model->get_all_role();
	        $data['page_title'] = 'Form edit User';
	        $this->load->model('user_model');

	        $data['query']=  $this->user_model->get($id['id_user']);
	        redirect(site_url()."/user");
	     }
		 
	    function hapus($id_user)
        {
			$this->user_model->hapus($id_user);			
			//$data['notifikasi']='Data Berhasil Disimpan';
			//$data['judul']='Insert Data Berhasil';
			redirect(site_url()."/user");
        }
		
		function cek_username(){
			$data = $this->user_model->cek_username($this->input->get('username'));
			echo json_encode($data);
		}
		
		
}

