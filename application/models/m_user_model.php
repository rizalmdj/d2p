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

//  SEARCH MASTER DATA USER

    public function searchMasterDataUser() {
        $q = $this->input->post('q',true);

        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_role_access', 'tb_user.id_role_access = tb_role_access.id_role_access');
        $this->db->like('id_karyawan', $q);
        $this->db->or_like('user_name', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('realname', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('status', $q);
        

        return $this->db->get()->result();
        // var_dump($this->db->like('name', $a));die;

    }


}
