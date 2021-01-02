 <div class="container box">
   <br />
   <a href="<?php echo base_url('retailer_dashboard') ?>" class="btn btn-secondary">Back</a>
   <h2 align="center">Purchase History</h2><br />

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Ordered Date</th>
            <th>Total Cost</th>
            <th>View detail</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($history_info as $history){
             $strtimestamp = $history->Date_created;
             $date = date('d/m/Y', strtotime($strtimestamp));

            ?>
            <tr>
              <td><?php echo $date; ?></td>
              <td><?php echo $history->Total_cost; ?></td>
              <td><a href="<?php echo base_url().'Purchasehistory/viewdetail/'.$history->Order_id; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      
      </table>

  </div>