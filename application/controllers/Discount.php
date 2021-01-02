<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discount extends Admin_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('model_discount');
 }

 function index()
 {
  $data['brand_data'] = $this->model_discount->fetch_filter_type('ItemBrand');
  $data['vendor_data'] = $this->model_discount->fetch_filter_type('VendorName');
  $data['color_data'] = $this->model_discount->fetch_color_filter();
  $data['size_data'] = $this->model_discount->fetch_size_filter();
  $data['unit_data'] = $this->model_discount->fetch_unit_filter();
  $this->render_template_new('discount', $data);
  // $this->load->view('product_filter', $data);
 }

 function fetch_data()
 {
  sleep(1);
  $brand = $this->input->post('brand');
  $vendor = $this->input->post('vendor');
  $color = $this->input->post('color');
  $size = $this->input->post('size');
  $unit=  $this->input->post('unit');
  
  $this->load->library('pagination');
  $config = array();
  $config['base_url'] = '#';
  $config['total_rows'] = $this->model_discount->count_all($brand, $vendor, $color, $size,$unit);
  $config['per_page'] = 8;
  $config['uri_segment'] = 3;
  $config['use_page_numbers'] = TRUE;
  $config['full_tag_open'] = '<ul class="pagination">';
  $config['full_tag_close'] = '</ul>';
  $config['first_tag_open'] = '<li>';
  $config['first_tag_close'] = '</li>';
  $config['last_tag_open'] = '<li>';
  $config['last_tag_close'] = '</li>';
  $config['next_link'] = '&gt;';
  $config['next_tag_open'] = '<li>';
  $config['next_tag_close'] = '</li>';
  $config['prev_link'] = '&lt;';
  $config['prev_tag_open'] = '<li>';
  $config['prev_tag_close'] = '</li>';
  $config['cur_tag_open'] = "<li class='active'><a href='#'>";
  $config['cur_tag_close'] = '</a></li>';
  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';
  $config['num_links'] = 3;
  $this->pagination->initialize($config);
  $page = $this->uri->segment(3);
  $start = ($page - 1) * $config['per_page'];
  $output = array(
   'pagination_link'  => $this->pagination->create_links(),
   'product_list'   => $this->model_discount->fetch_data($config["per_page"], $start, $brand, $vendor, $color, $size, $unit)
  );
  echo json_encode($output);
 }
 

  public function discountitems()
  {
    $result = $this->model_discount->getDiscountItemData();
    $this->data['results'] = $result;
    
    $this->render_template_who('discountitems', $this->data);
  }


  public function fetchDiscountItemData()
  {
    $result = array('data' => array());

    $data = $this->model_discount->getDiscountItemData();
    foreach ($data as $key => $value) {

      // button
      $buttons = '';

        $buttons .= '<a href="'.base_url('Discount/Viewdetail/'.$value['Item_ID_ForSale']).'"><i class="os-icon os-icon-eye btn btn-warning"></i></a>';


      $result['data'][$key] = array(
        
        $value['ItemName'],
        $value['ItemQuantity'],
        $value['DateAdded'],
        $value['DatePosted'],
        $value['SellingPrice'],
        $value['ExpirationDate'],
        $buttons
      );
    } // /foreach

    echo json_encode($result);
  }


  public function Viewdetail($id){
  $item_detail= $this->model_discount->getitemDetail($id);
  $this->data['item_detail'] = $item_detail;

  $item_color= $this->model_discount->getitemcolor($id);
  $this->data['item_color'] = $item_color;


  $item_size= $this->model_discount->getitemsize($id);
  $this->data['item_size'] = $item_size;

  $item_unit= $this->model_discount->getitemunit($id);
  $this->data['item_unit'] = $item_unit;



     $strtimestamp = $item_detail['ExpirationDate'];
    $edate = date('d/m/Y', strtotime($strtimestamp));
     $this->data['edate'] = $edate;

      $strtimestamp = $item_detail['DatePosted'];
    $pdate = date('d/m/Y', strtotime($strtimestamp));
     $this->data['pdate'] = $pdate;

    $this->render_template_who('viewdiscountitemdetail', $this->data);
}





}
?>