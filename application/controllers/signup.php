<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index(){
		
		if(($this->session->userdata('user_name')!="")){ //logged in
			$data['page_title']= 'Home';
			$this->load->view('elements/view_header_logged_in', $data);
			$this->load->view('view_home');
			$this->load->view('elements/view_footer');
		}else{
			$data['page_title']= 'Sign up for Yoddlem';
			$this->load->view('elements/view_header_logged_out', $data);
			$this->load->view('view_signup');
			$this->load->view('elements/view_footer');
		}
	}

	
}