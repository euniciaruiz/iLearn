<?php

class Question extends CI_Model {
	function getSubjectQuestionList($subject_id) {
		$this->db->where('subject_id', $subject_id);
		$query = $this->db->get('question');

		$data = array();
		foreach($query->result() as $row)
		{
		  $data[] = $row;
		}
		return $data;
	}
}