<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Salehistory extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Sale Histpry';

		$this->load->model('model_salehistory');
	}

	public function index()
	{
		$data['history_info'] = $this->model_salehistory->gethistoryData();
		$this->render_template_who('salehistory', $data);	
	}	


public function viewdetail($id)
{
	$data['history_detail'] = $this->model_salehistory->gethistoryDetail($id);
	$this->render_template_who('salehistorydetail', $data);	
}
}