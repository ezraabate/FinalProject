<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="manifest" href="<?php echo base_url(); ?>site.html">
      <link rel="apple-touch-icon" href="<?php echo base_url(); ?>icon.html">
    <!-- Place favicon.ico in the root directory -->
  
    <!-- bootstrap v4.0.0 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
     
    <!-- fontawesome-icons css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <!-- themify-icons css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themify-icons.css">
    <!-- elegant css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/elegant.css">
    <!-- elegant css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.mmenu.css">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css">
    <!-- venobox css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/venobox.css">
    <!-- slick css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick.css">
    <!-- slick-theme css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick-theme.css">
    <!-- cssanimation css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cssanimation.min.css" />
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css" /> 
    <!-- helper css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/helper.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
    
   
  
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">


    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.2.1.min.js"></script>


        <script type="text/javascript">
        
        $(document).ready(function(){
                
            var ntfnCount = function(){
                    jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Notification/notificationCount'); ?>",
                    cache: false,
                    data: {id: <?php echo $this->session->userdata('id') ?>},
                    success: function(result){
                        if(result){
                            jQuery("span#count").html(result);
                        }
                    }
                });
                }
                setInterval(ntfnCount,1000);

            var lowItemAvailability = function(){

                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url('Notification/lowItemAvailabilityInStock'); ?>",
                        cache: false,
                    });

                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url('Notification/lowItemAvailabilityForSale'); ?>",
                        cache: false,
                    });
                }
                setInterval(lowItemAvailability,5000);



            $('#bell').click(function(){
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Notification/notificationContent'); ?>",
                    cache: false,
                    data: {id: <?php echo $this->session->userdata('id') ?>},
                    success: function(result){
                        if(result){
                            jQuery("#body").html(result);

                            jQuery(".ntfn").click(function()
                            {   
                                var clicked = $(this).attr('id');
                                //jQuery('#body').html($('#'+clicked).attr('id'));
                                //jQuery($('#'+clicked)).removeClass('text-warning');



                                jQuery.ajax({

                                    type: "POST",
                                    url: "<?php echo base_url('Notification/notificationDetail'); ?>",
                                    cache: false,
                                    data: {id3: clicked},
                                    success: function(result){

                                        jQuery('#body').html(result);
                                    }
                                });

                                <?php //redirect('Notification/orderDetail') ?>
                                
                                jQuery.ajax({
                                type: "POST",
                                url: "<?php echo base_url('Notification/readNotification'); ?>",
                                cache: false,
                                data: { id1: clicked, id2: <?php echo $this->session->userdata('id'); ?>},
                                success: function(result){
                                    if(result){
                                        jQuery("#body").html('hello');
                                    }
                                }
                            });
                        

                            }); 
                        }
                    }
                });ntfnCount
            });

            $('#try').each(function(i){
                var len = $(this).text().trim().length;
                if (length>100){
                    $(this).text($(this).text().substr(0,100)+'...');
                }
            });


            $('#categories').multiselect({
        nonSelectedText: 'Select categories',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth:'200px'
    });



    $('.btn-group .multiselect, .dropdown-toggle, .btn, .btn-default').click(function(){
            
            jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url('Retailer_dashboard/categories'); ?>",
            cache: false,
            data: {id: <?php echo $this->session->userdata('id') ?>},
            success: function(result){
                if(result){

                    $("#categories").html(result);
                    $('#categories').multiselect('rebuild');
                }
            }
        });
        });

    //$('.opt').click(function(){
        //var values = $('#categories').val();
        //alert(values);
        /**/
    //});
    
    // var getCheckedValues = function () {  
    //         var selected = $("#categories option:selected");    /*Current Selected Value*/  
    //         var message = "";  
    //         var arrSelected = [];      /*Array to store multiple values in stack*/  
    //         selected.each(function () {  
    //             arrSelected.push($(this).val());    /*Stack the Value*/  
    //             message += $(this).text() + " " + $(this).val() + "\n";  
    //         }); 

           

    //         $.ajax({
            
    //         type:"POST",
    //         url:"<?php //echo base_url('Retailer_dashboard/filterCategory'); ?>",
    //         data: {id: arrSelected},
    //         success:function(result)
    //         {
    //             $('#testtest').html(result);   
    //         }
    //     });

    //     }
    //     setInterval(getCheckedValues, 50);



        });
    </script>
    <!-- for searching part -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

  <style scoped>
        .dropdown-toggle:after
        {
            display: none;
        }
        .checkbox{

            font-size: 11px;
            text-overflow: all;
        }
        .multiselect{

            font-size: 11px;
        }
        .multiselect-container{

            text-overflow: ellipsis;
            overflow: scroll;
            overflow-x: auto; 
            width: 200px;
            height: 200px;
            white-space: nowrap;
            
            max-width: 95%;

        }
    </style>

</head>

<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!--header-area start-->
    <header class="header-area">
        <div class="desktop-header">