<?php 

class Model_stock extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	
	public function createItem($data = '')
	{
		if($data) {
		$insert = $this->db->insert('stockitem', $data);
			
		$item_id = $this->db->insert_id();
		$datanew = array('Item_ID_ForSale' => $item_id);
		$this->db->insert('itemforsale', $datanew);

	    return ($insert == true) ? true : false;
}
}
public function postItem($data = '' , $quantity_data = '', $id = null){

	if($data && $quantity_data){
		$this->db->where('Item_ID_ForSale', $id);
		$update1 = $this->db->update('itemforsale', $data);
		
		$this->db->where('ItemID', $id);
		$update2 = $this->db->update('stockitem', $quantity_data);

		return ($update1 && $update2 == true) ? true : false;
	}


}
public function getusercatid($uid = null){
	if($uid) {
			$sql = "SELECT * FROM subscribefor WHERE User_id = ? ";
			$query = $this->db->query($sql, array($uid));
			return $query->row_array();
	}
		

}
public function getuserstockid($uid = null){
	if($uid) {
			$sql = "SELECT * FROM stock WHERE User_id = ?";
			$query = $this->db->query($sql, array($uid));
			return $query->row_array();
	}
		

}
public function getItemData($id = null)
{
		$uid = $this->session->userdata('u_id');
		
		if($id) {
			$sql = "SELECT * FROM stockitem WHERE ItemID = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	
		$sql = "SELECT * FROM stock WHERE User_id = ?";
		$query = $this->db->query($sql, array($uid));
		$result = $query->row_array();

		$s_id = $result['Stock_id'];

		$sql = "SELECT * FROM stockitem WHERE StockID = ?";
		$query = $this->db->query($sql, array($s_id));
		$result = $query->result_array();	
		return $result;
}
public function getItemForSaleData($id = null){

	if($id){

		$sql = "SELECT * FROM itemforsale WHERE Item_ID_ForSale = ?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
}
	
	public function updatequantity($data = '', $id = null){
		if($data && $id){

		$this->db->where('ItemID', $id);
		$update = $this->db->update('stockitem', $data);

		return ($update == true) ? true : false;
		}
	}
	public function isalreadyexist($isexistdata = ''){
		if ($isexistdata){
			$sql = 'SELECT * FROM stockitem WHERE ExpirationDate = "'.$isexistdata['edate'].'" AND ItemName = "'.$isexistdata['iname'].'" AND ItemDescription = "'.$isexistdata['idesc'].'" AND VendorName = "'.$isexistdata['vname'].'" AND ItemBrand = "'.$isexistdata['ibrand'].'" AND sellingPrice = "'.$isexistdata['sprice'].'" AND PurchasingPrice = "'.$isexistdata['pprice'].'" AND color = "'.$isexistdata['color'].'" AND size = "'.$isexistdata['size'].'" AND unit = "'.$isexistdata['unit'].'"';
			$query = $this->db->query($sql);
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
		}

		public function getitemDetail($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM stockitem WHERE ItemID = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		
	}

	public function getitemcolor($id = null){
		if($id){
			$sql = "SELECT * FROM stockitem,itemfilter WHERE ItemID = ? AND stockitem.color = itemfilter.Filter_id";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

		public function getitemsize($id = null){
		if($id){
			$sql = "SELECT * FROM stockitem,itemfilter WHERE ItemID = ? AND stockitem.size = itemfilter.Filter_id";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}


		public function getitemunit($id = null){
		if($id){
			$sql = "SELECT * FROM stockitem,itemfilter WHERE ItemID = ? AND stockitem.unit = itemfilter.Filter_id";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}
	public function pushItemPostedNotification($ID){
				
		$this->db->select('*');
		$this->db->from('itemforsale');
		$this->db->where('itemforsale.Item_ID_ForSale', $ID);
		$this->db->join('stockitem', 'stockitem.ItemID = itemforsale.Item_ID_ForSale');
		$this->db->join('itemcategory', 'itemcategory.categ_id = stockitem.CategoryID');
		$this->db->join('subscribefor', 'subscribefor.Categ_id = itemcategory.categ_id');
		$this->db->join('user', 'user.User_id = subscribefor.User_id AND user.roleID = 2');
		//$this->db->get_where('user', array('roleID => 2'));
		$result = $this->db->get()->result_array();

		foreach($result as $row)
		{
			$data1 = array(

				
				'Notification_type' => '4',
				
			);
			$this->db->insert('notification', $data1);
			$ntfnID = $this->db->insert_id();

			$data2 = array(

				'itemForSaleID' => $ID,
				'notificationID' => $ntfnID
			);
			$this->db->insert('itemforsalenotification', $data2);

			$data3 = array(

				'Notification_id' => $ntfnID,
				'User_id' => $row['User_id']
			);
			$this->db->insert('sentto', $data3);
		}
	}
}