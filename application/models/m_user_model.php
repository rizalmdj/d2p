<?php
class M_user_model extends CI_Model {


//MASTER USER

	public function getAlluser(){
    	$this->db->select('*');
    	$this->db->from('t_admin');
    	$this->db->join('tb_role_access', 't_admin.id_role_access = tb_role_access.id_role_access');
        $this->db->join('tb_divisi', 't_admin.id_divisi = tb_divisi.id_divisi');
        $this->db->join('tb_departemen', 't_admin.id_dep = tb_departemen.id_dep');

    $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }    

    }


//  ADD MASTER USER

    public function add_master_user_model(){
        $this->load->model(array('role_access_model','m_divisi_model','departemen_model'));
        $role_access = $this->input->post('role_access',true);
        $nama_divisi = $this->input->post('nama_divisi',true);
        $nama_departemen = $this->input->post('nama_divisi',true);
        $data = array(
            "username" => $this->input->post('username',true),
            "password" => $this->input->post(md5('password',true)),
            "nama" => $this->input->post('nama',true),
            "id_karyawan" => $this->input->post('id_karyawan',true),
            "email" => $this->input->post('email',true),
            "status" => $this->input->post('status',true),
        );

        $data1 = array(
            "id_role_access" => $this->role_access_model->getRoleaccess($role_access)
        );
        
        $data2 = array(
            "id_divisi" => $this->m_divisi_model->getidDivisi($nama_divisi)
        );

        $data3 = array(
            "id_dep" => $this->departemen_model->getDepartement($nama_departemen)
        );

        // var_dump($data);
        // var_dump($data1);
        // var_dump($data2);
        // var_dump($data3);
        // die;

        $this->db->trans_start();
        $this->db->insert('t_admin', $data);
        $this->db->insert('t_admin', $data1);
        $this->db->insert('t_admin', $data2);
        $this->db->insert('t_admin  ', $data3);
        $this->db->trans_complete();

         if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
            }
        else
            {
                $this->db->trans_commit();
            } 

    }

    public function findDept($division){

        $this->db->select('*');
        $this->db->from('tb_departemen');
        $this->db->join('tb_divisi', 'tb_departemen.id_divisi = tb_divisi.id_divisi');
        $this->db->where('tb_divisi.nama_divisi',$division);
        $this->db->order_by('tb_divisi.id_divisi');

        $query = $this->db->get();
        return $query->result();
        
    }

    // public function updatedepartemen($id_dep,$data){
    //     $this->db->set('nama_departemen', $data['nama_departemen']);
    //     $this->db->where('id_dep', $id_dep);
    //     $this->db->update('tb_departemen');

    // }
    

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
