<!DOCTYPE html>
<?php
if (!isset($fnm)) {
    $fnm = '';
}
if (!isset($lnm)) {
    $lnm = '';
}
if (!isset($dbir)) {
    $dbir = '';
}
if (!isset($gen)) {
    $gen = '';
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
                        Last Name: <input class="form-control" type="text" name="lnm">
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
                        <!--                add validation message when not selected-->
                    </fieldset><br>
                    <button class="btn btn-primary" type="submit">Add Patient</button>
                </form>
            </div>
        </div>
    </div>

</html>
<?php include 'view/footer.php'; ?>

