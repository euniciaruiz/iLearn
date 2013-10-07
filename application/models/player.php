<?php

class Player extends CI_Model {
	function getPlayerList() 
	{
		$result = $this->db->get('player');
		return $result;
	}

	function getPlayerData($username) 
	{
		$this->db->where('username', $username);
		$query = $this->db->get('player');
		return $query->result_array();
	}
	
	function addPlayer($data)
	{
		$this->db->insert('player', $data);
		return;
	}
	
	function validate($username, $password) 
	{
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get('player');

		if($query->num_rows == 1) {
			return true;
		}
	}
}