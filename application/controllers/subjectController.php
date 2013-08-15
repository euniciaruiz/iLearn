<?php

class SubjectController extends CI_Controller {
	public function play()
	{
		$this->load->model('subject');
		$data['query'] = $this->subject->getSubjectList();
		$this->load->view('game/subjectList', $data);
	}
	
	public function general_knowledge()
	{
		$gen_knowledge = array();
		$question = "";
		$choices = array();
		$counter = 0;
		$counterTemp = 0;
		$choice_counter = 0;
		$generalKnowledge_txtfile = fopen('questions/general_knowledge.txt', 'r');
		
		while ($line = fgets($generalKnowledge_txtfile)) {
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
		fclose($generalKnowledge_txtfile);
		
		$data['gen_knowledge'] = $gen_knowledge;
		$this->load->view('game/gen_knowledge', $data);
	}

	public function mathematics()
	{
		$mathematics = array();
		$question = "";
		$choices = array();
		$counter = 0;
		$counterTemp = 0;
		$choice_counter = 0;
		$mathematics_txtfile = fopen('questions/mathematics.txt', 'r');
		while ($line = fgets($mathematics_txtfile)) {
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
		fclose($mathematics_txtfile);  
		$data['mathematics'] = $mathematics;
		$this->load->view('game/mathematics', $data);
	}
	
	public function science()
	{
		$science_txtfile = fopen('questions/science.txt', 'r');
		fclose($science_txtfile);
	}

	public function english()
	{
		$english_txtfile = fopen('questions/english.txt', 'r');
		fclose($english_txtfile);
	}
}