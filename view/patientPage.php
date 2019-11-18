<?php 
if(!isset($pats)){$pats[]='';}
if(!isset($meds)){$meds[]='';}

?>
<?php include'view/header.php'; ?>
<?php include 'view/navigation.php'; ?>
<section id="patientprofile">
    <form>

        <fieldset class="field_set">
            <legend><b>Personal Information</b></legend>
            Name:&nbsp;<?php echo htmlspecialchars($aPatient->getFName() . ' ' . $aPatient->getLName()); ?><br>
            Age:&nbsp;<?php echo htmlspecialchars($age); ?><br>
            Date of Birth:&nbsp;<?php echo date("m-d-Y", strtotime($aPatient->getDob())); ?><br>
            Gender: &nbsp;<?php echo htmlspecialchars($aPatient->getSex()); ?><br>
            Disabled:  &nbsp;<?php echo htmlspecialchars($aPatient->getDisabled())  ?><br>
            
        </fieldset><br>
        <!-- Conditionally display
        -- these last two sections -->
        <fieldset class="field_set">
            <legend><b>Address</b></legend>
            Street:&nbsp;<?php echo htmlspecialchars($fullstreet) ; ?><br>
            City:&nbsp;<?php echo htmlspecialchars($city)  ; ?><br>
            State:&nbsp;<?php echo htmlspecialchars($st)  ; ?><br>
            Zip Code:&nbsp;<?php echo htmlspecialchars($zip)  ; ?><br>
            Email:&nbsp;<?php echo htmlspecialchars($email); ?>  
        </fieldset><br>
        
        <?php if(empty($meds)): ?>
            <h4><?php echo 'No Medications Found'; ?></h4>
            <?php else: ?>
        <fieldset class="field_set">
            
            <legend>Medication</legend>
            <form>
                <table class="med" border="1" cellpadding="10%">
                    <tr>
                        <th col="4">Med</th>
                        <th>Quantity</th>
                        <th>Times Per Day</th> 
                    </tr><br>
                    <?php foreach($meds as $m): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($m->getDrug()); ?></td>
                        <td><?php echo htmlspecialchars($m->getQuantity()); ?></td>
                        <td><?php echo htmlspecialchars($m->getTimesPerDay()); ?></td>
                        
                    </tr>
             <?php endforeach; ?>       
            
            </table>
            </form>
        </fieldset>
        <?php endif; ?>   
    </form>
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

<?php include 'view/footer.php'; ?>