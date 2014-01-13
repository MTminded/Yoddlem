<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct(){
		parent::__construct();
	  	$this->load->model('users_model');
	}
	
	public function index(){
		if(($this->session->userdata('user_name')!="")){
	   		$this->welcome();
	  	}
	  	else{
	   		$data['title']= 'Home';
		   	$this->load->view("view_registration.php", $data);
	  	}
	}

	public function welcome()
	{
		$data['title']= 'Welcome';
		$this->load->view('welcome_view.php', $data);
		
	}
	
	
	public function login(){
	  	$username=$this->input->post('username');
	  	$password=md5($this->input->post('password'));

	  	$result=$this->users_model->login($username,$password);
	  	
	  	if($result) redirect($this->session->userdata('last_page'));
	  	else        $this->signin_error();
	}

	public function login_to_upload(){
	  	$username=$this->input->post('username');
	  	$password=md5($this->input->post('password'));

	  	$result=$this->users_model->login($username,$password);
	  	
	  	if($result) redirect(base_url() . 'songs/add');
	  	else        $this->signin_error();
	}

	public function logout(){
	  	$newdata = array(
	  	'user_id'   =>'',
	  	'user_name'  =>'',
	  	'user_email'     => '',
	  	'logged_in' => FALSE,
	  	'welcome_message' => '',
	  	);
	  	$this->session->unset_userdata($newdata);
	  	// $this->session->sess_destroy();
	  	redirect($this->session->userdata('last_page'));

	}
	
	public function thank(){
	  	$data['title']= 'Thank';
	  	
	  	$this->load->view('thank_view.php', $data);
	  	
	}

	public function signup(){
	  	$this->load->library('form_validation');
	  	// field name, error message, validation rules
	  	$this->form_validation->set_rules('username', 'Username', 'is_unique[users.user_name]|trim|required|min_length[4]|xss_clean');
	  	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
	  	$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

	  	if($this->form_validation->run() == FALSE){
	   		$this->signup_error();
	  	}
	  	else {
	   		$result=$this->users_model->add_user();
	   		$newdata = array(
    		  'welcome_message'  => "Welcome to Yoddlem!",
    		);
	   		$this->session->set_userdata($newdata);
	   		$this->login();
	 	}
	}

	public function signin_error(){
		$data['page_title']= 'Sign up for Yoddlem';
		$data['signin_error']= 'Incorrect username or password.';
		$this->load->view('elements/view_header_logged_out', $data);
		$this->load->view('view_signin', $data);
		$this->load->view('elements/view_footer');
	}

	public function signup_error(){
		$data['page_title']= 'Sign up for Yoddlem';
		$this->load->view('elements/view_header_logged_out', $data);
		$this->load->view('view_signup');
		$this->load->view('elements/view_footer');
	}
	 


	/////

	public function profile($username){
		//load user info
		$this->load->model('users_model');
		$result = $this->users_model->loadUser("$username");
		$data = $result[0];
		$data['isFollower'] = $this->users_model->isFollower($data['id'], $this->session->userdata('user_id'));
		
		//get followers
		$followers = $this->users_model->getFollowers($data['id']);
		if ($followers){
			$data['followers'] = $followers;
			foreach ($followers as $key => $follower){
				$follower_user = $this->users_model->getUserByID($follower['follower_id']);
				//append follows into follow array
				$data['followers'][$key]['follower'] = $follower_user[0];

				//check if the user that's currently logged in follows each of the followers
				if ($this->session->userdata('user_name')!=""){
					$data['followers'][$key]['follower']['follow_status'] = $this->users_model->isFollower($follower_user[0]['id'], $this->session->userdata('user_id'));
				}else{
					$data['followers'][$key]['follower']['follow_status'] = 0;
				}
			}
		}else{
			$data['followers'] = 0;
		}

		//get followings
		$followings = $this->users_model->getFollowings($data['id']);
		if ($followings){
			$data['followings'] = $followings;
			foreach ($followings as $key => $following){
				$following_user = $this->users_model->getUserByID($following['user_id']);
				//append follows into follow array
				$data['followings'][$key]['following'] = $following_user[0];

				//check if the user that's currently logged in follows each of the followings
				if ($this->session->userdata('user_name')!=""){
					$data['followings'][$key]['following']['follow_status'] = $this->users_model->isFollower($following_user[0]['id'], $this->session->userdata('user_id'));
				}else{
					$data['followings'][$key]['following']['follow_status'] = 0;
				}
			}
		}else{
			$data['followings'] = 0;
		}

		//load user's song info
		$this->load->model('songs_model');

		//get albums
		$albums = $this->songs_model->loadAlbums($data['id']);

		if ($albums){
			$data['albums'] = $albums;
			//for each album, load all the songs within that album
			foreach ($data['albums'] as $key => $album_index){
				$album_songs = $this->songs_model->loadSongsFromAlbum($album_index['id']);
				//append songs into album array
				$data['albums'][$key]['songs'] = $album_songs;
			}
		}else{
			$data['albums'] = 0;
		}

		//get singles
		$singles = $this->songs_model->loadSingles($data['id']);

		if ($singles){
			$data['singles'] = $singles;
		}else{
			$data['singles'] = 0;
		}

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		$this->session->set_userdata('last_page', current_url());

		$data['page_title']= $username;
		if(($this->session->userdata('user_name')!="")){ //logged in
			$this->load->view('elements/view_header_logged_in', $data);
			$this->load->view('view_profile', $data);
			$this->load->view('elements/view_footer');
		}else{
			$this->load->view('elements/view_header_logged_out', $data);
			$this->load->view('view_profile', $data);
			$this->load->view('elements/view_footer');
		}

	}

	public function edit($username){
		
		
		if(($this->session->userdata('user_name') == $username)){ //logged in

			//get user info
			$this->load->model('users_model');
			$result = $this->users_model->loadUser("$username");
			$data = $result[0];
			$data['page_title']= $username . ' - Edit Profile';
			$data['updated_message'] = 0;
			//load the edit profile page
			$this->load->view('elements/view_header_logged_in', $data);
			$this->load->view('view_update_profile', $data);
			$this->load->view('elements/view_footer');
		}else{ // if not the owner, redirect to profile page
			redirect(base_url() . 'user/profile/' . $username );
		}

	}

	public function addUser(){
		$this->load->model('users_model');

		$user_name = "mtminded";
		$first_name ="Mike";
		$last_name = "Tang";
		$email = "blah blah";
		$password = 123123;
		$salt = 12;
		$type = 1;
		$pic = "asdf/asdf/asdf.png";
		$pic_squre = "asdf/asdf/asdf.png";
	
		$data = array(
			"user_name" => $user_name,
			"first_name" => $first_name,
			"last_name" => $last_name,
			"email" => $email,
			"password" => $password,
			"salt" => $salt,
			"type" => $type,
			"pic" => $pic,
			"pic_square" => $pic_squre
		);
		
		$this->users_model->addUser($data);
		echo "it has been added";
	}


	public function update($username){
		$this->load->model('users_model');		
		$this->users_model->updateUser($username);
		
		redirect(base_url() . 'user/profile/' . $username );
	}


	public function follow($user_id){
		$current_user = $this->session->userdata('user_id');
		if(($current_user!="" && $current_user != $user_id)){ //logged in and not the user to be followed
			
			$this->load->model('users_model');
			$this->users_model->followUser($user_id, $current_user);
			echo "1";
			
		}else{ // if not the owner, redirect to profile page
			redirect($this->session->userdata('last_page'));
		}
	}

	public function unfollow($user_id){
		$current_user = $this->session->userdata('user_id');
		if(($current_user!="" && $current_user != $user_id)){ //logged in and not the user to be followed
			
			$this->load->model('users_model');
			$this->users_model->unfollowUser($user_id, $current_user);
			echo "1";
			
		}else{ // if not the owner, redirect to profile page
			redirect($this->session->userdata('last_page'));
		}
	}

	public function upload_pic(){
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/profile_pics/';

		foreach ($_FILES["pic"]["error"] as $key => $error) {
		    if ($error == UPLOAD_ERR_OK) {
				
		        $name = $_FILES["pic"]["name"][$key];
				$name =  str_replace("'", "", $name);
				$name =  str_replace(" ", "_", $name);
				$name = stripslashes($name);
				if (file_exists($targetPath . $name)){
					$now = 1;
					while(file_exists($targetPath . $now . '-' . $name))
						$now++;
					$targetName= $now . '-' . $name;
				}else{
					$targetName= $name;
				}
				if (count($_FILES["pic"]["error"]) == $key + 1)
		        	move_uploaded_file( $_FILES["pic"]["tmp_name"][$key], $targetPath . $targetName);
		    }
		}
		echo $targetName;
	}

	public function upload_banner(){
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/profile_banners/';

		foreach ($_FILES["banner"]["error"] as $key => $error) {
		    if ($error == UPLOAD_ERR_OK) {
				
		        $name = $_FILES["banner"]["name"][$key];
				$name =  str_replace("'", "", $name);
				$name =  str_replace(" ", "_", $name);
				$name = stripslashes($name);
				if (file_exists($targetPath . $name)){
					$now = 1;
					while(file_exists($targetPath . $now . '-' . $name))
						$now++;
					$targetName= $now . '-' . $name;
				}else{
					$targetName= $name;
				}
				if (count($_FILES["banner"]["error"]) == $key + 1)
		        	move_uploaded_file( $_FILES["banner"]["tmp_name"][$key], $targetPath . $targetName);
		    }
		}
		echo $targetName;
	}
	
}