<?php 

class Model_ntfn extends CI_Model
{
	public function notifications($AccID)
	{
		//$this->db->where('Account_id', $AccID);
		//$que = $this->db->get('account');

		// foreach($que as $v){
		// 	echo $v['Account_username'];
		// }

		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('account.Account_id', $AccID);
		$this->db->join('user', 'user.Account_id = account.Account_id');
		$this->db->join('sentto', 'sentto.User_id = user.User_id');
		
		$this->db->join('notification', 'notification.Notification_id = sentto.Notification_id');

		$this->db->join('notificationcontent', 'notificationcontent.ID = notification.Notification_type');
		
		/*$this->db->join('itemforsalenotification', 'itemforsalenotification.notificationID = notification.Notification_id');
		$this->db->join('itemforsale', 'itemforsale.Item_ID_ForSale = itemforsalenotification.itemForSaleID');
		$this->db->join('stockitem', 'stockitem.ItemID = itemforsale.Item_ID_ForSale');*/
		$result = $this->db->get();

		if($result->num_rows() != 0)
		{
			return $result->result_array();
		}
		else
			return false;
 		 
	}

	public function count($AccID)
	{

		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('account.Account_id', $AccID);
		$this->db->join('user', 'user.Account_id = account.Account_id');
		$this->db->join('sentto', 'sentto.User_id = user.User_id');
		$this->db->join('notification', 'notification.Notification_id = sentto.Notification_id  AND sentto.Status = "0"');
		$r = $this->db->get();
		
		if($r->num_rows() != 0)
		{
			return $r->num_rows();
		}
		else
			return false;	
	}

	public function changeNotificationStatus($id1, $id2)
	{
		$this->db->where('Notification_id', $id1);
		$this->db->where('User_id', $id2);
		$this->db->update('sentto', array('Status' => 1));			
	}

	public function ItemInStock(){

		$query = $this->db->query('SELECT * FROM stockitem');
		return $query->result_array();
	}

