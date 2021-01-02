<!DOCTYPE html><html>
<!-- Mirrored from light.pinsupreme.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Feb 2020 14:17:40 GMT -->
<head>
    <title>Wholesaler</title><meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible"><meta content="template language" name="keywords"><meta content="Tamerlan Soziev" name="author"><meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <link href="<?php echo base_url(); ?>favicon.png" rel="shortcut icon">
    <link href="<?php echo base_url(); ?>apple-touch-icon.png" rel="apple-touch-icon">
    <link href="<?php echo base_url(); ?>../fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>who/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    
    <link href="<?php echo base_url(); ?>who/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>who/bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>who/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>who/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>who/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>who/bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>who/css/main5739.css?version=4.5.0" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url('libs/assets/dist/css/bootstrapValidator.min') ?>">
      <script src="<?php echo base_url(); ?>who/bower_components/jquery/dist/jquery.min.js"></script>

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


        });
    </script>


</head>
    <body class="menu-position-side menu-side-left full-screen with-content-panel">