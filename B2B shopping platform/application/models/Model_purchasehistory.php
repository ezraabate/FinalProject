<?php 

class Model_purchasehistory extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	public function gethistoryData()
	{

		$u_id = $this->session->userdata('u_id');
		$sql = "SELECT * FROM orders WHERE User_id = $u_id";
		$query = $this->db->query($sql);
		 return $query->result();
	}
public function gethistoryDetail($id){
	if($id){
		$sql = "SELECT * FROM orderitem,itemforsale,stockitem,stock,user WHERE orderitem.Order_id = $id AND 
		orderitem.item_id = itemforsale.Item_ID_ForSale AND itemforsale.Item_ID_ForSale = stockitem.ItemID AND
		stockitem.StockID = stock.Stock_id AND stock.User_id = user.User_id";
		$query = $this->db->query($sql);
		 return $query->result();
	}
	
}

}