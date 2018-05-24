<?php

if(!defined('BASEPATH')){
	exit('No direct script access allowed');
}

class nutrition_plan_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_nutrition_plan_data(){
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->join('nutrition_plan','customer.customer_id = nutrition_plan.customer_id');
		$query=$this->db->get();
		return $query->result();
	}
}