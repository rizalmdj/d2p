<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data_user extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model(array('web_model','m_user_model','departemen_model','role_access_model','m_divisi_model'));
	}


// 	VIEW MASTER USER

	public function master_user (){
		$data['page']		= "l_master_user";	
		$data['datauser'] = $this->m_user_model->getAlluser();

		if (!empty($this ->input->post('q'))){

			$data['datauser'] = $this->m_user_model->searchMasterDataUser();
		}

		$this->load->view('admin/aaa', $data);
	}


// 	ADD MASTER USER

	public function add_master_user (){
		$data['page']		= "f_master_user";	
		$data['role_access'] = $this->role_access_model->getAllRoleAccess();
		$data['departemen'] = $this->departemen_model->getAllDepDivisi();
		$data['divisi'] 	= $this->web_model->getAll('tb_divisi');
		$this->load->view('admin/aaa', $data);
	}

	public function do_add_master_user (){

		// $this->form_validation->set_rules('username','username', 'trim|required');
		// $this->form_validation->set_rules('password','password', 'trim|required');
		// $this->form_validation->set_rules('name','name', 'trim|required');
		// $this->form_validation->set_rules('id_karyawan','id_karyawan', 'trim|required');
		// $this->form_validation->set_rules('email','email', 'trim|required');
		// $this->form_validation->set_rules('role_access','role_access', 'trim|required');
		// $this->form_validation->set_rules('nama_divisi','nama_divisi', 'trim|required');
		// $this->form_validation->set_rules('nama_departemen','nama_departemen', 'trim|required');
		// $this->form_validation->set_rules('status','status', 'trim|required');

		// if ($this->form_validation->run() == FALSE) {
		// 	redirect('index.php/m_data_user/add_master_user');

		//  }else {
		 	$this->m_user_model->add_master_user_model();
		 	redirect('index.php/m_data_user/master_user');
		 // }
	}

// 	GET DEPARTEMENT

	public function get_dept (){
			
			$search = $this->m_user_model->findDept($_POST['div']);
			
			if ($search) {
				$result['status']= true;
				$result['message'] = 'sukses';
				$result['data'] = $search;
			}
			else{
				$result['status']= false;
				$result['message'] = 'gagal mengambil data';
			}
			echo json_encode($result);
		}


//	EDIT MASTER USER

	public function edit_master_user (){
		$data['page']		= "f_master_user_edit";	
		$data['role_access'] = $this->role_access_model->getAllRoleAccess();
		$data['departemen'] = $this->departemen_model->getAllDepDivisi();
		$data['divisi'] 	= $this->web_model->getAll('tb_divisi');
		$this->load->view('admin/aaa', $data);
	}

// 	public function do_edit_master_user (){

// 		$this->form_validation->set_rules('nama_departemen','nama_departemen', 'trim|required');


// 		$id_dep = $this->input->post('id_dep');

// 		if ($this->form_validation->run() == FALSE) {
// 			redirect('index.php/master_data/edit_departemen');

// 		 }else {

// 		 	$data = $this->input->post();
// 		 	$this->departemen_model->updateDepartemen($id_dep, $data);

// 		 	redirect('index.php/master_data/master_data_departemen');
// 		 }
// 	}

// //	DELETE MASTER USER

// 	public function delete_master_user($id_dep){
// 		$this->departemen_model->delete_departemen($id_dep,'tb_departemen');
// 		redirect('index.php/master_data/master_data_departemen');
// 	}




}