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
          <input type="hidden" name="action" value="updateDemo" />
        <fieldset class="field_set">
            <legend><b>Address</b></legend>
            Client ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($patientid); ?><br><br>
            Client Name: <?php ?><br><br>
            Number:  <input type="text" name="num" value="<?php  ?>" ><br><br>
            Street: <input type="text" name="st" value="<?php  ?>" ><br><br>
            city: <input type="text" name="city" value="<?php  ?>"><br><br>
            State: <input type="text" name="st" value="<?php  ?>"><br><br>
            Zip Code: <input type="text" name="zip" value="<?php ?>"><br>
            Email: <input type="text" name="email" value="<?php ?>"><br>

        </fieldset><br>
        <input id="demobtn" type="submit" value="Update Address">
    </form>
    </section>
</html>

