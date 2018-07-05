<?php
Class Logo extends CI_Model
{		
    function get_logo()
	{		
		$this->db->select(' * ');
        $this->db->from('logo');
        
		$query = $this->db->get();
        return $result = $query->result_array();
    }
    function logo()
	{		
		$this->db->select(' * ');
        $this->db->from('logo');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
	function logo_header()
	{		
		$this->db->select(' * ');
        $this->db->from('logo');
        $this->db->where('id',1);
        
        $query = $this->db->get();
        return $result = $query->row();
    }
	function logo_dashboard()
	{		
		$this->db->select(' * ');
        $this->db->from('logo');
       
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    function sub_logo($id)
	{		
		$this->db->select(' * ');
        $this->db->from('logo');
        
        $query = $this->db->get();
        return $result = $query->result_array();
       
    }
    function all_logo()
	{		
		$this->db->select(' * ');
        $this->db->from('logo');
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    
    function logo_insert($data){
		$this->db->insert('logo', $data);		
	}
	
	function update_logo($data,$id){
		$this->db->update('logo', $data, "id = ".$id);	
	}
    
    function get_sub_logo($id){
		$this->db->select('logo_title');
        $this->db->from('logo');
        
        $query = $this->db->get();
        return $result = $query->result_array();
	}
	function get_logo_unlink_file($id)
	{
		$this->db->select('*');
        $this->db->from('logo');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->result_array();
	}
	
	function get_logo_data($id){
		$this->db->select('*');
        $this->db->from('logo');
        $this->db->where('id', 1);
        $query = $this->db->get();
        return $result = $query->row();
	}
	
	
	function logo_delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('logo');
    }
	function make_seo_url($tablenm , $seo_url_field  , $title_field , $data )	//table nm , seo_url unique field , field name to set new id , data of new title field
	{
		
		
		function duplication_check($tablenm , $colunm , $data ,$where="1")	//table name , colunm name , data to compare , condition
		{
			$select_qry="select ".$colunm." from " .$tablenm . " where ".$where ;
			$res= mysql_query($select_qry);

			$temp=1;
			while($row=mysql_fetch_array($res,MYSQL_BOTH))
			{
				if($row[$colunm]==$data)
				{
					$temp=0;
				}
			}
			if($temp)
				return 1;
			else
				return 0;					//return  0 if duplicate else return 1
		}
		
		$no=0;
		$slug_string=str_replace('-' ,'_',str_replace(' ','-',$data));
		if(duplication_check($tablenm,$seo_url_field,$slug_string))
		{
			$seo_url=$slug_string;
			return $seo_url;
		}
		else
		{
			$select= "select ".$title_field." from ".$tablenm." where ".$title_field."='".$data."'";			
			$result=mysql_query($select) or die(mysql_error());
			while ($row=mysql_fetch_array($result,MYSQL_BOTH))
			{
				$no++;
			}
			$seo_url=$slug_string.$no;
			return $seo_url;
		}
	}
}
?>
