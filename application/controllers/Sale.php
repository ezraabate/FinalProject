<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends Admin_Controller  
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Sale';

		// $this->load->model('model_filters');

		$this->load->model('model_sale');
	}

	/* 
	* It only redirects to the manage product page and
	*/
	public function index()
	{
		$result = $this->model_sale->getSaleItemData();
		$this->data['results'] = $result;
		
		$this->render_template_who('sale', $this->data);
	}
	
	public function fetchSaleItemData()
	{
		$result = array('data' => array());

		$data = $this->model_sale->getSaleItemData();
		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			
				$buttons .= '<button type="button"  class="btn btn-sm btn-danger" " onclick="postdiscount('.$value['Item_ID_ForSale'].')" data-toggle="modal" data-target="#postdiscount"><i class="fa fa-edit"></i>Discount</button>';
			
				$buttons.= '  ';

				$buttons .= '<a href="'.base_url('Sale/Viewdetail/'.$value['Item_ID_ForSale']).'"><i class="os-icon os-icon-eye btn btn-warning"></i></a>';

				// $buttons .='<a href="'.base_url('Sale/Viewdetail/'.$value['Item_ID_ForSale']).'" class="btn btn-primary"><i class="fa fa-eye"></i></a>';


			$result['data'][$key] = array(
				
				$value['ItemName'],
				$value['itemQuantity'],
				$value['DateAdded'],
				$value['DatePosted'],
				$value['SellingPrice'],
				$value['ExpirationDate'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	public function fetchSaleItemDataById($id)
	{
		if($id) {
			$data = $this->model_sale->getSaleItemData($id);
			echo json_encode($data);
		}

		return false;
	
	}

		public function update($id)
	{
		
		$response = array();

		if($id) {
			$this->form_validation->set_rules('item_name', 'Item name', 'trim|required');
			$this->form_validation->set_rules('item_price', 'Item price', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$sprice = $this->input->post('item_price');
	        	$data = array(
	        		'SellingPrice' => $this->input->post('item_price'),
	        		'discount_Status' => '1'	
	        	);

	        	$update = $this->model_sale->update($data, $id,$sprice);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Discount Succesfully Posted';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'The new price must be less than the orginal price to perform this action';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}
public function Viewdetail($id){
	$item_detail= $this->model_sale->getitemDetail($id);
	$this->data['item_detail'] = $item_detail;

	$item_color= $this->model_sale->getitemcolor($id);
	$this->data['item_color'] = $item_color;


	$item_size= $this->model_sale->getitemsize($id);
	$this->data['item_size'] = $item_size;

	$item_unit= $this->model_sale->getitemunit($id);
	$this->data['item_unit'] = $item_unit;



     $strtimestamp = $item_detail['ExpirationDate'];
    $edate = date('d/m/Y', strtotime($strtimestamp));
     $this->data['edate'] = $edate;

      $strtimestamp = $item_detail['DatePosted'];
    $pdate = date('d/m/Y', strtotime($strtimestamp));
     $this->data['pdate'] = $pdate;

    $this->render_template_who('viewsaleitemdetail', $this->data);
}

}

