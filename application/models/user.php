<?php
Class User extends CI_Model
{
	
	function login($data)
	{
		//~ $query=mysql_query("SELECT * FROM `admin` WHERE `userid`='".$data['userid']."' AND password='".$data['password']."'");
		//~ $result=mysql_num_rows($query);
		//~ return $result;
		$condition = "userid =" . "'" . $data['userid'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		$data = $query->result_array();
		if ($data) 
		{
			return $data;
		} 
		else 
		{
			return false;
		}
		
		
    }
    
    function op_check($data,$op)
	{
		
		$condition = "id =" . "'" . $data . "' AND " . "password =" . "'" . md5($op) . "'";
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where($condition);
		
		$query = $this->db->get();
		$data = $query->result_array();
		//$this->db->last_query();
		if ($query->num_rows() == 1) 
		{
			
			return $data;
		} 
		else 
		{
			return false;
		}
		
		
    }
     function change_psw($id,$np)
	{
		
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where($condition);
		
		$query = $this->db->get();
		$data = $query->result_array();
		//$this->db->last_query();
		if ($query->num_rows() == 1) 
		{
			
			$data = array(
				'password' => md5($np)
			);
			$this->db->update('admin', $data, "id = ".$id);	
	
		} 
		else 
		{
			return false;
		}
		
		
    }
    
	
    function slider()
	{	
		$this->db->select('*');
		$this->db->order_by('order','asc');
		$this->db->where('active','y');
		$query = $this->db->get('slider');
		$data = $query->result_array();
		return $data;
	}
	function right_sidebar()
	{	
		$this->db->select('*');
		$this->db->order_by('order','asc');
		$this->db->where('active','y');
		$query = $this->db->get('right_sidebar');
		$data = $query->result_array();
		return $data;
	}
	function about_us()
	{	
		$this->db->select('*');
		$this->db->where('active','y');
		$this->db->where('id',1);
		$query = $this->db->get('cms');
		$data = $query->result_array();
		return $data;
	}
	function menu_page()
	{	
		$this->db->select('*');
		$this->db->where('active','y');
		$this->db->where('id',3);
		$query = $this->db->get('cms');
		$data = $query->result_array();
		return $data;
	}
	function menu()
	{	
		$this->db->select('*');
		$this->db->order_by('order','asc');
		$this->db->where('active','y');
		$query = $this->db->get('menu');
		$data = $query->result_array();
		return $data;
	}
   
	function home_cms($id)
	{	
		$this->db->select('*');
		$query = $this->db->get('cms');
		$this->db->where('id',$id);
		$data = $query->result_array();
		return $data;
	}
	function user_list()
	{	
		$this->db->select('*');
		
		$query = $this->db->get('site_user');
		 return $query->result_array();
		 
	}
	function subscriber()
	{	
		$this->db->select('*');
		$query = $this->db->get('newsletter_subscribe');
		return $query->result_array();
		 
	}
	function subscriber_delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('newsletter_subscribe');
    }
	function user_site_view($data)
	{	
		//echo 'ds';exit;
		$this->db->select('*');
		$this->db->where(ip,$data['ip']);
		$query = $this->db->get('site_user');
		$query->result_array();
		if ($query->num_rows() >0) 
		{
			
			return 1;
		} 
		else 
		{
			$this->db->insert('site_user', $data);	
		}
		return $data;
	}
	
	function subscribe_email($data)
	{
		
		$condition = "email ='".$data['email']."'";
		$this->db->select('*');
		$this->db->from('newsletter_subscribe');
		$this->db->where($condition);
		
		$query = $this->db->get();
		$data1 = $query->row();
		//echo '<pre>';print_r($data);
		//echo $this->db->last_query();exit;
		if ($data1) 
		{
			
			$this->db->update('newsletter_subscribe', $data, "id = ".$data1->id);	
		} 
		else 
		{
			$this->db->insert('newsletter_subscribe', $data);	
		}
		
		
    }
	 function subscriber_message($data)
	 {
		 $this->db->insert('subscriber_message', $data);
	 }
	
}
?>
