<!-- calculate age with dob
      author:  Tim
      title:  PHP: Calculating a person’s 
      age from their date of birth. 
      website: https://thisinterestsme.com/php-calculate-age-date-of-birth/-->
<!--date validation function is from this site 
author: Glavic`
https://stackoverflow.com/questions/19271381/correctly-determine-if-date-string-is-a-valid-date-in-that-format-->
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
//        $_SESSION['loginUser']=$aUser;
//        $userPic =$_SESSION['loginUser'];
        $_SESSION['uid'] = $aUser->getUserID();
        
        $_SESSION['fName'] = $aUser->getFName();
        $_SESSION['lName'] = $aUser->getLName();
        $_SESSION['userName'] = $aUser->getUserName();
        $userName =$_SESSION['userName'];
        $_SESSION['pic'] = $aUser->getFilePath();
        $pic =$_SESSION['pic'];
        $_SESSION['type'] = $aUser->getUserType();
        $strl = strtolower($_SESSION['type']);
        $title = '';
        if($strl === 'cna') {
            $title = "Certified Nursing Assistant";
        }else{
            $tile = "Certified Medication Aide";
        }
        $_SESSION['title']= $title;
        $fullName = strtoupper($_SESSION['fName']. ' '.$_SESSION['lName']);
        
        // Get list of user pateints
        $pats = patient_db::selectPatients($_SESSION['uid']);
        

        //var_dump($pats);

        include 'view/userProfile_view.php';
        die();
        break;
        
         case 'home':
         
        // takes the logged in user to their profile page 
        
        $userName =$_SESSION['userName'];
        $pic =$_SESSION['pic'];
        $fullName = strtoupper($_SESSION['fName']. ' '.$_SESSION['lName']);
        $title =$_SESSION['title'];
                
        $pats = patient_db::selectPatients($_SESSION['uid']);
        
        if(isset($_SESSION['pID'])){
            unset($_SESSION['pID']);
            
        }
        
        include 'view/userProfile_view.php';
        die();

    case 'register':
        // sends user to register page 
        
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
        $uname = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $userType = filter_input(INPUT_POST, 'type');
        $_SESSION['fName'] = $fName;
        $_SESSION['userName'] = $uname;
        $_SESSION['userType'] = $userType;
        
        // Password Validation
//        if (preg_match('/^.{10}/', $pass) != 1) {
//            $errshortPass = "Password must be at least 10 characters.";
//            $valid =false;
//        }
//        if (preg_match('/[a-z]/', $pass) != 1) {
//            $errlcasePass = "Your password must contain a lowercase letter.";
//            $valid =false;
//        }
//        if (preg_match('/[A-Z]/', $pass) != 1) {
//            $errucasePass = "Your password must contain an Uppercase letter.";
//            $valid =false;
//        }
//        if (preg_match('/[0-9]/', $pass) != 1) {
//            $errdigPass = "Your password must contain a digit.";
//            $valid =false;
//        }
        
        // First and Last Name Validation
        if ($fName == null || $fName == "") {
            $errfName = "Enter a First Name";
            $valid =false;
        }
        if (preg_match('/^[a-zA-Z]/', $fName) != 1) {
            $errfNamefirstchar = "First Name must begin with a letter";
            $valid =false;
        }
        if ($lName == null || $lName == "") {
            $errlName = "Enter a last name";
            $valid =false;
        }
        if (preg_match('/^[a-zA-Z]/', $lName) != 1) {
            $errlNamefirstchar = "Last Name must begin with a letter";
            $valid =false;
        }
        // Username/Email validation
        if ($uname == null || $uname == "") {
            $errnoEmail = "Enter an Email";
            $valid =false;
        } else if ($uname == false) {
            $errinvalidEmail = "Email is invalid";
            $valid =false;
        }
        if (user_db::search_by_email($uname) === true) {
            $erremailTaken = "Duplicate email, please try again";
            $valid =false;
        }
        
        
     if ($valid){
            //$options = ['cost' => 12];
            //$hashpass = password_hash($pass, PASSWORD_BCRYPT, $options);
            // fix varibles - no phone number 
            //user_db::insert_users($fName, $lName, $username, $pNumber, $hashpass);
            user_db::insert_user($fName, $lName, $uname, $password, $userType, $begDate);

            include 'view/login_view.php';
        } else {
            include 'view/register_view.php';
            
        }        
        
        // include 'view/login_view.php';
        die();
        break;

    case 'addNewPatientPage';

        include 'view/addPatient.php';

        die();
        break;

// Patient --->>
    case 'addPatient';
        // add new client info to the database
        // sends them to the patient profile page
       
            // add validation to data submited
            $userid =$_SESSION['uid'];
            $fName = ucfirst(filter_input(INPUT_POST, 'fnm'));
            $lName = ucfirst(filter_input(INPUT_POST, 'lnm'));
            $pdob = filter_input(INPUT_POST, 'dbir');
            $g = strtoUpper(filter_input(INPUT_POST, 'gen'));
            $bdt = date('Y-m-d');
            $dis = filter_input(INPUT_POST,'disabled');
            $endDate ='0001-01-01';
            $today =date('Y-m-d');
       
       // Validate Patient first and last name
       if ($fName == null || $fName == "") {
            $errfName = "Enter a First Name";
            $valid =false;
        }
        if (preg_match('/^[a-zA-Z]/', $fName) != 1) {
            $errfNamefirstchar = "First Name must begin with a letter";
            $valid =false;
        }
        if ($lName == null || $lName == "") {
            $errlName = "Enter a last name";
            $valid =false;
        }
        if (preg_match('/^[a-zA-Z]/', $lName) != 1) {
            $errlNamefirstchar = "Last Name must begin with a letter";
            $valid =false;
        }
        // validate option is selected
        
        
        // Validate yes or no entered for disabled
        if (empty($dis)) {
            $errDis = "Selection required";
            $valid =false;
        } 
        
        // Validate patient date of birth is added and is a validate date
        if(empty($pdob)){
           $errPDOB = "Date of Birth Required";
           $valid =false;
        }
        
        

            // default image added with sql -> change later???
        if(valid){
           patient_db::insert_patient($userid, $fName, $lName, $pdob, $g, $bdt, $endDate, $dis); 
        }
        
        

       // include 'view/userProfile_view.php';
        header('Location: index.php?action=home');

        die();
        break;

    case 'patient_page':
        
        // Page to view patient information  
        
        $_SESSION['pID']= filter_input(INPUT_POST, 'pid');
        $userid = $_SESSION['uid'];
        $aPatient = patient_db::select_patient($_SESSION['pID'], $userid);
        $disabled = $aPatient->getDisabled();
        $curDate =date('Y-m-d');
        $today = time();
        $dob = strtotime($aPatient->getDob());
        $todaysAge = $today - $dob;
        $age = floor($todaysAge / 31556926);
  
        $address = patient_db::select_patientAddress($_SESSION['pID'], $curDate);
        if (!empty($address)) {
            $addressid =$address->getAddressID();
            $number = $address->getNumber();
            $street = ucfirst($address->getStreet());
            $city = ucfirst($address->getCity());
            $st = ucfirst($address->getState());
            $zip = $address->getZip();
            $fullstreet = $number . ' ' . $street;
            $email = $address->getEmail();
            
        } else {
            $addressid='';
            $number = '';
            $street = '';
            $city = '';
            $st = '';
            $zip = '';
            $fullstreet = '';
            $email = '';
        }
        
        $patID =$_SESSION['pID'];
        
        $meds = patient_db::select_patientMeds($patID);
        $_SESSION['meds']=$meds;
//       $medication=array();
        $valid =true;
        if(empty($meds)){
            $nomeds =array();
            $meds=$nomeds;
        }     

      // var_dump($address);
       //var_dump($meds);
       //var_dump($amed);
       // include 'view/patientPage.php';
        include 'view/patientProfile.php';
        die();
        break;

    case 'demographic':

        // Page to update a patients demographic information

        $patientid = filter_input(INPUT_POST, 'pid');
        $userid = $_SESSION['uid'];
        $aPatient = patient_db::select_patient($patientid, $userid);
        $fname = $aPatient->getFName();
        $lname = $aPatient->getLName();
        $dob = $aPatient->getDob();
        $adob = date("m-d-Y", strtotime($dob));
        $sex = $aPatient->getSex();
        $edate = $aPatient->getEndDate();
        $dis =$aPatient->getDisabled();
        $ddate =$aPatient->getDcsDate();
        
        if(empty($ddate)){
            $ddate='';
        }

        include 'view/demographicUpdate.php';

        die();
        break;
    
    case 'updateDemo':

        // insert updated patient demographic information
        // take user back to profile page 
        $valid=true; 
        $pid = $_SESSION['pID'];
        $userid = $_SESSION['uid'];
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $dob = filter_input(INPUT_POST, 'adob');
        //$adob = date("m-d-Y", strtotime($dob));
        $sex = filter_input(INPUT_POST, 'sex');
        $disabled = filter_input(INPUT_POST, 'dis');
        $endDate = filter_input(INPUT_POST, 'endDate');
        $dcsDate =filter_input(INPUT_POST,'ddate');
        $begDate = filter_input(INPUT_POST, 'begDates');
        
        
        if(empty($fname)){
            $errFN ='First Name Required';
            $valid =false;
        }
        if(empty($lnamename)){
            $errLN ='Last Name Required';
            $valid =false;
        }
        if(empty($dob)){
            $errBD ='Birth Date Required';
            $valid =false;
        }
        if(empty($sex)){
            $errGen ='Gender Required';
            $valid =false;
        }
        
        if(empty(strtolower($dis))){
              $errDis= 'Yes or No answer required';
              $valid =false;
          }elseif($dis !='yes' || $dis != 'no' ){
              
              $errDis= 'Yes or No answer required';
              $valid =false;
          }
          
          // Validation for date fields 
          // validates the end date need to 
          // validate its not greater than current date
          $date =$edate;
          function validateDate($date, $format = 'Y-m-d')
        {
            $d = DateTime::createFromFormat($format, $date);
            // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
                return $d && $d->format($format) === $date;
            }
          
          If(valid){
               patient_db::update_patient($pid, $userid, $fname, $lname, 
                $dob, $sex, $endDate, $begDate, $disabled, $dcsDate);
              
          }else{
              include 'view/addPatient.php';
          }

        // add validation to date format
        
//        var_dump($aPatient);
//        var_dump($patientid);
//        var_dump($userid);
       // include 'view/userProfile_view.php';
        header('Location: index.php?action=home');
        die();
        break;
    
// Patient Address --->        
    case 'addAddressPage';
        
        // Page to add new address for patient
        
        $pid= filter_input(INPUT_POST, 'pID');
        $patient = patient_db::select_patient($_SESSION['pID'], $_SESSION['uid']);
        $name =$patient->getFName(). ' '.$patient->getLName();
        
        include 'view/addPntAddress.php';         
        var_dump($pid);
        
        die();
        break;
       
    case 'addNewAddress';
        
        // Insert new Address for oatient
        $valid =true;
        
          $pid = $_SESSION['pID'];
          $num =filter_input(INPUT_POST,'num');
          $street = filter_input(INPUT_POST, 'street');
          $city = filter_input(INPUT_POST, 'city');
          $state =filter_input(INPUT_POST, 'st');
          $zip = filter_input(INPUT_POST, 'zip');
          $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);  
          if(is_null($email)){
              $email= NULL;
          }
          
          $currentDate =date('Y-m-d');
          $begDate =$currentDate;
          $endDate ='01-01-2001';
          // add validation
          if(empty($_POST['num'])){
              $errNum= 'Enter Number';
              $valid =false;
          }
      
          if(empty($_POST['street'])){
              $errSt= 'Enter Street';
              $valid =false;
          }
          
          if(empty($_POST['zip'])){
              $errZip= 'Enter Number';
              $valid =false;
          }
        // if valid = false insert address
        if ($valid) {
            patient_db::add_patientAddress($pid, $num, $street, $city, $state, $zip, $email, $begDate,$endDate);
        }

        
        header('Location: index.php?action=home');   
        
        die();
        break;
  // Patient address case 
        
    case 'UpdateAddressPage';
        
        // Page to update patient address 
        
        $patientid= $_SESSION['pID'];
        $userid =$_SESSION['uid'];
        $idAndBegDate= filter_input(INPUT_POST, 'addressid');
        $curDate =date('Y-m-d');
        $patientAddress = patient_db::select_patientAddress($patientid, $curDate);
        $patient = patient_db::select_patient($_SESSION['pID'], $_SESSION['uid']);
        $name =$patient->getFName(). ' '.$patient->getLName();
        $num =$patientAddress->getNumber();
        $street = $patientAddress->getStreet();
        $city =$patientAddress->getCity();
        $st =$patientAddress->getState();
        $zip =$patientAddress->getZip();
        $endDate =$patientAddress->getEndDate();
        
        $adate=date('0000-00-00');
        if($endDate ==='01'){
            
        }
        $email =$patientAddress->getEmail();
        if(is_null($email)){
            $email='';
        }
        if(is_null($endDate) || strtotime($endDate) === strtotime($adate)){
            $endDate='';
        }
         include 'view/addressUpdate.php';         
         var_dump($patientid);
        die();
        break;
    
    case 'updateAddress';
        // update patient address
        //add validation 
       // $valid=true;
        $pid =$_SESSION['pID'];
        $n = filter_input(INPUT_POST, 'num');
        $str = filter_input(INPUT_POST, 'street');
        $city =filter_input(INPUT_POST, 'city');
        $st =filter_input(INPUT_POST, 'st');
        $zip =filter_input(INPUT_POST, 'zip');
        $email = filter_input(INPUT_POST, 'email');
        $endDate =filter_input(INPUT_POST, 'endDate');
        $bdate=filter_input(INPUT_POST, 'begDate');
        $curDate =date('Y-m-d');
        $addressid = patient_db::select_patientAddressID($pid, $curDate);
        patient_db::update_patientAddress($pid, $n, $str, $city, $st, $zip, $email, $bdate, $endDate);
        
       
        header('Location: index.php?action=home');
        
        die();
        break;

   case 'addMedication':
       $today =date('Y-m-d');
       $pid = filter_input(INPUT_POST, 'pID');
       $drug= filter_input(INPUT_POST, 'med');
       $quantity= (int)filter_input(INPUT_POST, 'qty');
       $timesPerDay= (int)filter_input(INPUT_POST, 'tpd');
       $medNote= filter_input(INPUT_POST, 'med');
       $begDate =$today;
       $endDate = '01-01-0001';
       patient_db::insert_patientMed($pid, $$drug, $quantity, $timesPerDay,$medNote, $begDate, $endDate);
       
       // Validate drug name added
       // Validate quantity and times per day added and within range
       
       
       
       var_dump($pid);

        include 'view/addMedication.php';

        die();
        break;

    case 'adminHome':
        // Admin home page
        
        include 'admin/adminPage.php';
        
        die();
        break;
    
    case 'adminPatientPage':
        // View all patients page
        $allPats= patient_db::select_allPatients();
        include 'admin/adminPatientView.php';
        
        die();
        break;
    case 'adminDelPatient':
        // Admin view all patients page
       $allUsers = user_db::get_all_users();
        
        include 'admin/adminPage.php';
        
        die();
        break;
    case 'adminUserPage':
        // Admin view all users page
        $allUsers = user_db::get_all_users();
        
        include 'admin/adminUserView.php';
        
        die();
        break;
    default :

        $_SESSION = array();
        session_destroy();
        // header('Location: index.php?action=login');
        include 'view/login_view.php';
}