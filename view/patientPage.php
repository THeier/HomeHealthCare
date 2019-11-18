<!DOCTYPE html>
<?php 
if(!isset($pats)){$pats[]='';}
if(!isset($meds)){$meds[]='';}

?>
<?php include'view/header.php'; ?>
<?php include 'view/navigation.php'; ?>
<html>
<section id="patientprofile">
    <form>

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
        </fieldset><br>
    </form>     
        
            
            
    <legend><b>Medication</b></legend>
            
                <table class="med">
                    <?php if($meds != NULL) {
                                    foreach($meds as $med): ?>
                    <tr>
                        <th col="2">Med</th>
                        <th>Quantity</th>
                        <th>Times Per Day</th> 
                    </tr><br>
                    <tr>
                        <td><?php echo "stuf"; ?></td>
                        <td><?php ; ?></td>
                        <td><?php ; ?></td>
                        
                    </tr>
             <?php endforeach;
             }else{ ?><tr><td>No Medications found</td></tr><?php } ?>
            </table>
                      
</section>
<div id="ptntProfileUpdateBtns">
    <table>
        
                   <tr>
                     <td colspan="2"><?php ; ?></td>
                     <td><form action="index.php" method="POST">                
                         <input type="hidden" name="action" 
                          value="demographic">
                         <input id="pntbutton" type="hidden" name="pid"
                                value="<?php echo htmlentities($_SESSION['pID']) ; ?>">
                         <input type="submit" value="Demographics">
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
                         <input type="submit" value="Address">
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
</html>
    </form><?php include 'view/footer.php'; ?>