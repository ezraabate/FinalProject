<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retailer_dashboard extends Admin_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('model_dashboard');
 }

 function index()
 {
  $data['brand_data'] = $this->model_dashboard->fetch_filter_type('ItemBrand');
  $data['vendor_data'] = $this->model_dashboard->fetch_filter_type('VendorName');
  $data['color_data'] = $this->model_dashboard->fetch_color_filter();
  $data['size_data'] = $this->model_dashboard->fetch_size_filter();
  $data['unit_data'] = $this->model_dashboard->fetch_unit_filter();
  
  $this->render_template_new('dashboard1', $data);
 }

function fetch_data()
 {
  sleep(1);
  $searchItem = $this->input->post('searchItem');
  $opt = $this->input->post('catid');
  $brand = $this->input->post('brand');
  $vendor = $this->input->post('vendor');
  $color = $this->input->post('color');
  $size = $this->input->post('size');
  $unit=  $this->input->post('unit');
  $catid = $this->input->post('id');
  
  $this->load->library('pagination');
  $config = array();
  $config['base_url'] = '#';
  $config['total_rows'] = $this->model_dashboard->count_all($brand, $vendor, $color, $size,$unit, $opt, $searchItem);
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
   'product_list'   => $this->model_dashboard->fetch_data($config["per_page"], $start, $brand, $vendor, $color, $size, $unit, $opt, $searchItem)
  );
  echo json_encode($output);
 }

 public function categories(){
  
  $result = $this->model_dashboard->fetchAllCategories($this->input->post('id'));
    
    if($result){
      foreach($result as $key => $row)
      {
        $var = $row['categ_id'];
        if($row['Status'] == 1){
        
          
          echo "<option class = 'opt' value='$var'>".$row['categ_name']."</option>";
        }
        else
          "<option value=''>with status = 0</option>";
            
      }

    }
    else
      echo '';

 }

 public function filterCategory(){

    $result = $this->input->post('id');

    if($result)
    {
        foreach ($result as $val) {
          
            echo $this->model_dashboard->filterCategoryModel($val);
        }
    }
    
 }
  
}
?>