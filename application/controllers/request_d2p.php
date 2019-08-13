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

		if ($this ->input->post('a')){

			$data['request'] = $this->requestd2p_model->searchRequestd2p();
		}

		$this->load->view('admin/aaa', $data);
	}


// ADD REQUEST D2P

	public function add_request_d2p (){
		$data['page']		= "f_requestd2p";	
		$this->load->view('admin/aaa', $data);
	}

	public function do_add_requestd2p () {

		//$this->form_validation->set_rules('name','name','trim|required');
		$this->form_validation->set_rules('project_name','project_name','trim|required');
		$this->form_validation->set_rules('project_id','project_id','trim|required');
		$this->form_validation->set_rules('project_manager','project_manager','trim|required');
		$this->form_validation->set_rules('req_date','req_date','trim|required');
		// $this->form_validation->set_rules('upload_file','upload_file','trim|required');

		if ($this->form_validation->run() == FALSE) {
			redirect('index.php/request_d2p/add_request_d2p');

		 }else {
				
			$config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png';                
			$this->load->library('upload', $config);
			$j = 0;
				if($this->upload->do_upload('upload_file')){
					$j++;	
					$data = array('upload_data' => $this->upload->data());
					$file1 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file1')){
					$j++;	
					$data = array('upload_data1' => $this->upload->data());
					$file2 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file2')){
					$j++;	
					$data = array('upload_data2' => $this->upload->data());
					$file3 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file3')){
					$j++;	
					$data = array('upload_data3' => $this->upload->data());
					$file4 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file4')){
					$j++;	
					$data = array('upload_data4' => $this->upload->data());
					$file5 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file5')){
					$j++;	
					$data = array('upload_data5' => $this->upload->data());
					$file6 = $this->upload->data('file_name')['file_name'];
				}

                if ( $j < 6)
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        //$data = array('upload_data' => $this->upload->data());						
                        $this->requestd2p_model->add_request($file1,$file2,$file3,$file4,$file5,$file6);
		 				$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
		 				redirect('index.php/request_d2p/request_d2p_list');
				}	
				//print_r($data);		
				
		 }
	}

// EDIT REQUEST D2P

	public function edit_request_d2p (){
		$id					= $this->uri->segment(3);
		$data['data'] = $this->requestd2p_model->getEditRequestById($id);
		$data['page']		= "f_requestd2p_edit";
		// print_r($data['data']);exit;	
		$data['request'] = $this->requestd2p_model->getAllEditRequest();
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
			redirect('index.php/request_d2p/edit_request_d2p');

			}else {
				
			$config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';                
			$this->load->library('upload', $config);
			$j = 0;
				if($this->upload->do_upload('upload_file')){
					$j++;	
					$data = array('upload_data' => $this->upload->data());
					$file1 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file1')){
					$j++;	
					$data = array('upload_data1' => $this->upload->data());
					$file2 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file2')){
					$j++;	
					$data = array('upload_data2' => $this->upload->data());
					$file3 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file3')){
					$j++;	
					$data = array('upload_data3' => $this->upload->data());
					$file4 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file4')){
					$j++;	
					$data = array('upload_data4' => $this->upload->data());
					$file5 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file5')){
					$j++;	
					$data = array('upload_data5' => $this->upload->data());
					$file6 = $this->upload->data('file_name')['file_name'];
				}

                if ( $j < 6)
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);

		 }
		 else 
		 {
		 	$this->requestd2p_model->edit_request();
		 	$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been edited</div>");
		 	redirect('index.php/request_d2p/request_d2p_list');
		 }
	}

	}

// DELETE REQUEST D2P

	public function delete_request_d2p($id){
		$this->requestd2p_model->delete_request_d2p($id,'tr_request');
		$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted</div>");
		redirect('index.php/request_d2p/request_d2p_list');
	}

// SUBMIT REQUEST D2P 

	public function submit_request_d2p($id){
		$this->requestd2p_model->submit_request_d2p($id);
		$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been submited</div>");
		redirect('index.php/request_d2p/request_d2p_list');
	}



}