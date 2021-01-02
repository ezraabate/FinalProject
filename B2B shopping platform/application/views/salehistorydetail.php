 <div class="container box">
   <br />
   <a href="<?php echo base_url('Salehistory') ?>" class="btn btn-secondary">Back</a>
   <h2 align="center">Purchase History Detail</h2><br />

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Item Name</th>
            <th>Quantity per unit</th>
            <th>Purchased By</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($history_detail as $history){
            ?>
            <tr>
              <td><?php echo $history["ItemName"]; ?></td>
              <td><?php echo $history["Quantity"]; ?></td>
              <td><?php echo $history["Retail_name"]; ?></td>
              
            </tr>
            <?php
          }
          ?>
        </tbody>
      
      </table>

  </div>