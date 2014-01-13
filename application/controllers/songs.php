<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Songs extends CI_Controller {


	public function add(){

		//store this url in session, used when user logs in or logs out
        $this->session->set_userdata('last_page', current_url());

		$data['page_title']= 'Upload a song';
		$data['delete_message'] = 0;
		if(($this->session->userdata('user_name')!="")){ //logged in
			$this->load->view('elements/view_header_logged_in', $data);
			$this->load->view('view_upload_song');
			$this->load->view('elements/view_footer');
		}else{
			$this->load->view('elements/view_header_logged_out', $data);
			$this->load->view('view_home');
			$this->load->view('elements/view_footer');
		}
	}
	
	public function edit($song_id){

		$this->load->model('songs_model');
		$song = $this->songs_model->loadSong($song_id);

		$data=$song[0]; //assign the result to $data

		$data['page_title']= 'Edit Song';

		if(($this->session->userdata('user_id') == $data['user_id'])){ //logged in
			$this->load->view('elements/view_header_logged_in', $data);
			$this->load->view('view_edit_song', $data);
			$this->load->view('elements/view_footer');
		}else{
			redirect(base_url() .  'songs/play/' . $song_id);
		}
	}


	public function upload(){

		$this->load->model('songs_model');
		// $this->load->helper('date');

		if(($this->session->userdata('user_name')!="")){ //logged in
			
			$new_song_id = $this->songs_model->addSong();
			redirect(base_url() .  'songs/play/' . $new_song_id);
		}else{
			redirect(base_url());
		}
	}

	public function play($song_id){

		//get song info
		$this->load->model('songs_model');
		$song = $this->songs_model->loadSong($song_id);
		
		//get artist info
		$this->load->model('users_model');
		$user = $this->users_model->getUserByID($song[0]['user_id']);

		//get other songs by this artist
		$otherSongs['otherSongs'] = $this->songs_model->loadOtherSongsFromUser($song[0]['user_id'], $song[0]['id']);

		//pass data to view
		$data = array_merge($song[0], $user[0], $otherSongs);
		$data['song_id'] = $song_id;

		//store this url in session, used when user logs in or logs out
        $this->session->set_userdata('last_page', current_url());

		$data['page_title']= $song[0]['title'];
		if(($this->session->userdata('user_name')!="")){ //logged in
			//load previous vote info
			$data['previousVote'] = $this->songs_model->previousVote($song_id, $this->session->userdata('user_id'));
			$this->load->view('elements/view_header_logged_in', $data);
			$this->load->view('view_song', $data);
			$this->load->view('elements/view_footer');
		}else{
			$data['previousVote'] = 0;
			$this->load->view('elements/view_header_logged_out', $data);
			$this->load->view('view_song', $data);
			$this->load->view('elements/view_footer');
		}

	}

	public function update($song_id){
		$this->load->model('songs_model');
		$this->songs_model->updateSong($song_id);
		
		redirect(base_url() .  'songs/play/' . $song_id);
	}

	public function delete($song_id){

		$this->load->model('songs_model');
		$song = $this->songs_model->loadSong($song_id);

		//if user is the owener of song, then delete, else redirect to song page
		if ($song[0]['user_id'] == $this->session->userdata('user_id')){
			$this->songs_model->deleteSong($song_id);
			
			//redirect to upload page with delete confirmation message
			$data['page_title']= 'Upload a song';
			$data['delete_message'] = 'Song deleted, upload a new song.';
			$this->load->view('elements/view_header_logged_in', $data);
			$this->load->view('view_upload_song');
			$this->load->view('elements/view_footer');
			

		}else{
			redirect(base_url() .  'songs/play/' . $song_id);
		}

	}

	public function loadOtherSongsFromUser($user_id, $song_id){

		$this->load->model('songs_model');
		$result = $this->songs_model->loadOtherSongsFromUser($user_id, $song_id);

		return $result;


	}

	public function previous($song_id, $user_id){
		$this->load->model('songs_model');
		$previous_vote = $this->songs_model->previousVote($song_id, $user_id);

		echo $previous_vote[0]['vote'];
	}

	public function upvote($song_id){

		if(($this->session->userdata('user_name')!="")){ //logged in
			$this->load->model('songs_model');
			
			//prep the vote data
			$voteData = array(
				"vote" => 2,
				"song_id" => $song_id,
				"user_id" => $this->session->userdata('user_id')
			);

			//check to see if there was previous vote by this user
			$previous_vote = $this->songs_model->previousVote($song_id, $this->session->userdata('user_id'));

			if ($previous_vote == 2){  //if user already upvoted
				$this->songs_model->deleteVote(2, $song_id, $this->session->userdata('user_id'));
				echo 0;
			}else if ($previous_vote == 1){  //if user already downvoted
				$this->songs_model->changeVote($voteData, $song_id, $this->session->userdata('user_id'));
				echo 2;
			}else{	//if user has not voted
				$this->songs_model->vote($voteData, $song_id);
				echo 1;
			}

		}else{	//if not logged in
			redirect($this->session->userdata('last_page'));
		}
	}

	public function downvote($song_id){

		if(($this->session->userdata('user_name')!="")){ //logged in
			$this->load->model('songs_model');
			
			//prep the vote data
			$voteData = array(
				"vote" => 1,
				"song_id" => $song_id,
				"user_id" => $this->session->userdata('user_id')
			);

			//check to see if there was previous vote by this user
			$previous_vote = $this->songs_model->previousVote($song_id, $this->session->userdata('user_id'));

			if ($previous_vote == 2){  //if user already upvoted
				$this->songs_model->changeVote($voteData, $song_id, $this->session->userdata('user_id'));
				echo 2;
			}else if ($previous_vote == 1){  //if user already downvoted
				$this->songs_model->deleteVote(2, $song_id, $this->session->userdata('user_id'));
				echo 0;
			}else{	//if user has not voted
				$this->songs_model->vote($voteData, $song_id);
				echo 1;
			}
		}else{	//if not logged in
			redirect($this->session->userdata('last_page'));
		}
	}

	public function upload_cover(){
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/covers/';

		foreach ($_FILES["covers"]["error"] as $key => $error) {
		    if ($error == UPLOAD_ERR_OK) {
				
		        $name = $_FILES["covers"]["name"][$key];
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
				if (count($_FILES["covers"]["error"]) == $key + 1)
		        	move_uploaded_file( $_FILES["covers"]["tmp_name"][$key], $targetPath . $targetName);
		    }
		}
		echo $targetName;
	}

	public function upload_song_file(){
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/_mp3/';

		foreach ($_FILES["songs"]["error"] as $key => $error) {
		    if ($error == UPLOAD_ERR_OK) {
				
		        $name = $_FILES["songs"]["name"][$key];
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
				if (count($_FILES["songs"]["error"]) == $key + 1)
		        	move_uploaded_file( $_FILES["songs"]["tmp_name"][$key], $targetPath . $targetName);
		    }
		}
		echo $targetName;
	}

	
}