<?php
class M_user_model extends CI_Model {

//MASTER USER

	public function getAlluser(){
    	$this->db->select('*');
    	$this->db->from('tb_user');
    	$this->db->join('tb_role_access', 'tb_user.id_role_access = tb_role_access.id_role_access');

    $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }    

    }

}
