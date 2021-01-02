<?php

class Model_dashboard extends CI_Model
{
 function fetch_filter_type($type)
 {
  $uid = $this->session->userdata('u_id');
//   $sql = "SELECT * FROM subscribefor WHERE User_id = ?";
//   $query = $this->db->query($sql, array($uid));
//   $result = $query->result_array();
   
// foreach ($result as $filterk => $filterv) {
      // $cat_id = $filterv['Categ_id'];
      $this->db->distinct();
      $this->db->select($type);
      $this->db->from('stockitem');
      $this->db->join('itemforsale', 'itemforsale.Item_ID_ForSale = stockitem.ItemID ');
      $this->db->join('subscribefor', 'subscribefor.Categ_id = stockitem.CategoryID');
      $array = array(
        'itemforsale.discount_Status' => '0',
        'subscribefor.User_id' => $uid,
        'itemforsale.itemQuantity >' => '0'
      );
      $this->db->where($array);
      return $this->db->get();
   // } 
 }
 function fetch_color_filter(){

  $this->db->distinct();
  $this->db->select();
  $this->db->from('itemfilter');
  $this->db->where('Filter_type', 'color');
  return $this->db->get();
 } 
  function fetch_size_filter(){

  $this->db->distinct();
  $this->db->select();
  $this->db->from('itemfilter');
  $this->db->where('Filter_type', 'size');
  return $this->db->get();
 }

   function fetch_unit_filter(){

  $this->db->distinct();
  $this->db->select();
  $this->db->from('itemfilter');
  $this->db->where('Filter_type', 'unit');
  return $this->db->get();
 } 



function make_query($brand, $vendor, $color,$size,$unit, $c_id, $searchitem)
 {
  $query;
  $uid = $this->session->userdata('u_id');
  // $sql = "SELECT * FROM subscribefor WHERE User_id = $uid";
  // $query = $this->db->query($sql);
  // $result = $query->result_array();
   
// foreach ($result as $filterk => $filterv){
//   $cat_id = $filterv['Categ_id'];

    $query = "
    SELECT * FROM stockitem,itemforsale,subscribefor
    WHERE stockitem.ItemID = itemforsale.Item_ID_ForSale AND itemforsale.discount_Status = '0' AND stockitem.CategoryID = subscribefor.Categ_id AND itemforsale.itemQuantity > 0 AND subscribefor.User_id = $uid";

  if($searchitem){
    
    $query .= " AND stockitem.ItemName LIKE '%".$searchitem."%'";
  }


  if(isset($c_id))
  {
    $cat_filter = implode(',', $c_id);
    $query .= " AND stockitem.CategoryID IN(".$cat_filter.")";
  }
// }
  



  if(isset($brand))
  {
   $brand_filter = implode("','", $brand);
   $query .= "
    AND stockitem.ItemBrand IN('".$brand_filter."')
   ";
  }

  if(isset($vendor))
  {
   $vendor_filter = implode("','", $vendor);
   $query .= "
    AND stockitem.VendorName IN('".$vendor_filter."')
   ";
  }

 if(isset($color))
  {
   $color_filter = implode("','", $color);
   $query .= "
    AND stockitem.color IN('".$color_filter."')
   ";
  }
  // AND product.product_id = filteritem.item_id
  
  if(isset($size))
  {
   $size_filter = implode("','", $size);
   $query .= "
    AND stockitem.size IN('".$size_filter."')
   ";
  }
  // AND product.product_id = filteritem.item_id

  if(isset($unit))
  {
   $unit_filter = implode("','", $unit);
   $query .= "
    AND stockitem.unit IN('".$unit_filter."')
   ";
  }

   /* if(isset($cat_id)){

    $cat_filter = implode("','", $cat_id);
    $query .= "AND stockitem.CategoryID IN('".$cat_filter."')";
  }*/


  /*if ($searchitem) {
    $query .= "AND stockitem.ItemName = "."'$searchitem'";
  }*/


  // AND product.product_id = filteritem.item_id


  return $query;
 
}

 function count_all($brand, $vendor, $color,$size,$unit, $CID, $searchitem)
 {
  $query = $this->make_query($brand, $vendor, $color,$size,$unit, $CID, $searchitem);
  $data = $this->db->query($query);
  return $data->num_rows();
 }

 function fetch_data($limit, $start,$brand, $vendor, $color,$size,$unit, $CID, $searchitem)
 {
  $query = $this->make_query($brand, $vendor, $color,$size,$unit, $CID, $searchitem);

  $query .= ' LIMIT '.$start.', ' . $limit;

  $data = $this->db->query($query);

  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result_array() as $row)
   {
    $output .= '<div class="col-lg-3">
   
                  <div class="product-single">
                    <div class="product-title">
                      <small><a href="#">'.$row["ItemName"].'</a></small>
                                                <h4><a href="#">'.$row["ItemName"].'</a></h4>
                    </div>
                    <div class="product-thumb">
                      <a href="#"> <img src="'.base_url().'images/'.$row["ItemImage"].'" > </a>
                      <div class="product-quick-view">
                        
                        <a href="javascript:void(0);" onclick="itemdetail('.$row['ItemID'].')" data-toggle="modal" data-target="#quick-view">quick view</a>
                      </div>
                    </div>
                    <div class="product-price-rating">
                      <div class="pull-left">
                        <span>'.$row["SellingPrice"].'  '."ETB".'</span>
                      </div>
                      <div class="pull-right">
                        
                        
                      </div>
                    </div>
                    <div class="product-action">
                       <div class="product-quantity mt-15">
                                            <label>Quatity:</label>
                                            <input type="number" value="1" id="'.$row['ItemID'].'" max="'.$row['itemQuantity'].'"/>
                                        </div>
                       <a  class="add-to-cart add_cart" name="add_cart" data-productname ="'.$row['ItemName'].'" data-price="'.$row['SellingPrice'].'" data-productid="'.$row['ItemID'].'" data-productquantity="'.$row['itemQuantity'].'">Add to Cart</a>
                     
                    </div>
                  </div>
                                               </div>';
   }
  }
  else
  {
   $output = '<h3>No Items Found</h3>';
  }
  return $output;
 }
 
public function fetchAllCategories($Acc_ID){

    $this->db->select('*');
    $this->db->from('account');
    $this->db->where('account.Account_id', $Acc_ID);
    $this->db->join('user', 'user.Account_id = account.Account_id');
    $this->db->join('subscribefor', 'subscribefor.User_id = user.User_id');
    
    $this->db->join('itemcategory', 'itemcategory.categ_id = subscribefor.Categ_id');

    $result = $this->db->get();

    if($result->num_rows() != 0)
    {
      return $result->result_array();
    }
    else
      return false;



  }

public function filterCategoryModel($categID)
{
   return $categID;
    
}


public function fetch_product_data()
{
      $this->db->select();
      $this->db->from('stockitem');
      $this->db->join('itemforsale', 'stockitem.ItemID = itemforsale.Item_ID_ForSale');
      $array = array(
        'itemforsale.discount_Status' => '0',
        'itemforsale.itemQuantity >' =>  '0'
      );
      $this->db->where($array);
      return $this->db->get()->result_array();
    
}
public function fetch_discount_data(){
   $this->db->select();
      $this->db->from('stockitem');
      $this->db->join('itemforsale', 'stockitem.ItemID = itemforsale.Item_ID_ForSale');
      $array = array(
        'itemforsale.discount_Status' => '1',
        'itemforsale.itemQuantity >' =>  '0'
      );
      $this->db->where($array);
      return $this->db->get()->result_array();
}

}

?>



