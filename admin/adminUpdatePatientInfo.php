<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

if (!isset($errFN)) {
    $errFN = "";
}
if (!isset($errLN)) {
    $errLN = "";
}
if (!isset($errBD)) {
    $errBD = "";
}
if (!isset($errGen)) {
    $errGen = "";
}
if (!isset($errFN)) {
    $errFN = "";
}
if (!isset($errDis)) {
    $errDis = "";
}
if (!isset($errNotValidDate)) {
    $errNotValidDate = "";
}

if (!isset($errFutureDate)) {
    $errFutureDate = "";
}
?>

<?php include'view/header.php'; ?>

<html>
   
            <form class="form" action="index.php" method="POST">
                <input type="hidden" name="action" value="updateDemo" />
                <div class="form-row">
                    <legend>Update Demographics</legend>
                    <label>Client ID:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($patientid); ?><br>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>First Name:</label>  
                        <input class="form-control" type="text" name="fname" value="<?php echo htmlspecialchars($fname); ?>" >
                        <span class="error"><?php echo $errFN; ?></span><br>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Last Name:</label>
                        <input class="form-control"class="form-control" type="text" name="lname" value="<?php echo htmlspecialchars($lname); ?>" >
                        <span class="error"><?php  ?></span><br>
                    </div> 
                </div>
                <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Date of Birth:</label>
                    <input class="form-control" type="text" name="adob" value="<?php echo htmlspecialchars($adob); ?>">
                    <span class="error"><?php  ?></span><br>
                    
                </div>
               
                <div class="form-group col-md-2">
                    <label>Gender:</label>
                    <input class="form-control" type="text" name="sex" value="<?php echo htmlspecialchars($sex); ?>">
                    <span class="error"><?php  ?></span><br>
                    
                </div>
               
                <div class="form-group col-md-2">
                    <label>Disabled:</label>
                    <input class="form-control" type="text" name="dis" value="<?php echo htmlspecialchars($dis); ?>">
                    <span class="error"><?php  ?></span><br>
                    
                </div>
                </div>
             
                <div class="form-row">
                <div class="form-group col-md-2">
                   <label>Deceased Date:</label>
                    <input class="form-control" type="date" name="ddate"value="<?php echo htmlspecialchars($ddate); ?>" >
                    <span class="error"><?php ?></span><br> 
                </div>
               
                <div class="form-group col-md-2">
                     <label>End Date:</label>
                    <input class="form-control" type="date" name="endDate" value="<?php echo htmlspecialchars($edate); ?>">
                     <span class="error"><?php ?></span><br> 
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-2">
                     <button class="btn btn-primary" type="submit">Update Demographics</button>
                </div>
                </div>                
            </form>
    <div class="form">
       <form class="form" action="index.php" method="POST">
                <input type="hidden" name="action" value="adminPatientPage" />
                <button class="btn btn-primary" type="submit">Cancel</button>
             </form>
    </div>
             
</html>

