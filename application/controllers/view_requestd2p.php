<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_requestd2p extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model(array('web_model','view_requestd2p_model'));
	}


// VIEW LIST REQUEST D2P

	public function view_requestd2p_list (){
		$data['page']		= "l_view_requestd2p";	
		$data['view_request'] = $this->view_requestd2p_model->getAllViewRequest();

		if ($this->input->post('q')){
			$data['view_request'] =  $this->view_requestd2p_model->searchViewRequest();
		}

		
		$this->load->view('admin/aaa', $data);

	}

// APPROVAL LIST REQUEST D2P

	public function approval_request_d2p($id){
		$this->view_requestd2p_model->approval_request_d2p($id,'tr_request');
		redirect('index.php/view_requestd2p/view_requestd2p_list');
	}

// REJECT LIST REQUEST D2P

	public function reject_request_d2p($id){
		$this->view_requestd2p_model->reject_request_d2p($id,'tr_request');
		redirect('index.php/view_requestd2p/view_requestd2p_list');
	}

}