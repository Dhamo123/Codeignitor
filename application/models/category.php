<?php
Class Category extends CI_Model
{		
    function get_category()
	{		
		$this->db->select(' * ');
        $this->db->from('category');
        $this->db->where('subid', 0);
		$query = $this->db->get();
        return $result = $query->result_array();
    }
    function category()
	{		
		$this->db->select(' * ');
        $this->db->from('category');
        $this->db->where('subid', 0);
        $query = $this->db->get();
        return $result = $query->result_array();
    }
	function category_header()
	{		
		$this->db->select(' * ');
        $this->db->from('category');
        $this->db->where('subid', 0);
        $query = $this->db->get();
        return $result = $query->result_array();
    }
	function sub_category_header($id)
	{		
		$this->db->select(' * ');
        $this->db->from('category');
        $this->db->where('subid', $id);
        $query = $this->db->get();
		//$this->db->last_query();
        return $result = $query->result_array();
    }
	function subcategory()
	{		
		$this->db->select(' * ');
        $this->db->from('category');
        $this->db->where('subid !=', 0);
        $query = $this->db->get();
        return $result = $query->result_array();
    }
	function product($id)
	{		
		$this->db->select(' * ');
        $this->db->from('product');
        $this->db->where('category',$id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }
	function category_dashboard()
	{		
		$this->db->select(' * ');
        $this->db->from('category');
        $this->db->where('subid', 0);
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    
	function main_category()
	{		
		$this->db->select(' * ');
        $this->db->from('category');
        $this->db->where('subid', 0);
        $query = $this->db->get();
        return $result = $query->result_array();
       
    }
	
    function all_category()
	{		
		$this->db->select(' * ');
        $this->db->from('category');
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    
    function category_insert($data){
		$this->db->insert('category', $data);		
	}
	
	function update_category($data,$id){
		$this->db->update('category', $data, "id = ".$id);	
	}
    
    function get_sub_category($id){
		$this->db->select('category_title');
        $this->db->from('category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->result_array();
	}
	function get_category_unlink_file($id)
	{
		$this->db->select('*');
        $this->db->from('category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->result_array();
	}
	
	function get_category_data($id){
		$this->db->select('*');
        $this->db->from('category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->row();
	}
	function category_duplicate_check($category_title){
		$this->db->select('category_title');
        $this->db->from('category');
        $this->db->where('category_title', $category_title);
        $query = $this->db->get();
        return $result = $query->row();
	}
	
	
	function category_delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('category');
    }
	
}
?>
