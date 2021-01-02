<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Filter</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Filter</li>
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

        
          <button class="btn btn-primary" data-toggle="modal" data-target="#addFilterModal">Add Filter</button>
          <br /> <br />
        

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Filter</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Filter Name</th>
                <th>Filter Value</th>
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
<div class="modal fade" tabindex="-1" role="dialog" id="addFilterModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Filter</h4>
      </div>

      <form role="form" action="<?php echo base_url('filter/create') ?>" method="post" id="createFilterForm">

        <div class="modal-body">

          <div class="form-group">
            <label for="filter_name" class="control-label">Filter Name</label>
            <input type="text" class="form-control" id="filter_name" name="filter_name" placeholder="Enter filter name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="filter_val" class="control-label">Filter Value</label>
            <input type="text" class="form-control" id="filter_val" name="filter_val" placeholder="Enter filter type" autocomplete="off">
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



<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editFilterModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Filter</h4>
      </div>

      <form role="form" action="<?php echo base_url('filter/update') ?>" method="post" id="updateFilterForm">

        <div class="modal-body">
          <div id="messages"></div>

          <div class="form-group">
            <label for="edit_filter_name" class="control-label">Filter Name</label>
            <input type="text" class="form-control" id="edit_filter_name" name="edit_filter_name" placeholder="Enter filter name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_filter_val" class="control-label">Filter Value</label>
            <input type="text" class="form-control" id="edit_filter_val" name="edit_filter_val" placeholder="Enter filter type" autocomplete="off">
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



<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeBrandModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Category</h4>
      </div>

      <form role="form" action="<?php echo base_url('brands/remove') ?>" method="post" id="removeBrandForm">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-danger">Remove</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<script type="text/javascript">
var manageTable;

$(document).ready(function() {

  $("#brandNav").addClass('active');

  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': 'fetchFilterData',
    'order': []
  });

  // submit the create from 
  $("#createFilterForm").unbind('submit').on('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
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
          $("#addFilterModal").modal('hide');

          // reset the form
          $("#createFilterForm")[0].reset();
          $("#createFilterForm .form-group").removeClass('has-error').removeClass('has-success');

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
$('#createFilterForm').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
     filter_name: {
                validators: {
                    notEmpty: {
                        message: 'Filter Name is required and can\'t be empty'
                    },
                    
                   regexp: {
                        regexp: /^[A_Za-z\/\-]+$/,
                        message: 'Filter Name can only consists of alphabets,hiphen and slash'
                    }
                }
            },
            
            filter_val: {
             
                 validators: {
                    notEmpty: {
                        message: 'Filter Type is required and can\'t be empty'
                    },
                    
                   regexp: {
                        regexp: /^[A_Za-z\/\-]+$/,
                        message: 'Filter Type can only consists of alphabets,hiphen and slash'
                    }
                }
            }

        }
        
        });

$('#updateFilterForm').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
     edit_filter_name: {
                validators: {
                    notEmpty: {
                        message: 'Filter Name is required and can\'t be empty'
                    },
                    
                   regexp: {
                        regexp: /^[A_Za-z\/\-]+$/,
                        message: 'Filter Name can only consists of alphabets,hiphen and slash'
                    }
                }
            },
            
            edit_filter_val: {
             
               validators: {
                    notEmpty: {
                        message: 'Filter type is required and can\'t be empty'
                    },
                    
                   regexp: {
                        regexp: /^[A_Za-z\/\-]+$/,
                        message: 'Filter type can only consists of alphabets,hiphen and slash'
                    }
                }
            }

        }
        
        });

});

function editFilter(id)
{ 
  $.ajax({
    url: 'fetchFilterDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#edit_filter_name").val(response.Filter_type);
      $("#edit_filter_val").val(response.Filter_value);

      // submit the edit from 
      $("#updateFilterForm").unbind('submit').bind('submit', function() {
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
              $("#editFilterModal").modal('hide');
              // reset the form 
              $("#updateFilterForm .form-group").removeClass('has-error').removeClass('has-success');

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

// function removeFilter(id)
// {
//   if(id) {
//     $("#removeBrandForm").on('submit', function() {

//       var form = $(this);

//       // remove the text-danger
//       $(".text-danger").remove();

//       $.ajax({
//         url: form.attr('action'),
//         type: form.attr('method'),
//         data: { brand_id:id }, 
//         dataType: 'json',
//         success:function(response) {

//           manageTable.ajax.reload(null, false); 

//           if(response.success === true) {
//             $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
//               '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
//               '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
//             '</div>');

//             // hide the modal
//             $("#removeBrandModal").modal('hide');

//           } else {

//             $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
//               '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
//               '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
//             '</div>'); 
//           }
//         }
//       }); 

//       return false;
//     });
//   }
// }


</script>
