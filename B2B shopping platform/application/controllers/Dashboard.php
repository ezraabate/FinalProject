<?php 

class Dashboard extends Admin_Controller 
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
		$role= $this->session->userdata('role');
		// $acc_id = $this->session->userdata('id');
		// $user_id = $this->session->userdata('id');
		$this->data['total_retailers'] = $this->model_users->countTotalRetailers();
		$this->data['total_wholesalers'] = $this->model_users->countTotalWholesalers();

 			if($role == '1'):
                $this->render_template('dashboard', $this->data);
                // elseif($role == '2'): 
                // $this->data['product'] = $this->model_cart->fetchproductdata();	
                // $this->render_template_new('dashboard1', $this->data);
				elseif($role == '3'):
                $this->render_template_who('dashboard2', $this->data); 
                endif; 
		// $this->render_template('dashboard', $this->data);
		
	}
		


}