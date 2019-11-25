<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include'view/header.php'; ?>
<html>

    <form class="form" action="index.php" method="POST">
        <div class="form-row">
            <br>  <h6><?php echo 'Some Name'; ?></h6><br>
        </div>

        <div class="form-row">
            <label>Client ID:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php ?><br>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputMed">Name</label>
                <input type="text" class="form-control" id="inputMed" name="med" >

            </div>
            <div class="form-group col-md-2">
                <label for="inputQty">Quantity</label>
                <input type="text" id="inputQty" class="form-control" placeholder="1-30" name="qty" >
                <span class="error"><?php ?></span>  
            </div>
            <div class="form-group col-md-2">
                <label for="inputPDay">Number Per Day</label>
                <input type="text" class="form-control" id="inputPDay" placeholder="1-30" name="tpd">
                <span class="error"><?php ?></span> 
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="notes">Notes:</label>
                <textarea class="form-control" rows="5" id="comment"></textarea>
            </div><br>
        </div>
        <button class="btn btn-primary" type="submit">Add Medication</button> 
    </form>

</html>
    <?php include 'view/footer.php'; ?>
