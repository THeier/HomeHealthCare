<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */-->
<?php
//set default value for variable for inital page load
if (!isset($fName)) {$fName = '';}
if (!isset($lName)) {$lName = '';}
if (!isset($userName)) {$userName = '';}
if (!isset($password)) {$password = '';}
if (!isset($type)) {$type = '';}
if (!isset($RegErr)) {$RegErr = '';}
?>

<?php include 'view/header.php'; ?>
<?php include 'view/navigation.php'; ?>

<section>
    <h1 id='regh1'>Register</h1>
    <form id="reg" action="index.php" method="post">
            <input type="hidden" name="action" value="register_user" />
            <br>
            
            <label>First Name</label>
            <input type="text" name="fName"
                   value="<?php echo htmlspecialchars($fName); ?>"><br>
                          <?php if (!empty($RegErr)) { ?><br>
                <span class="err"><?php echo htmlspecialchars($RegErr); ?></span>
                           <?php } ?>
            <br>
            
            <label>Last Name</label>
            <input type="text" name="lName"
                   value="<?php echo htmlspecialchars($lName); ?>"><br>
                          <?php if (!empty($RegErr)) { ?><br>
                <span class="error"><?php echo htmlspecialchars($RegErr); ?></span>
                           <?php } ?>
            <br>
            
            <label>Email</label>
            <input type="text" name="userName"
                   value="<?php echo htmlspecialchars($userName); ?>"><br>
                          <?php if (!empty($RegErr)) { ?><br>
                <span class="error"><?php echo htmlspecialchars($RegErr); ?></span>
                           <?php } ?>
            <br>
            <label>Password</label>
            <input type="password" name="password">
                    <?php if (!empty($RegErr)) { ?><br><br>
                <span class="error"><?php echo htmlspecialchars($RegErr); ?></span>
                    <?php } ?>
            <br><br> 
            <label>Service Type</label>
            <select name='serviceType'>
                <option value="Select">Select</option>}  
                <option value="cna">Certified Nurse Assistant</option>  
                <option value="cma">Certified Medication Assistant</option>  
                <option value="admin">Administrator</option>   
            </select>   
                
             <br><br>
            
           
            <label>&nbsp;</label><br>
            <input type="submit" value="Register">
    </form> 
</section>

<?php include 'view/footer.php'; ?>

