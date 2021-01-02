<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends Admin_Controller  
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Stock';

		$this->load->model('model_filters');

		$this->load->model('model_stock');
	}

	/* 
	* It only redirects to the manage product page and
	*/
	public function index()
	{

		$result = $this->model_stock->getItemData();

		$this->data['results'] = $result;

		$this->render_template_who('stock', $this->data);
	}
	public function create()
	{
		$colors = $this->model_filters->getColorFilters();

		$this->data['colors'] = $colors;

		$sizes = $this->model_filters->getSizeFilters();

		$this->data['sizes'] = $sizes;

		$units = $this->model_filters->getUnitFilters();

		$this->data['units'] = $units;

		$uid = $this->session->userdata('u_id');
		$cat = $this->model_stock->getusercatid($uid);
		$stock = $this->model_stock->getuserstockid($uid);

		
		$this->data['page_title'] = 'New Item';
		// $this->form_validation->set_rules('item_name', 'itemname', 'trim|required|is_unique[stockitem.ItemName]');
		// $this->form_validation->set_message('is_unique','The item already exisits in your stock please update its quantity instead!!!');

		$this->form_validation->set_rules('item_name','itemname','trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
		$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		$this->form_validation->set_rules('vendor', 'Vendor', 'trim|required');
		$this->form_validation->set_rules('pprice', 'Purchasingprice', 'trim');
		$this->form_validation->set_rules('sprice', 'SellingPrice', 'trim');
		$this->form_validation->set_rules('exdate', 'ExpirationDate', 'trim');

		$color = $this->input->post('color');
		$unit =	$this->input->post('unit');
		$size = $this->input->post('size');
		  if ($this->form_validation->run() == TRUE) {
            // true case
             if(!empty($_FILES['itemimage']['name'])){

            	$config['upload_path'] =  './images/';
            	$config['allowed_types'] = 'png|jpg|jpeg';
            	// $config['file_name'] = $_FILES['photo']['name'];

            	$this->load->library('upload',$config);
            	// $this->upload->initialize($config);

            	if($this->upload->do_upload('itemimage')){
            		$uploadData = $this->upload->data();
            		$picture = $uploadData['file_name'];
            	}else{
            		$picture = '';
            	}
            }
            else{
            	$picture = '';
            }

            $existdata = array();
            $existdata['edate'] = $this->input->post('exdate');
			$existdata['iname'] = $this->input->post('item_name');
			$existdata['idesc'] =  $this->input->post('description');
			$existdata['vname'] = $this->input->post('vendor');
			$existdata['ibrand'] = $this->input->post('brand');
			$existdata['sprice'] = $this->input->post('sprice');
			$existdata['pprice'] = $this->input->post('pprice');
			$existdata['color'] = $color;
			$existdata['size'] = $size;
		    $existdata['unit'] = $unit;
            if(!$this->model_stock->isalreadyexist($existdata)){

            
                   	$data = array(
                'ItemName' => $this->input->post('item_name'),
        		'ItemDescription' =>  $this->input->post('description'),
        		'ExpirationDate'=> $this->input->post('exdate'),   		
        		'ItemQuantity' => $this->input->post('quantity'),
        		'ItemBrand' => $this->input->post('brand'),
        		'VendorName' => $this->input->post('vendor'),
        		'PurchasingPrice' => $this->input->post('pprice'),
        		'sellingPrice' => $this->input->post('sprice'),
        		'CategoryID' => $cat['Categ_id'],
        		'StockID'	=>	$stock['Stock_id'],
        		'ItemImage' => $picture,
        		'color' => $color,
        		'size' => $size,
        		'unit' => $unit
        		// 'UserID' => $uid
        	);

        	$create = $this->model_stock->createItem($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('stock/create', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('stock/create', 'refresh');
        	}
        }else{
        	  	$this->session->set_flashdata('error', 'Looks like the item already exist in your stock please update its quantity instead!!!');
        		redirect('stock/create', 'refresh');

        }
        }
        else{
		
        $this->session->set_flashdata('errors');
		$this->render_template_who('stock/create', $this->data);
	}
	}

	
	public function fetchItemData()
	{
		$result = array('data' => array());

		$data = $this->model_stock->getItemData();
		foreach ($data as $key => $value) {

			// button
				$buttons = '';

				$buttons .= '<button type="button" class="btn btn-sm btn-danger" onclick="postitem('.$value['ItemID'].')" data-toggle="modal" data-target="#postitem"><i class="fa fa-edit"></i>Post</button>';
				$buttons .= '  ';
				$buttons .= '<button type="button" class="btn btn-sm btn-primary os-icon os-icon-ui-49" onclick="updatequantity('.$value['ItemID'].')" data-toggle="modal" data-target="#updatequantity"><i class="fa fa-edit"></i>Edit</button>';

				$buttons .= '  ';
				$buttons .= '<a href="'.base_url('Stock/Viewdetail/'.$value['ItemID']).'"><i class="os-icon os-icon-eye btn btn-warning"></i></a>';


			$result['data'][$key] = array(
				$value['ItemName'],
				$value['DateAdded'],
				$value['ExpirationDate'],
				$value['VendorName'],
				$value['ItemBrand'],
				$value['ItemQuantity'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

		public function fetchItemDataById($id)
	{
		if($id) {
			$data = $this->model_stock->getItemData($id);
			echo json_encode($data);
		}

		return false;
	
	}

public function PostItem($id){

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
        		'itemQuantity' =>  $this->input->post('quantity'),
        		'SellingPrice' => $this->input->post('sprice')
        		);

        	
        	$updatedquantity = $quantity - $this->input->post('quantity');
        	if($updatedquantity >0){
        		 	$qunatity_data = array(
        		'ItemQuantity' =>  $updatedquantity
        		);
        		
        		$create = $this->model_stock->postItem($data,$qunatity_data,$id);
        	}
			if($create == true) {
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
	
	public function updatequantity($id)
{

	$item_data = $this->model_stock->getItemData($id);

	$this->data['item_data'] = $item_data;

	$quantity = $item_data['ItemQuantity'];

		$this->data['page_title'] = 'Update Quantity';
		
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
		

		if ($this->form_validation->run() == TRUE) {
            // true case
            $updatedquantity = $quantity + $this->input->post('quantity');
                   	$data = array(
                'ItemQuantity' => $updatedquantity
        		
        		);
        		
        		$create = $this->model_stock->updatequantity($data,$id);
        	}
			if($create == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Item  Quantity Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updating item quantity';			
	        	}
	        
	    

		echo json_encode($response);


}
public function Viewdetail($id){
	$item_detail= $this->model_stock->getitemDetail($id);
	$this->data['item_detail'] = $item_detail;

	$item_color= $this->model_stock->getitemcolor($id);
	$this->data['item_color'] = $item_color;


	$item_size= $this->model_stock->getitemsize($id);
	$this->data['item_size'] = $item_size;

	$item_unit= $this->model_stock->getitemunit($id);
	$this->data['item_unit'] = $item_unit;


	$strtimestamp = $item_detail['DateAdded'];
    $date = date('d/m/Y', strtotime($strtimestamp));
     $this->data['date'] = $date;


     $strtimestamp = $item_detail['ExpirationDate'];
    $edate = date('d/m/Y', strtotime($strtimestamp));
     $this->data['edate'] = $edate;

    $this->render_template_who('stock/viewdetail', $this->data);
}

}

