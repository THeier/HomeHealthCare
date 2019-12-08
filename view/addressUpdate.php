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
if (!isset($name)) {$name = '';}
if (!isset($num)) {$num = '';}
if (!isset($street)) {$street = '';}
if (!isset($city)) {$city = '';}
if (!isset($st)) {$st = '';}
if (!isset($zip)) {$zip = '';}
if (!isset($email)) {$email = '';}
?>
<?php include'view/header.php'; ?>

<html>
    <form class="form" action="index.php" method="POST">
         <input type="hidden" name="action" value="updateAddress" />
        <div class="form-row">
            <h6><?php echo $_SESSION['PatientFN']; ?></h6><br><br>
        </div>
        <div class="form-row">
                    <label>Patient ID:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($patientid); ?><br>
                </div>
        <div class="form-row">
            <input type="hidden" name="action" value="updateAddress" />
            <div class="form-group col-md-2">
          
                <label>Number</label>
                <input type="text" class="form-control" id="inputNumber" name="num" value="<?php echo htmlspecialchars($num); ?>">
                <span class="error"><?php echo $errNum;?></span>
            </div>
            <div class="form-group col-md-2">
                
                <label>Street</label>
                <input type="text" class="form-control" id="inputStreet" name="street"value="<?php echo htmlspecialchars($street); ?>">
                <span class="error"><?php echo $errSt;?></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" name="city" value="<?php echo htmlspecialchars($city); ?>">
                
            </div>
            <div class="form-group col-md-2">
                <label for="inputState">State</label>
                <input type="text" id="inputState" class="form-control" name="st" value="<?php echo htmlspecialchars($st); ?>">
                <span class="error"><?php echo $errCty;?></span>  
             </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="zip" value="<?php echo htmlspecialchars($zip); ?>">
                <span class="error"><?php echo $errZip;?></span> 
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        </div>
        </div> 
        <div class="form-row">
        <div class="form-group col-md-4">
            <label for="endDate">End Date:</label>
            <input type="date" class="form-control" id="endDate" name="endDate" placeholder="Date" value="<?php echo htmlspecialchars($endDate); ?>"><br>
        </div>
        </div>   
    </div>
    <input type="hidden" name="begDate" value="<?php echo htmlspecialchars($patientAddress->getBegDate());  ?>"/>
    <button type="submit" name="updateAddressBtn" id="UpdateAddress" class="btn btn-primary">Update Address</button>
</form>
    <form class="form" action="index.php" method="POST">
                        <input type="hidden" name="action" value="updateAddress" />
                        <input type="hidden" name="addressID" value="<?php echo htmlspecialchars($patientAddress->getAddressID()) ?>"
                        <button name="updateAddressBtn" id="cancel" class="btn btn-primary" type="submit">Cancel</button>
                    </form>
</html>


<?php include 'view/footer.php'; ?>