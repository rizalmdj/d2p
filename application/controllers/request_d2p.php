<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_d2p extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model(array('web_model','requestd2p_model'));
	}


// VIEW LIST REQUEST D2P

	public function request_d2p_list (){
		$data['page']		= "l_request_d2p";	
		$data['request'] = $this->requestd2p_model->getAllRequest();
		$this->load->view('admin/aaa', $data);
	}


// ADD REQUEST D2P

	public function add_request_d2p (){
		$data['page']		= "f_requestd2p";	
		$data['request'] = $this->requestd2p_model->getAllRequest();
		$this->load->view('admin/aaa', $data);
	}

	public function do_add_requestd2p () {

		$this->form_validation->set_rules('name','name','trim|required');
		$this->form_validation->set_rules('project_name','project_name','trim|required');
		$this->form_validation->set_rules('project_id','project_id','trim|required');
		$this->form_validation->set_rules('project_manager','project_manager','trim|required');
		$this->form_validation->set_rules('req_date','req_date','trim|required');
		// $this->form_validation->set_rules('upload_file','upload_file','trim|required');

		if ($this->form_validation->run() == FALSE) {
			redirect('index.php/request_d2p/add_request_d2p');

		 }else {
		 	$this->requestd2p_model->add_request();
		 	$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
		 	redirect('index.php/request_d2p/request_d2p_list');
		 }
	}

// EDIT REQUEST D2P

	public function edit_request_d2p (){
		$data['page']		= "f_requestd2p";	
		$data['request'] = $this->requestd2p_model->getAllRequest();
		$this->load->view('admin/aaa', $data);
	}

	public function do_edit_requestd2p () {

		$this->form_validation->set_rules('name','name','trim|required');
		$this->form_validation->set_rules('project_name','project_name','trim|required');
		$this->form_validation->set_rules('project_id','project_id','trim|required');
		$this->form_validation->set_rules('project_manager','project_manager','trim|required');
		$this->form_validation->set_rules('req_date','req_date','trim|required');
		// $this->form_validation->set_rules('upload_file','upload_file','trim|required');

		if ($this->form_validation->run() == FALSE) {
			redirect('index.php/request_d2p/add_request_d2p');

		 }else {
		 	$this->requestd2p_model->add_request();
		 	$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
		 	redirect('index.php/request_d2p/request_d2p_list');
		 }
	}

// DELETE REQUEST D2P

	public function delete_request_d2p($id){
		$this->requestd2p_model->delete_request_d2p($id,'tr_request');
		redirect('index.php/request_d2p/request_d2p_list');
	}

// SUBMIT REQUEST D2P

	public function submit_request_d2p($id){
		$this->requestd2p_model->submit_request_d2p($id,'tr_request');
		redirect('index.php/request_d2p/request_d2p_list');
	}



}