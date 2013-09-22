<?php 

class LoginController extends CI_Controller {

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

}