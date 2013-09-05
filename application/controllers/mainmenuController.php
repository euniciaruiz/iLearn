<?php

class MainmenuController extends CI_Controller {
	
	public function index(){
		$this->load->view('mainMenu/home');	
	}
	
	function help(){
		$this->load->view('mainMenu/help');
	}
	
	function exitGame(){
		echo 'close window';
		//window.close();
	}
	
	function display() {
		$this->load->model('users');
		$data['users'] = $this->users->getUser();
		$this->load->view('mainMenu/user', $data);	
	}
	
}
?>