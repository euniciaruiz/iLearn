<?php

class Choice extends CI_Model {
	function getChoiceList() {
		$query = $this->db->get('choice');
		
		$data = array();
		foreach($query->result() as $row)
		{
		  $data[] = $row;
		}
		return $data;
	}
}