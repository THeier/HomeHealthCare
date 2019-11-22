<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */-->
<?php
//set default value for variable for inital page load

if (!isset($userName)) {
    $userName = '';
}
if (!isset($pass)) {
    $pass = '';
}
if (!isset($loginErr)) {
    $loginErr = '';
}
?>

<?php include 'view/header.php'; ?>


<div class="row justify-content-center">
    <div class="col-6">
        <h2 form-group> <?php if ($userName != '') { ?>
                <span><?php echo htmlspecialchars('Thank you for registering ' . $fName) ?></span>
            <?php } ?>
        </h2>
        <form class="form-horizontal" action="index.php" method="post">
            <div  class="main-agileinfo">
                <input type="hidden" name="action" value="login_user" />
                <div class="main-layouts wrapper">
                <h1>Log In</h1>
                </div>
             
            
            <div  class="agileits-top">
                <label>User Name </label>
                <input class="form" type="text" name="userName" value='<?php echo htmlspecialchars($userName) ?>'required>
                <br>   
                <label>Password </label>
                <input class="form" type="password" name="pass" required>
                <input class="subs" type="submit" value="Login">
             </div>
            
</div>
        </form>
    </div>
</div>
<?php include 'view/footer.php'; ?>
