<?php 

class Model_salehistory extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	public function gethistoryData()
	{

		$u_id = $this->session->userdata('u_id');
		$this->db->select('orders.Order_id,orders.Date_created,orders.Total_cost');
  		$this->db->from('orders');
  		$this->db->where('user.User_id', $u_id);
    	$this->db->join('orderitem', 'orderitem.Order_id = orders.Order_id');
      	$this->db->join('stockitem', 'stockitem.ItemID = orderitem.item_id');
      	$this->db->join('stock', 'stock.Stock_id = stockitem.StockID');
      	$this->db->join('user', 'user.User_id = stock.User_id');
		return $this->db->get()->result_array();

	}
public function gethistoryDetail($id){
	if($id){



		// $sql = "SELECT * FROM orderitem,itemforsale,stockitem,stock,user WHERE orderitem.Order_id = $id AND 
		// orderitem.item_id = itemforsale.Item_ID_ForSale AND itemforsale.Item_ID_ForSale = stockitem.ItemID AND
		// stockitem.StockID = stock.Stock_id AND stock.User_id = user.User_id";
		// $query = $this->db->query($sql);
		//  return $query->result();



		$this->db->select('*');
  		$this->db->from('orders');
  		$this->db->where('orders.Order_id', $id);
    	$this->db->join('orderitem', 'orderitem.Order_id = orders.Order_id');
      	$this->db->join('stockitem', 'stockitem.ItemID = orderitem.item_id');
      	$this->db->join('stock', 'stock.Stock_id = stockitem.StockID');
      	$this->db->join('user', 'user.User_id = orders.User_id');
		return $this->db->get()->result_array();
	}
	
}

}