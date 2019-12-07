<!DOCTYPE html>
<?php

$loggedIn=false;

$admin=false;    
   
    if(isset($_SESSION['admin'])&& $_SESSION['admin'] ==true){
       $admin =true;
    }
       
    if(isset($_SESSION['uid']) && $_SESSION['uid'] !='')  {         
            $loggedIn = true;
            
     }

        ?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="main.css" />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <title>Patient Manager</title>

    </head>

<!-- the body section -->

<header>
    <div class="jumbotron text-center mb-0">
    <img src="images/CAREGiver.jpg" style="width: 80% !important; opacity: 0.5 !important;">
    </div>
</header>
    <div>
        
        
<nav class="navbar navbar-expand-sm bg-light ">
  <div class="container-fluid">
    
   <a class="navbar-brand" href="#">Patient Manager</a>

    <ul class="navbar-nav">
         <?php if(!isset($_SESSION['uid']) && !isset($_SESSION['admin'])) { ?>
        <li class="nav-item"><a class="nav-link" onclick="window.location.href='?action=login';">About Us</a></li>
        <li class="nav-item"><a class="nav-link" onclick="window.location.href='?action=login';">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link" onclick="window.location.href='?action=login';">Log In</a></li>
        <li class="nav-item"><a class="nav-link" onclick="window.location.href='?action=register';">Register</a></li>
         <?php }?>
      <?php if($loggedIn ==true && $loggedIn !='' && $admin ==false){ ?>
        <li class="nav-item"><a class="nav-link" onclick="window.location.href='?action=home';" >Home</a></li>
        <li class="nav-item"><a class="nav-link" onclick="window.location.href='?action=addNewPatientPage';">Add Patient</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" onclick="window.location.href='#';">
              Options..
          </a> 
          <div class="dropdown-menu">
              <a class="dropdown-item" onclick="window.location.href='#';">Update Info</a>
              <a class="dropdown-item" onclick="window.location.href='#';">Change Password</a>
          </div>
      </li>
      <li class="nav-item"><a class="nav-link" onclick="window.location.href='?action=default';">Logout</a></li>
      <?php }?>
      <?php if($loggedIn == true && $admin ==true) { ?>
      <li class="nav-item"><a class="nav-link" onclick="window.location.href='?action=adminHome';">Admin Home</a></li>
    <?php }?>
    </ul>
   
   
  </div>
</nav>
    </div>
            