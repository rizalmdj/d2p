<?php
class Requestd2p_model extends CI_Model {

//  VIEW GET ALL REQUEST D2P MODEL

	public function getAllRequest(){
    	$this->db->select('*');
    	$this->db->from('tr_request');
    	$this->db->join('m_status', 'tr_request.status_req = m_status.id_status');
        $this->db->order_by("created_date", "asc");
    	
    	$query = $this->db->get();
    	if ($query->num_rows() > 0){
    		return $query->result();
    	} else {
    		return array();
    	}
    }

//  GET ALL EDIT REQUEST D2P MODEL

    public function getAllEditRequest(){
        $this->db->select('*');
        $this->db->from('tr_request');
        $this->db->join('m_status','tr_request.status_req = m_status.id_status');
        $this->db->where('id');
                
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }
    }

//  GET EDIT REQUEST D2P MODEL

     public function getEditRequestById($id){
        $this->db->select('*');
        $this->db->from('tr_request');
        $this->db->join('m_status','tr_request.status_req = m_status.id_status');
        $this->db->where('id', $id);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }
    }

// ADD REQUEST D2P MODEL    

    public function add_request() {
        $data = array(
            "name" => $this->input->post('name',true),
            "project_name" => $this->input->post('project_name',true),
            "project_id" => $this->input->post('project_id',true),
            "project_manager" => $this->input->post('project_manager',true),
            "keterangan" => $this->input->post('keterangan',true),
            "req_date" => $this->input->post('req_date',true),
            "created_date" => $this->input->post(NOW(),true),
            "status_req" => '1',
            "update_date" => $this->input->post(NOW(),true),
            "upload_file" => $this->input->post('upload_file',true),
            "created_by" => '1'
        );
        $this->db->insert('tr_request', $data);

    }

// EDIT REQUEST D2P MODEL

    public function edit_request() {
        $data = array(
            "name" => $this->input->post('name',true),
            "project_name" => $this->input->post('project_name',true),
            "project_id" => $this->input->post('project_id',true),
            "project_manager" => $this->input->post('project_manager',true),
            "keterangan" => $this->input->post('keterangan',true),
            "req_date" => $this->input->post('req_date',true),
            "created_date" => $this->input->post(NOW(),true),
            "status_req" => '1',
            "update_date" => $this->input->post(NOW(),true),
            "upload_file" => $this->input->post('upload_file',true),
            "created_by" => '1'
        );
        $this->db->where('id', $this->input->post('id',true));
        $this->db->update('tr_request', $data);

    }


// DELETE REQUEST D2P MODEL

    public function delete_request_d2p($id, $table){
        $this->db->where('id', $id);
        $this->db->delete($table);

    }  

//  SUBMIT REQUEST D2P BELOM SELESAI

    public function submit_request_d2p($id){
        $data = array(
            "status_req" => '5'
            // "update_date" => $this->input->post(NOW(),true)
        );
        $this->db->where('id', $id);
        $this->db->update('tr_request', $data);

    }

}