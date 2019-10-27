<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();
if (!isset($errorType)) {
    $errorType = 0;
}

$loginuser =array();
if (!isset($loginUser)){
    $loginUser[] ='';
}

$_SESSION['user']=$loginUser;

//$_SESSION['uid'] =$uid;
if (!isset($_SESSION['uid'])) {
    $_SESSION['uid'] = '';
}
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = '';
}
if (!isset($_SESSION['fName'])) {
    $_SESSION['fname'] = '';
}
if (!isset($_SESSION['lName'])) {
    $_SESSION['lname'] = '';
}

require_once ('model/database.php');
require_once('model/database_oo.php');
require_once('model/patient_db.php');
require_once('model/patient.php');
require_once('model/user_db.php');
require_once('model/user.php');




$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL){
         $action = 'login';
      }
}



switch ($action){
    case 'login':
        // sends user to login page
           
        //var_dump($action);
        include 'view/login_view.php';
        
        die();
        break; 
    
    case 'login_user':
        
        $uName = filter_input(INPUT_POST, 'userName');
        $aUser =user_db::get_userInfo($uName);
        $id=$aUser->getUserID();
        $fname=$aUser->getFName();
        $lname=$aUser->getLName();
        $email=$aUser->getUserName();
        $type=$aUser->getUserType();
        $pic=$aUser->getFilePath();
        array_push($_SESSION['user'], $id, $fname, $lname, $email, $type, $pic);
        
        $userid = user_db::select_userid($uName);
        
        //$fullName = $_SESSION['fname'].' '.$_SESSION['lname'];
        // get user patient list 
       $endDate =NULL;
       $p =patient_db::select_patients($userid, $endDate); 
//       var_dump($uName);  
//       var_dump($p);
//       var_dump($aUser);
        include 'view/userProfile_view.php';
        die();
        break;
        
        
    
     case 'register':
        // sends user to home page
        var_dump($action);
        include 'view/register_view.php';
        die();
        break; 
         
         
    case 'register_user':
        
        // add validation for user information
        // add user info to database
        $begDate = date('y-m-d');
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');
        // email address is used as user name
        $userName = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');
        $userType = filter_input(INPUT_POST, 'serviceType');
        $_SESSION['fName'] = $fName;
        $_SESSION['userName'] = $userName;
        $_SESSION['userType'] =$userType;
        user_db::insert_user($fName, $lName, $userName, $password, $userType, $begDate);      
        
        //var_dump($fName,$lName, $userName, $password, $userType, $begDate, $action);
        // sends user to login page
        include 'view/login_view.php';
        die();
        break;
    
    case 'patient_page':
        
        $pid= filter_input(INPUT_POST, 'patientID');
        $aPatient = patient_db::selectPatient($pid, $_SESSION['uid']);
        var_dump($aPatient);
        var_dump($pid);
        include 'view/patientPage.php';
        
        die();
        break;
    
     case 'home':
         
        $auser =user_db::get_userInfo($_SESSION['username']);
        $id=$auser->getUserID();
        $fname=$auser->getFName();
        $lname=$auser->getLName();
        $email=$auser->getUserName();
        $type=$auser->getUserType();
        $pic=$auser->getFilePath(); 
       
        $userid = user_db::select_userid($username); 
        $endDate =NULL;
        $p =patient_db::select_patients($id, $endDate); 

        include 'view/userProfile_view.php';
        die();
        break;
        
        
    default :
        
        $_SESSION = array();
        session_destroy();
       // header('Location: index.php?action=login');
        include 'view/login_view.php';
       
    
}