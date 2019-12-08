<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
       if(!isset($adminError))
        {
            $adminError = "";
        }
        
        include 'view/header.php'; 
?>
<div class="row justify-content-center">
    <h3 class="error"><?php ?></h3>
    <h2>ADMINISTRATOR CONSOLE</h2>
    <br>
    <br>
</div>
<div class="adminConsole">
   <div class="form-row">
        <div class="col">
            <div class="adminContainer">
                <form class="form" action="index.php" method="post">
                <input type="hidden" name="action" value="adminUserPage">
                <input class="adminSubs" type="submit" value="View Users">
                </form>
            </div>
        </div>
        <div class="col">
            <div class="adminContainer">
            <form class="form" action="index.php" method="POST">
                <input type="hidden" name="action" value="adminPatientPage">
                <input class="adminSubs" type="submit" value="View Patients">
            </form>
            </div>
        </div>
        <div class="col">
            <div class="adminContainer">
            <form class="form" action="index.php" method="post">
                <input type="hidden" name="action" value="charts">
                <input class="adminSubs" type="submit" value="View Chart">
            </form>
                </div>
        </div>
    </div>
</div>
<?php include 'view/footer.php'; ?>
</html>
