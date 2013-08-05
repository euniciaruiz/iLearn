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
	
}
?>