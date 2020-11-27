<?php 
	class Model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
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
	}
?>