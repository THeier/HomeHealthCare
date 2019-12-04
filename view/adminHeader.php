<!DOCTYPE html>
<?php

if(!isset($_SESSION['uid'])){
    $_SESSION['uid']='';
    $loggedIn = false;
}
if(!isset($_SESSION['admin'])){
    $_SESSION['admin']='';
     $admin =false;
}

    
   
    if(isset($_SESSION['admin'])){
       $admin =true;
    }
       
    if(isset($_SESSION['uid']))  {         
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
       
       <li class="nav-item"><a class="nav-link" href="?action=default">Logout</a></li>
      <li class="nav-item"><a class="nav-link" href="?action=home">Admin Home</a></li>
 
    </ul>
   
   
  </div>
</nav>
    </div>
            