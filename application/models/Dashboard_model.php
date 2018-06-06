<?php
	if(!defined('BASEPATH')){
		exit('No direct script access allowed');
	}

	class dashboard_model extends CI_model {
		function __construct(){
			parent::__construct();
		}

		function get_no_of_users(){
			$this->db->select('role, count(role) as total');
			$this->db->from('user');
			$this->db->group_by('role');
			//$this->db->get('users');
			$query=$this->db->get();
			return $query->result();
		}
	}

?>