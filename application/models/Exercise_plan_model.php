<?php

if(!defined('BASEPATH')){
	exit('No direct script access allowed');
}

class exercise_plan_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_exercise_plan_data(){
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->join('exercise_plan','customer.customer_id = exercise_plan.customer_id');
		$query=$this->db->get();
		return $query->result();
	}
}