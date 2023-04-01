<h3>Release Transaction</h3>
<div id="receive-details">
  <table>
    <tr>
      <td><label for="recdate">Release Date</label></td>
      <td class="info-text"><?php echo $release->get_release_date($id);?></td>
      <td><label for="purfrom">Sold To</label></td>
      <td class="info-text"><?php echo $release->get_release_customer($id);?></td>
    </tr>
    <tr>
      <td><label for="recamount">Amount</label></td>
      <td class="info-text"><?php echo $release->get_release_amount($id);?></td>
      <td><label for="recstatus">Status</label></td>
      <td class="info-text">
        <?php if($release->get_release_save($id) == 0){
            echo "Open Transaction";
          }else{
            echo "Saved Transaction";
          }
          ?>
      </td>
    </tr>
  </table>
</div>

<div class="btn-box">
  <?php
    if($release->get_release_save($id) == 0){
  ?>
  <?php
    }
  ?>
</div>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Product</th>
        <th>Quantity</th>
      </tr>
      <?php
      $count = 1;
      if($release->list_release_items($id) != false){
        foreach($release->list_release_items($id) as $value){
           extract($value);
      ?>
        <tr>
          <td><?php echo $count;?></td>
          <td><?php echo $product->get_prod_name($prod_id);?></td>
          <td><?php echo $rel_qty;?></td>
        </tr>
        <?php
          $count++;
        }
      }else{
        echo "No Record Found.";
      }
      ?>
    </table>
</div>
<div id="id01" class="modal">
  <div id="form-update" class="modal-content">
    <div class="container">
   
      <h2>Select Product</h2>


      <form method="POST" id="itemForm" action="processes/process.release.php?action=additem">
        <input type="hidden" id="relid" name="relid" value="<?php echo $id; ?>" />
        <label for="prodid">Product</label>
        <select name="prodid" id="prodid">
          <?php
          $count = 1;
          $count = 1;
          if ($product->list_product() != false) {
            foreach ($product->list_product() as $value) {
              extract($value);
          ?>
              <option value="<?php echo $prod_id; ?>"><?php echo $prod_name; ?></option>
          <?php
            }
          }
          ?>
        </select>
        <label for="qty">Released Quantity</label>
        <input type="number" id="qty" class="input" name="qty" placeholder="Quantity..." />
      </form> 
      <div class="clearfix">
        <button class="submitbtn" onclick="itemSubmit()">Add</button>
        <button class="cancelbtn" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');
var modal_save = document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }else if(event.target == modal_save){
    modal_save.style.display = "none";
  }
}
function saveSubmit() {
    document.getElementById("itemSave").submit();
  }

function itemSubmit() {
  document.getElementById("itemForm").submit();
}
</script>