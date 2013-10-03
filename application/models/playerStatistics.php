<?php

class PlayerStatistics extends CI_Model {
	function getPlayerStatistics($date) {
		$this->db->where('date', $date);
		$result = $this->db->get('player_statistics');
		return $result->result_array();
	}
}