
<?php include'view/header.php'; ?>
<?php include 'view/sidebarPatientPage.php'; ?>
<section>
    <div class="patientInfo">
    <dt>Patient Name: </dt>
    <dl><?php echo htmlspecialchars($aPatient->getFName(). ' '.$aPatient->getLName()); ?></dl>
    <dt>Address: </dt>
    <dl>address</dl>
    <dt>Phone Number: </dt>
    <dl>402-555-555</dl>
    <dt>Date of Birth: </dt>
    <dl><?php echo date("m-d-Y", strtotime($aPatient->getDob())); ?></dl>
    <dt></dt>
    
<!-- Need to get user id via patient id to pass back to home case-->
</div>
</section>
<?php include 'view/footer.php'; ?>