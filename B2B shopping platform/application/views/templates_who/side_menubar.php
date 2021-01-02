<!-- mobile side bar -->

<div class="logged-user-name"><?php echo $this->session->userdata('fname') .'  '. $this->session->userdata('lname') ?></div>
<div class="logged-user-role">Wholesaler</div></div></div>
<ul class="main-menu">
  <li class=""><a href="<?php echo base_url('dashboard'); ?>">
<div class="icon-w">
<div class="os-icon os-icon-layout"></div></div><span>Dashboard</span></a>



<li class=""><a href="<?php echo base_url('Sale/'); ?>"><div class="icon-w">
<div class="os-icon os-icon-layers"></div></div>
<span>Sale items</span></a>
<ul class="sub-menu">
</ul></li>


 <li class=""><a href="<?php echo base_url('Discount/discountitems'); ?>"><div class="icon-w">
 <div class="os-icon os-icon-layers"></div></div>
 <span>Discount items</span></a><ul class="sub-menu">
 </ul></li>

<li class=""><a href="<?php echo base_url('Stock/'); ?>"><div class="icon-w">
<div class="os-icon os-icon-layers"></div></div>
<span>Stock items</span></a><ul class="sub-menu">
</ul></li>


<li class="">
<span></span>
</li>
 <li >
        <a href="<?php echo base_url('users/profile'); ?>"><div class="icon-w">
            <div class="os-icon os-icon-mail"></div></div>
                 <span>profile</span></a>
           </li>

           <li><a href="<?php echo base_url("Salehistory") ?>"><div class="icon-w"><div class="os-icon os-icon-users"></div></div><span>Sale History</span></a>
            </li>

<li ><a href="<?php echo base_url('auth/logout'); ?>"><div class="icon-w"><div class="os-icon os-icon-edit-32"></div></div><span>Logout</span></a>

</ul></li></ul>
</div></div>

<div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link"><div class="logo-w"><a class="logo" href="<?php echo base_url("Dashboard/") ?>"><div class="logo-element"></div>

<div class="logo-label">Wholesaler</div></a></div>
<div class="logged-user-w avatar-inline"><div class="logged-user-i">
<div class="avatar-w"><img alt="" src="<?php echo base_url().'images/'.$this->session->userdata('photo') ?>"></div>
<div class="logged-user-info-w">
<div class="logged-user-name"><?php echo $this->session->userdata('fname') .'  '. $this->session->userdata('lname') ?></div>
<div class="logged-user-role">Wholesaler</div></div>
<div class="logged-user-toggler-arrow">
<div class="os-icon os-icon-chevron-down"></div></div>
<div class="logged-user-menu color-style-bright">
<div class="logged-user-avatar-info">
<div class="avatar-w">
<img alt="" src="<?php echo base_url().'images/'.$this->session->userdata('photo') ?>">
</div>
<div class="logged-user-info-w"><div class="logged-user-name"><?php echo $this->session->userdata('fname') .'  '. $this->session->userdata('lname') ?></div><div class="logged-user-role">Wholesaler</div></div></div>
<div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
<ul>
<li>
<a href="<?php echo base_url("users/profile"); ?>"><i class="os-icon os-icon-mail-01"></i><span>Profile</span></a></li>


<li><a href="<?php echo base_url('auth/logout') ?>"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li></ul></div>
</div>
</div>


<!-- side menu bar -->


<h1 class="menu-page-header">Page Header</h1>
<ul class="main-menu"><li class="sub-header">
<span></span></li>

<li class="">
<a href="<?php echo base_url('dashboard'); ?>">
<div class="icon-w">
<div class="os-icon os-icon-layout"></div></div>
<span>Dashboard</span></a>
</li>
<li class=""><a href="<?php echo base_url('Sale/'); ?>">
<div class="icon-w">
<div class="os-icon os-icon-layers"></div></div>
<span>Sale items</span></a></li>
  <li class=""><a href="<?php echo base_url('Discount/discountitems'); ?>">
  <div class="icon-w">
  <div class="os-icon os-icon-layers"></div></div>
  <span>Discount items</span></a></li>

<li class=""><a href="<?php echo base_url('Stock/'); ?>">
<div class="icon-w">
<div class="os-icon os-icon-layers"></div></div>
<span>Stock items</span></a></li>
<!--   <li> <a href="apps_bank.html"><div class="icon-w">
<div class="os-icon os-icon-package">
  </div>
</div><span>Applications</span></a></li>
<li ><a href="#">
<div class="icon-w"><div class="os-icon os-icon-life-buoy"></div></div><span>UI Kit</span></a></li>
-->
<li >
<span></span>
</li>
   <li >
        <a href="<?php echo base_url('users/profile'); ?>"><div class="icon-w">
            <div class="os-icon os-icon-users"></div></div>
                 <span>profile</span></a>
           </li>


<li><a href="<?php echo base_url('Salehistory'); ?>"><div class="icon-w"><div class="os-icon os-icon-mail"></div></div><span>Sale History</span></a>
            </li>

<li ><a href="<?php echo base_url('auth/logout') ?>"><div class="icon-w"><div class="os-icon os-icon-edit-32"></div></div><span>Logout</span></a>

</div>


<!-- header -->
<div class="content-w">
<div class="top-bar color-scheme-transparent">
  <div class="top-menu-controls">

    <div class="os-dropdown-trigger os-dropdown-position-left">
        
      <a id="bell" href="#" data-toggle="modal" data-target="#ModelContent" style="text-decoration: none;">
        <div class="messages-notifications">
          <i class="os-icon os-icon-mail-14"></i>
          <span class="new-messages-count" id="count"></span>
        </div>
      </a>

      <div  id="ModelContent" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="width: 25%; left: 75%; right: 0%; top: 5%; bottom: 5%; position: fixed; overflow: hidden;">
        <div class="modal-dialog" role="document" style="overflow-y: initial !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="ModalTitle">Notifications</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div id="body" class="modal-body" style="height: 250px; overflow: auto; white-space: nowrap;">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    



  </div>
</div>