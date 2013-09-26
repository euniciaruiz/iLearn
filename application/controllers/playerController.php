<?php

class PlayerController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Player', 'player', TRUE);
	}

	public function index() {
		$this->load->view('mainMenu/home');
	}
	
	public function create()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[player.username]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$this->player->addPlayer($data);
			$this->index();
		}
	}
}
?>