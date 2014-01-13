<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		//store this url in session, used when user logs in or logs out
        $this->session->set_userdata('last_page', current_url());

        $this->load->model('songs_model');
		$data['hero'] = $this->songs_model->loadFeatured(1);
		$data['trending'] = $this->songs_model->loadTrending();
		$data['featured'] = $this->songs_model->loadFeatured(3);
		$data['staff'] = $this->songs_model->loadFeatured(4);

		$this->load->model('users_model');
		foreach ($data['trending'] as $key => $trendSong){
			$user = $this->users_model->getUserByID($trendSong['user_id']);
			$data['trending'][$key]['user'] = $user[0];
		}

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";

		$data['page_title']= 'Home';
		if(($this->session->userdata('user_name')!="")){ //logged in
			$this->load->view('elements/view_header_logged_in', $data);
			$this->load->view('view_home', $data);
			$this->load->view('elements/view_footer');
		}else{
			$this->load->view('elements/view_header_logged_out', $data);
			$this->load->view('view_home', $data);
			$this->load->view('elements/view_footer');
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */