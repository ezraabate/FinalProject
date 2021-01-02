<style> 
.form-group.required .control-label:after{
	content: " * ";
	color: red;
}

</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Retailers</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Create New Retailers</li>
      </ol>
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

          <div class="box"  >
            <div class="box-header">
              <h3 class="box-title">Add Retailer</h3>
            </div>
            <form role="form" action="<?php base_url('users/createretail') ?>" method="post" id="retailcreateform" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group required" >
                  <label for="firstname" class="control-label">Owner First Name</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="first name" autocomplete="off" required value="<?php echo set_value('fname');?>">
                </div>
                <div class="form-group" >
                  <label for="secondname" class="control-label">Owner Second Name</label>
                  <input type="text" class="form-control" id="sname" name="sname" placeholder="second name" autocomplete="off" required value="<?php echo set_value('sname');?>">
                </div>
                <div class="form-group required" >
                  <label for="lastname" class="control-label">Owner Last Name</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="last name" autocomplete="off" required value="<?php echo set_value('lname');?>">
                </div>
                
                <div class="form-group required" >
                  <label for="retname" class="control-label">Retail Name</label>
                  <input type="text" class="form-control" id="retname" name="retname" placeholder="Retail name" autocomplete="off" required value="<?php echo set_value('retname');?>">
                </div>


                <div class="form-group required" >
                  <label for="phone" class="control-label">Phone No</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="phone no" autocomplete="off" required value="<?php echo set_value('phone');?>">
                </div>

                
                <div class="form-group" >
                  <label for="email" class="control-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" required value="<?php echo set_value('email');?>">
                </div>

                <div class="form-group" >
                  <label for="city" class="control-label">City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="city" autocomplete="off" required value="<?php echo set_value('city');?>">
                </div>

                <div class="form-group" >
                  <label for="scity" class="control-label">Subcity</label>
                  <input type="text" class="form-control" id="scity" name="scity" placeholder="sub city" autocomplete="off" required value="<?php echo set_value('scity');?>">
                </div>

                <div class="form-group required" >
                  <label for="photo" class="control-label">Upload Photo</label>
                  <input type="file" id="photo" name="photo">
                </div>

                <div class="form-group" >
                  <label for="subs" class="control-label">Subscribe for</label><br>
                  <select name="subs[]" id="subs" multiple="multiple" class="form-control">
                     <?php foreach ($cat_data as $k => $v): ?>
                      <option value="<?php echo $v['categ_id'] ?>"><?php echo $v['categ_name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
  

                <div class="form-group required" >
                  <label for="username" class="control-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" required value="<?php echo set_value('username');?>">
                </div>

                <div class="form-group">
                   <div class="form-group required" >
                  <label for="password" class="control-label" >Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" required value="<?php echo set_value('password');?>">
                </div>

                <div class="form-group required" >
                  <label for="cpassword " class="control-label">Confirm password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off" required value="<?php echo set_value('cpassword');?>">
                </div>

                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#subs ').multiselect({
  nonSelectedText :'Select Categories that you want to subscribe',
  enableFiltering:true,
  enableCaseInsensetiveFiltering:true,
  buttonWidth:'510px'


});
    

         $('#retailcreateform').bootstrapValidator({
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
            retname: {
             
                validators: {
                    notEmpty: {
                        message: 'Retail name is required and can\'t be empty'
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
                
            },
                 

           
            username: {
                    
                    validators: {
                    notEmpty: {
                        message:'Username is required and can\'t be empty'
                    }
                }
                
            },
            
           password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'cpassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            cpassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
         

    }
});



  
  });
</script>

