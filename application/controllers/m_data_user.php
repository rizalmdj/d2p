<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data_user extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model(array('web_model','departemen_model'));
	}

	public function master_data_user (){
		$data['page']		= "l_request_d2p";	
		$data['departemen'] = $this->departemen_model->getAllDepDivisi();
		$this->load->view('admin/aaa', $data);
	}

	


}