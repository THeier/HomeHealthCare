<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php include'view/header.php'; ?>
<?php include 'view/navigation.php'; ?>
<html>
    <section>
    <form id="patientprofile">

        <fieldset class="field_set">
            <legend>Demographics</legend>
            First Name:  <input type="text" name="fn" value="<?php echo htmlentities($fname); ?>" ><br><br>
            Last Name: <input type="text" name="ln" value="<?php echo htmlspecialchars ($lname); ?>" ><br><br>
            Date of Birth: <input type="text" name="dob" value="<?php echo htmlspecialchars ($adob); ?>"><br><br>
            Gender: <input type="text" name="sex" value="<?php echo htmlspecialchars($sex); ?>"><br>
            
        </fieldset>
    </form>
    </section>
</html>
