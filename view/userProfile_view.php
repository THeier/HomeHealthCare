
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
    <div class="row col-md-12">
      <div class="col-sm-6">
          <div class="profileh3" id="profileh3">
              <h3>Welcome</h3>
          </div>
      <div class="card">
            <h5 class="cardheader"><?php echo htmlspecialchars($_SESSION['FullName']); ?></h5>
                        <img class="card-img-top" src="<?php echo htmlspecialchars($_SESSION['pic']); ?>" alt="Card image">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($_SESSION['title']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($_SESSION['userName']); ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div>
             <?php if(!is_array($pats)): ?>
        <h3><?php echo 'Add New Patients'; ?></h3>
            <?php else: ?>
        <table class="table">

            <tr>
                <th style="width: 80%">Name</th>
                <th style="width: 20%">Action</th>
            </tr><br>
            <?php foreach($pats as $p) : ?>  
                <tr>
                    <td style="margin: 15px"><?php echo htmlspecialchars($p->getFName() . " " . $p->getLName()); ?></td>
                    <td><form action="index.php" method="POST">                
                            <input type="hidden" name="action" 
                                   value="patient_page">
                            <input type="hidden" name="pid"
                                   value="<?php echo htmlspecialchars($p->getPatientID()); ?>">
                            <button class="btn btn-primary" type="submit" name="select">Select</button>
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
<?php include 'view/footer.php'; ?>