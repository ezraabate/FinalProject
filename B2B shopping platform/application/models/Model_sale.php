<?php 

class Model_sale extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


public function getSaleItemData($id = null)
	{
		$uid = $this->session->userdata('u_id');
		
		if($id) {
			$sql = "SELECT * FROM itemforsale WHERE Item_ID_ForSale = ?";
			$query = $this->db->query($sql, array($id));
			$result = $query->row_array();

			$item_id = $result['Item_ID_ForSale'];
			$sql = "SELECT * FROM stockitem WHERE ItemID = ?";
			$query = $this->db->query($sql, array($item_id));
			return $query->row_array();	

	}
			$sql = "SELECT * FROM stock WHERE User_id = ?";
			$query = $this->db->query($sql, array($uid));
			$result = $query->row_array();

			$s_id = $result['Stock_id'];		

			$sql = "SELECT * FROM itemforsale,stockitem 
			WHERE itemforsale.Item_ID_ForSale = stockitem.ItemID AND stockitem.StockID = $s_id AND itemforsale.discount_Status = '0'";
			$query = $this->db->query($sql);
			return $query->result_array();
	}

public function update($data, $id,$sprice)
	{
		if($data && $id) {

			$sql = "SELECT * FROM itemforsale WHERE Item_ID_ForSale = ?";
			$query = $this->db->query($sql, array($id));
			$result = $query->row_array();

			$selling_price = $result['SellingPrice'];
			if($sprice >= $selling_price){
				return false;
			}else{

			$data += array(
			'Pricebuffer' => $selling_price
			);
			$this->db->where('Item_ID_ForSale', $id);
			$update = $this->db->update('itemforsale', $data);
			return ($update == true) ? true : false;
		}}
	}


		public function getitemDetail($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM stockitem,itemforsale WHERE itemforsale.Item_ID_ForSale = ? AND stockitem.ItemID = itemforsale.Item_ID_ForSale";
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

}