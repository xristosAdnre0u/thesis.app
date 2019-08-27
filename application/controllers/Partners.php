<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends CI_Controller {

    public function __construct() {
	parent::__construct();
	$this->load->database();
	
	$this->load->model("model_user");
	$this->load->library('Grocery_CRUD');
    }

    public function partner($page = 'Συνεργατες') {
	
	    $data['title'] = $page;
	    $this->load->view('templates/header', $data);
	   

	    $grocery_crud = new grocery_CRUD();
	    $grocery_crud->set_subject('Συνεργάτη');
	    $grocery_crud->set_language("greek");
	    $grocery_crud->required_fields('Afm');
	    
	    $grocery_crud->set_table('partners');
	    $grocery_crud->display_as('Fname','Ονομα')
		    ->display_as('Afm','ΑΦΜ')
	            ->display_as('Address','Διευθηνση')
		    ->display_as('City','Πολη')
	            ->display_as('Tel','Τηλεφωνo');
	    $grocery_crud->unset_columns(array('Mob','Lname'));
	    $grocery_crud->change_field_type('Mob', 'hidden');
	    $grocery_crud->change_field_type('Lname', 'hidden');
	    $state = $grocery_crud->getState();
	    $output = $grocery_crud->render();
	    
	    if($state == 'add'){
	    $js = '<script>$(".title").hide();</script>';
	    $output->output .= $js;
	}
	
	    $this->load->view('templates/tmpltPartners.php', (array) $output);
	    $this->load->view('templates/footer', $data);
	    
}
}