<!DOCTYPE html>

<?php include'view/header.php'; ?>
<?php include 'view/navigation.php'; ?>
<html>
    <section>
    <form id="patientprofile">
          <input type="hidden" name="action" value="updateDemo" />
        <fieldset class="field_set">
            <legend><b>Add New Client</b></legend>
            First Name:  <input type="text" name="fn" value="<?php echo htmlspecialchars($fname); ?>" ><br><br>
            Last Name: <input type="text" name="ln" value="<?php echo htmlspecialchars ($lname); ?>" ><br><br>
            Date of Birth: <input type="text" name="dob" value="<?php echo htmlspecialchars ($adob); ?>"><br><br>
            Gender: 
            <input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="other") echo "checked";?>
value="other">Other
           
        </fieldset><br>
        <input id="demobtn" type="submit" value="Update Demographics">
    </form>
    </section>
</html>

