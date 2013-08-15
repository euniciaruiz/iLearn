<?php

class Choice extends CI_Model {
	function getChoiceList() {
		$result = $this->db->get('choice');
		return $result;
	}
}