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

if (!isset($err['fName'])) {
    $err['fName'] = "";
}
if (!isset($err['lName'])) {
    $err['lName'] = "";
}
if (!isset($err['uName'])) {
    $err['uName'] = "";
}
if (!isset($err['noEmail'])) {
    $err['noEmail'] = "";
}

if (!isset($err['email'])) {
    $err['email'] = "";
}
if (!isset($err['invalidEmail'])) {
    $err['invalidEmail'] = "";
}
if (!isset($err['NameTaken'])) {
    $err['NameTaken'] = "";
}
if (!isset($err['emailTaken'])) {
    $err['emailTaken'] = "";
}
if (!isset($err['shortPass'])) {
    $err['shortPass'] = "";
}
if (!isset($err['lcasePass'])) {
    $err['lcasePass'] = "";
}
if (!isset($err['ucasePass'])) {
    $err['ucasePass'] = "";
}
if (!isset($err['digPass'])) {
    $err['digPass'] = "";
}
if (!isset($err['uNamefirstchar'])) {
    $err['uNamefirstchar'] = "";
}
if (!isset($err['lNamefirstchar'])) {
    $err['lNamefirstchar'] = "";
}
if (!isset($err['fNamefirstchar'])) {
    $err['fNamefirstchar'] = "";
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
                    <input class="form" type="text" name="fName" value="<?php echo htmlspecialchars($fName); ?>">
                    <span class="err"><?php
                        echo htmlspecialchars($err['fName']);
                        echo htmlspecialchars($err['fNamefirstchar']);
                        ?></span>

                    <label>Last Name</label>
                    <input class="form" type="text" name="lName" value="<?php echo htmlspecialchars($lName); ?>"><br>
                    <span class="err"><?php
                        echo htmlspecialchars($err['lName']);
                        echo htmlspecialchars($err['lNamefirstchar'])
                        ?></span>

                    <label>Email</label>
                    <input class="form" type="text" name="email" value="<?php echo htmlspecialchars($uname); ?>"><br>
                    <span class="err"><?php echo htmlspecialchars($err['email'])
                        . htmlspecialchars($err['emailTaken']);
                        ?></span><br>
                    <label>Password</label>
                    <input class="form" type="password" name="password">
                    <span class="err"><?php
                        echo htmlspecialchars($err['shortPass']);
                        echo htmlspecialchars($err['lcasePass']);
                        echo htmlspecialchars($err['ucasePass']);
                        echo htmlspecialchars($err['digPass']);
                        ?></span>

                    <div class="dropdown">
                        <button type="button" class="btn bg-light dropdown-toggle" data-toggle="dropdown">
                            Provider Type
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" value="cna">Certified Nurse Assistant</a>
                            <a class="dropdown-item" value="cma">Certified Medication Assistant</a>
                            <a class="dropdown-item" value="admin">Administrator</a>
                        </div>
                    </div>
                    <label>&nbsp;</label><br>
                    <input class="subs" type="submit" value="Register">   

                </div>           
        </form> 

    </div>
</div>
</div>  


<?php include 'view/footer.php'; ?>

