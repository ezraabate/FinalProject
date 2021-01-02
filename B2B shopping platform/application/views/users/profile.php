  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-8 col-xs-12 col-md-offset-1">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Profile</h3>
              
          		<a href=" <?php if($user_data['roleID'] == '1'): ?> 
                        <?php echo base_url('users/adminsetting') ?>
                        <?php elseif($user_data['roleID'] == '2'): ?>
                        <?php echo base_url('users/retailsetting') ?>
                        <?php elseif($user_data['roleID'] == '3'): ?>
                        <?php echo base_url('users/wholesalesetting') ?>  
                        <?php endif; ?>"
                class="pull pull-right"><i class="fa fa-edit"></i> <strong>Edit profile</strong> </a>
       	 	
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-condensed table-hovered">
                <tr>
                  <th>First Name</th>
                  <td><?php echo $user_data['FirstName']; ?></td>
                </tr>
                  <tr>
                  <th>Second Name</th>
                  <td><?php echo $user_data['SecondName']; ?></td>
                </tr>
                  <tr>
                  <th>Last Name</th>
                  <td><?php echo $user_data['LastName']; ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $user_add['Email']; ?></td>
                </tr>   
                <tr>
                  <th>Phone</th>
                  <td><?php echo $user_add['phone_number']; ?></td>
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

 
