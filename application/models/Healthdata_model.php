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





    function update_user_details($postData){

        $oldData = $this->get_user_by_id($postData['id']);

        if($oldData[0]['email'] == $postData['email'])
            $validate = true;
        else
            $validate = $this->validate_email($postData);

        if($validate){
            $data = array(
                'email' => $postData['email'],
                'name' => $postData['name'],
                'role' => $postData['role'],
            );
            $this->db->where('user_id', $postData['id']);
            $this->db->update('user', $data);

            $record = "(".$oldData[0]['email']." to ".$postData['email'].", ".$oldData[0]['name']." to ".$postData['name'].",".$oldData[0]['role']." to ".$postData['role'].")";

            $module = "User Management";
            $activity = "update user ".$oldData[0]['email']."`s details ".$record;
            $this->insert_log($activity, $module);
            return array('status' => 'success', 'message' => $record);
        }else{
            return array('status' => 'exist', 'message' => '');
        }

    }

}

