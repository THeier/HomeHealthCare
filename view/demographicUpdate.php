<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php include'view/header.php'; ?>

<html>
    <section>
    <form id="patientprofile">
          <input type="hidden" name="action" value="updateDemo" />
        <fieldset class="field_set">
            <legend><b>Demographics</b></legend>
            Client ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($patientid); ?><br><br>
            First Name:  <input type="text" name="fname" value="<?php echo htmlspecialchars($fname); ?>" ><br><br>
            Last Name: <input type="text" name="lname" value="<?php echo htmlspecialchars ($lname); ?>" ><br><br>
            Date of Birth: <input type="text" name="adob" value="<?php echo htmlspecialchars ($adob); ?>"><br><br>
            Gender: <input type="text" name="sex" value="<?php echo htmlspecialchars($sex); ?>"><br><br>
            Deceased Date: <input type="date" name="ddate" ><br><br>
            End Date: <input type="date" name="endDate" value="<?php ?>"><br>
<!--            add date picker to end date-->
        </fieldset><br>
        <input id="demobtn" type="submit" name="update" value="Update Demographics">
       </form>
    </section>
</html>
