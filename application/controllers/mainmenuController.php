<?php

class MainmenuController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Player', 'player', TRUE);
	}
	
	public function index()
	{
		$this->load->view('mainMenu/home');
	}
	
	function help()
	{
		$this->load->view('mainMenu/help');
	}
}
?>