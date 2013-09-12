<?php

class Users extends CI_Model{
	function getUser() {
		$query = $this->db->query("select * from users");
		return $query;
	}
	
	function getUserById($id) {
		$this->db->where('id', $id);
		$result = $this->db->get('player');
		return $result;
	}
	
}