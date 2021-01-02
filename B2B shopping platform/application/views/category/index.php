  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Category</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Category</li>
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

        
          <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Category</button>
          <br /> <br />
        

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Categories</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Category Name</th>
                <th>Status</th>
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
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Category</h4>
      </div>

      <form role="form" action="<?php echo base_url('category/create') ?>" method="post" id="createCategoryForm">

        <div class="modal-body">

          <div class="form-group required">
            <label for="category_name" class="control-label">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="active"class="control-label">Status</label>
            <select class="form-control" id="active" name="active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
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
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Category</h4>
      </div>

      <form role="form" action="<?php echo base_url('category/update') ?>" method="post" id="updateForm">

        <div class="modal-body">
          <div id="messages"></div>

          <div class="form-group">
            <label for="edit_category_name" class="control-label">Category Name</label>
            <input type="text" class="form-control" id="edit_category_name" name="edit_category_name" placeholder="Enter category name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_active" class="control-label">Status</label>
            <select class="form-control" id="edit_active" name="edit_active">
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


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Category</h4>
      </div>

      <form role="form" action="<?php echo base_url('category/remove') ?>" method="post" id="removeForm">
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
  $("#categoryNav").addClass('active');
  
  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': 'fetchCategoryData',
    'order': []
  });

  // submit the create from 
  $("#createCategoryForm").unbind('submit').on('submit', function() {
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
          $("#addModal").modal('hide');

          // reset the form
          $("#createCategoryForm")[0].reset();
          $("#createCategoryForm .form-group").removeClass('has-error').removeClass('has-success');

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
$('#createCategoryForm').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
     category_name: {
                validators: {
                    notEmpty: {
                        message: 'Category Name is required and can\'t be empty'
                    },
                    
                   regexp: {
                        regexp: /^[A_Za-z\/\-]+$/,
                        message: 'Category Name can only consists of alphabets,hiphen and slash'
                    }
                }
            },
            
            active: {
             
                validators: {
                    notEmpty: {
                        message: 'Status is required and can\'t be empty'
                    }  
                    
                }
            }

        }
        
        });

$('#updateForm').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
     edit_category_name: {
                validators: {
                    notEmpty: {
                        message: 'Category Name is required and can\'t be empty'
                    },
                    
                   regexp: {
                        regexp: /^[A_Za-z\/\-]+$/,
                        message: 'Category Name can only consists of alphabets,hiphen and slash'
                    }
                }
            },
            
            edit_active: {
             
                validators: {
                    notEmpty: {
                        message: 'Status is required and can\'t be empty'
                    }  
                    
                }
            }

        }
        
        });

});

// edit function
function editFunc(categ_id)
{ 
  $.ajax({
    url: 'fetchCategoryDataById/'+categ_id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#edit_category_name").val(response.categ_name);
      $("#edit_active").val(response.status);


      // submit the edit from 
      $("#updateForm").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + categ_id,
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
              $("#editModal").modal('hide');
              // reset the form 
              $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

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

// remove functions 
// function removeFunc(categ_id)
// {
//   if(categ_id) {
//     $("#removeForm").on('submit', function() {

//       var form = $(this);

//       // remove the text-danger
//       $(".text-danger").remove();

//       $.ajax({
//         url: form.attr('action'),
//         type: form.attr('method'),
//         data: { category_id:categ_id }, 
//         dataType: 'json',
//         success:function(response) {

//           manageTable.ajax.reload(null, false); 

//           if(response.success === true) {
//             $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
//               '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
//               '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
//             '</div>');

//             // hide the modal
//             $("#removeModal").modal('hide');

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
