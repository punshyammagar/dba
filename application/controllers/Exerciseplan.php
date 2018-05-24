<?php

if(!defined('BASEPATH')){
	exit('No direct script access allowed');
}

class Exerciseplan extends CI_Controller {
	public function __Construct() {
		parent::__Construct();
		if(!$this->session->userdata('logged_in')){
			redirect(base_url());
		}
		$this->load->model('exercise_plan_model');
	}

	public function exercise_plan_data(){
		$data = array(
			'title' => 'Exercise Plan',
			'exercise_plan' => $this->exercise_plan_model->get_exercise_plan_data()
		);

		$this->load->view('template/header_view');
		$this->load->view('template/sidebar_nav_view');
		$this->load->view('exercise_plan', $data);
		$this->load->view('template/footer_view');
	}
}