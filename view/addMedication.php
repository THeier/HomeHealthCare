<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (!isset($errDrug)) {
    $errDrug = '';
}

if (!isset($errQty)) {
    $errQty = '';
}
if (!isset($errTPD)) {
    $errTPD = '';
}
if (!isset($errQtyAmt)) {
    $errQtyAmt = '';
}
if (!isset($errTPDAmt)) {
    $errTPDAmt = '';
}
?>
<?php include'view/header.php'; ?>
<html>

    <form class="form" action="index.php" method="POST">
        <input type="hidden" name="action" value="addMedication" />
        <div class="form-row">
            <br>  <h6><?php echo 'Add Medication for ' . $_SESSION['PatientFN']; ?></h6><br>
        </div>

        <div class="form-row">
            <label>Patient ID:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['pID']; ?><br>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputMed">Name</label>
                <input type="text" class="form-control" id="inputMed" name="med" >
                <span class="error"><?php echo $errDrug ?></span>

            </div>
            <div class="form-group col-md-2">
                <label for="inputQty">Quantity</label>
                <input type="text" id="inputQty" class="form-control" placeholder="1-30" name="qty" >
                <span class="error"><?php echo $errQty ?></span> 
                <span class="error"><?php echo $errQtyAmt ?></span> 
            </div>
            <div class="form-group col-md-2">
                <label for="inputPDay">Number Per Day</label>
                <input type="text" class="form-control" id="inputPDay" placeholder="1-30" name="tpd">
                <span class="error"><?php echo $errTPD ?></span> 
                <span class="error"><?php echo $errTPDAmt ?></span> 
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="notes">Notes:</label>
                <textarea class="form-control" rows="5" id="comment" name="note"></textarea>
            </div>
        </div>
          <form class="form-group col-md-2" action="index.php" method="POST">
                <input type="hidden" name="action" value="addMedication" />
                <input type="hidden" name="pID" value="<?php echo $_SESSION['pID']; ?>"/>
                <button class="btn btn-primary" type="submit">Add Medication</button> 
            </form>
         
    </form>
  </html>
<?php include 'view/footer.php'; ?>
