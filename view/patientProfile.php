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
    <div class="col-sm-6">
        <fieldset class="field_set">
            <legend>Personal Information</legend>
            Name:&nbsp;<?php echo htmlspecialchars($aPatient->getFName() . ' ' . $aPatient->getLName()); ?><br>
            Age:&nbsp;<?php echo htmlspecialchars($age); ?><br>
            Date of Birth:&nbsp;<?php echo date("m-d-Y", strtotime($aPatient->getDob())); ?><br>
            Gender: &nbsp;<?php echo htmlspecialchars($aPatient->getSex()); ?><br>
            Disabled:  &nbsp;<?php echo htmlspecialchars($aPatient->getDisabled());  ?><br>
            
        </fieldset><br>
        <!-- Conditionally display
        -- these last two sections -->
        <fieldset class="field_set">
            <legend>Address</legend>
            Number:&nbsp;<?php echo htmlspecialchars($number) ; ?><br>
            Street:&nbsp;<?php echo htmlspecialchars($street) ; ?><br>
            City:&nbsp;<?php echo htmlspecialchars($city)  ; ?><br>
            State:&nbsp;<?php echo htmlspecialchars($st)  ; ?><br>
            Zip Code:&nbsp;<?php echo htmlspecialchars($zip)  ; ?><br>
            Email:&nbsp;<?php echo htmlspecialchars($email); ?> 
             <?php if(empty($address)) { ?>
            <form class="form" action="index.php" method="post">
                <input type="hidden" name="action" value="addAddressPage">
            <input type="hidden" name="pID" value="<?php echo html_entity_decode($aPatient->getPatientID()) ?>">
            <input class="subs" type="submit" value="Add Address">
             <?php } ?>
            </form>
        </fieldset><br>

       <legend>Medications</legend>
        
  <table class="table">
    <thead>
      <tr>
          <th colspan="1">Medication</th>
          <th colspan="1">Dosage</th>
          <th colspan="2">Per Day</th>
        <th colspan="2">Notes</th>
        <th>&nbsp;&nbsp;</th>
      </tr>
    </thead>
    <tbody>
        <?php if(is_null($meds)) {  ?>
        <p>No Medications found</p>
    <?php }else ?>
       <tr>
           
       <?php  foreach($meds as $m) : ?>
           <td><?php echo htmlspecialchars($m->getDrug());; ?></td>
        <td><?php echo htmlspecialchars($m->getQuanity()); ?></td>
        <td><?php echo htmlspecialchars($m->getTimesPerDay()); ?></td>
        <td colspan="2"><?php echo htmlspecialchars($m->getmedNote()); ?></td>
        </tr>
        <?php endforeach;   ?>
      
    </tbody>    
  </table>
    <?php if(!is_null($meds)) { ?>     
       <form action="index.php" method="post">
            <input type="hidden" name="action" value="updateMedication">
            <input type="hidden" name="pID" value="<?php echo html_entity_decode($aPatient->getPatientID()) ?>">
            <input class="subs" type="submit" value="Update Medication">
     </form>
    <?php };?>
    <form action="index.php" method="post">
            <input type="hidden" name="action" value="addMedication">
            <input type="hidden" name="pID" value="<?php echo html_entity_decode($aPatient->getPatientID()) ?>">
            <input class="subs" type="submit" value="Add Medication">
     </form>   
       
           
    

    </div>
          <div class="row">
    <div class="col-lg-20">
    
            <legend>Update Patient Information</legend>
      
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
                   <?php if(!empty($address)) { ?>
                   <tr>
                     <td colspan="2"><?php ; ?></td>
                     <td><form action="index.php" method="POST">                
                         <input type="hidden" name="action" 
                          value="UpdateAddressPage">
                          <input type="hidden" name="pID" value="<?php echo html_entity_decode($aPatient->getPatientID()) ?>">
                          <input type="hidden" name="addressid" value="<?php echo htmlspecialchars($addressid); ?>">
                         <input type="hidden" name="pid"
                                value="<?php echo htmlentities($_SESSION['pID']) ; ?>">
                         <input type="submit" value="Update Address">
                         </form>
                     </td> 
                   </tr>
                   <?php }?>
               </table>              
        </div>
    </div>
  </div>
</div>
</html>
<?php include 'view/footer.php'; ?>