<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

    function __construct() {

	parent::__construct();

	$this->load->database();
    }

    public function login($username, $password) {

	$this->db->from('users');
	$this->db->where('Username', $username);
	$this->db->where('Password', $password);

	$query = $this->db->get();

	if ($query->num_rows() == 1) {

	    return $query->result();
	} else {

	    return FALSE;
	}
    
	
    }
    
}
