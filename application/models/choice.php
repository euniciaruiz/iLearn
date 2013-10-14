<?php

class Choice extends CI_Model {
	function getChoiceList() {
		$query = "select * from choice";
		$result = pg_query($query);
		$data = array();
		$counter = 0;
		while ($row = pg_fetch_array($result)) {
			$data[$counter] = $row;
			$counter++;
		}
		return $data;
	}
}