<div class="content-i">
  <div class="content-box"><div class="row"><div class="col-sm-12">
  <div class="element-wrapper"><div class="element-box">
  <h5 class="form-header">Create Items</h5>
  <div class="form-desc">New items
  </div>

    <!-- Main content -->
   
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-6 col-xs-12 col-md-offset-2">


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

          <div class="box" >
            
            <!-- /.box-header -->
            <form role="form" action="<?php base_url('stock/create') ?>" method="post" id="createitemform" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>
              <div class="row">

      <div class="col-sm-6">
      <div class="form-group">
        <label for="item_name" class="control-label">Item name</label>
                  <input type="text" class="form-control" id="item_name" name="item_name" placeholder="item name" autocomplete="off" required value="<?php echo set_value('item_name');?>"></div></div>
        <div class="col-sm-6">
          <div class="form-group has-error has-danger">
           <label for="itemimage" class="control-label">Item Image</label><br>
                  <input type="file" id="itemimage" name="itemimage"></div>
        </div>
        </div>

          <div class="form-group">
             <label for="description" class="control-label">Item desciption</label>  
                  <TEXTAREA class="form-control" id="description" name="description" placeholder="Description" autocomplete="off" style="width: 611px;" required value="<?php echo set_value('description');?>"></TEXTAREA></div>


              <div class="row">
              <div class="col-sm-6">
              <div class="form-group">
                <label for="quantity" class="control-label">Quantity</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" placeholder="0" min = "0"autocomplete="off" required value="<?php echo set_value('qunatity');?>">
              <div class="help-block form-text with-errors form-control-feedback"></div></div></div>
              <div class="col-sm-6">
                
                <div class="form-group">
                 <label for="exdate" class="control-label">Expiration Date</label>
                  <input type="date" class="form-control" id="exdate" name="exdate" autocomplete="off" required value="<?php echo set_value('exdate');?>">
                <div class="help-block form-text with-errors form-control-feedback"></div></div>
              </div></div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                     <label for="unit" class="control-label">Unit</label><br>
                  <select name="unit" id="unit" class="form-control">
                    <option selected disabled>---Select unit if it applies---</option>
                     <?php foreach ($units as $k => $v): ?>
                      <option value="<?php echo $v['Filter_id'] ?>"><?php echo $v['Filter_value'] ?></option>
                    <?php endforeach ?>
                  </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="size" class="control-label">Size</label><br>
                  <select name="size" id="size" class="form-control">
                    <option selected disabled>---Select size if it applies---</option>
                     <?php foreach ($sizes as $k => $v): ?>
                      <option value="<?php echo $v['Filter_id'] ?>"><?php echo $v['Filter_value'] ?></option>
                    <?php endforeach ?>
                  </select>
                  </div>
                  </div>
                   <div class="col-sm-6">
                  <div class="form-group">
                       <label for="color" class="control-label">Color</label><br>
                  <select name="color" id="color" class="form-control">
                    <option selected disabled>---Select color if it applies---</option>
                     <?php foreach ($colors as $k => $v): ?>
                      <option value="<?php echo $v['Filter_id'] ?>"><?php echo $v['Filter_value'] ?></option>
                    <?php endforeach ?>
                  </select>
                  </div>
                  </div>
                </div>
               <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                     <label for="brand" class="control-label">Item Brand</label>
                  <input type="text" class="form-control" id="brand" name="brand" placeholder="item brand" autocomplete="off" required value="<?php echo set_value('brand');?>">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                     <label for="vendor" class="control-label">Item vendor</label>
                  <input type="text" class="form-control" id="vendor" name="vendor" placeholder="item vendor" autocomplete="off" required value="<?php echo set_value('vendor');?>">
                  </div>
                  </div>
                   <div class="col-sm-6">
                  <div class="form-group">
                        <label for="pprice" class="control-label">Purchasing Price</label>
                  <input type="text" class="form-control" id="pprice" name="pprice" placeholder="purchasing price in birr" autocomplete="off" required value="<?php echo set_value('pprice');?>">
                  </div>
                  </div>
                      <div class="col-sm-6">
                  <div class="form-group">
                       <label for="sprice" class="control-label">Selling price</label>
                  <input type="text" class="form-control" id="sprice" name="sprice" placeholder="Selling price in birr" autocomplete="off" required value="<?php echo set_value('sprice');?>">
                  </div>
                  </div>
                </div> 
                   
       
            

              <div class="form-buttons-w">
                <button class="btn btn-primary disabled" type="submit">Save Changes</button>
                 <a href="<?php echo base_url('stock/index') ?>" class="btn btn-warning">Back</a>

              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
       
      </div>
      <!-- /.row -->
      

  </div></div>  </div></div>
  <!-- /.content-wrapper -->

 <script type="text/javascript">
  $(document).ready(function() {
   

     $('#createitemform').bootstrapValidator({
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
        description: {
          validators:{
            notEmpty: {
                        message: 'Item Description is required and can\'t be empty'
                    }
              
          }

          
        }, 
         quantity: {
                validators: {
                    
                   regexp: {
                    regexp: /^[0-9\.]+$/,
                    message: 'Quantity can only consist of numeric litrals'
                }
                }
            },  
            
            
         brand: {
                  validators: {
                      notEmpty: {
                          message: 'Brand is required and can\'t be empty'
                      }
                     
                  }
              },
          
          vendor: {
              validators: {
                  notEmpty: {
                      message: 'Vendor is required and can\'t be empty'
                  },
                
                   
                 
              }
          },
          pprice: {
                  validators: {
                      notEmpty: {
                          message: 'Purchasing price is required and can\'t be empty'
                      },
                      regexp: {
                      regexp: /^[0-9\.]+$/,
                      message: 'Purchasing price can only consist of numeric litral and decimal point'
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
                  
              }
                 
   

    }
});
  
  });
</script>

