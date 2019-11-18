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
<?php include 'view/navigation.php'; ?>
 <h2> <?php if ($userName != ''){ ?>
        <span><?php echo htmlspecialchars('Thank you for registering '.$fName) ?></span>
    <?php } ?>
    </h2>
<section class="loginPage">
    <div class="mainwrapper">
    <form class="loginform" action="index.php" method="post">
            <input type="hidden" name="action" value="login_user" />
            <h3 id="loginh2"><?php echo htmlspecialchars('Login Page') ?></h3>
            <br><br>
            <label >User Name: </label>
            <input  type="text" name="userName" value='<?php echo htmlspecialchars($userName) ?>'required>
             <br><br>

            <label>Password: </label>
            <input type="password" name="pass" required>
             <br><br>

             <input class="subBtn" type="submit" value="Login">
    </form>
    </div>
</section>

<?php include 'view/footer.php'; ?>
