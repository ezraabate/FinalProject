<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-i"><div class="content-box">
    <div class="element-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">On Discount items</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Date Added</th>
                <th>Date Posted</th>
                <th>Selling Price</th>
                <th>Expiration Date</th>
                <th>Action</th>
               
              </tr>
              </thead>

            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
</div>
</div>
</div>

<!-- /.content-wrapper -->



<script type="text/javascript">
var manageTable;

$(document).ready(function() {
  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': 'fetchDiscountItemData',
    'order': []
  });

  
  });

</script>
