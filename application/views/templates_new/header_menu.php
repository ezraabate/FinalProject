            <!--header-top-->
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="topbar-left">
                                <ul class="list-none">
                                    <li>SHOP EVENTS & SAVE UP TO <span>65% OFF!</span></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="topbar-right">
                                
                                <div class="currency-bar lang-bar pull-right">
                                    <ul>
                                        <li><a href="#"><img src="assets/images/icons/gb.png" alt="" />English <i class="fa fa-angle-down"></i></a>
                                           
                                        </li>
                                        <li><span class="br">|</span></li>
                                    </ul>
                                </div>
                                <div class="currency-bar pull-right">
                                    <ul>
                                        <li><a href="#">Birr <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                               
                                            </ul>
                                        </li>
                                        <li><span>|</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header-bottom-->
            <div class="sticker header-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="logo">
                               <a href="<?php echo base_url('dashboard') ?>"><img src="assets/images/logos/WRC.png" alt="logo" /></a>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="mainmenu">  
                                <nav>
                                    <ul>
                                         <li><a href="<?php echo base_url('retailer_dashboard'); ?>">Home </a>
                                           
                                        </li>
                                        <!-- <li>
                                            <a href="#">
                                               <span class="text-label label-featured">Featured</span>
                                                Wholesalers
                                                <b class="caret"></b>
                                            </a>
                                            <ul class="mega-menu">
                                                    <li class="megamenu-single">
                                                    <span class="mega-menu-title">Electronics</span>
                                                    <ul>
                                                        <li><a href="#">NAME</a></li>
                                                        <li><a href="#">NAME</a></li>
                                                        <li><a href="#">NAME</a></li>
                                                        <li><a href="#">NAME</a></li>
                                                        <li><a href="#">NAME</a></li>
                                                    </ul>
                                                </li>
                                                <li class="megamenu-single">
                                                    <span class="mega-menu-title">Home and kitchen</span>
                                                    <ul>
                                                        <li><a href="#">NAME</a></li>
                                                        <li><a href="#">NAME</a></li>
                                                        <li><a href="#">NAME</a></li>
                                                        <li><a href="#">NAME</a></li>
                                                    </ul>
                                                </li>
                                                <li class="megamenu-single">
                                                    <span class="mega-menu-title">Beauty & Personal cares</span>
                                                    <ul>
                                                        <li><a href="about.html">NAME</a></li>
                                                        <li><a href="faq.html">NAME</a></li>
                                                        <li><a href="coming-soon.html">NAME</a></li>
                                                        <li><a href="404.html">NAME</a></li>
                                                    </ul>
                                                </li>
                                                <li class="megamenu-single">
                                                     <span class="mega-menu-title">BAGS</span>
                                                    <ul>
                                                        <li><a href="blog.html">NAMES</a></li>
                                                        <li><a href="blog-grid.html">NAMES</a></li>
                                                        <li><a href="blog-fullwidth.html">NAMES</a></li>
                                                        <li><a href="blog-details.html">NAMES</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li> -->

                                         <li>
                                           <li>
                                            <a href="<?php echo base_url('Discount') ?>"> 
                                                Discounts  
                                            </a>
                                            
                                        </li>
                                        </li>    


                                        <li>
                                           <li>
                                            <a href="<?php echo base_url('Star_rating') ?>"> 
                                                Ratings
                                                
                                            </a>
                                            
                                        </li>
                                        </li>
                                
                                        <li>
                                            <a href="<?php echo base_url('Purchasehistory'); ?>">Purchase History </a>
                                            
                                        </li>
                                        <li><a href="<?php echo base_url('users/profile/') ?>"> <span>Profile</span></a></li>
                                          <li>
                                           <li>
                                            <a href="<?php echo base_url('contact') ?>"> 
                                                Contact
                                                
                                            </a>
                                            
                                        </li>
                                        </li>

                                        <li><a href="<?php echo base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="register-login pull-right">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--products-search-->
            <div class="products-search">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-3">
                            <div class="collapse-menu mt-0">
                                <ul>
                                    <li><a href="javascript:void(0);" class="vm-menu"><i class="fa fa-navicon"></i><span></span></a>
                             
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                
                                <select id="categories" name="categories[]" multiple>
                                    
                                </select>
                                        
                                       <div class="search-box">
                                            
                                            <input type="text" placeholder="Search item..." class="searchItem" style="width: 350px;" />
                                            
                                            <h3 id="testtest"></h3>
                                        
                                        </div>
                                    </div>
                                              

                               
                                <!-- <button>Search</button> -->
                            
                        </div>
                        <div class="col-lg-3">
                            <div class="mini-cart pull-right">
                                <ul>   
                                    <li><a href="<?php echo base_url('Cart'); ?>" class="minicart-icon"><i class="icon_bag_alt"></i><span><?php echo count($this->cart->contents()); ?></span></a>
                                    </li>


                                     <li>
                                        <a id="bell" href="#" data-toggle="modal" data-target="#ModelContent">
                                        <i class="fa fa-bell-o"></i><span class="label label-warning" id="count"></span>
                                    </a>

                                    <div  id="ModelContent" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="width: 25%; left: 75%; right: 0%; top: 25%; bottom: 5%; position: fixed; overflow: hidden;">
                                            <div class="modal-dialog" role="document" style="overflow-y: initial !important;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="ModalTitle">Notifications</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div id="body" class="modal-body" style="height: 250px; overflow: auto; white-space: nowrap;">
    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                        </div>

                                    
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--mobile-header-->
        <div class="sticker mobile-header">
            <div class="container">
                <!--logo and cart-->
                <div class="row align-items-center">
                    <div class="col-sm-4 col-6">
                        <div class="logo">
                             <a href="<?php echo base_url('dashboard') ?>"><img src="assets/images/logos/WRC.png" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8 col-6">
                        <div class="mini-cart text-right">
                          <ul>
                                   
                                    <li><a href="<?php echo base_url('Cart'); ?>" class="minicart-icon"><i class="icon_bag_alt"></i>$180.00<span>2</span></a>
                                
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
                <!--search-box-->
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="search-box mt-sm-15">
                            <select>
                                <option>All Categories</option>
                                <option>Computer</option>
                                <option>TV & Smart box</option>
                                <option>Camera & Photography</option>
                                <option>Headphones</option>
                            </select>
                            <input type="text" placeholder="What do you need?" />
                            <button>Search</button>
                        </div>
                    </div>
                </div>
                <!--site-menu-->
                <div class="row mt-sm-10">
                    <div class="col-lg-12">
                        <a href="#my-menu" class="mmenu-icon pull-left"><i class="fa fa-bars"></i></a>

