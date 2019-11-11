<?php


require_once ('model/database.php');
require_once('model/database_oo.php');
require_once('model/patient_db.php');
require_once('model/patientMedications.php');
require_once('model/patientAddress.php');
require_once('model/patient.php');
require_once('model/user_db.php');
require_once('model/user.php');



session_start();
if (!isset($errorType)) {
    $errorType = 0;
}

$loginuser =array();
if (!isset($loginUser)){
    $loginUser[] ='';
}

if (!isset($_SESSION['user'])){
    $_SESSION['user']='';
}
$_SESSION['user']=$loginUser;

if(!isset($_SESSION['patient'])){
$_SESSION['patient']='';
}
if (!isset($_SESSION['uid'])) {
    $_SESSION['uid'] = '';
}
if (!isset($_SESSION['userName'])) {
    $_SESSION['username'] = '';
}
if (!isset($_SESSION['fName'])) {
    $_SESSION['fname'] = '';
}
if (!isset($_SESSION['lName'])) {
    $_SESSION['lname'] = '';
}
if (!isset($_SESSION['type'])) {
    $_SESSION['type'] = '';
}
if (!isset($_SESSION['pic'])) {
    $_SESSION['pic'] = '';
}




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
           
        include 'view/login_view.php';
        
        die();
        break; 
    
    case 'login_user':
        
        //add if statement to add if no validation error occur
        
        $urName = filter_input(INPUT_POST, 'userName');
        $aUser =user_db::get_userInfo($urName);
        $_SESSION['uid']=$aUser->getUserID();
        $_SESSION['fName']=$aUser->getFName();
        $_SESSION['lName']=$aUser->getLName();
        $_SESSION['userName']=$aUser->getUserName();
        $_SESSION['type']=$aUser->getUserType();
        $_SESSION['pic']=$aUser->getFilePath();
        $userid=$_SESSION['uid'];
        $fn =$_SESSION['fName'];
        $ln =$_SESSION['lName'];
        $un =$_SESSION['userName'];
        $t =$_SESSION['type'];
        $userpic =$_SESSION['pic'];
        $begDate= date('Y-m-d');
        $endDate = NULL;
        array_push($_SESSION['user'], $userid, $fn, $ln, $un, $t, $begDate, $endDate, $userpic);
        
        $pats = patient_db::selectPatients($userid);
        //var_dump($pats);
       
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
        
        // add validation (page) for user information
        // add user info to database
        $begDate = date('y-m-d');
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');
        // email is the user name
        $userName = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');
        $userType = filter_input(INPUT_POST, 'serviceType');
        $_SESSION['fName'] = $fName;
        $_SESSION['userName'] = $userName;
        $_SESSION['userType'] =$userType;
        user_db::insert_user($fName, $lName, $userName, $password, $userType, $begDate);      
        
        // sends user to login page
        include 'view/login_view.php';
        die();
        break;
    
    case 'patient_page':
        // patient profile page  
        $patientid =filter_input(INPUT_POST, 'pid');
        $userid =$_SESSION['uid'];
        $aPatient = patient_db::select_patient($patientid, $userid);
        // get patient address make session varibles to use with update
        // handle when $address is null
        $address = patient_db::select_patientAddress($patientid);
        if (!empty($address)) {
            $number = $address->getNumber();
            $street = ucfirst($address->getStreet());
            $city = ucfirst($address->getCity());
            $st = ucfirst($address->getState());
            $zip = $address->getZip();
            $fullstreet = $number . ' ' . $street;
        } else {
            $number = '';
            $street = '';
            $city = '';
            $st = '';
            $zip = '';
            $fullstreet = '';
        }
        //$patMeds = patient_db::select_patientMeds($patientid);
//        $meds ="";
//        If(!empty($patMeds)){
//            $meds= true;
//            return $meds;
//        }else{
//            $meds = false;
//            return $meds;
//            
//        }
//        $_SESSION['med']=$meds;
//        $amed = patient_db::select_patMed($patientid);
        // caluate age with dob
        // author:  Tim
        // title:  PHP: Calculating a person’s 
        // age from their date of birth. 
        // website: https://thisinterestsme.com/php-calculate-age-date-of-birth/
          
        $today = time();
        $dob = strtotime($aPatient->getDob());
        $todaysAge = $today - $dob;
        $age =floor($todaysAge/ 31556926);     
             
//        var_dump($aPatient);
//        var_dump($patientid);
//        var_dump($userid);
        include 'view/patientPage.php';
        
        die();
        break;
    
    case 'demographic':
        
        //allows the user to update a patients demographic information
       
        $patientid =filter_input(INPUT_POST, 'pid');
        $userid =$_SESSION['uid'];
        $aPatient = patient_db::select_patient($patientid, $userid);
        $fname =$aPatient->getFName();
        $lname =$aPatient->getLName();
        $dob =$aPatient->getDob();
        $adob = date("m-d-Y", strtotime($dob));
        $sex =$aPatient->getSex();
        $edate =$aPatient->getEndDate();
        
        // add validation to date format
        // add validation for sex
               
//        var_dump($aPatient);
//        var_dump($patientid);
//        var_dump($userid);
        include 'view/demographicUpdate.php';
        
        die();
        break;
    
     case 'home':
        // takes the logged in user to their profile page 
         
        $id=$_SESSION['uid'];
        $fn =$_SESSION['fName'];
        $ln =$_SESSION['lName'];
        $un =$_SESSION['userName'];
        $t =$_SESSION['type'];
        $userpic =$_SESSION['pic'];
                
        //var_dump($_SESSION['patient']);
        $userid = user_db::select_userid($un); 
        $endDate =NULL;
        $pats =patient_db::selectPatients($userid); 

        include 'view/userProfile_view.php';
        die();
        break;
    
    case 'charts':
        
        include 'view/chartsView.php';
        
        die();
        break;
        
        
    default :
        
        $_SESSION = array();
        session_destroy();
       // header('Location: index.php?action=login');
        include 'view/login_view.php';
       
    
}