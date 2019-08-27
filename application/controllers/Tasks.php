<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {

    public function __construct() {
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
	$this->load->model("model_user");
	$this->load->library('Grocery_CRUD');
    }

    public function task($page = 'Εργασιες') {

	$data['title'] = $page;
	$this->load->view('templates/header', $data);
	$grocery_crud = new grocery_CRUD();
	$own = $this->input->post('own');
	$completed = $this->input->post('completed');

	$grocery_crud->set_table('tasks');

	$grocery_crud->set_subject('Εργασιας');
	$grocery_crud->set_language("greek");

	$grocery_crud->set_relation('assignee_id', 'Users', 'FullName');

	if ($own) {
	    $grocery_crud->where('assignee_id=', $this->session->userdata('id'));
	} elseif ($completed == 2) {
	    $grocery_crud->where('status=', 1);
	} elseif ($completed == 3) {
	    $grocery_crud->where('status=', 2);
	} elseif ($completed == 4) {
	    $grocery_crud->where('status=', 3);
	} elseif ($completed == 5) {
	    $grocery_crud->where('status=', 4);
	}

	$grocery_crud->set_relation('partner_id', 'partners', 'Fname');

	$grocery_crud->field_type('status', 'dropdown', array("1" => "Created", "2" => "In Progress", "3" => "Waiting", "4" => "Completed"));

	$grocery_crud->unset_texteditor('description', 'full_text');
	
	$grocery_crud->unset_columns(array('assigner_id', 'client_id', 'user_id'));

	$grocery_crud->required_fields('title', 'status');

	$grocery_crud->display_as('timestamp_created', 'Ημερομηνια Δημιουργιας')
		->display_as('timestamp_updated', 'Ημερομηνια Ενημερωσης')
		->display_as('title', 'Τιτλος')
		->display_as('description', 'Περιγραφη')
		->display_as('status', 'Κατασταση')
		->display_as('assignee_id', 'Aναθεση Σε')
		->display_as('partner_id', 'Συνεργατης');


	$grocery_crud->add_fields('title', 'assignee_id', 'assigner_id', 'timestamp_created', 'timestamp_updated', 'description', 'status', 'partner_id');
	$grocery_crud->edit_fields('title', 'assignee_id', 'assigner_id', 'timestamp_created', 'timestamp_updated', 'description', 'status', 'partner_id');

	$grocery_crud->change_field_type('timestamp_created', 'hidden', date('Y-m-d'));
	$grocery_crud->change_field_type('timestamp_updated', 'hidden', date('Y-m-d'));
	$grocery_crud->change_field_type('user_id', 'hidden', $this->session->userdata('id'));
	$grocery_crud->change_field_type('assigner_id', 'hidden', $this->session->userdata('id'));
	$grocery_crud->change_field_type('client_id', 'hidden');


	$grocery_crud->callback_read_field('status', function ($value, $primary_key) {
	    return $value;
	});

	$state = $grocery_crud->getState();
	$output = $grocery_crud->render();

	if ($state == 'add') {
	    $js = '<script>$(\'select[name="status"] option[value="2"]\').attr("selected", "selected");</script>';
	    $output->output .= $js;
	}
	if ($state == 'add') {
	    $js = '<script>$(".title").hide();</script>';
	    $output->output .= $js;
	}
	if ($state == 'read') {
	    $js = '<script>$(".title").hide();</script>';
	    $output->output .= $js;
	}

	if ($state == 'read') {
	    $js = '<script>$("#check").hide();</script>';
	    $output->output .= $js;
	}
	if ($state == 'clone') {
	    $js = '<script>$("#check").hide();</script>';
	    $output->output .= $js;
	}
	if ($state == 'edit') {
	    $js = '<script>$("#check").hide();</script>';
	    $output->output .= $js;
	}

	if ($state == 'read') {

	    $this->notes($output);
	}
	

	$this->load->view('templates/tmpltTasks.php', (array) $output);
	$this->load->view('templates/footer', $data);
	
    }

    public function notes($output) {

	$html = '
			<div class="asd">Σχολια:<html><form method="post" action="">
  <textarea name="description" rows="10" cols="30"></textarea>
  <br>
<input type="submit">
</form></html></div>
';

	$output->output .= $html;

	if ($this->input->post()) {
	    $data = array(
		'description' => $this->input->post('description'),
		'user_id' => $this->session->userdata('id')
	    );


	    $this->db->insert('notes', $data);
	}
	 $query = $this->db->get('notes');
          return $query->result_array();
	// $this->db->query("SELECT * FROM notes");

	//foreach ($query->result_array() as $row) {
	  //  echo $row['timestamp'];
	    //echo $row['task_id'];
	    //echo $row['user_id'];
	//}
	  //  echo $row['description'];
	//}
    }
}


