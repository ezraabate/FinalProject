<?php
	class PushNotificationsHook extends CI_Controller
	{
		public $Obj;
		public function __construct(){
			$this->Obj = & get_instance();
		}

		public function pushNotification(){

			if($this->Obj->router->class == 'PlaceOrder')
			{
				if(isset($_SESSION['orderPlaced']))
				{
					echo 'no insertion to orders table';
				}

				else{
					//we should gate UserID for whom the notification is going to be pushed == for the wholesaler only
					$orderID = $this->Obj->session->userdata('orderPlacedID');
					//echo $orderID.' is an ID of newly placed order';

					//we send $data to a model $this->Obj->model('a method that push a notification to 		notification table')
					$this->Obj->load->model('Model_cart');
					$this->Obj->Model_cart->pushOrderNotification($orderID);
				}
			}
			elseif ($this->Obj->router->class == 'PostItemForSale') 
			{
				
				if(isset($_SESSION['newItemPosted'])){
					
					echo 'no insertion to itemForSale table';
				}
				else{

					$ItemPostedID = $this->Obj->session->userdata('ItemPostedID');
					$this->Obj->load->model('Model_stock');
					$this->Obj->Model_stock->pushItemPostedNotification($ItemPostedID);
				}
			}
		}
	}  
?>