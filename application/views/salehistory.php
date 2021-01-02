 <div class="container box">
   <br />
   <a href="<?php echo base_url('Dashboard') ?>" class="btn btn-secondary">Back</a>
   <h2 align="center">Sale History</h2><br />

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Date Item Sold</th>
            <th>Total Cost</th>
            <th>View detail</th>
          </tr>
        </thead>
    <tbody>
          <?php
          foreach($history_info as $history){
             $strtimestamp = $history["Date_created"];
             $date = date('d/m/Y', strtotime($strtimestamp));

            ?>
            <tr>
              <td><?php echo $date; ?></td>
              <td><?php echo $history["Total_cost"]; ?></td>
              <td><a href="<?php echo base_url().'Salehistory/viewdetail/'.$history['Order_id']; ?>"><i class="os-icon os-icon-eye btn btn-warning"></i></a></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      
      </table>

  </div>