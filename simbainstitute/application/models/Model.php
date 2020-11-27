<?php 
	class Model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
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
		function model_select($table,$where='',$orderby='',$orderbywhat='')
		{
			if($where!='')
			{
				if($orderby!='')
				{
					$this->db->order_by($orderby,$orderbywhat);
					return $this->db->get_where($table,$where)->result();
				}
				else
				{
					return $this->db->get_where($table,$where)->result();
				}
			}
			else
			{
				if($orderby!='')
				{
					$this->db->order_by($orderby,$orderbywhat);
					return $this->db->get($table)->result();
				}
				else
				{
					return $this->db->get($table)->result();
				}
			}
		}
		
		function model_update($table,$data,$where)
		{
			$this->db->where($where);
			return $this->db->update($table,$data);
		}
	}
?>