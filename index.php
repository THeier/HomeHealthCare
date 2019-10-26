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
        $_SESSION['id']=$aUser->getUserID();
        $_SESSION['fname']=$aUser->getFName();
        $_SESSION['lname']=$aUser->getLName();
        $_SESSION['email']=$aUser->getUserName();
        $_SESSION['type']=$aUser->getUserType();
        $_SESSION['pic']=$aUser->getFilePath();
        
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
        // 
        // 
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
        
//        $pid= filter_input(INPUT_POST, $action[0]);
//        $uid= $userid;
//        $aPatient = patient_db::selectPatient($pid, $uid);
        
        include 'view/patientPage.php';
        
        die();
        break;
        
        
    default :
        
        $_SESSION = array();
        session_destroy();
       // header('Location: index.php?action=login');
        include 'view/login_view.php';
       
    
}