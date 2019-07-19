<?php
class M_divisi_model extends CI_Model {

//  VIEW MASTER DIVISI MODEL

	public function getAllDepDivisi(){
    	$this->db->select('*');
    	$this->db->from('tb_divisi');
        // $this->db->where('id_divisi', $id_devisi)
    	// $this->db->join('tb_divisi', 'tb_departemen.id_divisi = tb_divisi.id_divisi');
    	// $this->db->order_by('tb_divisi.id_divisi');

    	$query = $this->db->get();
    	if ($query->num_rows() > 0){
    		return $query->result();
    	} else {
    		return array();
    	}
    }


//  ADD MASTER DIVISI MODEL

    public function add_master_divisi() {
        $data = array(
            "nama_divisi" => $this->input->post('nama_divisi',true),
        );
        $this->db->insert('tb_divisi', $data);

    }
    

}
