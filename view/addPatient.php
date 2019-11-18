<!DOCTYPE html>
<?php
if (!isset($fnm)) {$fnm = '';}
if (!isset($lnm)) {$lnm = '';}
if (!isset($dbir)) {$dbir = '';}
if (!isset($gen)) {$gen = '';}

?>

<?php include'view/header.php'; ?>
<?php include 'view/navigation.php'; ?>
<html>
    <section>
        <form id="patientprofile" action="index.php" method="post">
            <input type="hidden" name="action" value="addPatient" />
            <fieldset class="field_set">
                <legend><b>Add New Client</b></legend>
                First Name:  <input type="text" name="fnm" value="<?php echo htmlspecialchars($fnm); ?>" ><br><br>
                Last Name: <input type="text" name="lnm" value="<?php echo htmlspecialchars($lnm); ?>" ><br><br>
                Date of Birth: <input type="date" name="dbir" value="<?php echo htmlspecialchars($dbir); ?>" ><br><br><br>
                Disabled: <select name="disabled" style="max-width: 90%" >
                                   <option value="No">No</option>  
                                   <option value="Yes">Yes</option>
                                 
                </select><br><br>
                <b>Gender:</b> <br>
                <input type="radio" name="gen"
                <?php if (isset($gen) && $gen == "female") echo "checked"; ?>
                       value="female">Female<br>
                <input type="radio" name="gen"
                <?php if (isset($gen) && $gen == "male") echo "checked"; ?>
                       value="male">Male<br>
                <input type="radio" name="gen"
                <?php if (isset($gender) && $gen == "other") echo "checked"; ?>
                       value="other">Other
<!--                add validation message when not selected-->
            </fieldset><br>
            <input id="demobtn" type="submit" value="Add Patient">
        </form>
    </section>
</html>

