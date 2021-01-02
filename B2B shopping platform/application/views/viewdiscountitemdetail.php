  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->   <div class="content-i"><div class="content-box">
    <div class="element-wrapper">
    <section class="content-header">
      <h4>
        On Discount Item Information  
      </h4>
      
    </section>
<div class="form-desc">Your items details </div>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-8 col-xs-12 col-md-offset-1">

          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-condensed table-hovered">
                <tr>
                  <th>Item Name</th>
                  <td><?php echo $item_detail['ItemName']; ?></td>
                </tr>
                  <tr>
                  <th>Item Description</th>
                  <td><?php echo $item_detail['ItemDescription']; ?></td>
                </tr>

                    <tr>
                  <th>Expiration Date</th>
                  <td><?php echo $edate; ?></td>
                </tr>


                  <tr>
                  <th>Item Brand</th>
                  <td><?php echo $item_detail['ItemBrand']; ?></td>
                </tr>
                <tr>
                  <th>Item Vendor</th>
                  <td><?php echo $item_detail['VendorName']; ?></td>
                </tr>   
                <tr>
                  <th>Purchasing Price</th>
                  <td><?php echo $item_detail['PurchasingPrice']; ?></td>
                </tr>
                <tr>
                  <th>Orginal Selling Price</th>
                  <td><?php echo $item_detail['Pricebuffer']; ?></td>
                </tr>

                <tr>
                  <th>Current Selling Price</th>
                  <td><?php echo $item_detail['SellingPrice']; ?></td>
                </tr>


                <tr>
                  <th>Avaliable Quantity for sale</th>
                  <td><?php echo $item_detail['itemQuantity']; ?></td>
                </tr>
                

              

                <tr>
                  <th>Color</th>
                  <td><?php echo $item_color['Filter_value']; ?></td>
                </tr>


                <tr>
                  <th>Size</th>
                  <td><?php echo $item_size['Filter_value']; ?></td>
                </tr>


                <tr>
                  <th>Unit</th>
                  <td><?php echo $item_unit['Filter_value']; ?></td>
                </tr>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div></div></div></div>
  <!-- /.content-wrapper -->

 
