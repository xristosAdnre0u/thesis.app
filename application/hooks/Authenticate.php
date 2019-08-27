<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate  {

    protected $CI;
 
    public function __construct() {
	
	$this->CI = & get_instance();
	
    }

    public function loginCheck() {
	
	if (!$this->CI->session->userdata('logged_in')){
	    
	//redirect("user/login");
	    
	    
	   //echo 'asd';
	     
	}
    }
    
     function administrator() {
	
	if (!$this->CI->session->userdata('isadmin') && $this->CI->uri->segment(1)== 'user'){
	    redirect('home/dashboard');
	}
    }
}
