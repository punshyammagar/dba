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
                'date' =>date('Y/m/d'),
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

    function get_latest_health_record(){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->join('health_data', 'customer.customer_id = health_data.customer_id');
        $this->db->group_by('health_data.customer_id');
        $this->db->order_by('date','desc');
        $this->db->limit('1');
        $query=$this->db->get();
        return $query->result();
    }

    function update_healthdata_details($postData){

        $oldData = $this->get_healthdata_by_id($postData['healthdataid']);

        if($oldData[0]['healthdata_id'] == $postData['healthdataid']){
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
            $this->db->where('healthdata_id', $postData['healthdataid']);
            $this->db->update('health_data', $data);

            $record = "(".$oldData[0]['healthdata_id']." to ".$postData['healthdataid'].", ".$oldData[0]['age']." to ".$postData['age'].", ".$oldData[0]['weight']." to ".$postData['weight'].", ".$oldData[0]['height']." to ".$postData['height'].", ".$oldData[0]['waist']." to ".$postData['waist'].",".$oldData[0]['glucose_level']." to ".$postData['gl'].",".$oldData[0]['blood_pressure']." to ".$postData['bp'].",".$oldData[0]['dyslipidemia_level']." to ".$postData['dl'].")";
            return array('status' => 'success', 'message' => $record);
        }else{
            return array('status' => 'exist', 'message' => '');
        }

    }

    function get_healthdata_by_id($healthdataID){
        $this->db->select('*');
        $this->db->from('health_data');
        $this->db->where('healthdata_id', $healthdataID);
        $query=$this->db->get();
        return $query->result_array();
    }

}

