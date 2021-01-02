<footer class="footer-area mt-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                   <div class="logo">
                            <a href="<?php echo base_url('dashboard'); ?>"><img src="assets/images/logos/WRS.jpg" alt="logo" /></a>
                        </div>
                    <div class="copyright">
                        <strong>Copyright &copy; <?php echo date('Y') ?>.</strong> All rights reserved.
                    </div>
                    <div class="payment-gateways">
                        
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="fooer-widget">
                        <h4>Services we provide</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Laptop & Computers</a></li>
                                <li><a href="#">Smart Phone & Tablets</a></li>
                                <li><a href="#">TV & Audio</a></li>
                                <li><a href="#">Cameras & Photography</a></li>
                                <li><a href="#">Gadgets</a></li>
                                <li><a href="#">Car Electronic & GP5</a></li>
                                <li><a href="#">Accesories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 mt-sm-45">
                    <div class="fooer-widget">
                        <h4>Information</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Find a Store</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Delivery information</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Gift Cards</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 mt-sm-45">
                    <div class="fooer-widget">
                        <h4>Customer Care</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Wish List</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Returns / Exchange</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Product Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt-sm-45">
                    <div class="footer-widget">
                        <div class="subscribe-form">
                        </div>
                        <div class="social-icons style-2">
                            <strong>Contact Us!</strong>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer-area end-->

    <!-- modernizr js -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jquery-3.3.1 version -->
    
    <!-- bootstra.min js -->
    
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- mmenu js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.mmenu.js"></script>
    <!-- easing js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js"></script>
    <!---slick-js-->
    <script src="<?php echo base_url(); ?>assets/js/slick.min.js"></script>
    <!---letteranimation-js-->
    <script src="<?php echo base_url(); ?>assets/js/letteranimation.min.js"></script>
    <!-- jquery-ui js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
    <!-- jquery.countdown js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.countdown.min.js"></script>
    <!-- venobox js -->
    <script src="<?php echo base_url(); ?>assets/js/venobox.min.js"></script>
    <!-- plugins js -->
    <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
    <!-- main js -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

    <script src="<?php echo base_url(); ?>who/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>who/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 
 
    <!-- Modal -->
    <div class="modal fade" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="tab-content">
                                <div id="product-1" class="tab-pane fade in show active">
                                    <div class="product-details-thumb" id="itemimage">
                                        
                                    </div>
                                </div>
                                 
                            </div>
                            
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="product-details-desc">
                                        <h2 id="Item_name_value"></h2>
                                        <h4 id="Item_description_value"></h4>
                                        <div class="product-quantity mt-15">
                                        <label>Item Vendor:-</label>
                                        <label id="Item_vendor_value"></label>
                                        </div>
                                        <div class="product-quantity mt-15">
                                        <label>Item Brand:-</label>
                                        <label id="Item_brand_value"></label>
                                        </div>
                                        <div class="product-quantity mt-15">
                                            <label>Expiration Date:-</label>
                                            <label id="Item_expdate"></label>
                                        </div>

                                        <div class="product-quantity mt-15">
                                            <label>Category:-</label>
                                            <label id="Item_category"></label>
                                        </div>

                                        <div class="product-quantity mt-15">
                                            <label>Item owned by:-</label>
                                            <label id="Item_owner_name"></label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product-action stuck text-left">
                                        <div class="product-price-rating">
                                            <span id="sprice"></span><span>ETB</span>
                                        </div>
                                        <div class="product-colors mt-20">
                                            <label>Color:-</label>
                                            <label id="Item_color_value"></label>
                                        </div>
                                        <div class="product-colors mt-20">
                                            <label>Size:-</label>
                                            <label id="Item_size_value"></label>
                                        </div>
                                        <div class="product-colors mt-20">
                                            <label>Unit:-</label>
                                            <label id="Item_unit_value"></label>
                                        </div>
                                        <div class="product-quantity mt-15">
                                            <label>Avaliable Quatity:-</label>
                                            <label id="Item_quantity_value"></label>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 



     <!-- Modal -->
    <div class="modal fade" id="quick-view1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="tab-content">
                                <div id="product-1" class="tab-pane fade in show active">
                                    <div class="product-details-thumb" id="itemimage1">
                                        
                                    </div>
                                </div>
                                 
                            </div>
                            
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="product-details-desc">
                                        <h2 id="Item_name_value1"></h2>
                                        <h4 id="Item_description_value1"></h4>
                                        <div class="product-quantity mt-15">
                                        <label>Item Vendor:-</label>
                                        <label id="Item_vendor_value1"></label>
                                        </div>
                                        <div class="product-quantity mt-15">
                                        <label>Item Brand:-</label>
                                        <label id="Item_brand_value1"></label>
                                        </div>
                                        <div class="product-quantity mt-15">
                                            <label>Expiration Date:-</label>
                                            <label id="Item_expdate1"></label>
                                        </div>

                                        <div class="product-quantity mt-15">
                                            <label>Category:-</label>
                                            <label id="Item_category1"></label>
                                        </div>

                                        <div class="product-quantity mt-15">
                                            <label>Item owned by:-</label>
                                            <label id="Item_owner_name1"></label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product-action stuck text-left">
                                        
                                        <div style="font-weight: bold; font-style: italic;">
                                            <del><span id="pprice"></span><span>ETB</span></del>
                                        </div>

                                        <div class="product-price-rating">
                                            <span id="sprice1"></span><span>ETB</span>
                                        </div>


                                        

                                        <div class="product-colors mt-20">
                                            <label>Color:-</label>
                                            <label id="Item_color_value1"></label>
                                        </div>
                                        <div class="product-colors mt-20">
                                            <label>Size:-</label>
                                            <label id="Item_size_value1"></label>
                                        </div>
                                        <div class="product-colors mt-20">
                                            <label>Unit:-</label>
                                            <label id="Item_unit_value1"></label>
                                        </div>
                                        <div class="product-quantity mt-15">
                                            <label>Avaliable Quatity:-</label>
                                            <label id="Item_quantity_value1"></label>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 




    

  
</body>

<!-- Mirrored from lionsbite.co.uk/html/hakduck-preview/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Mar 2020 10:46:07 GMT -->
</html>