<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Customer_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function get_customer_list(){
        $this->db->select('*');
        $this->db->from('customer');
        $query=$this->db->get();
        return $query->result();
    }

    function get_customer_by_id($customerID){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_id', $customerID);
        $query=$this->db->get();
        return $query->result_array();
    }

    function validate_email($postData){
        $this->db->where('email', $postData['email']);
        $this->db->from('customer');
        $query=$this->db->get();

        if ($query->num_rows() == 0)
            return true;
        else
            return false;
    }

    function insert_customer($postData){
        $id = $this->session->userdata('user_id');

       $validate = $this->validate_email($postData);

        if($validate){
            $data = array(
                'fk_user_id' => $id,
                'first_name' => $postData['name'],
                'last_name' =>$postData['lname'],
                'dob' => $postData['dob'],
                'phone' =>$postData['phone'],
                'email' => $postData['email'],
                'address' =>$postData['address'],
            );
            $this->db->insert('customer', $data);
            return array('status' => 'success', 'message' => '');

        }else{
            return array('status' => 'exist', 'message' => '');
        }

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

