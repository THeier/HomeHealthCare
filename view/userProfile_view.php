
<?php
//set default value of variables for initial page load

if (!isset($patID)) {
    $patID = '';
}
//if (!isset($strU)) {$strU = '';}
//if (!isset($pic)) {$pic = '';}
//if (!isset($ut)) {$ut = '';}
//if (!isset($un)) {$un = '';}
//if (!isset($pats)) {$pats = array();}
//var_dump($uName);
?>


<?php include 'view/header.php'; ?>
<?php include 'view/navigation.php'; ?>

 <h2 class="cardh2"><?php echo "Welcome"; ?></h2>  
<div class="row">
    
    <div class="column">
        <div class="card">
            <h5 class="cardheader"><b><?php echo htmlspecialchars($fullName); ?><b></h5>
                        <img class="card-img-top" src="<?php echo htmlspecialchars($pic); ?>" alt="Card image">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($title); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($userName); ?></p>
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
            </tr><br>
            <?php foreach($pats as $p) : ?>  
                <tr>
                    <td colspan="2"><?php echo htmlspecialchars($p->getFName() . " " . $p->getLName()); ?></td>
                    <td><form action="index.php" method="POST">                
                            <input type="hidden" name="action" 
                                   value="patient_page">
                            <input type="hidden" name="pid"
                                   value="<?php echo htmlspecialchars($p->getPatientID()); ?>">
                            <input type="submit" name="select" value="Select">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>   
            <?php endif; ?>
        </table>
    </div>          



</div>




<?php include 'view/footer.php'; ?>