<?php

class PlayerStatistics extends CI_Model {
	function getGameStatistics($playerId, $date) {
		$this->db->where('player_id', $playerId);
		$this->db->where('date', $date);
		$result = $this->db->get('player_statistics');
		return $result->result_array();
	}

	function createPlayerStatistics($data) {
		$this->db->where('subject_id', $data['subject_id']);
		$this->db->where('date', $data['date']);
		$query = $this->db->get('player_statistics');

		if($query->num_rows == 1) {
			$this->db->where('subject_id', $data['subject_id']);
			$this->db->where('date', $data['date']);
			$this->db->delete('player_statistics');

			$this->db->insert('player_statistics', $data);
		}
		else {
			$this->db->insert('player_statistics', $data);
		};
		
		return;
	}

	function deletePlayerStatistics($playerId) {
		$this->db->where('player_id', $playerId);
		$this->db->delete('player_statistics');
	}
}