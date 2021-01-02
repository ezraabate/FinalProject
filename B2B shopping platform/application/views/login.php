<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  

  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>libs/Login/images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>libs/Login/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>libs/Login/css/main.css">
  
<link rel="stylesheet" href="<?php echo base_url('libs/Login/css/bootstrap.css') ?>">


</head>

<body>

 
  
  <div class="limiter">
     <div class="container-login100" class="hold-transition login-page" style="background: url(<?php echo base_url();?>libs/login/images/bg-01.svg); no-repeat;background-size: cover;" >
      <div class="wrap-login100 p-t-0 p-b-0">
          <span class="login100-form-title p-b-7">
            Login
          </span>
          <span class="login100-form-avatar">
            <img src="<?php echo base_url(); ?>libs/Login/images/WR.png" alt="AVATAR">
          </span>
           <div class="text-center">
           <?php echo validation_errors(); ?>  

            <?php if(!empty($errors)) {
              echo $errors;
            } ?>
          </div>

          <?php if(!empty($maxAttempt)){?>

            <div class="text-center"> <?php echo $maxAttempt ?>
            <p id="demo"></p></div>

            <?php } ?>

          <br>

          <div>
         <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php endif; ?>
          </div>  



         <form action="<?php echo base_url('auth/login') ?>" method="post">
                      
          <div class="wrap-input100 validate-input m-b-35">
            <input class="input100" type="text" name="username">
            <span class="focus-input100" data-placeholder="Username"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-50">
            <input class="input100" type="password" name="pass">

            <span class="focus-input100" class="input" data-placeholder="Password"></span>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-success">
              LOGIN
            </button>
          </div>
        </form>

          <ul class="login-more p-t-50">
            <div style="text-align: center;">
            <a href="<?php echo base_url('auth/forgetpassword') ?>" class="txt2">
                Forget Password?
            </a>
            </div>
            <br><br>
              <div class="txt1" style="text-align: center;">
                Don’t have an account?
              

              <a href="<?php echo base_url('Register') ?>" class="txt2">
                Sign up
              </a>
            </div>
          </ul>
        
      </div>
    </div>
  </div>

  <script src="<?php echo base_url('libs/Login/js/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url(); ?>libs/lLogin/js/main.js"></script>
  <script src="<?php echo base_url('libs/Loginjs/bootstrap.min.js') ?>"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<script>


const countDownDate = new Date();
countDownDate.setSeconds(countDownDate.getSeconds() + 20);


var x = setInterval(function() 
{

  var now = new Date().getTime();
   
  var distance = countDownDate - now;
  
  var distance = new Date(distance);

 document.getElementById("demo").innerHTML = distance.getSeconds() + ' seconds';    

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "You can try now";
  }

});
</script>

</body>
</html>