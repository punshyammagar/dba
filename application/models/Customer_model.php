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
        $this->db->from('user');
        $this->db->where('status', 1);
        $query=$this->db->get();
        return $query->result();
    }

    function get_user_by_id($userID){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $userID);
        $query=$this->db->get();
        return $query->result_array();
    }

    function insert_user($postData){

        $validate = $this->validate_email($postData);

        if($validate){
            $password = $this->generate_password();
            $data = array(
                'email' => $postData['email'],
                'name' => $postData['name'],
                'role' => $postData['role'],
                'password' => md5($password),
                'created_at' => date('Y\-m\-d\ H:i:s A'),
            );
            $this->db->insert('user', $data);

            $message = "Here is your account details:<br><br>Email: ".$postData['email']."<br>Tempolary password: ".$password."<br>Please change your password after login.<br><br> you can login at ".base_url().".";
            $subject = "New Account Creation";
            $this->send_email($message,$subject,$postData['email']);

            $module = "User Management";
            $activity = "add new user ".$postData['email'];
            $this->insert_log($activity, $module);
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

