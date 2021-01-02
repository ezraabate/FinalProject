<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchasehistory extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Purchasehistory';

		$this->load->model('model_purchasehistory');
	}

	public function index()
	{
		$data['history_info'] = $this->model_purchasehistory->gethistoryData();
		$this->render_template_new('purchasehistory', $data);	
	}	


public function viewdetail($id){
	$data['history_detail'] = $this->model_purchasehistory->gethistoryDetail($id);
		$this->render_template_new('purchasehistorydetail', $data);	
}
}