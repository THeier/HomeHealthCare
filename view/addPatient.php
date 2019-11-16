<!DOCTYPE html>
if (!isset($fnm)) {$fnm = '';}
if (!isset($lnm)) {$lnm = '';}
<?php include'view/header.php'; ?>
<?php include 'view/navigation.php'; ?>
<html>
    <section>
        <form id="patientprofile">
            <input type="hidden" name="action" value="addPatient" />
            <fieldset class="field_set">
                <legend><b>Add New Client</b></legend>
                First Name:  <input type="text" name="fnm" value="<?php echo htmlspecialchars($fnm); ?>" required="true"><br><br>
                Last Name: <input type="text" name="lnm" value="<?php echo htmlspecialchars($lnm); ?>" ><br><br>
                Date of Birth: <input type="text" name="dob" value="<?php echo htmlspecialchars($dob); ?>"><br><br>
                Gender: 
                <input type="radio" name="gender"
                <?php if (isset($gender) && $gender == "female") echo "checked"; ?>
                       value="female">Female
                <input type="radio" name="gender"
                <?php if (isset($gender) && $gender == "male") echo "checked"; ?>
                       value="male">Male
                <input type="radio" name="gender"
                <?php if (isset($gender) && $gender == "other") echo "checked"; ?>
                       value="other">Other

            </fieldset><br>
            <input id="demobtn" type="submit" value="Add Patient">
        </form>
    </section>
</html>

