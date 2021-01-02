<?php 

class Model_cart extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


public function orderchecker(){
	$ids = array();
	foreach ($this->cart->contents() as $items){
		$itemid = $items['id'];
		   $sql = "SELECT * FROM stockitem WHERE ItemID = ?";
			$query = $this->db->query($sql, array($itemid));
			$result = $query->row_array();
            $stockid = $result['StockID'];
           array_push($ids, $stockid);
	}
	
	if (count(array_unique($ids)) === 1) {
		return true;
}
	else{
		return false;
	}

}

public function create($order){
	$returnVal = NULL; 
if ($this->orderchecker()) {
	

	$this->db->insert('orders',$order);
	$order_id = $this->db->insert_id();
	foreach ($this->cart->contents() as $orderitem)
{
	$orderdetail = array(
		'Order_id' => $order_id,
		'item_id' => $orderitem['id'],
		'Quantity' => $orderitem['qty']

	);
	$this->model_cart->insertorderdetail($orderdetail);

	$subtractedquantity = $orderitem['qty'];
	$itemid = $orderitem['id'];
	$this->db->select('itemQuantity');
  	$this->db->from('itemforsale');
  	$this->db->where('Item_ID_ForSale',$itemid);
  	$query = $this->db->get();
    $orginalquantity = $query->row();
    $intorginalquantity = $orginalquantity->itemQuantity;

    $updatedquantity = $intorginalquantity - $subtractedquantity;

    if($updatedquantity >=0){
    	$data = array(
    	'itemQuantity' => $updatedquantity
    	);
    $this->db->where('Item_ID_ForSale', $itemid);
    $this->db->update('itemforsale', $data);

    }else{
    	return false;
    }
    
}
$returnVal = $order_id;
// return true;
}

else{
	$returnVal = false;
	// return false;
}
	return $returnVal;
}
public function insertorderdetail($orderdetail){
	$this->db->insert('orderitem',$orderdetail);
	
}	

public function fetchproductdata(){

	    $sql = "SELECT * FROM itemforsale,stockitem 
		WHERE itemforsale.Item_ID_ForSale = stockitem.ItemID";
		$query = $this->db->query($sql);
		return $query->result_array();
} 
public function getProductdatabyid($id){
			if($id) {
			$sql = "SELECT * FROM itemforsale,stockitem 
			WHERE itemforsale.Item_ID_ForSale = stockitem.ItemID AND stockitem.ItemID = $id";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

}
public function getsizefilterdatabyid($id){
		if($id) {
			$sql = "SELECT * FROM stockitem,itemfilter 
			WHERE stockitem.ItemID = $id AND stockitem.size = itemfilter.Filter_id AND itemfilter.Filter_type = 'size'" ;
			$query = $this->db->query($sql);
			return $query->row_array();
		}

}
public function getcolorfilterdatabyid($id){
		if($id) {
			$sql = "SELECT * FROM stockitem,itemfilter 
			WHERE stockitem.ItemID = $id AND stockitem.color=itemfilter.Filter_id AND itemfilter.Filter_type = 'color'" ;
			$query = $this->db->query($sql);
			return $query->row_array();
		}

}
public function getunitfilterdatabyid($id){
		if($id) {
			$sql = "SELECT * FROM stockitem,itemfilter 
			WHERE stockitem.ItemID = $id AND stockitem.unit = itemfilter.Filter_id AND itemfilter.Filter_type = 'unit'" ;
			$query = $this->db->query($sql);
			return $query->row_array();
		}

}
public function getCategorydatabyid($id){
	if($id){
		$sql = "SELECT * FROM stockitem,itemcategory 
			WHERE stockitem.ItemID = $id AND stockitem.CategoryID = itemcategory.categ_id" ;
			$query = $this->db->query($sql);
			return $query->row_array();
	}
}
public function getItemImage($id){
	$output = '';	
		if($id){
		$sql = "SELECT * FROM stockitem WHERE ItemID = ?" ;
			$query = $this->db->query($sql, array($id));
			$data = $query->row_array();
			$output .= ' <img src="'.base_url().'images/'.$data['ItemImage'].'" alt="Not found">';	
	return $output;
		}
		
}

public function getOwnerData($id){
	if($id) {
			$sql = "SELECT * FROM stockitem,stock,user
			WHERE stockitem.ItemID = $id AND stockitem.StockID =stock.Stock_id AND stock.User_id = user.User_id";
			$query = $this->db->query($sql);
			return $query->row_array();

			
		}
}
		public function pushOrderNotification($ID){
			

			$this->db->select('*');
			$this->db->from('orders');
			$this->db->where('orders.Order_id', $ID);
			$this->db->join('orderitem', 'orderitem.Order_id = orders.Order_id');
			$this->db->join('stockitem', 'stockitem.ItemID = orderitem.item_id');
			$this->db->join('stock', 'stock.Stock_id = stockitem.StockID');
			$this->db->join('user', 'user.User_id = stock.User_id');
			$result = $this->db->get()->row();


			$data1 = array(

					
					'Notification_type' => '3',
					
				);
			$this->db->insert('notification', $data1);
			$ntfn_id = $this->db->insert_id();

			
			
			$data2 = array(

					'orderID' => $ID,
					'notificationID' => $ntfn_id
			);
			$this->db->insert('ordernotification', $data2);

			$data3 = array(

				'Notification_id' => $ntfn_id,
				'User_id' => $result->User_id
			);
			$this->db->insert('sentto', $data3);
		}

}