	public function ItemInStockJoin($ID){

		$query = $this->db->query("SELECT * FROM `stockItemNotification` left outer JOIN `notification` ON `stockItemNotification`.`notificationID` = `notification`.`Notification_id` WHERE `stockItemNotification`.`stockItemID` = '$ID' UNION
			SELECT * FROM `stockItemNotification` right outer JOIN `notification` ON `stockItemNotification`.`notificationID` = `notification`.`Notification_id` WHERE `stockItemNotification`.`stockItemID` = '$ID' GROUP BY stockItemID ORDER BY notificationID DESC LIMIT 1");
		return $query->row_array();
	}

	public function ItemForSale(){
		$query = $this->db->query('SELECT * FROM itemforsale');
		return $query->result_array();
	}

	public function ItemForSaleJoin($ID){

		$query = $this->db->query("SELECT * FROM `itemforsalenotification` left outer JOIN `notification` ON `itemforsalenotification`.`notificationID` = `notification`.`Notification_id` WHERE `itemforsalenotification`.`itemForSaleID` = '$ID' UNION
			SELECT * FROM `itemforsalenotification` right outer JOIN `notification` ON `itemforsalenotification`.`notificationID` = `notification`.`Notification_id` WHERE `itemforsalenotification`.`itemForSaleID` = '$ID' GROUP BY itemForSaleID ORDER BY notificationID DESC LIMIT 1");

		return $query->row_array();

	}

	public function pushNotificationsStockItem($itemID, $stockID){

		$data = array(

			'Notification_id' => 'NULL',
			'Notification_type' => '1',
			'Date_created' => 'NULL',
		);
		$this->db->insert('notification', $data);
		$notificationID = $this->db->insert_id();

		$this->db->where('Stock_id', $stockID);
		$result = $this->db->get('stock')->row();

		$data2 = array(

			'Notification_id' => $notificationID,
			'User_id' => $result->User_id,
			'Status' => 'NULL'
		);
		$this->db->insert('sentto', $data2);

		$data3 = array(

			'stockItemID' => $itemID,
			'notificationID' => $notificationID,
			'Status' => 'NULL'
		);
		$this->db->insert('stockItemNotification', $data3);
		return $notificationID;

	}

	public function pushNotificationsItemForSale($itemID)
	{
		$this->db->where('ItemID', $itemID);
		$result1 = $this->db->get('stockitem')->row_array();
		$data = array(

			'Notification_id' => 'NULL',
			'Notification_type' => '2',
			'Date_created' => 'NULL'
		);
		$this->db->insert('notification', $data);
		$notificationID = $this->db->insert_id();

		$this->db->where('Categ_id', $result1['CategoryID']);
		$result = $this->db->get('subscribefor')->result_array();

		foreach($result as $k => $v){
			
			$data2 = array(
				
				'Notification_id' => $notificationID,
				'User_id' => $v['User_id'],
				'Status' => 'NULL'		
			);
			$this->db->insert('sentto', $data2);

		}
			$data3 = array(

			'itemForSaleID' => $itemID,
			'notificationID' => $notificationID,
			'Status' => 'NULL'
		);
		$this->db->insert('itemforsalenotification', $data3);
	}

	public function changeStockItemNotificationStatus($ItemID, $notificationID){

		$this->db->where('stockItemID', $ItemID);
		$this->db->where('notificationID', $notificationID);
		$this->db->update('stockItemNotification', array('Status' => 1));

	}

	public function changeitemforsalenotificationStatus($ItemID, $notificationID){

		$this->db->where('itemForSaleID', $ItemID);
		$this->db->where('notificationID', $notificationID);
		$this->db->update('itemforsalenotification', array('Status' => 1));
	}

	public function NotificationDetail($notificationID){

			$result = $this->db->get_where('notification', array('Notification_id' => $notificationID))->row();

			if($result->Notification_type == 1){

				$this->db->select('*');
				$this->db->from('stockItemNotification');
				$this->db->where('stockItemNotification.notificationID', $notificationID);
				$this->db->join('notification', 'notification.Notification_id = stockItemNotification.notificationID');
				$this->db->join('stockitem', 'stockitem.ItemID = stockItemNotification.stockItemID');
					
				$result = $this->db->get()->result_array();
					
				}

			elseif($result->Notification_type == 2){
				
				$this->db->select('*');
				$this->db->from('itemforsalenotification');
				$this->db->where('itemforsalenotification.notificationID', $notificationID);
				$this->db->join('notification', 'notification.Notification_id =itemforsalenotification.notificationID');
				$this->db->join('itemforsale', 'itemforsale.Item_ID_ForSale = itemforsalenotification.itemForSaleID');
				$this->db->join('stockitem', 'stockitem.ItemID = itemforsale.Item_ID_ForSale');
					
				$result = $this->db->get()->result_array();

				}

			elseif ($result->Notification_type == 3) {

				$this->db->select('*');
				$this->db->from('ordernotification');
				$this->db->where('ordernotification.notificationID', $notificationID);
				$this->db->join('notification', 'notification.Notification_id = ordernotification.notificationID');
				$this->db->join('orders', 'orders.Order_id = ordernotification.orderID');
				$this->db->join('user', 'user.User_id = orders.User_id');
				$this->db->join('orderitem', 'orderitem.Order_id = orders.Order_id');
				$this->db->join('stockitem', 'stockitem.ItemID = orderitem.item_id');

				$result = $this->db->get()->result_array();
			}

			elseif ($result->Notification_type == 4) {

				$this->db->select('*');
				$this->db->from('itemforsalenotification');
				$this->db->where('itemforsalenotification.notificationID', $notificationID);
				$this->db->join('notification', 'notification.Notification_id = itemforsalenotification.notificationID');
				$this->db->join('itemforsale', 'itemforsale.Item_ID_ForSale = itemforsalenotification.itemForSaleID');
				$this->db->join('stockitem', 'stockitem.ItemID = itemforsale.Item_ID_ForSale');

				$result = $this->db->get()->result_array();

			}

				return $result;

	}
	public function colorfilter($ntfn_id){
		$this->db->select('*');
				$this->db->from('itemforsalenotification');
				$this->db->where('itemforsalenotification.notificationID', $notificationID);
				$this->db->join('notification', 'notification.Notification_id = itemforsalenotification.notificationID');
				$this->db->join('itemforsale', 'itemforsale.Item_ID_ForSale = itemforsalenotification.itemForSaleID');
				$this->db->join('stockitem', 'stockitem.ItemID = itemforsale.Item_ID_ForSale');

				$result = $this->db->get()->result_array();

	}
	/*public function colorfilter($ntfn_id){
		
	}
	public function colorfilter($ntfn_id){
		
	}*/

	public function filterColor($ntfnID){

		$query = $this->db->get_where('itemfilter', array('Filter_id' => $ntfnID));

		return $query->row()->Filter_value;
	}

		public function filterSize($ntfnID){

		$query = $this->db->get_where('itemfilter', array('Filter_id' => $ntfnID));

		return $query->row()->Filter_value;
	}

		public function filterUnit($ntfnID){

		$query = $this->db->get_where('itemfilter', array('Filter_id' => $ntfnID));

		return $query->row()->Filter_value;
	}
}


?>