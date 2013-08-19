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
		$subject_id = $this->input->post('id');
		$this->load->model('question');
		$question = $this->question->getSubjectQuestionList($subject_id);
		$this->load->model('choice');
		$choice = $this->choice->getChoiceList();
	
		$mathematics = array();
		$choices = array();
		$question_counter = 0;
		$this->load->helper('array');
		
		for ($i=0; $i < count($question); $i++) {
			$choice_counter = 0;
			for ($j=0; $j < count($choice); $j++) {
				if ($choice[$j][2] == $question[$i][0]) {
					$choices[$choice_counter] = $choice[$j][1];
					$choice_counter++;
				}
			}
			$mathematics[$question_counter] = array($question[$i][1], $choices, $question[$i][2]);
			$question_counter++;
		}
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