<?php 

	class PlaceOrder extends Admin_Controller 
	{

		public function __construct(){

			parent::__construct();
			$this->session->set_userdata('orderPlaced', true);
			$this->load->model('model_cart');
		}


		public function Checkout(){
		
			$this->load->library('cart');
			if(empty($this->cart->contents())){
			print "<script type=\"text/javascript\">alert('Please add some item in the cart');</script>";
			redirect('retailer_dashboard','refresh');
			}
			else{	
				
				$order = array(
				'User_id' => $this->session->userdata('u_id'),
				'Total_cost' => $this->cart->total());
	
				$returnval = $this->model_cart->create($order);

				if($returnval == false){

					print "<script type=\"text/javascript\">alert('Some thing went wrong while  placeing the order please make sure all items are from the same wholesaler');</script>";
					redirect('cart','refresh');
				}
				else{
					
					$this->cart->destroy();
					print "<script type=\"text/javascript\">alert('Your Order have sucessfully placed thank you for using purchasing!!!');</script>";

					$this->session->set_userdata('orderPlacedID', $returnval);
					unset($_SESSION['orderPlaced']);
					// redirect('retailer_dashboard', 'refresh');
				}	

			}
		}
	}

?>