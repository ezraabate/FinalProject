
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Star_rating extends Admin_controller {

 public function __construct()
 {
      parent::__construct();
  
      $this->not_logged_in();

      $this->load->model('Star_rating_model');
 }

 public function index()
 {
    $this->data['wholesale_data'] = '';
    $this->render_template_new('star_rating', $this->data);  
 }

 public function fetch()
 {
  echo $this->Star_rating_model->html_output();
 }

 public function insert()
 {
  if($this->input->post('wholesaler_id'))
  {
   $data = array(
    'wholesaler_id'  => $this->input->post('wholesaler_id'),
    'rating'   => $this->input->post('index'),
   );
   $data2 = array(
    'Status' => '1'
   );
   $orderid = $this->input->post('order_id');
   $this->Star_rating_model->insert_rating($data,$orderid,$data2);
  }
 }
 public function viewrating(){
   $this->data['page_title'] = 'viewrating';
   $this->render_template('viewrating',$this->data);
 }
  public function fetchWholesalerData()
  {
    $result = array('data' => array());

    $data = $this->Star_rating_model->getwholesalerData();

    foreach ($data as $key => $value) {

      // button
      $buttons = '';

      
        $buttons .= '<button type="button" class="btn btn-secondary" onclick="ratingFunc('.$value['User_id'].')" data-toggle="modal" data-target="#ratingModal"><i class="fa fa-eye"></i></button>';
      

      $result['data'][$key] = array(
        $value['FirstName'],
        $value['LastName'],
        $buttons
      );
    } // /foreach

    echo json_encode($result);
  }
  public function getRatingCount($id){
    if($id) {
      $data = $this->Star_rating_model->get_rating_count($id);
      echo json_encode($data);
    }

    return false;
  }
  public function getRatingvalue($id){
    if($id) {
      $data = $this->Star_rating_model->getrating($id);
      echo json_encode($data);
    }

    return false;

  }
}
?>
