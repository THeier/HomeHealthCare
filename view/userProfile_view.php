
<?php
//set default value of variables for initial page load

if (!isset($patID)) {
    $patID = '';
}

//var_dump($uName);
?>





<?php include 'view/header.php'; ?>
<?php include 'view/navigation.php'; ?>


<div class="row">
    <div class="column">

        <h2 class="cardh2"><?php
            echo htmlspecialchars("Welcome" . " " .
                    $fn . " " . $ln);
            ?></h2> 
        <div class="card">
            <img src="<?php echo $userpic; ?>" alt="picture" style="width: 100%"/>
            <div class="container">
                <h4><b><?php echo $fn . ' ' . $ln; ?></b></h4>
                <p><?php echo $un; ?></p>
            </div>
        </div>
    </div>
    <div class="column1">
            <table class="patientList">

                <tr>
                    <th colspan="1">Name</th>
                    <th colspan="2">Action</th>
                </tr>
                 <?php foreach ($pats as $p) : ?>  
                <tr>
                     <td colspan="2"><?php echo htmlspecialchars($p->getFName(). " " .$p->getLName()); ?></td>
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
            </table>
</div>  
    </form>          


</div>
</div>
<?php include 'view/footer.php'; ?>