<?php 

class LoginController extends CI_Controller {
	
	function index() {
		$data['main_content'] = 'login_form';
		$this->load->view('login_form');
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
			$this->index();
		}
	}

	function logout()  
	{  
	    $this->session->sess_destroy();  
	    $this->index();
	}  

}