<!DOCTYPE html>
<html>
   <head>
      <title>Forgot Password</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
          <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
      
      <style>
         body {
         background-color: #17c0eb;
         font-family: Nunito Sans;
         }
         .btn {
         background-color: #17c0eb;
         width: 100%;
         color: #fff;
         padding: 10px;
         font-size: 18px;
         }
         .btn:hover {
         background-color: #2d3436;
         color: #fff;
         }
         input {
         height: 50px !important;
         }
         .form-control:focus {
         border-color: #18dcff;
         box-shadow: none;
         }
         h3 {
         color: #17c0eb;
         font-size: 36px;
         }
         .cw {
         width: 35%;
         }
         @media(max-width: 992px) {
         .cw {
         width: 60%;
         }
         }
         @media(max-width: 768px) {
         .cw {
         width: 80%;
         }
         }
         @media(max-width: 492px) {
         .cw {
         width: 90%;
         }
         }
      </style>
   </head>
   <body>
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

            <?php elseif($this->session->flashdata('errors')): ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('errors'); ?>
            </div>
            <?php endif; ?>
      </div>
      <div class="container d-flex justify-content-center align-items-center vh-100"> 
         
         <div class="bg-white text-center p-5 mt-3 center">   
            <h3>Forgot Your Password?</h3>
            <p>Enter your email address and we will send a link to reset your password</p>
            <form class="pb-3" action="<?php echo base_url('auth/resetlink') ?>" method="post">
               <div class="form-group">
               <input type="email" class="form-control" name="email" id="email" placeholder="Your Email Address" required>
               </div>
            <button type="submit" class="btn">Send Reset Link</button>
            </form>
         </div>
      </div>
   <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.2.1.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>


   </body>
</html>