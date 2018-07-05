<?php
Class Menu extends CI_Model
{		
    function get_menu()
	{		
		$this->db->select(' * ');
        $this->db->from('menu');
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    
    function menu_insert($data){
		$this->db->insert('menu', $data);		
	}
	
	function menu_update($data,$id){
		$this->db->update('menu', $data, "id = ".$id);	
	}
    
    function get_menu_data($id){
		$this->db->select('*');
        $this->db->from('menu');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->row();
	}
	function get_menu_img($id){
		$this->db->select('*');
        $this->db->from('menu');
        $this->db->where('id', $id);
        $query = $this->db->get();
		return $result = $query->result_array();
	}
	function menu_delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('menu');
    }
}
?>
