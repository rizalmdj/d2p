<?php
class View_requestd2p_model extends CI_Model {

//  VIEW REQUEST D2P MODEL

	public function getAllViewRequest(){
    	// $this->db->select('*');
    	// $this->db->from('tr_request');
    	// $this->db->join('m_status', 'tr_request.status_req = m_status.id_status');
        $role = $this->session->userdata('admin_level');
        if($role == '3')
            {
                $status = '2'; 
            }
                else if($role == '4')
            {
                $status = '4';
            }
                else if($role == '1')
            {
                $status = array('1','2','3','4','5','6','7','8'); 
            }
        
        
        $query = $this->db->query("select * from tr_request join m_status on tr_request.status_req = m_status.id_status where tr_request.status_req ='".$status."'");
    	
    	$row = $query->result();
        // print_r($row);
        // die();
    	return $row;
    }

// APPROVAL REQUEST D2P MODEL

    public function approval_request_d2p($id,$status) {
       
        $data = array(
            "status_req" => $status,
            "update_date" => $this->input->post(NOW(),true)
        );
        $this->db->where('id', $id);
        $this->db->update('tr_request', $data);

    } 
    
// REJECT REQUEST D2P MODEL

   public function reject_request_d2p() {
        $data = array(
            "status_req" => '8',
            "update_date" => $this->input->post(NOW(),true)
        );
        $this->db->update('tr_request', $data);

    } 

//  SEARCH VIEW REQUEST

   public function searchViewRequest() {
        $q = $this->input->post('q',true);

        $this->db->select('*');
        $this->db->from('tr_request');
        $this->db->join('m_status', 'tr_request.status_req = m_status.id_status');
        $this->db->like('name', $q);
        $this->db->or_like('project_name', $q);
        $this->db->or_like('project_id', $q);
        $this->db->or_like('status_name', $q);
        $this->db->or_like('req_date', $q);
        
        return $this->db->get()->result();
        // var_dump($this->db->like('name', $q));die;
    } 
    
}
