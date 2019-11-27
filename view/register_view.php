<!DOCTYPE html>
<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */-->
<?php
//set default value for variable for inital page load
if (!isset($fName)) {$fName = '';}
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


<div class="row justify-content-center">
    <div class="col-4">
        <h3 class="form-group">Register</h3>
        <form class="form-horizontal" action="index.php" method="post">
            <div class="main-layouts wrapper">
                <input type="hidden" name="action" value="register_user" />
                <div class="agileits-top">
                    <label>First Name</label>
                    <input class="form-control" type="text" name="fName" value="<?php echo htmlspecialchars($fName); ?>">
                    <span class="error"><?php
                        echo htmlspecialchars($errfName);
                        echo htmlspecialchars($errfNamefirstchar);
                        ?></span>

                    <label>Last Name</label>
                    <input class="form-control" type="text" name="lName" value="<?php echo htmlspecialchars($lName); ?>"><br>
                    <span class="error"><?php
                        echo htmlspecialchars($errlName);
                        echo htmlspecialchars($errlNamefirstchar)
                        ?></span>

                    <label>Email</label>
                    <input class="form-control" type="text" name="email" value="<?php echo htmlspecialchars($uname); ?>"><br>
                    <span class="error"><?php echo htmlspecialchars($erremail)
                        . htmlspecialchars($erremailTaken);
                        ?></span>
                    <label>Password</label>
                    <input class="form-control" type="password" name="password"><br>
                    <span class="error"><?php
                        echo htmlspecialchars($errshortPass);
                        echo htmlspecialchars($errlcasePass);
                        echo htmlspecialchars($errucasePass);
                        echo htmlspecialchars($errdigPass);
                        ?></span>

                    <div class="dropdown">
                        <select name="type">
                            <option value="cna">Certified Nurse Assistant</option>
                            <option value="cma">Certified Medication Assistant</option>
                            <option value="cma">Certified Medication Assistant</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                    <label>&nbsp;</label><br>
                    <input class="subs" type="submit" value="Register">   

                </div>           
        </form> 

    </div>
</div>
</div>  


<?php include 'view/footer.php'; ?>

