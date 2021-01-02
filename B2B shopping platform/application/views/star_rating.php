 <div class="products-area mt-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                     <div class="products-tab">
                        <div class="product-nav-tabs">

            
             <span id="wholesaler_list"></span>
          
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      
</div></div></div>

    <!-- /.content -->
  </div>




<script>
$(document).ready(function(){
 
 load_data();
 
 function load_data()
 {

  $.ajax({
   url:"<?php echo base_url('/star_rating/fetch');?>",
   type:"POST",
   success:function(data)
   {
    $('#wholesaler_list').html(data);
   }
  })
 }
$(document).on('mouseenter', '.rating', function(){
  var index = $(this).data('index');
  var wholesaler_id = $(this).data('wholesaler_id');
  remove_background(wholesaler_id);
  for(var count = 1; count <= index; count++)
  {
   $('#'+wholesaler_id+'-'+count).css('color', '#ffcc00');
  }
 });

 function remove_background(wholesaler_id)
 {
  for(var count = 1; count <= 5; count++)
  {
   $('#'+wholesaler_id+'-'+count).css('color', '#ccc');
  }
 }

 $(document).on('click', '.rating', function(){
  var index = $(this).data('index');
  var wholesaler_id = $(this).data('wholesaler_id');
  var order_id = $(this).data('order_id');
  $.ajax({
   url:"<?php echo base_url('/star_rating/insert'); ?>",
   type:"POST",
   data:{index:index, wholesaler_id:wholesaler_id, order_id:order_id},
   success:function(data)
   {
    load_data();
    alert("You have rate "+index +" out of 5");
    parent.window.location.reload();
   }
  })
 });

 $(document).on('mouseleave', '.rating', function(){
  var index = $(this).data('index');
  var wholesaler_id = $(this).data('wholesaler_id');
  var rating = $(this).data('rating');
  remove_background(wholesaler_id);
  for(var count = 1; count <= rating; count++)
  {
   $('#'+wholesaler_id+'-'+count).css('color', '#ffcc00');
  }
 });
});
</script>

</body>
</html>