<?php 
//
//if($_SESSION['med'] === false){
//    
//    $meds = false;
//    
//} else {
//    $meds = true;
//}



?>
<?php include'view/header.php'; ?>
<?php include 'view/navigation.php'; ?>
<section id="patientprofile">
    <form>

        <fieldset class="field_set">
            <legend><b>Personal Information</b></legend>
            Name: <?php echo htmlspecialchars($aPatient->getFName() . ' ' . $aPatient->getLName()); ?><br>
            Age: <?php echo htmlspecialchars($age); ?><br>
            Date of Birth: <?php echo date("m-d-Y", strtotime($aPatient->getDob())); ?><br>
            Gender: <?php echo htmlspecialchars($aPatient->getSex()); ?><br>
            
        </fieldset><br>
        <!-- Conditionally display
        -- these last two sections -->
        <fieldset class="field_set">
            <legend><b>Address</b></legend>
            Street: <?php echo htmlspecialchars($fullstreet) ; ?><br>
            City: <?php echo htmlspecialchars($city)  ; ?><br>
            State: <?php echo htmlspecialchars($st)  ; ?><br>
            Zip Code:<?php echo htmlspecialchars($zip)  ; ?><br>
        </fieldset><br>
        
        <fieldset class="field_set">
            <legend><b>Medications</b></legend>
            Medication: <?php  ; ?><br>
            Dosage: <?php  ; ?><br>
            Number Per Day: <?php  ?><br><br>
            Note: <input type="text" cols="6" rows="6" value="<?php  ;?>" readonly="true"><br>
        </fieldset>
       
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
                                value="<?php echo htmlentities($patientid) ; ?>">
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
                                value="<?php echo htmlentities($patientid) ; ?>">
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
                                value="<?php echo htmlentities($patientid) ; ?>">
                         <input type="submit" value="Medications">
                         </form>
                     </td> 
                   </tr>
               </table> 
    
    
</div>

<?php include 'view/footer.php'; ?>