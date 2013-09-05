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
	
	function help()
	{
		$this->load->view('mainMenu/help');
	}
	
	function exitGame()
	{
		echo 'close window';
		//window.close();
	}
	
}
?>