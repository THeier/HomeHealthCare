<!DOCTYPE html>
<?php
If (!isset($_SESSION['uid'])) {
    $_SESSION['uid'] = '';
}
If (!isset($_SESSION['admin'])) {
    $_SESSION['admin'] = '';
}
$loggedIn = false;

$admin = false;

if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    $admin = true;
}

if (isset($_SESSION['uid']) && $_SESSION['uid'] != '') {
    $loggedIn = true;
}
?>   
<footer class="page-footer font-small blue">

    <ul class="nav justify-content-center" style="background-color: transparent">
<?php if ($_SESSION['uid'] == '' && $_SESSION['admin'] == '') { ?>
            <li class="nav-item">
                <a class="nav-link" href="?action=login">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=register_view.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=default">Contact Us</a>
            </li>         
            <li class="nav-item">
                <a class="nav-link" href="?action=default">About Us</a>
            </li>
<?php } ?>
        <?php if ($loggedIn == true && $loggedIn != '' && $admin == false) { ?>
            <li class="nav-item">
                <a class="nav-link" href="?action=home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=addNewPatientPage">Add New Patient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=default">Log Out</a>
            </li>
<?php } ?>
        <?php if ($loggedIn == true && $admin == true) { ?>

            <li class="nav-item">
                <a class="nav-link" href="?action=adminHome">Admin Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=adminUserPage">Users List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=adminPatientPage">Patient List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=charts">Chart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=default">Log Out</a>
            </li>
<?php } ?>
    </ul>
    <br>
    <div class="footer-copyright text-center py-3">&copy; <?php echo date("Y"); ?> Patient Manager

    </div>


</footer>
