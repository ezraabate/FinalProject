  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Retailer
        <small>Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Retailer Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-8 col-xs-12 col-md-offset-1">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Retailer Info</h3>       	 	
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-condensed table-hovered">
                <tr>
                  <th>Owner First Name</th>
                  <td><?php echo $ret_data['FirstName']; ?></td>
                </tr>
                  <tr>
                  <th>Owner Second Name</th>
                  <td><?php echo $ret_data['SecondName']; ?></td>
                </tr>
                  <tr>
                  <th>Owner Last Name</th>
                  <td><?php echo $ret_data['LastName']; ?></td>
                </tr>
                 <tr>
                  <th>Retail Name</th>
                  <td><?php echo $ret_data['Retail_name']; ?></td>
                </tr>

                <tr>
                  <th>Email</th>
                  <td><?php echo $ret_add['Email']; ?></td>
                </tr>   
                <tr>
                  <th>Phone</th>
                  <td><?php echo $ret_add['phone_number']; ?></td>
                </tr>
                <tr>
                  <th>City</th>
                  <td><?php echo $ret_add['City']; ?></td>
                </tr>
                <tr>
                  <th>SubCity</th>
                  <td><?php echo $ret_add['SubCity']; ?></td>
                </tr>
              
                 <tr>
                  <th>Registration Date</th>
                  <td><?php echo $date_data; ?></td>
                </tr>
                
                  <tr>
                  <th>Account Status</th>
                  
                    <?php if($ret_acc['Status'] == '1'): ?> 
                        
                        <td><span class="label label-success">Active</span></td>
                        
                        <?php elseif($ret_acc['Status'] == '0'): ?>
                       
                       <td><span class="label label-warning">Inactive</span></td>
                       
                        <?php endif; ?>

                    
                  
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
  </div>
  <!-- /.content-wrapper -->

 
