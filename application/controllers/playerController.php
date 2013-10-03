<?php

class PlayerController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Player', 'player', TRUE);
	}

	public function index() {
		$this->load->view('mainMenu/home');
	}
	
	public function signup() {
		$this->load->view('mainMenu/create');
	}
	
	public function create()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[player.username]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->signup();
		}
		else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$this->player->addPlayer($data);
			$this->load->view('mainMenu/login');
		}
	}
	
	public function login() {
		$this->load->view('mainMenu/login');
	}
	
	function validate_credentials() {
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
			redirect('subjectController/play');
		}
		else {
			$this->load->view('mainMenu/home');
		}
	}

	function logout()  
	{  
	    $this->session->sess_destroy();  
	    $this->index();
	}  
	
	public function game_statistics($date) {
		$FC = new FusionCharts();

		$strParam="caption=Game Statistics;subcaption=[".$date."];xAxisName=Subject;yAxisName=Score;decimalPrecision=0";
		$FC->setChartParams($strParam);

 		$this->load->model('playerStatistics');
		$query = $this->playerStatistics->getPlayerStatistics($date);

		foreach ($query as $key) {
			$FC->addChartData($key['score'], "name=".$key['subject']);
		}
		
		print $FC->getXML();
	}
}
?>