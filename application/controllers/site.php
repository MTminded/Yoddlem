<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index(){
		//echo "hi there! <br>";
		$this->load->view("view_home");
	}

	
}