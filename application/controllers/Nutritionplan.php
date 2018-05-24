<?php

if(!defined('BASEPATH')){
	exit('No direct script access allowed');
}

class Nutritionplan extends CI_Controller {
	public function __Construct() {
		parent::__Construct();
		if(!$this->session->userdata('logged_in')){
			redirect(base_url());
		}
		// $this->load->model('nutrition_plan_model');
	}

	public function nutrition_plan_view(){
		$data = array(
			'title' => 'Nutrition Plan',
		);

		$this->load->view('template/header_view');
		$this->load->view('template/sidebar_nav_view');
		$this->load->view('nutrition_plan_view', $data);
		$this->load->view('template/footer_view');
	}
}

