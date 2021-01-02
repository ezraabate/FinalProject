<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content-i"><div class="content-box">
		<div class="element-wrapper">
  <!-- Content Header (Page header) -->


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
        <?php elseif($this->session->flashdata('errors')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('errors'); ?>
          </div>

          <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>

        <?php endif; ?>

        
          <a href="<?php echo base_url('stock/create') ?>" class="btn btn-primary">Create New Product</a>
          <br /> <br />
        

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Stock</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Item Name</th>
                <th>Date Added</th>
                <th>Expiration date</th>
                <th>Vendor</th>
                <th>Brand</th>
                <th>Quantity</th>
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
</div>
</div>
</div>

<!-- /.content-wrapper -->
<div class="modal fade" tabindex="-1" role="dialog" id="postitem">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Post Item</h4>
      </div>

      <form role="form" action="<?php echo base_url('PostItemForSale/PostItem') ?>" method="post" id="postitemform">

        <div class="modal-body">
          <div id="messages"></div>

          <div class="form-group">
            <label for="item_name" class="control-label">Item Name</label>
            <input type="text" class="form-control" id="item_name" name="item_name"  autocomplete="off" readonly="readonly">
          </div>
          
        <div class="form-group" >
                  <label for="quantity" class="control-label">Quantity</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" min = "0" autocomplete="off" >
        </div>

            <div class="form-group required" >
                  <label for="sprice" class="control-label">Selling price</label>
                  <input type="text" class="form-control" id="sprice" name="sprice"  autocomplete="off">
                </div>
        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" tabindex="-1" role="dialog" id="updatequantity">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Update Quantity</h4>
      </div>

      <form role="form" action="<?php echo base_url('Stock/updatequantity') ?>" method="post" id="updatequantityform">

        <div class="modal-body">
          <div id="messages"></div>

          
          
        <div class="form-group" >
                  <label for="quantity" class="control-label">Quantity</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" min = "0" autocomplete="off" value="0" >
        </div>

            

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
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
    'ajax': 'fetchItemData',
    'order': []
  });

     $('#postitemform').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
      item_name: {
                validators: {
                    notEmpty: {
                        message: 'Item name is required and can\'t be empty'
                    },
                    
                   regexp: {
                    regexp: /^[a-zA-Z\.]+$/,
                    message: 'Item name can only consist of alphabetical'
                }
                }
            },
             quantity: {
                validators: {
                    notEmpty: {
                        message: 'Quantity is required and can\'t be empty'
                    } 
                  
                }
            },
            sprice: {
                validators: {
                    notEmpty: {
                        message: 'Selling price is required and can\'t be empty'
                    },
                    
                regexp: {
                      regexp: /^[0-9\.]+$/,
                      message: 'Selling price can only consist of numeric litral and decimal point'
                  }
                }
            },

          }
  
  });
   });

function postitem(id)
{ 
  $.ajax({
    url: 'fetchItemDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#item_name").val(response.ItemName);
      $('#quantity').val(response.ItemQuantity)
      $("#sprice").val(response.sellingPrice);
      $('#quantity').attr('max',response.ItemQuantity);
 
      $("#postitemform").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(), // /converting the form data into array and sending it to server
          dataType: 'json',
          success:function(response) {

            manageTable.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');


              // hide the modal
              $("#postitem").modal('hide');
              // reset the form 
              $("#postitemform .form-group").removeClass('has-error').removeClass('has-success');

            } else {

              if(response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#"+index);

                  id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');
                  
                  id.after(value);

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

function updatequantity(id)
{ 
  $.ajax({
    url: 'fetchItemDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      
      
     
      
 
      $("#updatequantityform").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(), // /converting the form data into array and sending it to server
          dataType: 'json',
          success:function(response) {

            manageTable.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');


              // hide the modal
              $("#updatequantity").modal('hide');
              // reset the form 
              $("#updatequantityform.form-group").removeClass('has-error').removeClass('has-success');

            } else {

              if(response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#"+index);

                  id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');
                  
                  id.after(value);

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
