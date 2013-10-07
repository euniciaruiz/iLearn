<?php

class Subject extends CI_Model {
	function getSubjectList() {
		$result = $this->db->get('subject');
		return $result;
	}

	function getSubjectId($subjectName) {
		$this->db->where('subject_name', $subjectName);
		$result = $this->db->get('subject');
		return $result;
	}

	function getSubject($id) {
		$this->db->where('id', $id);
		$result = $this->db->get('subject');
		return $result->result_array();
	}
}