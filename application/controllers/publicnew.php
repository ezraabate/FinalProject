<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Publicnew extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_dashboard');
		$this->load->model('model_users');

	}
	public function index(){
		$this->data['product'] = $this->model_dashboard->fetch_product_data();
		$this->data['dis_product'] = $this->model_dashboard->fetch_discount_data();
		$this->data['ret'] = $this->model_users->countTotalRetailers();
		$this->data['who'] = $this->model_users->countTotalWholesalers();
		$this->load->view('publicnew', $this->data);
	}


}