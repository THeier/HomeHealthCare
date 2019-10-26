<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */-->
<?php
//set default value for variable for inital page load
if (!isset($fName)){
    $fName ='';
}
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
<?php include 'view/sidebar_login.php'; ?>
<section>
    <h2> <?php if ($userName != ''){ ?>
        <span><?php echo htmlspecialchars('Thank you for registering '.$fName) ?></span>
    <?php } ?>
    
        </h2>
    <p>The Home Health Care Resource page is where home health care providers can 
        sign up and use our health care management system that help health care 
        providers to save important information about the patients they provide
        services for, as well as be featured on our home health care provider page
        when they are accepting new patients.
    </p>
    <form id="loginform" action="index.php" method="post">
            <input type="hidden" name="action" value="login_user" />
            <h2 id="loginh2"><?php echo htmlspecialchars('Login Page') ?></h2>
            <br>
            
            <label>User Name</label>
            <input type="text" name="userName"
                   value="<?php echo htmlspecialchars($userName); ?>"><br>
                          <?php if (!empty($loginErr)) { ?><br>
                <span class="error"><?php echo htmlspecialchars($loginErr); ?></span>
                           <?php } ?>
            <br><br>

            <label>Password</label>
            <input type="password" name="pass">
                    <?php if (!empty($loginErr)) { ?><br><br>
                <span class="error"><?php echo htmlspecialchars($loginErr); ?></span>
                    <?php } ?>
            <br><br>

            <label>&nbsp;</label><br>
            <input type="submit" value="Login">
    </form> 
    <a href="view/patientPage.php">Patient Page</a><br>
    <a href='view/register_view.php'>Register</a><br>
    <a href="view/userProfile_view.php">User Profile Page</a><br>
</section>
<?php include 'view/footer.php'; ?>
