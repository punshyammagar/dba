<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Customer extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('customer_model');
    }
    
    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function customer_list(){

        $data = array(
            'formTitle' => 'Customer Management',
            'title' => 'Customer Management',
            'customers' => $this->customer_model->get_customer_list(),
        );

        $this->load->view('template/header_view');
        $this->load->view('template/sidebar_nav_view');
        $this->load->view('dietitian/customer_list', $data);

    }

    public function customer_visit_record(){

        $data = array(
            'formTitle' => 'Customer Visit Record',
            'title' => 'Customer Visit Record',
            //'users' => $this->customer_model->get_customer_list(),
        );

        $this->load->view('template/header_view');
        $this->load->view('template/sidebar_nav_view');
        $this->load->view('dietitian/customer_visit_record', $data);

    }

    public function reports(){

        $data = array(
            'formTitle' => 'Reports',
            'title' => 'Reports',
            //'users' => $this->customer_model->get_customer_list(),
        );

        $this->load->view('template/header_view');
        $this->load->view('template/sidebar_nav_view');
        $this->load->view('dietitian/reports', $data);

    }

    function add_customer() {
        $this->ajax_checking();

        $postData = $this->input->post();
        $insert = $this->customer_model->insert_customer($postData);
        if($insert['status'] == 'success')
            $this->session->set_flashdata('success', 'Customer '.$postData['name']. ' has been successfully created!');
        echo json_encode($insert);
    }

}

/* End of file */
