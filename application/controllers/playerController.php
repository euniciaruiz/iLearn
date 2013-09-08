<?php

class PlayerController extends CI_Controller {
	public function index() {	
	
		$this->load->view('mainMenu/player_view');
	}
	
	function create()
	{
		$data = array(
			'name' => $this->input->post('name')
		);
		
		$this->player->addPlayer($data);
		$this->index();
	}
}
?>