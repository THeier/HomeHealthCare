
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

<div class="container">
    <div class="row">
      <div class="col-sm-4">
      <h3><?php echo "Welcome"; ?></h3>
      <div class="card">
            <h5 class="cardheader"><b><?php echo htmlspecialchars($fullName); ?><b></h5>
                        <img class="card-img-top" src="<?php echo htmlspecialchars($pic); ?>" alt="Card image">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($title); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($userName); ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-20">
        <div class="table-responsive">
             <?php if(!is_array($pats)): ?>
        <h3><?php echo 'Add New Patients'; ?></h3>
            <?php else: ?>
        <table class="table-borderless">

            <tr>
                <th style="width: 60%">Name</th>
                <th style="width: 20%">Action</th>
            </tr><br>
            <?php foreach($pats as $p) : ?>  
                <tr>
                    <td><?php echo htmlspecialchars($p->getFName() . " " . $p->getLName()); ?></td>
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
        
        
    </div>
   
</div>


 <h2 ></h2>  
<div class="row">
    
    <div class="column">
        

    </div>   

    <div class="column2">
       
    </div>          



</div>




<?php include 'view/footer.php'; ?>