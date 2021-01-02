<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Authentication forms">
    <meta name="author" content="Arasari Studio">

    <title>signup</title>
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/common.css" rel="stylesheet">

    
    <link href="<?php echo base_url(); ?>css/theme-01.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>https://fonts.googleapis.com/css?family=Nunito:400,600,700&amp;
    display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('libs/assets/dist/css/bootstrapValidator.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('libs/assets/dist/css/bootstrap-multiselect.css') ?>">
    <?php $this->data['categData'] = $categData ?>

    <script type="text/javascript" src="<?php echo base_url(); ?>libs/js_bs/jquery.min.js"></script>
</head>
<body>


<div class="forny-container">
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
    <div class="forny-inner">
      
        
    <div class="alert alert-danger d-none alert-form-error">
    Please, correct invalid values.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>


        <div class="forny-form">
            <div class="forny-logo">
              <h2 class="form-title">Create account</h2>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active bg-transparent" href="#login" data-toggle="tab" role="tab">
                        <span>Retailer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-transparent" href="#register" data-toggle="tab" role="tab">
                        <span>wholesaler</span>
                    </a>
                </li>
            </ul>
             <div class="tab-content">
                <div class="tab-pane fade show active" role="tabpanel" id="login"><?php $this->load->view('registerRetailer', $this->data); ?></div>
<div class="tab-pane fade" role="tabpanel" id="register"><?php $this->load->view('registerWholesaler' ,$this->data); ?>  
</div>
</div>
</div>
</div>
</div>


  

  <script type="text/javascript" src="<?php echo base_url(); ?>libs/js_bs/bootstrap.min.js"></script>
  
  <script type="text/javascript" src="<?php echo base_url(); ?>libs/js_bs/popper.min.js"></script>
   <script src="<?php echo base_url('libs/assets/bower_components/bootstrap/dist/js/bootstrapValidator.js') ?>"></script>
  <script src="<?php echo base_url('libs/assets/bower_components/bootstrap/dist/js/bootstrap-multiselect.js')?>"></script> 
</body>
</html>