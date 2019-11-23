<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
if(!isset($pats)){$pats[]='';}
if(!isset($meds)){$meds[]='';}

?>
<?php include 'view/header.php'; ?>
<html>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
       <fieldset class="field_set">
            <legend><b>Personal Information</b></legend>
            Name:&nbsp;<?php echo htmlspecialchars($aPatient->getFName() . ' ' . $aPatient->getLName()); ?><br>
            Age:&nbsp;<?php echo htmlspecialchars($age); ?><br>
            Date of Birth:&nbsp;<?php echo date("m-d-Y", strtotime($aPatient->getDob())); ?><br>
            Gender: &nbsp;<?php echo htmlspecialchars($aPatient->getSex()); ?><br>
            Disabled:  &nbsp;<?php echo htmlspecialchars($disabled)  ?><br>
            
        </fieldset><br>
        <!-- Conditionally display
        -- these last two sections -->
        <fieldset class="field_set">
            <legend><b>Address</b></legend>
            Street:&nbsp;<?php echo htmlspecialchars($fullstreet) ; ?><br>
            City:&nbsp;<?php echo htmlspecialchars($city)  ; ?><br>
            State:&nbsp;<?php echo htmlspecialchars($st)  ; ?><br>
            Zip Code:&nbsp;<?php echo htmlspecialchars($zip)  ; ?><br>
            Email:&nbsp;<?php echo htmlspecialchars($email); ?> <br><br>
             <?php if(empty($address)) { ?>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="PatientAddress">
            <input type="hidden" name="pID" value="<?php echo html_entity_decode($aPatient->getPatientID()) ?>">
            <input type="submit" name="addAddress" value="Add Address">
             <?php } ?>
            </form>
        </fieldset>
   <div class="container">
  <h2>Medications</h2>
 <?php if($meds != NULL) { ?>         
  <table class="table">
    <thead>
      <tr>
        <th>Medication</th>
        <th>Dosage</th>
        <th>Per Day</th>
        <th>Notes</th>
        <th>&nbsp;&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          <?php  foreach($meds as $m) : ?>
        <td><?php ?></td>
        <td><?php ?></td>
        <td><?php ?></td>
        <td><?php ?></td>
        <td><?php ?></td>
      </tr>
        <?php endforeach;
             }else{ ?><tr><td>No Medications found</td></tr><?php } ?>
          
     <form action="index.php" method="post">
            <input type="hidden" name="action" value="PatientMed">
            <input type="hidden" name="pID" value="<?php echo html_entity_decode($aPatient->getPatientID()) ?>">
            <input type="submit" name="addMed" value="Add Medication">
     </form>
    </tbody>
  </table>
</div>

    </div>
    <div class="col-sm-4">
        <div class="container">
            <h3>Update</h3>
            <table class="table table-borderless">
                <tr>
                     <td colspan="2"><?php ; ?></td>
                     <td><form action="index.php" method="POST">                
                         <input type="hidden" name="action" 
                          value="demographic">
                         <input id="pntbutton" type="hidden" name="pid"
                                value="<?php echo htmlentities($_SESSION['pID']) ; ?>">
                         <input type="submit" value="Update Demographics">
                         </form>
                     </td> 
                   </tr>
                   <tr>
                     <td colspan="2"><?php ; ?></td>
                     <td><form action="index.php" method="POST">                
                         <input type="hidden" name="action" 
                          value="address">
                         <input id="pntbutton" type="hidden" name="pid"
                                value="<?php echo htmlentities($_SESSION['pID']) ; ?>">
                         <input type="submit" value="Update Address">
                         </form>
                     </td> 
                   </tr>
                     <tr>
                     <td colspan="2"><?php ; ?></td>
                     <td><form action="index.php" method="POST">                
                         <input type="hidden" name="action" 
                          value="meds">
                         <input id="pntbutton" type="hidden" name="pid"
                                value="<?php echo htmlentities($_SESSION['pID']) ; ?>">
                         <input type="submit" value="Medications">
                         </form>
                     </td> 
                   </tr>
               </table>              
        </div>
    </div>
  </div>
</div>
</html>
<?php include 'view/footer.php'; ?>