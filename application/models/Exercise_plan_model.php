<?php

if(!defined('BASEPATH')){
	exit('No direct script access allowed');
}

class exercise_plan_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function insert_exercise_plan($postData){
       $validate = $this->validate_customer_id($postData);

        if($validate){
            $data = array(
                'customer_id' => $postData['customerid'],
                'exercise_name' => $postData['exercise_name'],
                'frequency' =>$postData['frequency'],
                'start_date' => $postData['sd'],
                'end_date' =>$postData['ed'],
                'description' => $postData['description'],
            );
            $this->db->insert('exercise_plan', $data);
            return array('status' => 'success', 'message' => '');

        }else{
            return array('status' => 'exist', 'message' => '');
        }
    }

    function validate_customer_id($postData){
      $this->db->where('customer_id', $postData['customerid']);
      $this->db->from('customer');
      $query=$this->db->get();

      if ($query->num_rows() == 1)
        return true;
      else
        return false;
    }

	function get_exercise_plan_data(){
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->join('exercise_plan','customer.customer_id = exercise_plan.customer_id');
		$query=$this->db->get();
		return $query->result();
	}
}