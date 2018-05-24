<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Healthdata_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert_health_data($postData){
       $validate = $this->validate_customer_id($postData);

        if($validate){
            $data = array(
                'customer_id' => $postData['customerid'],
                'age' => $postData['age'],
                'weight' =>$postData['weight'],
                'height' => $postData['height'],
                'waist' =>$postData['waist'],
                'glucose_level' => $postData['gl'],
                'blood_pressure' =>$postData['bp'],
                'dyslipidemia_level' =>$postData['dl'],
                'date' =>date('d/m/Y'),
            );
            $this->db->insert('health_data', $data);
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

    function get_health_record(){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->join('health_data', 'customer.customer_id = health_data.customer_id');
        $query=$this->db->get();
        return $query->result();
    }

}

