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

?>

<?php include'view/header.php'; ?>

<html>
    <div class="container">
        <div class="row justify-content-center">
            <div class="form-group row">
            <form class="form" action="index.php" method="POST">
                <input type="hidden" name="action" value="updateDemo" />
                    <legend>Demographics</legend>
                    <label>Client ID:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($patientid); ?><br>
                    
                    <label>First Name:</label>  
                    <input class="form-control" type="text" name="fname" value="<?php echo htmlspecialchars($fname); ?>" >
                    <span class="error"><?php echo '$errFN'; ?></span><br>
                    <label>Last Name:</label>
                    <input class="form-control"class="form-control" type="text" name="lname" value="<?php echo htmlspecialchars($lname); ?>" >
                    <span class="error"><?php echo '$errLN'; ?></span><br>
                    <label>Date of Birth:</label>
                    <input class="form-control" type="text" name="adob" value="<?php echo htmlspecialchars($adob); ?>">
                    <span class="error"><?php echo '$errBD'; ?></span><br>
                    <label>Gender:</label>
                    <input class="form-control" type="text" name="sex" value="<?php echo htmlspecialchars($sex); ?>">
                    <span class="error"><?php echo '$errGen'; ?></span><br>
                    <label>Deceased Date:</label>
                    <input class="form-control" type="date" name="ddate" >
                    <span class="error"><?php echo '$errDD'; ?></span><br>
                    <label>End Date:</label>
                    <input class="form-control" type="date" name="endDate" value="<?php ?>">
                    <br>
                    <button class="btn-primary" type="submit">Update Demographics"</button>
            </form>
            </div>
        </div>
    </div>  

</html>
