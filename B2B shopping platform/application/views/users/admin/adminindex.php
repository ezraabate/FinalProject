<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Adminstrators</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#"><i class="fa fa-dashboard"></i>Users</a></li>
        <li class="active">Adminstrators</li>
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
          
          <a href="<?php echo base_url('users/admincreate') ?>" class="btn btn-primary">Add New Adminstrator</a>
            <br /> <br />

               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Wholesaler</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="admintable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>First Name</th>
                  <th>Second Name</th>
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

<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="acdeaModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Account Status</h4>
      </div>
        <div class="modal-body">
        <form role="form" action="<?php echo base_url('Users/changeaccountstatus') ?>" method="post" id="statusform">

        <div class="modal-body">

          <div class="form-group">
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 



<script type="text/javascript">
var manageTable;

$(document).ready(function() {
  // initialize the datatable 
  manageTable = $('#admintable').DataTable({
    'ajax': 'fetchAdminData',
    'order': []
  });
});

    // Activate deactivate function 
function ActiveDeactiveFunc(id)
{ 
  $.ajax({
    url: 'fetchAdminDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {
      $("#statusform").unbind('submit').bind('submit', function() {
        var form = $(this);
        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(),
          dataType: 'json',
          success:function(response) {

            manageTable.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');
              // hide the modal
              $("#acdeaModal").modal('hide');
              
            } else {

              if(response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#"+index);

                  id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');
                });
              } else {
                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                '</div>');
              }
            }
          }
        }); 

        return false;
      });

    }
  });
}


  </script>