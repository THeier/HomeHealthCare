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
                <legend><b>Add Patient Address</b></legend>
                Number:  <input type="text" name="num" value="<?php echo htmlspecialchars($fnm); ?>" ><br><br>
                Street: <input type="text" name="str" value="<?php echo htmlspecialchars($lnm); ?>" ><br><br>
                City: <input type="date" name="city" value="<?php echo htmlspecialchars($dbir); ?>" ><br><br>
                State: <input type="date" name="st" value="<?php echo htmlspecialchars($dbir); ?>" ><br><br>
                Zip Code: <input type="date" name="zip" value="<?php echo htmlspecialchars($dbir); ?>" ><br><br>
                Email: <input type="date" name="email" value="<?php echo htmlspecialchars($dbir); ?>" ><br><br>
                
            </fieldset><br>
            <input id="demobtn" type="submit" value="Add Patient">
        </form>
    </section>
</html>


