<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data_user extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model(array('web_model','m_user_model'));
	}

	public function master_data_user (){
		$data['page']		= "l_master_user";	
		$data['datauser'] = $this->m_user_model->getAlluser();

		if (!empty($this ->input->post('q'))){

			$data['datauser'] = $this->m_user_model->searchMasterDataUser();
		}

		$this->load->view('admin/aaa', $data);
	}

}