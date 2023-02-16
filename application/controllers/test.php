<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if(is_null($this->session->userdata('user_data'))) {
			//redirect(site_url()."/login");
		}
		
		$this->load->library('csrf');
		$this->load->model('test_model');
    }
	
	public function index()
	{
			redirect(site_url()."/test/get_list_test");
	}
	public function get_list_test()
	{	

		$time = date('Y-m-d H:i:s');
		$data['list_test'] = $this->test_model->list_by_year();
		$id = $this->session->userdata('user_data');
		
		$data['page_title'] = 'Daftar Test';
		$data['css_arr'] = array('datatables.css');
		$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
		$data['id']= $this->session->userdata('user_data');
			
		$this->load->view('main/1head', $data);
		$this->load->view('main/2sidebar', $data);
		//$this->load->view('main/3topnavigation', $data);
		$this->load->view('list_test', $data);
		$this->load->view('main/5footer', $data);
		$this->load->view('main/6bottom', $data);
	
	}
		

	    function calc()
		{
		
	    $this->load->model('test_model');

		$data['list_test'] = $this->test_model->list_by_year();
		$data['hasilhitung'] = $this->test_model->calc();

		//ambil nilai form
		$data['ageofdeath_a'] = $this->input->post('ageofdeath_a');
		$data['yearofdeath_a']  = $this->input->post('yearofdeath_a');
		$data['ageofdeath_b'] = $this->input->post('ageofdeath_b');
		$data['yearofdeath_b']  = $this->input->post('yearofdeath_b');


		$data['page_title'] = 'Hasil Test';
		$data['css_arr'] = array('datatables.css');
		$data['js_arr'] = array('datatables/jquery.dataTables.min.js');
		$data['id']= $this->session->userdata('user_data');


		//beralih ke halaman GUI	
		$this->load->view('main/1head', $data);
		$this->load->view('main/2sidebar', $data);
		$this->load->view('list_test', $data);
		$this->load->view('main/5footer', $data);
		$this->load->view('main/6bottom', $data);
		
	    }

		
}

