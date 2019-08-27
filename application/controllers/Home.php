<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
	parent::__construct();
	$this->load->database();

	$this->load->model("model_user");
	$this->load->library('Grocery_CRUD');
    }

    public function dashboard($page = 'Arxiki') {

	
	    $data['title'] = $page;
	    $this->load->view('templates/header', $data);
	    $this->load->view('pages/dashboard.php',$data);
	    $this->load->view('templates/footer', $data);
	     
	
	
	
	
    }

}
