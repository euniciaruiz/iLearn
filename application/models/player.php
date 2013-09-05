<?php

class Player extends CI_Model {
	function getPlayerList() {
		$result = $this->db->get('player');
		return $result;
	}
	
	function addPlayer($data)
	{
		$this->db->insert('player', $data);
		return;
	}
}