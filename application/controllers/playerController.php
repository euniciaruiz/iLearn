<?php

class PlayerController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Player', 'player', TRUE);
		$this->load->library('FusionCharts');
        $this->swfCharts  = base_url().'Charts/';
	}

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');

		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page. <a href="../playerController/login">Login</a>';
			die();
		}
	}

	public function index() {
		$this->load->view('mainMenu/home');
	}
	
	public function signup() {
		$this->load->view('mainMenu/create');
	}
	
	public function create()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[player.username]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->signup();
		}
		else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);
			$this->player->addPlayer($data);
			redirect('playerController/login');
			//$this->load->view('mainMenu/login');
		}
	}
	
	public function login() {
		$this->load->view('mainMenu/login');
	}
	
	public  function validate_credentials() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('player');
		$query = $this->player->validate($username, $password);
		
		if($query) {
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);

			$this->session->set_userdata($data);
			redirect('mainMenuController');
		}
		else {
			$this->session->set_flashdata('flashError', 'Incorrect Username/Password Combination');
			redirect('playerController/login');
		}
	}

	function logout()  
	{
		$this->is_logged_in();
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
	    $this->session->sess_destroy();
	    $this->index();
	}  
	
	public function player_profile() {
		$this->is_logged_in();
		$username = $this->session->userdata('username');
		$data['query'] = $this->player->getPlayerData($username);
		$this->load->view('player/profile', $data);
	}

	public function editUsername() {
		$this->is_logged_in();
		$username = $this->session->userdata('username');
		$data['query']= $this->player->getPlayerData($username);
		$this->load->view('player/edit_username', $data);
	}

	public function updateUsername()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[player.username]|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->editUsername();
		}
		else {
			$data = array(
				'id' => $this->input->post('id'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			);

			$this->player->updatePlayer($data);
			$this->player_profile();
		}
	}

	public function editPassword() {
		$this->is_logged_in();
		$username = $this->session->userdata('username');
		$data['query'] = $this->player->getPlayerData($username);
		$this->load->view('player/edit_password', $data);
	}

	public function updatePassword()
	{
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->editPassword();
		}
		else {
			$data = array(
				'id' => $this->input->post('id'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			);

			$this->player->updatePlayer($data);
			$this->player_profile();
		}
	}

	public function deleteAccount() {
		$this->is_logged_in();
		$username = $this->session->userdata('username');
		$data['query'] = $this->player->getPlayerData($username);
		$this->load->view('player/delete_account', $data);
	}

	public function deletePlayer($playerId) {
		$this->load->model('playerStatistics');
		$this->playerStatistics->deletePlayerStatistics($playerId);
		$this->player->deletePlayer($playerId);
		$this->logout();
	}

	public function chart() {
		$this->is_logged_in();
		$data['currentDate'] = date('Y-m-d');
		$this->load->view('game/chart', $data);
	}

	public function gameStatisticsDay() {
		$this->is_logged_in();
		$FC = new FusionCharts("Column3D", "600", "430");
		$FC->setSWFPath(base_url().'Charts/');

		$date = $this->input->post('date');

		$strParam="caption=Game Statistics;subcaption=[".$date."];xAxisName=Subject;yAxisName=Score;decimalPrecision=0";
		$FC->setChartParams($strParam);

		$player = $this->player->getPlayerData($this->session->userdata('username'));
	
 		$this->load->model('playerStatistics');
		$query = $this->playerStatistics->getGameStatistics($player[0]['id'], $date);

		$this->load->model('subject');
		foreach ($query as $key) {
			$subject = $this->subject->getSubjectName($key['subject_id']);
			$FC->addChartData($key['score'], "name=".$subject);
		};

		$data['chart'] = $FC;
        $data['currentDate'] = date('Y-m-d');
		$this->load->view('game/chart1', $data);
	}

	public function gameStatisticsMonth() {
		$this->is_logged_in();
        $FC = new FusionCharts("MSLine","700","400");
        $FC->setSWFPath(base_url().'Charts/');
        
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        $strParam="caption=Game Statistics;subcaption=[".$month.", ".$year."];xAxisName=Days;yAxisName=Score;decimalPrecision=0;showvalues=0;numvdivlines=10;drawanchors=0;divlinealpha=30;alternatehgridalpha=20;setadaptiveymin=1;canvaspadding=10;labelDisplay=ROTATE;palette=2";
        $FC->setChartParams($strParam);
        
        $player = $this->player->getPlayerData($this->session->userdata('username'));

        $this->load->model('playerStatistics');
        $date = $this->playerStatistics->getAllDates($month, $year);

        foreach ($date->result_array() as $key) {
            $FC->addCategory($key['date']);
        }

        $this->load->model('subject');
        $subject = $this->subject->getSubjectList();

        foreach ($subject->result_array() as $key) {
            if ($key['subject_name'] == "general knowledge") {
                $FC->addDataset("General Knowledge");
                $gameStatistics = $this->playerStatistics->getGameStatisticsBySubject($player[0]['id'], $key['id'], $month, $year);
                foreach ($gameStatistics->result_array() as $value) {
                    $FC->addChartData($value['score']);
                }
            }
            else if ($key['subject_name'] == "mathematics") {
                $FC->addDataset("Mathematics");
                $gameStatistics = $this->playerStatistics->getGameStatisticsBySubject($player[0]['id'], $key['id'], $month, $year);
                foreach ($gameStatistics->result_array() as $value) {
                    $FC->addChartData($value['score']);
                }
            }
            else if ($key['subject_name'] == "science") {
                $FC->addDataset("Science");
                $gameStatistics = $this->playerStatistics->getGameStatisticsBySubject($player[0]['id'], $key['id'], $month, $year);
                foreach ($gameStatistics->result_array() as $value) {
                    $FC->addChartData($value['score']);
                }
            }
            else if ($key['subject_name'] == "english") {
                $FC->addDataset("English");
                $gameStatistics = $this->playerStatistics->getGameStatisticsBySubject($player[0]['id'], $key['id'], $month, $year);
                foreach ($gameStatistics->result_array() as $value) {
                    $FC->addChartData($value['score']);
                }
            }
        }

		$data['chart'] = $FC;
        $data['currentDate'] = date('Y-m-d');
		$this->load->view('game/chart1', $data);
	}
	
	public function gameStatisticsRange() {
		$this->is_logged_in();
		$FC = new FusionCharts("MSLine","700","400");
		$FC->setSWFPath(base_url().'Charts/');

		$fromDate = $this->input->post('from');
        $toDate = $this->input->post('to');

		$strParam="caption=Game Statistics;subcaption=[".$fromDate."- ".$toDate."];xAxisName=Days;yAxisName=Score;decimalPrecision=0;showvalues=0;numvdivlines=10;drawanchors=0;divlinealpha=30;alternatehgridalpha=20;setadaptiveymin=1;canvaspadding=10;labelDisplay=ROTATE;palette=2";
        $FC->setChartParams($strParam);
        
        $player = $this->player->getPlayerData($this->session->userdata('username'));
        
        $fromTemp = new DateTime($fromDate);
        $toTemp = new DateTime($toDate);
        $fromYear = $fromTemp->format('Y');
        $fromMonth = $fromTemp->format('m');
        $fromDay = $fromTemp->format('d');
        $toYear = $toTemp->format('Y');
        $toMonth = $toTemp->format('m');
        $toDay = $toTemp->format('d');
 
        $this->load->model('playerStatistics');
        $date = $this->playerStatistics->getDateRange($fromYear, $fromMonth, $fromDay, $toYear, $toMonth, $toDay);
        
		foreach ($date->result_array() as $key) {
            $FC->addCategory($key['date']);
        }

        $this->load->model('subject');
        $subject = $this->subject->getSubjectList();

        foreach ($subject->result_array() as $key) {
            if ($key['subject_name'] == "general knowledge") {
                $FC->addDataset("General Knowledge");
                $gameStatistics = $this->playerStatistics->getGameStatisticsBySubject1($player[0]['id'], $key['id'], $fromYear, $fromMonth, $fromDay, $toYear, $toMonth, $toDay);
                foreach ($gameStatistics->result_array() as $value) {
                    $FC->addChartData($value['score']);
                }
            }
            else if ($key['subject_name'] == "mathematics") {
                $FC->addDataset("Mathematics");
                $gameStatistics = $this->playerStatistics->getGameStatisticsBySubject1($player[0]['id'], $key['id'], $fromYear, $fromMonth, $fromDay, $toYear, $toMonth, $toDay);
                foreach ($gameStatistics->result_array() as $value) {
                    $FC->addChartData($value['score']);
                }
            }
            else if ($key['subject_name'] == "science") {
                $FC->addDataset("Science");
                $gameStatistics = $this->playerStatistics->getGameStatisticsBySubject1($player[0]['id'], $key['id'], $fromYear, $fromMonth, $fromDay, $toYear, $toMonth, $toDay);
                foreach ($gameStatistics->result_array() as $value) {
                    $FC->addChartData($value['score']);
                }
            }
            else if ($key['subject_name'] == "english") {
                $FC->addDataset("English");
                $gameStatistics = $this->playerStatistics->getGameStatisticsBySubject1($player[0]['id'], $key['id'], $fromYear, $fromMonth, $fromDay, $toYear, $toMonth, $toDay);
                foreach ($gameStatistics->result_array() as $value) {
                    $FC->addChartData($value['score']);
                }
            }
        }
		$data['chart'] = $FC;
        $data['currentDate'] = date('Y-m-d');
		$this->load->view('game/chart1', $data);
	}
}
?>