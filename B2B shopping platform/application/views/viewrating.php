  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      View Wholesaler
      <small>Ratings</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">View ratings</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">View Rating</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
               
              </tr>
              </thead>

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


<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="ratingModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Rating Detail</h4>
      </div>
        <div class="modal-body">

          <div class="form-group required">
            <label class="control-label">Rating Count:-</label>
            <label class="control-label" id="countlabel"></label>
          </div>

          <div class="form-group required">
            <label class="control-label">Rating Value:-</label>
            <label class="control-label" id="valuelabel"></label>
          </div>
          
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<script type="text/javascript">
var manageTable;

$(document).ready(function() {
  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': 'fetchWholesalerData',
    'order': []
  });

  
});

// edit function
function ratingFunc(u_id)
{ 
  $.ajax({
    url: 'getRatingCount/'+u_id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#countlabel").text(response);
     


  

    }
  });

    $.ajax({
    url: 'getRatingvalue/'+u_id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#valuelabel").text(response.rating);
      


  

    }
  });
}




</script>
