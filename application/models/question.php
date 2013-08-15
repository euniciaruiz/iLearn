<?php

class Question extends CI_Model {
	function getSubjectQuestionList($subject_id) {
		$this->db->where('subject_id', $subject_id);
		$result = $this->db->get('question');
		return $result;
	}
}