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
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[player.username]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
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
			$this->load->view('mainMenu/login');
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
			$this->session->set_flashdata('msg', 'Incorrect Username/Password Combination');
			$this->login();
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
		$this->load->view('player/delete_account');
	}

	public function deletePlayer() {
		$this->player->deletePlayer($this->input->post('id'));
		$this->player_profile();
	}

	public function game_statistics($date) {
		$this->is_logged_in();
		$FC = new FusionCharts();

		$strParam="caption=Game Statistics;subcaption=[".$date."];xAxisName=Subject;yAxisName=Score;decimalPrecision=0";
		$FC->setChartParams($strParam);

		$player = $this->player->getPlayerData($this->session->userdata('username'));
	
 		$this->load->model('playerStatistics');
		$query = $this->playerStatistics->getGameStatistics($player[0]['id'], $date);

		/*foreach ($query as $key) {
			$FC->addChartData($key['score'], "name=".$key['subject']);
		};*/

		$this->load->model('subject');
		foreach ($query as $key) {
			$subject = $this->subject->getSubjectName($key['subject_id']);
			$FC->addChartData($key['score'], "name=".$subject);
		};

		print $FC->getXML();
	}
}
?>