<?php
class Star_rating_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
 public function get_wholesaler_data()
 {
  $userid = $this->session->userdata('u_id');
  $this->db->select('user.FirstName,user.LastName,user.User_id,orders.Order_id');
  $this->db->from('orders');
  $array = array(
        'orders.User_id' => $userid,
        'orders.status' =>'0'
      );
      $this->db->where($array);
    $this->db->join('orderitem', 'orderitem.Order_id = orders.Order_id');
      $this->db->join('stockitem', 'stockitem.ItemID = orderitem.item_id');
      $this->db->join('stock', 'stock.Stock_id = stockitem.StockID');
      $this->db->join('user', 'user.User_id = stock.User_id');
  
  return $this->db->get();
 }

 public function get_wholesaler_rating($who_id)
 {
  $this->db->select('AVG(rating) as rating');
  $this->db->from('rating');
  $this->db->where('wholesaler_id', $who_id);
  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["rating"];
  }
 }
 public function get_rating_count($who_id){
    
    $sql = "SELECT * FROM rating WHERE wholesaler_id = $who_id ";
    $query = $this->db->query($sql);
    return $query->num_rows();
}
 public function html_output()
 {
  $data = $this->get_wholesaler_data();
  $output = '';
  foreach($data->result_array() as $row)
  {
   $color = '';
   $rating = $this->get_wholesaler_rating($row["User_id"]);
   $r_count = $this->get_rating_count($row["User_id"]);
   $output .= '
            <div class="col-lg-5">
    <div class="product-single">
     <div class="product-title">
   <h3 class="text-primary">'.$row["FirstName"].' '.$row["LastName"].'</h3>
    <small><a href="#">'.$row["FirstName"].'</a></small>
   </div>
   
   <ul class="list-inline" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">

   ';
   for($count = 1; $count <= 5; $count++)
   {
    if($count <= $rating)
    {
     $color = 'color:#ffcc00;';
    }
    else
    {
     $color = 'color:#ccc;';
    }

    $output .= '<li title="'.$count.'" id="'.$row['User_id'].'-'.$count.'" data-index="'.$count.'" data-wholesaler_id="'.$row["User_id"].'" data-order_id="'.$row["Order_id"].'" data-rating="'.$rating.'" class="rating" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
   }
   $output .= '</ul> 
    <small>('.$r_count.')</small></div></div>';
   
  }
  echo $output;
 }

 public function insert_rating($data,$orderid,$data2)
 {
  $this->db->insert('rating', $data);
  $this->db->where('Order_id', $orderid);
  $this->db->update('orders',$data2);
 }
public function getwholesalerData(){
  $sql = "SELECT * FROM user WHERE roleID = '3'";
    $query = $this->db->query($sql);
    return $query->result_array();
}
public function getrating($who_id)
 {
  $sql = "SELECT AVG(rating) as rating FROM rating WHERE wholesaler_id = $who_id";
    $query = $this->db->query($sql);
    return $query->row_array();
//   $this->db->select('AVG(rating) as rating');
//   $this->db->from('rating');
//   $this->db->where('wholesaler_id', $who_id);
// return $this->db->get();

 }
}

?>