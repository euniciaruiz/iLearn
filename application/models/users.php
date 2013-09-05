<?php

class Users extends CI_Model{
	function getUser() {
		$query = $this->db->query("select * from users");
		return $query;
	}
	
}