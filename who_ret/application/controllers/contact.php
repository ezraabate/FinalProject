<?php 

class Contact extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Dashboard';
		
		$this->load->model('model_users');
		$this->load->model('model_cart');
		
		
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		
 			
                $this->render_template_new('contact', $this->data);
          
    
             
		// $this->render_template('dashboard', $this->data);
		
	}
		


}