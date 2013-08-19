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
		$subject_id = $this->input->post('id');
		$this->load->model('question');
		$question = $this->question->getSubjectQuestionList($subject_id);
		$this->load->model('choice');
		$choice = $this->choice->getChoiceList();
		
		$general_knowledge = array();
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
			$general_knowledge[$question_counter] = array($question[$i][1], $choices, $question[$i][2]);
			$question_counter++;
		}
		
		
		$data['general_knowledge'] = $general_knowledge;
		$this->load->view('game/general_knowledge', $data);
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