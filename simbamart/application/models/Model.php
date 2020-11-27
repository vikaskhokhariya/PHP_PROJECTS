<?php 
	class Model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database('second', TRUE);
		}

		public function my_query($q)
    	{
            return $this->db->query($q)->result();
    	}

		function model_insert($table,$data)
		{
			return $this->db->insert($table,$data);
		}

		function model_delete($table,$where)
		{
			//$this->db->where('id',$id);
			$this->db->delete($table,$where);
		}

		/*Select*/
		function model_select($table,$where='',$limit='',$offset='')
		{
			if($where!='')
			{
				return $this->db->get_where($table,$where)->result();
			}
			else
			{
				return $this->db->get($table)->result();
			}
		}
		
		function model_update($table,$data,$where)
		{
			$this->db->where($where);
			return $this->db->update($table,$data);
		}

		function count_total_main_cat()
		{
			$query=$this->db->query("select count(*) as totmaincat FROM `tbl_maincat` where cat_status=1");
			return $query->result();
		}

		function model_generalsettings_update($data)
		{
			$this->db->where('general_id',1);
			return $this->db->update('tbl_general',$data);
		}

		function model_select_seller()
		{
			$query=$this->db->query("select * FROM `tbl_seller` order by seller_id desc limit 10");
			return $query->result();
		}
	}
?>