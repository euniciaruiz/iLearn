<?php

class MainmenuController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Player', 'player', TRUE);
	}
	
	public function index()
	{	
		$this->load->model('player');
		$data['query'] = $this->player->getPlayerList();
		$this->load->view('mainMenu/home', $data);
	}
	
	function create()
	{
		$this->form_validation->set_rules('name', 'Player Name', 'required|is_unique[player.name]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else {
			$data = array(
				'name' => $this->input->post('name')
			);
			$this->player->addPlayer($data);
			$this->index();
		}
	}
	
	function help()
	{
		$this->load->view('mainMenu/help');
	}
	
	function exitGame()
	{
		echo 'close window';
	}
	
	function display() {
		$this->load->model('users');
		$data['users'] = $this->users->getUser();
		$this->load->view('mainMenu/user', $data);	
	}
	
	function display_player($id) {
		$this->load->model('users');
		$data['query'] = $this->users->getUserById($id);
		$this->load->view('mainMenu/home', $data);
		
	}
	
}
?>