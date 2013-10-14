<?php

class Subject extends CI_Model {
	function getSubjectList() {
		$result = $this->db->get('subject');
		return $result;
	}

	function getSubjectId($subjectName) {
		$this->db->where('subject_name', $subjectName);
		$result = $this->db->get('subject');
		$row = $result->row();
		return $row->id;
	}

	function getSubjectName($id) {
		$this->db->where('id', $id);
		$result = $this->db->get('subject');
		$row = $result->row();
		return $row->subject_name;
	}
}