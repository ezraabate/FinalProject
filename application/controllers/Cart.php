<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();


		$this->load->model('model_cart');
	}
	public function index(){
		$data = array();
		$this->render_template_new('cartdetails',$data);
	}

public function add(){
	
	$this->load->library('cart');

	$data = array(

		"id"  => $_POST['productid'],
		"name" => $_POST['productname'],
		"qty" => $_POST['quantity'],
		"price" => $_POST['price']
		// "options" => array("sale_id" => $_POST['productid'])

	);

	$this->cart->insert($data);
	echo $this->view();
	


	// $this->render_template_new('dashboard1', $this->data);
}
public function load(){
	echo $this->view();
}
public function remove(){
	$this->load->library("cart");
	$row_id = $_POST["row_id"];
	$data = array(
		'rowid'  => $row_id,
		'qty' => 0

	);
	$this->cart->update($data);
   
	}
public function clear(){
	$this->load->library("cart");
	$this->cart->destroy();
	// echo $this->view();
} 

public function view(){
	$this->load->library('cart');
	$output = '';
	$output .= '
	   								
<h3>Shopping Cart</h3><br>
<div class="table-responsive">
	<div align="right">
		<button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>

		<a href="'.base_url('Cart/checkout').'" class="btn btn-primary">CheckOut</a>
		</div>
		<br>
		<table class="table table-bordered">
		<tr>
			<th width="40%">Name</th>
			<th width="15%">Quantity</th>
			<th widht="15%">price</th>
			<th widht="15%">total</th>
			<th widht="15%">Action</th>
		</tr>

	';
	$count = 0;
	foreach ($this->cart->contents() as $items) {
		$count++;
		$output.='
			<tr>
			<td>'.$items["name"].'</td>
			<td>'.$items["qty"].'</td>
			<td>'.$items["price"].'</td>
			<td>'.$items["subtotal"].'</td>
			<td><button type="button" name="remove" class="btn btn-danger removebutton" id="'.$items["rowid"].'">Remove</button></td>
			</tr> 


		';
	}
	$output .= '
		<tr>
			<td colspan="4" align="right">SubTotal</td>
			<td>'.$this->cart->total().'</td>	
			</tr>
			</table>
			</div>
			';
	


if($count == 0){
	$output .= '<h3 align="center">Cart is empty</h3>';
}
return $output;
}
public function fetchItemDataById($id){
		if($id) {
			$data = $this->model_cart->getProductdatabyid($id);
			echo json_encode($data);
		}

		return false;
	}
public function fetchsizeFilterDataById($id){
	if($id) {
			$data = $this->model_cart->getsizefilterdatabyid($id);
			echo json_encode($data);
		}

		return false;

}
public function fetchcolorFilterDataById($id){
	if($id) {
			$data = $this->model_cart->getcolorfilterdatabyid($id);
			echo json_encode($data);
		}

		return false;

}
public function fetchunitFilterDataById($id){
	if($id) {
			$data = $this->model_cart->getunitfilterdatabyid($id);
			echo json_encode($data);
		}

		return false;

}
public function fetchCategoryDataById($id){
	if($id){
		$data = $this->model_cart->getCategorydatabyid($id);
			echo json_encode($data);
	}
	return false;
}
public function fetchItemImage($id){
	if($id){
		$data = $this->model_cart->getItemImage($id);
			echo json_encode($data);	
	}
}

public function fetchownerdata($id){
	if($id){
		$data = $this->model_cart->getOwnerData($id);
			echo json_encode($data);	
	}

}
// public function Checkout(){
// 	$this->load->library('cart');
// 	if(empty($this->cart->contents())){
// 		print "<script type=\"text/javascript\">alert('Please add some item in the cart');</script>";
// 		redirect('retailer_dashboard','refresh');
// 	}
// 	else{
// 	$order = array(
// 		'User_id' => $this->session->userdata('u_id'),
// 		'Total_cost' => $this->cart->total()
// 	);
	
// 	$returnval = $this->model_cart->create($order);

// if($returnval == true){
// $this->cart->destroy();
// print "<script type=\"text/javascript\">alert('Your Order have sucessfully placed thank you for using purchsing!!!');</script>";
// // redirect('retailer_dashboard','refresh');
// }else{
// 	print "<script type=\"text/javascript\">alert('Some thing went wrong while placeing the order please make sure all items are from the same wholesaler');</script>";
// redirect('cart','refresh');
// }	
// }

// }
}