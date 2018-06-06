<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('dashboard_model');
    }

    public function index() {
        $data = array(
            'title' => 'Dashboard',
            'no_of_users' => $this->dashboard_model->get_no_of_users()
        );

        $this->load->view('template/header_view');
        $this->load->view('template/sidebar_nav_view');
        $this->load->view('dashboard',$data);
        $this->load->view('template/footer_view');
    }


}

/* End of file */
