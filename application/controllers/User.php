<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
	
	parent::__construct();
	$this->load->database();
	$this->load->model('model_user');
	$this->load->library('grocery_CRUD');
	$this->load->helper('url');
    }

    public function login($page = 'login') {

	if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
	   
	    show_404();
	}

	$data['title'] = ucfirst($page);

	$this->load->library('form_validation');
	$this->form_validation->set_rules('username', 'Username', 'trim|callback_check_login');
	$this->form_validation->set_rules('password', 'Password', 'trim|required');

	if ($this->form_validation->run() == FALSE) {

	    $this->load->view('templates/header', $data);
	    $this->load->view('pages/login');
	    $this->load->view('templates/footer', $data);
	} else {
	    
	   redirect('home/dashboard');
	}
    }

    public function check_login() {

	$username = $this->input->post('username');
	$password = $this->input->post('password');

	$result = $this->model_user->login($username, $password);

	if ($result) {
	    $s = array();
	    $s['id'] = $result[0]->Id;
	    $s['username'] = $result[0]->Username;
	    $s['isadmin'] = $result[0]->IsAdmin;
	    $s['logged_in'] = TRUE;
	    $this->session->set_userdata($s);
	} else {
	    $this->form_validation->set_message('check_login', 'Lathos username and password');
	    return FALSE;
	}
    }

    public function employees($page = 'Χρηστες') {

	$data['title'] = $page;
	$this->load->view('templates/header', $data);

	$grocery_crud = new grocery_CRUD();
	$grocery_crud->set_table('users');
	$grocery_crud->set_subject('Χρήστων');
	$grocery_crud->set_language("greek");
	$grocery_crud->required_fields('Username', 'Password');
	
	$grocery_crud->field_type('IsAdmin', 'dropdown', array('1' => 'NAI', '0' => 'OXI'));
	$grocery_crud->display_as('FullName', 'Ονοματεπονυμο')
		->display_as('Username', 'Ονομα Χρήστη')
		->display_as('Password', 'Κωδικος')
		->display_as('IsAdmin', 'Διαχειριστής');
	$grocery_crud->unset_columns(array('Email'));
	$grocery_crud->change_field_type('Email', 'hidden');
	$grocery_crud->change_field_type('Lname', 'hidden');
	
	$grocery_crud->callback_read_field('IsAdmin', function ( $value ,$primary_key) {
	    return $value;
	});
	$state = $grocery_crud->getState();
	$output = $grocery_crud->render();
	if($state == 'add'){
	    $js = '<script>$(".title").hide();</script>';
	    $output->output .= $js;
	}
	$this->load->view('templates/tmpltUser.php', (array) $output);
	
	$this->load->view('templates/footer', $data);
	
    }
    public function logout() {
	$this->session->sess_destroy();
	redirect('User/login');
    }
    
}
