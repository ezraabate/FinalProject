<?php 

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	}

}

class Admin_Controller extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();

		if(empty($this->session->userdata('log_in'))) {
			$session_data = array('log_in' => FALSE);
			$this->session->set_userdata($session_data);
		}
	}

	public function logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['log_in'] == TRUE) {
			redirect('dashboard', 'refresh');
		}
	}

	public function not_logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['log_in'] == FALSE) {
			redirect('auth/login', 'refresh');
		}
	}

	public function render_template($page = null, $data = array())
	{
	

		$this->load->view('templates/header',$data);
		$this->load->view('templates/header_menu',$data);
		$this->load->view('templates/side_menubar',$data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer',$data);
	}
	public function render_template_new($page = null, $data = array())
	{
	

		$this->load->view('templates_new/header',$data);
		$this->load->view('templates_new/header_menu',$data);
		$this->load->view('templates_new/side_menubar',$data);
		$this->load->view($page, $data);
		$this->load->view('templates_new/footer',$data);
	}
public function render_template_who($page = null, $data = array())
	{
	

		$this->load->view('templates_who/header',$data);
		$this->load->view('templates_who/header_menu',$data);
		$this->load->view('templates_who/side_menubar',$data);
		$this->load->view($page, $data);
		$this->load->view('templates_who/footer',$data);
	}
}