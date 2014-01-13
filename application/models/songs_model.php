<?php

class Songs_model extends CI_Model{
	
	function addSong(){

		$album_id = 0;
		$newSong = array(
			"title" => $this->input->post('title'),
			"file_path" => $this->input->post('file_path'),
			"cover_art" => $this->input->post('cover_art'),
			"description" => $this->input->post('description'),
			"user_id" => $this->session->userdata('user_id'),
			"album_id" => $album_id,
			"genre" => $this->session->userdata('genre'),
		);

		$this->db->insert("songs", $newSong);
		return mysql_insert_id();
	}
	function loadSong($song_id){
		$query = $this->db->query("SELECT * FROM songs WHERE id = $song_id");
		return $query->result_array();
	}
	function updateSong($song_id){
		$album_id = 0;
		$songData = array(
			"title" => $this->input->post('title'),
			"cover_art" => $this->input->post('cover_art'),
			"description" => $this->input->post('description'),
			"user_id" => $this->session->userdata('user_id'),
			"album_id" => $album_id,
			"genre" => $this->session->userdata('genre'),
		);
		$this->db->update('songs', $songData, "id = $song_id");
	}
	function deleteSong($song_id){
		$this->db->delete('songs', "id = $song_id"); 
	}
	function loadOtherSongsFromUser($user_id, $song_id){
		$query = $this->db->query("SELECT * FROM songs WHERE (user_id = $user_id AND id != $song_id) ORDER BY upvotes - downvotes DESC LIMIT 5");
		return $query->result_array();
	}

	function previousVote($song_id, $user_id){
		$query = $this->db->query("SELECT vote FROM votes WHERE song_id = $song_id AND user_id = $user_id");
		$result = $query->result_array();
		
		if ($result){
			return $result[0]['vote'];
		}else{
			return 0;
		}
	}
	function vote($voteData, $song_id){
		$this->db->insert("votes", $voteData);
		if ($voteData['vote'] == 2) { // upvote
			$this->db->query("UPDATE songs SET upvotes = upvotes + 1 WHERE id = $song_id");
		} elseif ($voteData['vote'] == 1) { // downvote
			$this->db->query("UPDATE songs SET downvotes = downvotes + 1 WHERE id = $song_id");
		}
	}
	function changeVote($voteData, $song_id, $user_id){
		$this->db->update('votes', $voteData, "song_id = $song_id AND user_id = $user_id");
		if ($voteData['vote'] == 2) { // upvote
			$this->db->query("UPDATE songs SET upvotes = upvotes + 1, downvotes = downvotes - 1 WHERE id = $song_id");
		} elseif ($voteData['vote'] == 1) { // downvote
			$this->db->query("UPDATE songs SET downvotes = downvotes + 1, upvotes = upvotes - 1 WHERE id = $song_id");
		}
	}
	function deleteVote($vote, $song_id, $user_id){
		$this->db->delete('votes', "song_id = $song_id AND user_id = $user_id"); 
		if($vote == 2)
			$this->db->query("UPDATE songs SET upvotes = upvotes - 1 WHERE id = $song_id");
		elseif($vote == 1)
			$this->db->query("UPDATE songs SET downvotes = downvotes - 1 WHERE id = $song_id");
	}
	function loadSingles($user_id){
		$query = $this->db->query("SELECT * FROM songs WHERE (user_id = $user_id AND album_id = 0)");
		return $query->result_array();
	}

	function loadAlbums($user_id){
		$query = $this->db->query("SELECT * FROM albums WHERE user_id = $user_id");
		return $query->result_array();
	}

	function loadSongsFromAlbum($album_id){
		$query = $this->db->query("SELECT * FROM songs WHERE album_id = $album_id");
		return $query->result_array();
	}

	function loadFeatured($type){
		$query = $this->db->query("SELECT * FROM featured WHERE type = $type");
		$result = $query->result_array();
		foreach ($result as $key => $song){
			
			//get song info
			$song_id = $song['song_id'];
			$query2 = $this->db->query("SELECT * FROM songs WHERE id = $song_id");
			$theSong = $query2->result_array();
			$result[$key]['song'] = $theSong[0];

			//get artist info
			$user_id = $theSong[0]['user_id'];
			$query3 = $this->db->query("SELECT * FROM users WHERE id = $user_id");
			$theUser = $query3->result_array();
			$result[$key]['song']['user'] = $theUser[0];
		}
		return $result;
	}

	function loadTrending(){
		$query = $this->db->query("SELECT * FROM songs ORDER BY upvotes DESC LIMIT 8");
		return $query->result_array();
	}

}
?>