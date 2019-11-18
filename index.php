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


if (!isset($_SESSION['uid'])) {
    $_SESSION['uid'] = '';
}
if (!isset($_SESSION['userName'])) {
    $_SESSION['username'] = '';
}
if (!isset($_SESSION['fName'])) {
    $_SESSION['fName'] = '';
}
if (!isset($_SESSION['lName'])) {
    $_SESSION['lName'] = '';
}
if (!isset($_SESSION['type'])) {
    $_SESSION['type'] = '';
}
if (!isset($_SESSION['title'])) {
    $_SESSION['title'] = '';
}

if (!isset($_SESSION['userFullName'])) {
    $_SESSION['userFullName'] = '';
}
if (!isset($_SESSION['pic'])) {
    $_SESSION['pic'] = '';
}



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'login';
    }
}



switch ($action) {

    case 'login':
        // login page

        include 'view/login_view.php';

        die();
        break;

    case 'login_user':
        //user profile view 
        //add if statement to add if no validation error occur

        $urName = filter_input(INPUT_POST, 'userName');
        $aUser = user_db::get_userInfo($urName);
        $_SESSION['uid'] = $aUser->getUserID();
        $_SESSION['fName'] = $aUser->getFName();
        $_SESSION['lName'] = $aUser->getLName();
        $_SESSION['userName'] = $aUser->getUserName();
        $_SESSION['pic'] = $aUser->getFilePath();
        $_SESSION['type'] = $aUser->getUserType();
        $strl = strtolower($_SESSION['type']);
        $ut = '';
        if($strl === 'cna') {
            $ut = "Certified Nursing Assistant";
        }else{
            $ut = "Certified Medication Aide";
        }
        $_SESSION['title']= $ut;
        $strU = strtoupper($_SESSION['fName']. ' '.$_SESSION['lName']);
        $_SESSION['userFullName'] =$strU;
        // Get list of user pateints
        $pats = patient_db::selectPatients($_SESSION['uid']);
        

        //var_dump($pats);

        include 'view/userProfile_view.php';
        die();
        break;


     case 'home':
        // takes the logged in user to their profile page 
        $pats=array();
        $pats = patient_db::selectPatients($_SESSION['uid']);

       // var_dump($_SESSION['user']);
//        var_dump($_SESSION['uid']);
//        var_dump($_SESSION['fName']);
//        var_dump($_SESSION['lName']);
//        var_dump($_SESSION['']);
//        var_dump($_SESSION['userName']);
//        var_dump($_SESSION['type']);
//        var_dump($_SESSION['userpic']);     
        
        include 'view/userProfile_view.php';
        die();
        break;
    case 'register':
        // sends user to register page 
        //var_dump($action);
        include 'view/register_view.php';
        die();
        break;


    case 'register_user':
        // adds registered user info to database
        // sends user to login page 
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
        $_SESSION['userType'] = $userType;
        user_db::insert_user($fName, $lName, $userName, $password, $userType, $begDate);


        include 'view/login_view.php';
        die();
        break;

    case 'addNewPatientPage';

        include 'view/addPatient.php';

        die();
        break;

    case 'addPatient';
        // add new client info to the database
        // sends them to the patient profile page
       
            // add validation to data submited
            $userid =$_SESSION['uid'];
            $f = ucfirst(filter_input(INPUT_POST, 'fnm'));
            $l = ucfirst(filter_input(INPUT_POST, 'lnm'));
            $pdob = filter_input(INPUT_POST, 'dbir');
            $g = strtoUpper(filter_input(INPUT_POST, 'gen'));
            $bdt = date('Y-m-d');
            $dis = filter_input(INPUT_POST,'disabled');
            $endDate ='0001-01-01';
       
        // sql is adding patient more than once
        // default image added with sql -> change later???
        
        patient_db::insert_patient($userid, $f, $l, $pdob, $g, $bdt, $endDate, $dis);
        

        include 'view/userProfile_view.php';

        die();
        break;

    case 'patient_page':
        // patient profile page  
        $_SESSION['pID']= filter_input(INPUT_POST, 'pid');
        $userid = $_SESSION['uid'];
        $aPatient = patient_db::select_patient($_SESSION['pID'], $userid);
        // get patient address make session varibles to use with update
        // handle when $address is null
        $address = patient_db::select_patientAddress($_SESSION['pID']);
        if (!empty($address)) {
            $number = $address->getNumber();
            $street = ucfirst($address->getStreet());
            $city = ucfirst($address->getCity());
            $st = ucfirst($address->getState());
            $zip = $address->getZip();
            $fullstreet = $number . ' ' . $street;
            $email = $address->getEmail();
        } else {
            $number = '';
            $street = '';
            $city = '';
            $st = '';
            $zip = '';
            $fullstreet = '';
            $email = '';
        }
       $meds = patient_db::select_patientMeds($_SESSION['pID']);
        
        If(count($meds)>1){
            $meds=$meds;
            
        }elseif(count($meds)==1){
            $amed = patient_db::select_patMed($_SESSION['pID']);
            $meds =$amed;
            
        }else{
            $meds[]=NULL;
//            $drug='';
//            $quant='';
//            $timesPday='';
//            $note='';
            
        }
        
      
        // caluate age with dob
        // author:  Tim
        // title:  PHP: Calculating a person’s 
        // age from their date of birth. 
        // website: https://thisinterestsme.com/php-calculate-age-date-of-birth/

        $today = time();
        $dob = strtotime($aPatient->getDob());
        $todaysAge = $today - $dob;
        $age = floor($todaysAge / 31556926);

       var_dump($aPatient);
       var_dump($meds);
       var_dump($amed);
        include 'view/patientPage.php';

        die();
        break;

    case 'demographic':

        //allows the user to update a patients demographic information

        $patientid = filter_input(INPUT_POST, 'pid');
        $userid = $_SESSION['uid'];
        $aPatient = patient_db::select_patient($patientid, $userid);
        $fname = $aPatient->getFName();
        $lname = $aPatient->getLName();
        $dob = $aPatient->getDob();
        $adob = date("m-d-Y", strtotime($dob));
        $sex = $aPatient->getSex();
        $edate = $aPatient->getEndDate();

        // add validation to date format
        // add validation for sex
//        var_dump($aPatient);
//        var_dump($patientid);
//        var_dump($userid);
        include 'view/demographicUpdate.php';

        die();
        break;
    case 'updateDemo':

        // update a patient demographic information
        // take user back to profile page 

        $patientid = $_SESSION['pID'];
        $userid = $_SESSION['uid'];

        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $dob = filter_input(INPUT_POST, 'adob');
        $adob = date("m-d-Y", strtotime($dob));
        $sex = filter_input(INPUT_POST, 'sex');
        $edate = filter_input(INPUT_POST, 'adob');

        patient_db::update_patient($patientID, $userID, $fname, $lname, 
                $adob, $sex, $disabled, $deceasedDate, $begDate, $endDate);

        // add validation to date format
        
//        var_dump($aPatient);
//        var_dump($patientid);
//        var_dump($userid);
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