<?php
class View_requestd2p_model extends CI_Model {

//  VIEW REQUEST D2P MODEL

	public function getAllViewRequest(){
    	$this->db->select('*');
    	$this->db->from('tr_request');
    	$this->db->join('m_status', 'tr_request.status_req = m_status.id_status');
    	
    	$query = $this->db->get();
    	if ($query->num_rows() > 0){
    		return $query->result();
    	} else {
    		return array();
    	}
    }

// APPROVAL REQUEST D2P MODEL

    public function approval_request_d2p() {
        $data = array(
            "status_req" => '2',
            "update_date" => $this->input->post(NOW(),true),
        );
        $this->db->update('tr_request', $data);

    } 
    
// REJECT REQUEST D2P MODEL

   public function reject_request_d2p() {
        $data = array(
            "status_req" => '3',
            "update_date" => $this->input->post(NOW(),true),
        );
        $this->db->update('tr_request', $data);

    } 

}