	<div class="breadcrumb-area mt-25">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs">
						
						</div>
					</div>
				</div>
			</div>
		</div>
<div class="shopping-cart-steps">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart-steps">
						<ul class="clearfix">
							<li class="active">
								<div class="inner">
									<span class="step">01</span> <span class="inner-step">Shopping Cart</span>
								</div>
							</li>
							<li>
								<div class="inner">
									<span class="step">02</span> <span class="inner-step">Checkout </span>
								</div>
							</li>
							<li>
								<div class="inner">
									<span class="step">03</span> <span class="inner-step">Order Completed </span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	

<!--shopping-cart area-->
	<div class="shopping-cart-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="cart-table">
							<thead>
								<tr>
									<th>Item Name</th>
									<th>Unit Price</th>
									<th>Quantity</th>
									<th>Total Price</th>
									<th>Action</th>
									<th class="text-center"><i class="fa fa-times" aria-hidden="true" id="clear_cart"></i></th>
								</tr>
							
							</thead>
							<tbody>

								<?php 
								$count = 0;
								$output = '';
							
	                             foreach ($this->cart->contents() as $items) {
                                          
                                            $count++;
		                                    $output.='



								<tr>
								

									<td>
									<div class="cart-product-name">

									'.$items["name"].'</div>

									</td>
									<td><span class="cart-product-price">'.$items["price"].'</span></td>
									<td>'.$items["qty"].'</td>
									<td>'.$items["subtotal"].'</td>
									<td><button type="button" name="remove" class="btn btn-danger removebutton" id="'.$items["rowid"].'">Remove</button></td>
									
								</tr>
								
								';}
								$output .= '
		<tr>
			<td colspan="4" align="right">SubTotal</td>
			<td>'.$this->cart->total().'</td>	
			</tr>
			</table>
			</div>
			';
								if($count == 0){
	                      $output .= '<h3 align="center">Cart is empty</h3>';
                          }
                          echo $output;
                        
								 ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row mt-30">
				<div class="col-lg-6">
					<div class="cart-update">
						<a href="<?php echo base_url('retailer_dashboard'); ?>" class="btn-common">CONTINUE SHOPPING</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="cart-update pull-right">
						<a href="<?php echo base_url('PlaceOrder/checkout'); ?>" class="btn-common">CHECK OUT</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!--shopping-cart end-->

	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('click' , '.removebutton',function(){
            var row_id = $(this).attr("id");
      
      $.ajax({
        url:"<?php echo base_url();?>cart/remove",
        method:"POST",
        data:{
          row_id:row_id
        },
        success:function(data){
          alert("product removed from cart");
           parent.window.location.reload();
        }


      });

    
   

});


  $(document).on('click' , '#clear_cart',function(){
      
      $.ajax({
        url:"<?php echo base_url();?>cart/clear",
        
        success:function(data){
          alert("Cart has been cleared");
          parent.window.location.reload();
          
        }


      });
   

});


		});
	</script>