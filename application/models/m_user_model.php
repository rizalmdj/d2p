<?php
class M_user_model extends CI_Model {

//MASTER USER

	public function getAlluser(){
    	$this->db->select('*');
    	$this->db->from('tb_user');
    $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }    

}
