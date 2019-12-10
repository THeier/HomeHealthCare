<!DOCTYPE html>
<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */-->
<?php
//set default value for variable for inital page load
if (!isset($fName)) {
    $fName = '';
}
if (!isset($lName)) {
    $lName = '';
}
if (!isset($uname)) {
    $uname = '';
}
if (!isset($password)) {
    $password = '';
}
if (!isset($type)) {
    $type = '';
}

if (!isset($errfName)) {
    $errfName = "";
}
if (!isset($errlName)) {
    $errlName = "";
}
if (!isset($erruName)) {
    $erruName = "";
}
if (!isset($errnoEmail)) {
    $errnoEmail = "";
}

if (!isset($erremail)) {
    $erremail = "";
}
if (!isset($errinvalidEmail)) {
    $errinvalidEmail = "";
}
if (!isset($errNameTaken)) {
    $errNameTaken = "";
}
if (!isset($erremailTaken)) {
    $erremailTaken = "";
}
if (!isset($errshortPass)) {
    $errshortPass = "";
}
if (!isset($errlcasePass)) {
    $errlcasePass = "";
}
if (!isset($errucasePass)) {
    $errucasePass = "";
}
if (!isset($errdigPass)) {
    $errdigPass = "";
}
if (!isset($erruNamefirstchar)) {
    $erruNamefirstchar = "";
}
if (!isset($errlNamefirstchar)) {
    $errlNamefirstchar = "";
}
if (!isset($errfNamefirstchar)) {
    $errfNamefirstchar = "";
}
?>

<?php include 'view/header.php'; ?>

<html>
    <div class="container">
        <div class="row justify-content-center">
            <div class="form-row">
                <h3>Register</h3> <br> 
                <form class="form" action="index.php" method="post">

                    <input type="hidden" name="action" value="register_user" />

                    <label>First Name</label>
                    <input class="form-control" type="text" name="fName" value="<?php echo htmlspecialchars($fName); ?>">
                    <span class="error"><?php echo htmlspecialchars($errfName); ?></span><br>
                    <span class="error"><?php echo htmlspecialchars($errfNamefirstchar); ?></span><br><br>
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="lName" value="<?php echo htmlspecialchars($lName); ?>">
                    <span class="error"><?php
                        echo htmlspecialchars($errlName);
                        echo '<br>';
                        echo htmlspecialchars($errlNamefirstchar);
                        echo '<br><br>';
                        ?></span>

                    <label>Email</label>
                    <input class="form-control" type="text" name="email" value="<?php echo htmlspecialchars($uname); ?>"><br>
                    <span class="error"><?php
                        echo htmlspecialchars($erremail);
                        echo '<br>';
                        htmlspecialchars($erremailTaken);
                        ?></span>
                    <label>Password</label>
                    <input class="form-control" type="password" name="password"><br>
                    <a href="register_view.php"></a>
                    <span class="error"><?php echo htmlspecialchars($errshortPass); ?></span>
                    <span class="error"><?php echo htmlspecialchars($errlcasePass); ?></span>
                    <span class="error"><?php echo htmlspecialchars($errucasePass); ?></span>
                    <span class="error"><?php echo htmlspecialchars($errdigPass); ?></span><br>


                    <select class="custom-select custom-select-sm" name="type" required="true">
                        <option>Select...</option>
                        <option value="cna">Certified Nurse Assistant</option>
                        <option value="cma">Certified Medication Assistant</option>
                        <option value="cma">Other (PAS/CHORE)</option>
                    </select>

                    <label>&nbsp;</label><br>
                    <input class="subs" type="submit" value="Register">   

                    </div>           
                </form>   


            </div>      


        </div>   



</html>

<?php include 'view/footer.php'; ?>

