<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class PostItemForSale extends Admin_Controller 
	{
		public $which = 'itemForSale';

		public function __construct(){

			parent::__construct();
			
			$this->session->set_userdata('newItemPosted', true);
			$this->load->model('model_stock');
		}

	public function PostItem($id){

	$itemForSaleData = $this->model_stock->getItemForSaleData($id);
	$quantityForSale = $itemForSaleData['itemQuantity'];

	$item_data = $this->model_stock->getItemData($id);

	$this->data['item_data'] = $item_data;

	$quantity = $item_data['ItemQuantity'];

		$this->data['page_title'] = 'PostItem';
		
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
		$this->form_validation->set_rules('sprice', 'SellingPrice', 'trim');

		if ($this->form_validation->run() == TRUE) {
            // true case
                $data = array(
                'Item_ID_ForSale' => $id,
                'DatePosted' => date("Y-m-d"),
        		'itemQuantity' => $quantityForSale + $this->input->post('quantity'),
        		'SellingPrice' => $this->input->post('sprice')
        		);

        	
        	$updatedquantity = $quantity - $this->input->post('quantity');
        	if($updatedquantity >= 0){
        		 	$qunatity_data = array('ItemQuantity' =>  $updatedquantity
        		);
        		
        		$create = $this->model_stock->postItem($data,$qunatity_data,$id);
        	}
			if($create == true) {

					unset($_SESSION['newItemPosted']);
					$this->session->set_userdata('ItemPostedID', $id);
	        		$response['success'] = true;
	        		$response['messages'] = 'Item Succesfully Posted';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while Posting item';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }

		echo json_encode($response);
	}
}


?>