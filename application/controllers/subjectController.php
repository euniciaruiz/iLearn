<?php

class SubjectController extends CI_Controller {
	public function index()
	{
		$this->load->view('game/subjectList');
	}

	public function mathematics()
	{
		$mathematics = array();
		$question = "";
		$choices = array();
		$counter = 0;
		$counterTemp = 0;
		$choice_counter = 0;

		while ($line = fgets($mathematics_txt)) {
			if ($counter == 0) {
				$question = $line;
				$counter = $counter + 1;
			} elseif ($counter == 1) {
				$choices[$choice_counter] = $line;
				$choice_counter = $choice_counter + 1;
				$counter = $counter + 1;
			} elseif ($counter == 2) {
				$choices[$choice_counter] = $line;
				$choice_counter = $choice_counter + 1;
				$counter = $counter + 1;
			} elseif ($counter == 3) {
				$choices[$choice_counter] = $line;
				$choice_counter = $choice_counter + 1;
				$counter = $counter + 1;
			} elseif ($counter == 4) {
				$choices[$choice_counter] = $line;
				$choice_counter = $choice_counter + 1;
				$counter = $counter + 1;
			} else {
				$answer = $line;
				$mathematics[$counterTemp] = array($question, $choices, $answer);
				$counter = $counter + 1;
			}
			if($counter == 6) {
				$counter = 0;
				$choice_counter = 0;
				$choices = array();
				$counterTemp = $counterTemp + 1;
			}
			
		}
		
		  
		$data['mathematics'] = $mathematics;
		$this->load->view('game/mathematics', $data);
	}
	
	
}