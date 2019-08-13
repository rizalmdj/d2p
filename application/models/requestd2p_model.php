<?php
class Requestd2p_model extends CI_Model {

//  VIEW GET ALL REQUEST D2P MODEL

	public function getAllRequest(){
    	$this->db->select('*');
    	$this->db->from('tr_request');
    	$this->db->join('m_status', 'tr_request.status_req = m_status.id_status');
        $this->db->order_by("created_date", "desc");
    	
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

    public function add_request($filename,$filename1,$filename2,$filename3,$filename4,$filename5) {
        $var = $this->session->userdata;		
        $data = array(
            "name" => $var['nama'],
            "project_name" => $this->input->post('project_name',true),
            "project_id" => $this->input->post('project_id',true),
            "project_manager" => $this->input->post('project_manager',true),
            "keterangan" => $this->input->post('keterangan',true),
            "req_date" => $this->input->post('req_date',true),
            "created_date" => date('Y-m-d H:i:s'),
            "status_req" => '1',
            "update_date" => date('Y-m-d H:i:s'),
            "upload_file" => $filename,
            "upload_file1" => $filename1,
            "upload_file2" => $filename2,
            "upload_file3" => $filename3,
            "upload_file4" => $filename4,
            "upload_file5" => $filename5,
            "created_by" => $var['id']
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

//  SEARCH REQUEST D2P

    public function searchRequestd2p() {
        $a = $this->input->post('a',true);

        $this->db->select('*');
        $this->db->from('tr_request');
        $this->db->join('m_status', 'tr_request.status_req = m_status.id_status');
        $this->db->like('name', $a);
        $this->db->or_like('project_name', $a);
        $this->db->or_like('project_id', $a);
        // $this->db->or_like('status_name', $a)
        // $this->db->or_like('date', $a);

        return $this->db->get()->result();
        // var_dump($this->db->like('name', $a));die;


    }

}