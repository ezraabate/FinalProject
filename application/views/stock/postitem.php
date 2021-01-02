 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post
        <small>Item For Sale</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-6 col-xs-12 col-md-offset-2">


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

          <div class="box" >
            
            <!-- /.box-header -->
            <form role="form" action="<?php base_url('stock/postitem') ?>" method="post" id="updateadminform">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group required" >
                  <label for="item_name" class="control-label">Item name</label>
                  <input type="text" class="form-control" id="item_name" name="item_name" placeholder="item name" autocomplete="off" required value="<?php echo $item_data['ItemName'];?>">
                </div>
                
                <div class="form-group" >
                  <label for="quantity" class="control-label">Quantity</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" min = "0"autocomplete="off" required value="<?php echo $item_data['ItemQuantity'];?>">
                </div>


                <div class="form-group required" >
                  <label for="sprice" class="control-label">Selling price</label>
                  <input type="text" class="form-control" id="sprice" name="sprice" placeholder="Selling price in birr" autocomplete="off" required value="<?php echo $item_data['SellingPrice'];?>">
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Post Item</button>
                <a href="<?php echo base_url('stock/index') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
       
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <script type="text/javascript">
  $(document).ready(function() {
   

     $('#updateadminform').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
      fname: {
                validators: {
                    notEmpty: {
                        message: 'First name is required and can\'t be empty'
                    },
                    
                   regexp: {
                    regexp: /^[a-zA-Z\.]+$/,
                    message: 'Firstname can only consist of alphabetical'
                }
                }
            },

        sname: {
          validators:{
              regexp: {
                    regexp: /^[a-zA-Z\.]+$/,
                    message: 'Secondname can only consist of alphabetical'
                }

          }

          
        },   
            
            lname: {
             
                validators: {
                    notEmpty: {
                        message: 'Last name is required and can\'t be empty'
                    },
                    
                    regexp: {
                    regexp: /^[a-zA-Z\.]+$/,
                    message: 'Lastname can only consist of alphabetical'
                }
                }
            },
     
       email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
        
        phone: {
            validators: {
                notEmpty: {
                    message: 'Phone number is required and can\'t be empty'
                },
                stringLength: {
                    min: 3,
                    max: 18,
                    message: 'Mobile number must be more than 2 and less than 18 digits long'
                },
                 regexp: {
                    regexp: /^[0-9\-\+]+$/,
                    message: 'Phone can only consist of digits,plus and hiphen'
                }
               
            }
        },
        city: {
                validators: {
                    notEmpty: {
                        message: 'The city is required and can\'t be empty'
                    }
                }
            },
             

          scity: {
                validators: {
  
                  regexp: {
                        regexp: /^[a-zA-Z\/\-]+$/,
                        message: 'Sub-City can only consist alphabetical,slash and hiphen'
                    }
                }
                
            }
                 
   

    }
});
  
  });
</script>

