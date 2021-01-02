<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
     

        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $total_retailers ?></h3>
                <p>Retailers</p>
              </div>
              <div class="icon">
                <i class="ion ion-man"></i>
              </div>
              <a href="<?php echo base_url('Users/retailindex')?>" class="small-box-footer"><strong> More info <i class="fa fa-arrow-circle-right"></i> </strong></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3><?php echo $total_wholesalers ?></h3>
                <p>Wholesalers</p>
              </div>
              <div class="icon">
                <i class="ion ion-man"></i>
              </div>
              <a href="<?php echo base_url('users/Wholesaleindex') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3><i class="ion ion-cash"></i></h3>
                <p>Transcations</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="<?php echo base_url('Reports'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><i class="ion ion-star"></i></h3>

                <p>Wholesaler Ratings</p>
              </div>
              <div class="icon">
                <i class="ion ion-star"></i>
              </div>
              <a href="<?php echo base_url('Star_rating/viewrating') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    }); 
  </script>
