<style> 
.form-group.required .control-label:after{
	content: " * ";
	color: red;
}

</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Setting</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Setting</li>
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

          <div class="box" >
            <div class="box-header">
              <h3 >Update Information</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="<?php base_url('users/adminsetting') ?>" method="post" id="updateadminform">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group required" >
                  <label for="firstname" class="control-label">First name</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="first name" autocomplete="off" required value="<?php echo $user_data['FirstName'] ?>">
                </div>
                <div class="form-group" >
                  <label for="secondname" class="control-label">Second name</label>
                  <input type="text" class="form-control" id="sname" name="sname" placeholder="second name" autocomplete="off" required value="<?php echo $user_data['SecondName']?>">
                </div>
                <div class="form-group required" >
                  <label for="lastname" class="control-label">Last name</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="last name" autocomplete="off" required value="<?php echo $user_data['LastName']?>">
                </div>

                <div class="form-group required" >
                  <label for="phone" class="control-label">Phone No</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="phone no" autocomplete="off" required value="<?php echo $user_add['phone_number']?>">
                </div>
                
                <div class="form-group required" >
                  <label for="email" class="control-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" required value="<?php echo $user_add['Email']?>">
                </div>

                <div class="form-group required">
                  <label for="city" class="control-label">City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="city" autocomplete="off" required value="<?php echo $user_add['City']?>">
                </div>

                <div class="form-group" >
                  <label for="scity" class="control-label">Subcity</label>
                  <input type="text" class="form-control" id="scity" name="scity" placeholder="sub city" autocomplete="off" required value="<?php echo $user_add['SubCity']?>">
                </div>
                <div class="form-group">
                  <div class="alert alert-error alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      If you don't want to change your Username and Password then leave them empty, else fill both fields.
                  </div>

                <div class="form-group required" >
                  <label for="username" class="control-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" required value="">
                </div>

                <div class="form-group">
                   <div class="form-group required" >
                  <label for="password" class="control-label" >Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>

                <div class="form-group required" >
                  <label for="cpassword " class="control-label">Confirm password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                </div>
                
            
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('users/profile') ?>" class="btn btn-warning">Back</a>
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
     
       // email: {
       //          validators: {
       //              notEmpty: {
       //                  message: 'The email address is required and can\'t be empty'
       //              },
       //              emailAddress: {
       //                  message: 'The input is not a valid email address'
       //              }
       //          }
       //      },
        
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

