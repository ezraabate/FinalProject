  <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="sidebar">
                        
                      
                       

                        <div class="list-filter mt-43">
        <div class="section-title">
        <h3>Brands</h3>
        </div>
        <ul class="list-none mt-25">
        <?php
                    foreach($brand_data->result_array() as $row)
                    {
                    ?>
                    
                    <li>
                    <input type="checkbox" class="common_selector brand" value="<?php echo $row['ItemBrand']; ?>"  >
                    <label> <?php echo $row['ItemBrand']; ?></label>
                    </li>
                 <?php
                    }
                    ?>
         </ul>
         </div>
                <div class="list-filter mt-43">
        <div class="section-title">
        <h3>Vendor</h3>
        </div>
        <ul class="list-none mt-25">
                 <?php
                    foreach($vendor_data->result_array() as $row)
                    {
                    ?>
                     <li>
                       
                      
                        <input type="checkbox" class="common_selector vendor" value="<?php echo $row['VendorName']; ?>"  >
                         <label> <?php echo $row['VendorName']; ?></label>
                 </li>
                    <?php
                    }
                    ?>
                </ul>
                </div>
    
        <div class="list-filter mt-43">
       <div class="section-title">
      <h3>Color</h3>
       </div>
        <ul class="list-none mt-25">
                   <?php
                    foreach($color_data->result_array() as $row)
                    {
                    ?>
                    
                        <li>
                        <input type="checkbox" class="common_selector color" value="<?php echo $row['Filter_id']; ?>"  > <label><?php echo $row['Filter_value']; ?></li>
                        </label>
                    </li>
                    <?php
                    }
                    ?> 
                </ul>
                </div>
            

   <div class="list-filter mt-43">
        <div class="section-title">
                    <h3>size</h3>
                            </div>
                             <ul class="list-none mt-25">
                    <?php
                    foreach($size_data->result_array() as $row)
                    {
                    ?>
                    
                       <li>

                            <input type="checkbox" class="common_selector size" value="<?php echo $row['Filter_id']; ?>"  >  
                            <label><?php echo $row['Filter_value']; ?></label></li>
              
                    <?php
                    }
                    ?> 
                </div>


                   <div class="list-filter mt-43">
        <div class="section-title">
                                <h3>unit</h3>
                            </div>
                             <ul class="list-none mt-25">
     <?php
                    foreach($unit_data->result_array() as $row)
                    {
                    ?>
                    
                        <li><input type="checkbox" class="common_selector unit" value="<?php echo $row['Filter_id']; ?>"  ><label> <?php echo $row['Filter_value']; ?></label>
                  </li>
                    <?php
                    }
                    ?> 
                </ul>
                </div> </div>
            

            </div>

    <div class="col-xl-9 col-lg-9">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="section-title">
                                <h3>Shop List</h3>
                            </div>
                        </div>
                     
                        
                            <div class="pull-right" id="pagination_link">
                              
                            </div>
                           <div class="row filter_data"></div>
                       
                    </div>
                   
        
    
                 
                  
                    
                </div>
        </div>

    </div>

<style>
#loading
{
 text-align:center; 
 background: url('<?php echo base_url(); ?>assets/loading.gif') no-repeat center; 
 height: 150px;
}
</style>

    

<script>
$(document).ready(function(){

    filter_data(1);

    function filter_data(page)
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'discount/fetch_data';
        var brand = get_filter('brand');
        var vendor = get_filter('vendor');
        var color = get_filter('color');
        var size = get_filter('size');
        var unit = get_filter('unit');
        
        $.ajax({
            url:"<?php echo base_url(); ?>discount/fetch_data/"+page,
            method:"POST",
            dataType:"JSON",
            data:{action:action, brand:brand, vendor:vendor, color:color, size:size, unit:unit},
            success:function(data)
            {
                $('.filter_data').html(data.product_list);
                $('#pagination_link').html(data.pagination_link);
            }
        })
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $(document).on('click', '.pagination li a', function(event){
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        filter_data(page);
    });

    $('.common_selector').click(function(){
        filter_data(1);
    });
        $(document).on('click' , '.add_cart',function(){

    var ItemID = $(this).data('productid');
    var ItemName = $(this).data('productname');
    var SellingPrice = $(this).data('price');
    var productquantity = $(this).data('productquantity');
    var quantity = $('#' + ItemID).val();


    if(quantity != 0 && quantity > 0 && quantity <= productquantity){
 
        $.ajax({
          url : "<?php echo base_url('cart/add');?>",
          method : "POST",
          data:{
            productid:ItemID,
            productname:ItemName,
            price:SellingPrice,
            quantity:quantity
          },
        success:function(data){

          parent.window.location.reload();
          // $('#cart_details').html(data);
          }

        });

    }
    else{
      alert("You have entered invalid quantity and/or above the avaliable quantity");
    }


});

$('#cart_details').load('<?php echo base_url(); ?>cart/load');


$(document).on('click' , '.removebutton',function(){
    var row_id = $(this).attr("id");
      
      $.ajax({
        url:"<?php echo base_url();?>cart/remove",
        method:"POST",
        data:{
          row_id:row_id
        },
        success:function(data){
          alert("product removed from cart");
          $('#cart_details').html(data);
        }


      });
   

});

$(document).on('click' , '#clear_cart',function(){
      
      $.ajax({
        url:"<?php echo base_url();?>cart/clear",
        
        success:function(data){
          alert("Cart has been cleared");
          $('#cart_details').html(data);
        }


      });
   

});


});
function itemdetail(id)
{ 
  $.ajax({
    url: 'cart/fetchItemDataById/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response) {

      document.getElementById('Item_name_value1').innerHTML = response.ItemName;
      document.getElementById('Item_description_value1').innerHTML = response.ItemDescription;
      document.getElementById('Item_vendor_value1').innerHTML = response.VendorName;
      document.getElementById('Item_brand_value1').innerHTML = response.ItemBrand;
      document.getElementById('Item_quantity_value1').innerHTML = response.itemQuantity;
      document.getElementById('Item_expdate1').innerHTML = response.ExpirationDate;
      document.getElementById('sprice1').innerHTML = response.SellingPrice;
      document.getElementById('pprice').innerHTML = response.Pricebuffer;
      



    }

  

  });
          $.ajax({
    url: 'cart/fetchcolorFilterDataById/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response) {
     
      document.getElementById('Item_color_value1').innerHTML = response.Filter_value;     

    }
        
  });  
      $.ajax({
    url: 'cart/fetchsizeFilterDataById/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response) {
     
      document.getElementById('Item_size_value1').innerHTML = response.Filter_value;     

    }
    
  });

     $.ajax({
    url: 'cart/fetchunitFilterDataById/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response) {
     
      document.getElementById('Item_unit_value1').innerHTML = response.Filter_value;     

    }
    
  }); 

       $.ajax({
    url: 'cart/fetchCategoryDataById/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response) {
     
      document.getElementById('Item_category1').innerHTML = response.categ_name;     

    }
    
  }); 


             $.ajax({
    url: 'cart/fetchownerdata/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response) {
      document.getElementById('Item_owner_name1').innerHTML = response.wholesale_name;;      

    }
    
  });    

        $.ajax({
    url: 'cart/fetchItemImage/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response) {
   
      $('#itemimage1').html(response);      

    }
    
  });    

}
</script>