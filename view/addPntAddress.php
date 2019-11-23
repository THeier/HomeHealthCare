<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (!isset($errNum)) {$errNum = '';}
if (!isset($errSt)) {$errSt = '';}
if (!isset($errCty)) {$errCty = '';}
if (!isset($errZip)) {$errZip = '';}

?>
<?php include'view/header.php'; ?>
<html>
    <form class="form" action="index.php" method="POST">
        <div class="form-row">
            <input type="hidden" name="action" value="addAddress" />
            <div class="form-group col-md-2">
                <br>
                <label>Number</label>
                <input type="text" class="form-control" id="inputNumber" name="num">
                <span class="error"><?php echo $errNum;?></span>
            </div>
            <div class="form-group col-md-2">
                <br>
                <label>Street</label>
                <input type="text" class="form-control" id="inputStreet" name="st">
                <span class="error"><?php echo $errSt;?></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" name="city">
                <span class="error"><?php echo $errCty;?></span>
            </div>
            <div class="form-group col-md-2">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option selected>NE</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="zip">
                <span class="error"><?php echo $errZip;?></span> 
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-2">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email"><br>
        </div>
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">Add Address</button>
</form>
</html>
<?php include 'view/footer.php'; ?>