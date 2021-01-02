<?php
	class Notification extends CI_controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Model_ntfn');
		}

		public function index()
		{
			
		}

		public function notificationContent(){

			$result = $this->Model_ntfn->notifications($this->input->post('id'));
			echo "<div id='try' style='display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 30ch;'>";
			
			if($result){
				foreach($result as $key => $row)
				{
					$var = $row['Notification_id'];
					if($row['Status'] == 1){
					
						echo "<span id='$var' class='ntfn'>".$row['Content']."</span><hr>";
					}
					else
						echo "<span id='$var' class='ntfn text-warning'>".$row['Content']."</span><hr>";	
				}
			}
			else
				echo '';
				echo "</div>";
		}
		
		public function notificationCount(){

			$result = $this->Model_ntfn->count($this->input->post('id'));
			if($result)
			{
				echo $result;
			}
			else
				echo '0';
		}

		public function lowItemAvailabilityInStock()
		{
			$result = $this->Model_ntfn->ItemInStock();
			foreach ($result as $k => $v) {

				$resultJoin = $this->Model_ntfn->ItemInStockJoin($v['ItemID']);
				if ($v['ItemQuantity'] <= ($v['totalItemQuantity']*(10/100))){

					if($resultJoin){

						if($resultJoin['notificationID'] != NULL && $resultJoin['Notification_type'] == 1 && $resultJoin['Status'] == 1)
							$this->Model_ntfn->pushNotificationsStockItem($v['ItemID'], $v['StockID']);	

						else
							continue;						
					}

					else
						$this->Model_ntfn->pushNotificationsStockItem($v['ItemID'], $v['StockID']);
					
						
				}
				else{

					if($resultJoin){

						if($resultJoin['notificationID'] != NULL && $resultJoin['Notification_type'] == 1 && $resultJoin['Status'] == 0){

							$ItemID = $v['ItemID'];
							$notificationID = $resultJoin['notificationID'];
							$this->Model_ntfn->changeStockItemNotificationStatus($ItemID, $notificationID);
						}
						else
							continue;
					}
					else
						continue;
				} 
			}
				
		}
			

		public function lowItemAvailabilityForSale()
		{
			$result = $this->Model_ntfn->ItemForSale();
			foreach ($result as $k => $v) {

				$resultJoin = $this->Model_ntfn->ItemForSaleJoin($v['Item_ID_ForSale']);
				if ($v['itemQuantity'] <= ($v['totalItemQuantity']*(10/100))){

					if($resultJoin){

						if($resultJoin['notificationID'] != NULL && $resultJoin['Notification_type'] ==2){
							
							if($resultJoin['Status'] == 1)
								$this->Model_ntfn->pushNotificationsItemForSale($v['Item_ID_ForSale']);
							else
								continue;	
						}
						elseif ($resultJoin['notificationID'] != NULL && $resultJoin['Notification_type'] == 4){
								
								$this->Model_ntfn->pushNotificationsItemForSale($v['Item_ID_ForSale']);							
						}						
					}
					else
						continue;
					
						
				}
				else{

					if($resultJoin){

						if($resultJoin['notificationID'] != NULL && $resultJoin['Notification_type'] == 2 && $resultJoin['Status'] == 0){

							$Item_ID_ForSale = $v['Item_ID_ForSale'];
							$notificationID = $resultJoin['notificationID'];
							$this->Model_ntfn->changeItemForSaleNotificationStatus($Item_ID_ForSale, $notificationID);
						}
						else
							continue;
					}
					else
						continue;
				} 
			}
		}
		public function readNotification()
		{
			$this->Model_ntfn->changeNotificationStatus($this->input->post('id1'), $this->input->post('id2'));
		}

		public function notificationDetail()
		{
			$result = $this->Model_ntfn->NotificationDetail($this->input->post('id3'));
			/*$result += $this->Model_ntfn->colorfilter($this->input->post('id3');
			$result += $this->Model_ntfn->sizefilter($this->input->post('id3');
			$result += $this->Model_ntfn->unitfilter($this->input->post('id3');*/	

			foreach ($result as $key => $value) {

				if($value['Notification_type'] == 1){

						echo 'Name of the item'.'  ------------------  '.$value['ItemName'].'<br>';
						echo 'Item color'.'  -------------------  '.$this->Model_ntfn->filterColor($value['color']).'<br>';
						echo 'Item size'.'  ------------------  '.$this->Model_ntfn->filterSize($value['size']).'<br>';
						echo 'Item unit'.'  -----------------------------------------------  '.$this->Model_ntfn->filterUnit($value['unit']).'<br>';
						echo 'Quantity available'.'  ------------------------------------------------------------------  '.$value['ItemQuantity'].'<br>';

				}

				elseif ($value['Notification_type'] == 2) {
					
					foreach ($result as $key => $value) {
						
						echo 'Name of the item'.'  ------------------  '.$value['ItemName'].'<br>';
						echo 'Item color'.'  -------------------  '.$this->Model_ntfn->filterColor($value['color']).'<br>';
						echo 'Item size'.'  ------------------  '.$this->Model_ntfn->filterSize($value['size']).'<br>';
						echo 'Item unit'.'  -----------------------------------------------  '.$this->Model_ntfn->filterUnit($value['unit']).'<br>';
						echo 'Quantity available'.'  ------------------------------------------------------------------  '.$value['itemQuantity'].'<br>';
					}
				}

				elseif ($value['Notification_type'] == 3){
					
					echo 'Order is placed by ---------------------- '.$value['FirstName'].' '.$value['SecondName'].'<br>';
					echo 'Date of placement ----------------- '.$value['Date_created'].'<br>';
					echo '<hr>Item List<hr>';

					foreach ($result as $key => $value) {
						
						echo $value['ItemName'].'             '.$value['Quantity'].'    '. $value['color'].'<br>';

					}
						echo '<hr>Total cost ----------------------- '.$value['Total_cost'].'<br>';
				}

				elseif ($value['Notification_type'] == 4){

					foreach ($result as $key => $value) {
						
						echo 'Name of the item'.'  ------------------  '.$value['ItemName'].'<br>';
						echo 'Item color'.'  -------------------  '.$this->Model_ntfn->filterColor($value['color']).'<br>';
						echo 'Item size'.'  ------------------  '.$this->Model_ntfn->filterSize($value['size']).'<br>';
						echo 'Item unit'.'  -----------------------------------------------  '.$this->Model_ntfn->filterUnit($value['unit']).'<br>';
						echo 'Quantity available'.'  ------------------------------------------------------------------  '.$value['itemQuantity'].'<br>';

					}
				}
		
				
			}
		}


	}  
?>