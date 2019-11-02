
<?php include'view/header.php'; ?>
<?php include 'view/sidebarPatientPage.php'; ?>
<section>
    <form>

        <fieldset class="field_set">
            <legend>Personal Information</legend>
            Name: <?php echo htmlspecialchars($aPatient->getFName() . ' ' . $aPatient->getLName()); ?><br>
            Date of Birth: <?php echo date("m-d-Y", strtotime($aPatient->getDob())); ?><br>
            Gender: <?php echo htmlspecialchars($aPatient->getSex()); ?><br>
            
        </fieldset><br>
        <!-- Conditionally display
        -- these last two sections -->
        <fieldset class="field_set">
            <legend>Address</legend>
            Street: <?php ; ?><br>
            City: <?php ; ?><br>
            State:<br>
            Zip Code:<br>
        </fieldset><br>
        
        <fieldset class="field_set">
            <legend>Medications</legend>
            Medication: <?php ; ?><br>
            Dosage: <?php ; ?>  <br>
            Number Per Day: <?php ?>
        </fieldset>
    </form>
</section>
<?php include 'view/footer.php'; ?>