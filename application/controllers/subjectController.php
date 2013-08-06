<?php

class SubjectController extends CI_Controller {
	public function index()
	{
		$this->load->view('game/subjectList');
	}
	
	public function general_knowledge()
	{
		$generalKnowledge_txt = fopen('questions/general_knowledge.txt', 'r');
		fclose($generalKnowledge_txt);
	}

	public function mathematics()
	{
		$mathematics = array();
		$question = "";
		$choices = array();
		$counter = 0;
		$counterTemp = 0;
		$choice_counter = 0;
		$mathematics_txt = fopen('questions/mathematics.txt', 'r');
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
		fclose($science_txt);
		  
		$data['mathematics'] = $mathematics;
		$this->load->view('game/mathematics', $data);
	}
	
	public function science()
	{
		$science_txt = fopen('questions/science.txt', 'r');
		fclose($science_txt);
	}

	public function english()
	{
		$english_txt = fopen('questions/english.txt', 'r');
		fclose($english_txt);
	}
}