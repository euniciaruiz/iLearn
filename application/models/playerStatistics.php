<?php

class PlayerStatistics extends CI_Model {
	function getGameStatistics($playerId, $date) {
		$this->db->where('player_id', $playerId);
		$this->db->where('date', $date);
		$result = $this->db->get('player_statistics');
		return $result->result_array();
	}

	function getAllDates($month, $year) {
		$result = $this->db->query("SELECT DISTINCT date from player_statistics where EXTRACT(MONTH FROM date) = $month and EXTRACT(YEAR FROM date) = $year order by date asc");
		return $result;
	}

	function getGameStatisticForSubject($subjectId, $date) {
		$this->db->where('subject_id', $subjectId);
		$this->db->where('date', $date);
		$query = $this->db->get('player_statistics');

		if($query->num_rows == 1) {
			return true;
		}
		return false;
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

	function getGameStatisticsBySubject($playerId, $subjectId, $month, $year) {
		$result = $this->db->query("SELECT score from player_statistics where EXTRACT(MONTH FROM date) = $month and EXTRACT(YEAR FROM date) = $year and subject_id = $subjectId and player_id = $playerId order by date asc");
		return $result;
	}
}