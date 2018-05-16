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
    }

    public function index() {
        $this->load->view('template/header_view');
        $this->load->view('template/sidebar_nav_view');
        $this->load->view('dashboard');
        $this->load->view('template/footer_view');
    }


}

/* End of file */
