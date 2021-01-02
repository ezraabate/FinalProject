<!DOCTYPE html>
<html>
<head>
  <title>Create Wholesaler</title>
  <link rel="stylesheet" href="<?php echo base_url('libs/assets/dist/css/bootstrap-multiselect.css') ?>">
<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>libs/js_bs/jquery.min.js"></script>
</head>
<body>
      <form role="form" action=" <?php echo base_url('register/registerWholesaler'); ?> " method="post" id="createwholesaleform" enctype="multipart/form-data"> 
              <div class="box-body">
                     
                      <?php echo validation_errors(); ?>
                
                <div class="form-group required" >
                  <label for="firstname" class="control-label">Owner First Name</label>
                  <input type="text" class="form-control" id="fname" name="fname" required placeholder="first name" autocomplete="off" value="<?php echo set_value('fname');?>">
                </div>
                <div class="form-group required" >
                  <label for="secondname" class="control-label">Owner Second Name</label>
                  <input type="text" class="form-control" id="sname" name="sname" placeholder="second name" autocomplete="off" required value="<?php echo set_value('sname');?>">
                </div>
                <div class="form-group required " >
                  <label for="lastname" class="control-label">Owner Last Name</label>
                  <input type="text" class="form-control" id="lname" name="lname" required placeholder="last name" autocomplete="off" value="<?php echo set_value('lname');?>">
                </div>

                <div class="form-group required" >
                  <label for="photo" class="control-label">Upload Photo</label><br>
                  <input type="file" id="photo" name="photo">
                </div>
                
                <div class="form-group required " >
                  <label for="wname" class="control-label">Wholesale Name</label>
                  <input type="text" class="form-control" id="wname" name="wname" placeholder="Wholesale name" required autocomplete="off" value="<?php echo set_value('wname');?>">
                </div>
                <div class="form-group required " >
                  <label for="stockname" class="control-label">Stock Name</label>
                  <input type="text" class="form-control" id="stockname" name="stockname" placeholder="Stock name" required autocomplete="off" value="<?php echo set_value('stockname');?>">
                </div>
                
                <div class="form-group required">
                  <label for="tno" class="control-label">Tin No</label>
                  <input type="text" class="form-control" id="tno" name="tno" placeholder="Tin No" autocomplete="off" value="<?php echo set_value('tno');?>">
                </div>
                <div class="form-group required" >
                  <label for="baccno" class="control-label">License No</label>
                  <input type="text" class="form-control" id="lno" name="lno" placeholder="License No" autocomplete="off" required value="<?php echo set_value('lno');?>">
                </div>

                <div class="form-group required" >
                  <label for="phone" class="control-label">Phone No</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="phone no" autocomplete="off" required value="<?php echo set_value('phone');?>">
                </div>

                
                <div class="form-group" >
                  <label for="email" class="control-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" required value="<?php echo set_value('email');?>">
                </div>

                <div class="form-group required" >
                  <label for="city" class="control-label">City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="city" autocomplete="off" required value="<?php echo set_value('city');?>">
                </div>

                <div class="form-group required" >
                  <label for="scity" class="control-label">Subcity</label>
                  <input type="text" class="form-control" id="scity" name="scity" placeholder="sub city" autocomplete="off" required value="<?php echo set_value('scity');?>">
                </div>
                
                <div class="form-group" >
                  <label for="subs" class="control-label">Subscribe for</label><br>
                  <select name="subs" id="subs" class="form-control">
                     <?php foreach ($categData as $k => $v): ?>
                      <option value="<?php echo $v['categ_id'] ?>"><?php echo $v['categ_name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                
                <div class="form-group required" >
                  <label for="mplace" class="control-label">Market Place</label>
                  <input type="text" class="form-control" id="mplace" name="mplace" placeholder="Market Place" autocomplete="off" required value="<?php echo set_value('mplace');?>">
                </div>

                

                <div class="form-group required" >
                  <label for="username" class="control-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" required value="<?php echo set_value('username');?>">
                </div>

                <div class="form-group">
                   <div class="form-group required" >
                  <label for="password" class="control-label" >Password</label>
                  <input type="password" required class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" value="<?php echo set_value('password');?>">
                </div>

                <div class="form-group required" >
                  <label for="cpassword " class="control-label">Confirm password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" required placeholder="Confirm Password" autocomplete="off" value="<?php echo set_value('cpassword');?>">
                </div>
                
                
            

                </div>

              </div>
              <!-- /.box-body -->

              
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="<?php echo base_url('auth/login') ?>" class="btn btn-warning">Back</a>
            
            </form>
          </div>

  <script src="<?php echo base_url('libs/assets/bower_components/bootstrap/dist/js/bootstrapValidator.js') ?>"></script>
  <script src="<?php echo base_url('libs/assets/bower_components/bootstrap/dist/js/bootstrap-multiselect.js')?>"></script> 
  <script type="text/javascript" src="<?php echo base_url(); ?>libs/js_bs/bootstrap.min.js"></script>
  
  <script type="text/javascript" src="<?php echo base_url(); ?>libs/js_bs/popper.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  

             $('#createwholesaleform').bootstrapValidator({
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
            wname: {
             
                validators: {
                    notEmpty: {
                        message: 'Wholesale name is required and can\'t be empty'
                    }
                }
            },
             stockname: {
             
                validators: {
                    notEmpty: {
                        message: 'Stock name is required and can\'t be empty'
                    }
                }
            },
  
            bankname: {
             
                validators: {
                    notEmpty: {
                        message: 'Bank name is required and can\'t be empty'
                    },
                    
                    regexp: {
                    regexp: /^[a-zA-Z\.]+$/,
                    message: 'Bank name can only consist of alphabetical'
                }
                }
            },
                 baccno: {
             
                validators: {
                    notEmpty: {
                        message: 'Bank Account number is required and can\'t be empty'
                    },
                    
                    regexp: {
                    regexp: /^[A-Za-z0-9\.]+$/,
                    message: 'bank Account number can only consist of alphabetical and digits'
                }
                }
            },
            tno: {
             
                validators: {
                    notEmpty: {
                        message: 'Tin number is required and can\'t be empty'
                    },
                    
                    regexp: {
                    regexp: /^[A-Za-z0-9\.]+$/,
                    message: 'tin number can only consist of alphabetical and digits'
                }
                }
            },
            lno: {
             
                validators: {
                    notEmpty: {
                        message: 'License number is required and can\'t be empty'
                    },
                    
                    regexp: {
                    regexp: /^[A-Za-z0-9\.]+$/,
                    message: 'License number can only consist of alphabetical and digits'
                }
                }
            },
             mplace: {
             
                validators: {
                    notEmpty: {
                        message: 'Market place is required and can\'t be empty'
                    },
                    
                    regexp: {
                    regexp: /^[a-zA-Z\.]+$/,
                    message: 'Market place can only consist of alphabetical'
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
                 

            rdate: {
                    
                    validators: {
                    notEmpty: {
                        message:'registration date can\'t be empty'
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
            },
             status: {
                validators: {
                    notEmpty: {
                        message: 'You have to select the Retail Status'
                    }
                }
            }

    }
});

  
  });
</script>

</body>
</html>