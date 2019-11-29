<!DOCTYPE html>
<?php
if (!isset($errfName)) {
    $errfName = "";
}
if (!isset($errlName)) {
    $errlName = "";
}
if (!isset($errfNamefirstchar)) {
    $errfNamefirstchar = "";
}
if (!isset($errlNamefirstchar)) {
    $errlNamefirstchar = "";
}
if (!isset($errDis)) {
    $errDis = "";
}
?>

<?php include'view/header.php'; ?>
<html>
   <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <form class="form" action="index.php" method="post">
                    <input type="hidden" name="action" value="addPatient" />
                    <fieldset class="field_set">
                        <legend>Add New Patient</legend>
                        First Name:  <input class="form-control" type="text" name="fnm">
                        <span class="error"><?php echo htmlspecialchars($errfName); ?></span><br>
                        <span class="error"><?php echo htmlspecialchars($errfNamefirstchar); ?></span>
                        Last Name: <input class="form-control" type="text" name="lnm">
                        <span class="error"><?php echo htmlspecialchars($errlName); ?></span>
                        <span class="error"><?php echo htmlspecialchars($errlNamefirstchar); ?></span>
                        Date of Birth: <input class="form-control" type="date" name="dbir"><br>
                        Disabled: <select name="disabled" style="max-width: 90%" >
                            <option value="No">No</option>  
                            <option value="Yes">Yes</option>

                        </select>
                        <span class="error"><?php echo $errDis ;?></span><br><br>
                        
                        <h6>Gender</h6>

                        <div class="form-check-inline">
                            
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="male">Male
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="female">Female
                            </label>
                        </div>
                        <!-- add validation message when not selected-->
                    </fieldset><br>
                    <button class="btn btn-primary" type="submit">Add Patient</button>
                </form>
            </div>
        </div>
    </div>

</html>
<?php include 'view/footer.php'; ?>

