<?php

class Subject extends CI_Model {
	function getSubjectList() {
		$result = $this->db->get('subject');
		return $result;
	}
}