<?php

class Users_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	function login($username,$password){
	  	$this->db->where("user_name",$username);
	  	$this->db->where("password",$password);

	  	$query=$this->db->get("users");
	  	if($query->num_rows()>0) {
	   		foreach($query->result() as $rows){
	    		//add all data to session
	    		$newdata = array(
	    		  'user_id'  => $rows->id,
	    		  'user_name'  => $rows->user_name,
	    		  'user_email'    => $rows->email,
	    		  'logged_in'  => TRUE,
	    		);
	   		}
	   		$this->session->set_userdata($newdata);
	   		return true;
	  	}
	  	return false;
	}
	 
	public function add_user(){
	  	$data=array(
	    	'user_name'=>$this->input->post('username'),
	    	'password'=>md5($this->input->post('password'))
	  	);
	  	$this->db->insert('users',$data);
	}

	function addUser($data){
		$this->db->insert("users", $data);
	}
	function loadUser($username){
		$query = $this->db->query("SELECT * FROM users WHERE user_name = '$username'");
		return $query->result_array();
	}
	function getUserByID($id){
		$query = $this->db->query("SELECT * FROM users WHERE id = $id");
		return $query->result_array();
	}
	function updateUser($username){
		$data = array(
			"first_name" => $this->input->post('first_name'),
			"last_name" => $this->input->post('last_name'),
			"email" => $this->input->post('email'),
			"pic" => $this->input->post('profile_picture'),
			"cover" => $this->input->post('profile_banner'),
			// "user_id" => $this->session->userdata('user_id'),
			// "album_id" => $album_id,
			// "genre" => $this->session->userdata('genre'),
		);
		$this->db->update('users', $data, "user_name = '$username'");
	}

	function isFollower($user_id, $follower_id){
		//check if user is already followed
		$query = $this->db->query("SELECT * FROM followers WHERE user_id = '$user_id' AND follower_id = '$follower_id'");
		$result = $query->result_array();

		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	function followUser($user_id, $follower_id){
		//check if user is already followed
		$query = $this->db->query("SELECT * FROM followers WHERE user_id = '$user_id' AND follower_id = '$follower_id'");
		$result = $query->result_array();

		if (!$result){
			$data = array(
				"user_id" => $user_id,
				"follower_id" => $follower_id,
			);
			$this->db->insert('followers', $data);
		};
	}
	function unfollowUser($user_id, $follower_id){
		//check if user is already followed
		$query = $this->db->query("SELECT * FROM followers WHERE user_id = '$user_id' AND follower_id = '$follower_id'");
		$result = $query->result_array();

		if ($result){
			$this->db->delete('followers', "user_id = $user_id AND follower_id = $follower_id"); 
		};

	}

	function getFollowers($user_id){
		$query = $this->db->query("SELECT * FROM followers WHERE user_id = '$user_id'");
		return $query->result_array();
	}
	function getFollowings($user_id){
		$query = $this->db->query("SELECT * FROM followers WHERE follower_id = '$user_id'");
		return $query->result_array();
	}


}

?>