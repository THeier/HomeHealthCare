
<?php
//set default value of variables for initial page load

if (!isset($patID)) {
    $patID = '';
}

//var_dump($uName);
?>


<?php include 'view/header.php'; ?>
<?php include 'view/navigation.php'; ?>

 <h2 class="cardh2"><?php echo "Welcome"; ?></h2>  
<div class="row">
    
    <div class="column">
        <div class="card">
            <h5 class="cardheader"><b><?php echo $strU; ?><b></h5>
            <img class="card-img-top" src="<?php echo $userpic; ?>" alt="Card image">
            <div class="card-body">
                <h5 class="card-title"><?php echo $ut; ?></h5>
                <p class="card-text"><?php echo $un; ?></p>
            </div>
        </div>

    </div>   

    <div class="column2">
        <?php if(!is_array($pats)): ?>
        <h3><?php echo 'Add Patients'; ?></h3>
            <?php else: ?>
        <table class="patientList">

            <tr>
                <th colspan="1">Name</th>
                <th colspan="2">Action</th>
            </tr>
            <?php foreach($pats as $p) : ?>  
                <tr>
                    <td colspan="2"><?php echo htmlspecialchars($p->getFName() . " " . $p->getLName()); ?></td>
                    <td><form action="index.php" method="POST">                
                            <input type="hidden" name="action" 
                                   value="patient_page">
                            <input type="hidden" name="pid"
                                   value="<?php echo htmlspecialchars($p->getPatientID()); ?>">
                            <input type="submit" value="Select">

                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>   
            <?php endif; ?>
        </table>
    </div>          



</div>




<?php include 'view/footer.php'; ?>