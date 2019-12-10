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
if (!isset($errGen)) {
    $errGen = "";
}
if (!isset($fname)) {
    $fname = "";
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
                        First Name:  <input class="form-control" type="text" name="fnm" value='<?php echo $fname; ?>'>
                        <span class="error"><?php echo htmlspecialchars($errfName); ?></span><br>
                        <span class="error"><?php echo htmlspecialchars($errfNamefirstchar); ?></span><br>
                        Last Name: <input class="form-control" type="text" name="lnm">
                        <span class="error"><?php echo $errlName; ?></span><br>
                        <span class="error"><?php echo $errlNamefirstchar; ?></span><br>
                        Date of Birth: <input class="form-control" type="date" name="dbir"><br>
                        Disabled: <select class='form-control selcls' name="disabled">
                            <option value="No">No</option>  
                            <option value="Yes">Yes</option>

                        </select>
                        <span class="error"><?php echo $errDis; ?></span><br><br>

                        <h6>Gender</h6>

                        <div class="form-check-inline">

                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="gen" value="male">Male
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="gen" value="female">Female
                            </label>

                        </div>
                        <span class="error"><?php echo $errGen; ?></span>
                        <!-- add validation message when not selected-->
                    </fieldset><br>
                    <button class="btn btn-primary" type="submit">Add Patient</button>
                </form>
            </div>
        </div>
    </div>

</html>
<?php include 'view/footer.php'; ?>

