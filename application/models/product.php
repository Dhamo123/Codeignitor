<?php
Class Product extends CI_Model
{		
    function get_product()
	{		
		$this->db->select(' * ');
        $this->db->from('product');
        
		$query = $this->db->get();
        return $result = $query->result_array();
    }
    function product()
	{		
		$this->db->select(' * ');
        $this->db->from('product');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    function sub_product($id)
	{		
		$this->db->select(' * ');
        $this->db->from('product');
        
        $query = $this->db->get();
        return $result = $query->result_array();
       
    }
	function cat_product($limit,$page)
	{		

		$offset = ($page-1) * $limit;
		//echo $page;exit;
		//$sql = "SELECT * FROM product LIMIT " . $offset . "," . $limit;
		$this->db->select(' * ');
        $this->db->from('product');
		
		$this->db->limit($limit,$offset);
       
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
        return $result = $query->result_array();
       
    }
	function single_product($slug)
	{		
		$this->db->select(' * ');
        $this->db->from('product');
        $this->db->where('slug',$slug);
        $query = $this->db->get();
        return $result = $query->row();
       
    }
	function product_id($slug)
	{		
		$this->db->select(' * ');
        $this->db->from('product');
        $this->db->where('slug',$slug);
        $query = $this->db->get();
        $result = $query->row();
		return $result->id;
       
    }
	function category_breadcrum($slug)
	{		
		$this->db->select(' * ');
        $this->db->from('category');
        $this->db->where('slug',$slug);
        $query = $this->db->get();
        $result = $query->row();
		//echo $this->db->last_query();
		$this->db->select(' * ');
        $this->db->from('category');
        $this->db->where('id',$result->subid);
        $query = $this->db->get();
        return $result = $query->row();
       
    }
	function single_product_subcategory_breadcrum($id)
	{		
		
		$this->db->select(' * ');
        $this->db->from('category');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $result = $query->row();
       
    }
	function extra_product_img($slug)
	{		
		$this->db->select(' * ');
        $this->db->from('product_image');
        $this->db->where('product_id',$slug);
        $query = $this->db->get();
        return $result = $query->result_array();
       
    }
	function cat_subcat_name($id)
	{		
	
		$this->db->select(' * ');
        $this->db->from('category');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $result = $query->result_array();
		//$this->db->last_query();
		$cat_subcat_name=array();
		//echo '<pre>';print_r($result);
		foreach($result as $key => $val)
		{
			$this->db->select(' * ');
			$this->db->from('category');
			$this->db->where('id',$val['subid']);
			$query = $this->db->get();
			$result = $query->row();
			$cat_subcat_name['category_name']=$result->category_title;
			$cat_subcat_name['sub_category_name']=$val['category_title'];
		}
		return $cat_subcat_name;
       
    }
	function latest_product($id,$p)
	{		
	//echo 'dd';exit;
		$this->db->select(' * ');
        $this->db->from('product');
        $this->db->where('category',$id);
        $this->db->where('available','Y');
        $this->db->where('id !=',$p);
        $this->db->order_by('id','DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        return $result = $query->result_array();
       
    }
    function all_product()
	{		
		$this->db->select(' * ');
        $this->db->from('product');
        $query = $this->db->get();
        return $result = $query->result_array();
    }
	public function record_count() {
		
		//echo $this->db->last_query();
		//echo '<pre>';print_r($result->id);exit;
		$this->db->select(' * ');
        $this->db->from('product');
		$query = $this->db->get();
		
		return $query->num_rows();
        //$result = $query->result_array();
		
	}
    
    function product_insert($data){
		$this->db->insert('product', $data);	
		return $this->db->insert_id();		
	}
	
	function update_product($data,$id){
		$this->db->update('product', $data, "id = ".$id);	
		return $id;
	}
	function product_dashboard()
	{		
		$this->db->select(' * ');
        $this->db->from('product');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    function get_product_extra_img($id){
		$this->db->select('*');
        $this->db->from('product_image');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        return $result = $query->result_array();
	}
	function extra_img_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('product_image');
	}
	function sel_img_delete($id)
	{
		$this->db->select('*');
        $this->db->from('product_image');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->result_array();        
	}
    function subcategory($id){
		$this->db->select('*');
        $this->db->from('category');
        $this->db->where('subid', $id);
        $query = $this->db->get();
        return $result = $query->result_array();
	}
	function category(){
		$this->db->select('*');
        $this->db->from('category');
        
        $query = $this->db->get();
        return $result = $query->result_array();
	}

	function get_product_unlink_file($id)
	{
		$this->db->select('*');
        $this->db->from('product');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->result_array();
	}
	
	function get_product_data($id){
		$this->db->select('*');
        $this->db->from('product');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->row();
	}
	function search_product($data){
		$this->db->select('*');
        $this->db->from('product');
        $this->db->like('product_name', $data);
        $this->db->or_like('cat_name', $data);
        $this->db->or_like('subcat_name', $data);
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
        return $result = $query->result_array();
	}
	
	function product_img($key,$id){
		$data['product_id'] = $id;
		$data['photo'] = $key;
		$this->db->insert('product_image', $data);	
		
	}
	
	
				
	
	function get_review($id){
		
		
		$this->db->select('*,count(id) as total');
        $this->db->from('review');
        $this->db->order_by('id','desc');
		$this->db->where('product_id',$id);
        $this->db->limit('1');
        $query = $this->db->get();
		
        return $result = $query->row();
		
	}
	function product_delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('product');
    }
    function product_duplicate_check($product,$category){
		$this->db->select('product_name');
        $this->db->from('product');
        $this->db->where('product_name', $product);
        $this->db->where('category', $category);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $result = $query->row();
	}
	function All_Product_export()
	{
		$this->db->select('*');
        $this->db->from('product');
        //$this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->result_array();
        
	}
	
}
?>
