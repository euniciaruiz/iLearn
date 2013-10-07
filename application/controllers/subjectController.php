<?php

class SubjectController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Subject', 'subject', TRUE);
	}

	public function play()
	{
		$data['query'] = $this->subject->getSubjectList();
		$this->load->view('game/subjectList', $data);
	}
	
	public function help(){
		$this->load->view('mainmenu/help');
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
		
		$data['question_limit'] = 0;
		$data['score'] = 0;
		$data['lives'] = 3;
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
		
		$data['question_limit'] = 0;
		$data['score'] = 0;
		$data['lives'] = 3;
		$data['mathematics'] = $mathematics;
		$this->load->view('game/mathematics', $data);
	}
	
	public function science()
	{
		$subject_id = $this->input->post('id');
		$this->load->model('question');
		$question = $this->question->getSubjectQuestionList($subject_id);
		$this->load->model('choice');
		$choice = $this->choice->getChoiceList();
		
		$science = array();
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
			$science[$question_counter] = array($question[$i][1], $choices, $question[$i][2]);
			$question_counter++;
		}
		
		$data['question_limit'] = 0;
		$data['score'] = 0;
		$data['lives'] = 3;
		$data['science'] = $science;
		$this->load->view('game/science', $data);
	}

	public function english()
	{
		$subject_id = $this->input->post('id');
		$this->load->model('question');
		$question = $this->question->getSubjectQuestionList($subject_id);
		$this->load->model('choice');
		$choice = $this->choice->getChoiceList();
		
		$english = array();
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
			$english[$question_counter] = array($question[$i][1], $choices, $question[$i][2]);
			$question_counter++;
		}
		
		$data['question_limit'] = 0;
		$data['lives'] = 3;
		$data['score'] = 0;
		$data['english'] = $english;
		$this->load->view('game/english', $data);
	}
	
	public function next_question() {
		$this->load->model('playerStatistics');
		$this->load->model('player');
		$is_logged_in = $this->session->userdata('is_logged_in');

		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			$player = null;
		}
		else {
			$player = $this->player->getPlayerData($this->session->userdata('username'));
		};
 		$data = array(
				'question_limit' => $this->input->post('questionlimit'),
				'lives' => $this->input->post('livestemp'),
				'score' => $this->input->post('scoretemp'),
				'subject_name' => $this->input->post('subject_name'),
				'subject_array' => $this->input->post('subject')
 		);
 
 		if($data['subject_name'] == "general_knowledge") {
 			$subject_id = 0;
			$data['question_limit'] = unserialize($data['question_limit']);

			if($data['question_limit'] == 5){
				if($player != null) {
				$data = array(
					'player_id' => $player[0]['id'],
					'score' => unserialize($data['score']),
					'subject'=> "General knowledge",
					'date' => date('Y-m-d')
				);
				$this->playerStatistics->createPlayerStatistics($data);
			}

 				$this->load->view('game/limit_page');
 			}
 			else{
 				$data['score'] = unserialize($data['score']);
				$data['lives'] = unserialize($data['lives']);
				if($data['lives'] > 0){
					$data['general_knowledge'] = unserialize(base64_decode($data['subject_array']));
					$this->load->view('game/general_knowledge', $data);
				}
				else{
					if($player != null || $player != "") {
						$data = array(
							'player_id' => $player[0]['id'],
							'score' => $data['score'],
							'subject'=> "General knowledge",
							'date' => date('Y-m-d')
						);
						$this->playerStatistics->createPlayerStatistics($data);
					}

					$this->load->view('mainmenu/game_over');
				}
 			}
 		}
 		else if($data['subject_name'] == "mathematics") {
			$data['question_limit'] = unserialize($data['question_limit']);
				
			if($data['question_limit'] == 5){
				$data = array(
					'player_id' => $player[0]['id'],
					'score' => unserialize($data['score']),
					'subject'=> "Mathematics",
					'date' => date('Y-m-d')
				);
				$this->playerStatistics->createPlayerStatistics($data);

 				$this->load->view('game/limit_page');
 			}
 			else{
 				$data['score'] = unserialize($data['score']);
				$data['lives'] = unserialize($data['lives']);
				if($data['lives'] > 0){
					$data['mathematics'] = unserialize(base64_decode($data['subject_array']));
					$this->load->view('game/mathematics', $data);}
				else{
					$data = array(
						'player_id' => $player[0]['id'],
						'score' => unserialize($data['score']),
						'subject'=> "Mathematics",
						'date' => date('Y-m-d')
					);
					$this->playerStatistics->createPlayerStatistics($data);

					$this->load->view('mainmenu/game_over');
				}
 			}
 		}
 		else if($data['subject_name'] == "science") {
			$data['question_limit'] = unserialize($data['question_limit']);
				if($data['question_limit'] == 5){
					$data = array(
						'player_id' => $player[0]['id'],
						'score' => unserialize($data['score']),
						'subject'=> "Science",
						'date' => date('Y-m-d')
					);
					$this->playerStatistics->createPlayerStatistics($data);

 					$this->load->view('game/limit_page');
 				}
 				else{
 					$data['score'] = unserialize($data['score']);
					$data['lives'] = unserialize($data['lives']);
					if($data['lives'] > 0){
						$data['science'] = unserialize(base64_decode($data['subject_array']));
						$this->load->view('game/science', $data);}
					else{
						$data = array(
							'player_id' => $player[0]['id'],
							'score' => unserialize($data['score']),
							'subject'=> "Science",
							'date' => date('Y-m-d')
						);
						$this->playerStatistics->createPlayerStatistics($data);

						$this->load->view('mainmenu/game_over');
					}
 				}
 		}
		else {		
			$data['question_limit'] = unserialize($data['question_limit']);
				if($data['question_limit'] == 5){
					$data = array(
						'player_id' => $player[0]['id'],
						'score' => unserialize($data['score']),
						'subject'=> "English",
						'date' => date('Y-m-d')
					);
					$this->playerStatistics->createPlayerStatistics($data);
 					$this->load->view('game/limit_page');
 				}
 				else{
 					$data['score'] = unserialize($data['score']);
					$data['lives'] = unserialize($data['lives']);
					if($data['lives'] > 0){
						$data['english'] = unserialize(base64_decode($data['subject_array']));
						$this->load->view('game/english', $data);}
					else{
						$data = array(
							'player_id' => $player[0]['id'],
							'score' => unserialize($data['score']),
							'subject'=> "English",
							'date' => date('Y-m-d')
						);
						$this->playerStatistics->createPlayerStatistics($data);

						$this->load->view('mainmenu/game_over');
					}
 				}
 		}
 	}
}