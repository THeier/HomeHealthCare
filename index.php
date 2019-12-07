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
if (!isset($_SESSION['pID'])) {
    $_SESSION['pID'] = '';
}
if (!isset($_SESSION['admin'])) {
    $_SESSION['admin'] = '';
}
//if(!isset($_SESSION['PatientFN'])){
//    $_SESSION['PatientFN']='';
//}
//if(!isset($_SESSION['disabled'])){
//    $_SESSION['disabled']='';
//}
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
        $urName = filter_input(INPUT_POST, 'userName');
        $passw =filter_input(INPUT_POST, 'pass');
        $aUser = user_db::get_userInfo($urName);
           
                 
         if ($aUser->getUserName() === null) {
            $loginErr = 'Bad username or password';
            include 'view/login_view.php';
        } else {
            $hash = user_db::select_user_pass($urName);
            $options = ['cost' => 12];
            if (password_verify($passw, $hash)) {
                $_SESSION['uid'] = $aUser->getUserID();
                $_SESSION['FullName'] = $aUser->getFName(). ' '.$aUser->getLName();
                $_SESSION['userName'] = $aUser->getUserName();
                $_SESSION['pic'] = $aUser->getFilePath();
                $_SESSION['type'] = $aUser->getUserType();
              
                If ($_SESSION['type'] == 'admin') {
                    $_SESSION['title'] ='Admin';
                   $_SESSION['admin']=true;
                }elseif ($_SESSION['type'] != 'admin' && $_SESSION['type']=='cna') {
                    $_SESSION['title'] ="Certified Nursing Assistant";
                }elseif ($_SESSION['type'] != 'admin' && $_SESSION['type']=='cma') {
                    $_SESSION['title'] ="Certified Nursing Assistant";
                }else{
                     $_SESSION['title']='PASS/CHORE Provider';
                }
                   
                if($_SESSION['title'] =='Admin'){
                    
                    include 'admin/adminPage.php';
                }else{
                    $today = date('Y-m-d');
                    $pats = patient_db::selectPatients($_SESSION['uid'], $today);
                    include 'view/userProfile_view.php';
                }
                
                 
            } else {
                $errUName = 'Bad username or password';
                include 'view/login_view.php';
            }
        }
        
            
        die();
        break;
        
         case 'home':
         
        // takes the logged in user to their profile page 
        
        $userName =$_SESSION['userName'];
        $pic =$_SESSION['pic'];
        $fullName = strtoupper($_SESSION['fName']. ' '.$_SESSION['lName']);
        $title =$_SESSION['title'];
        $today =date('Y-m-d');        
        $pats = patient_db::selectPatients($_SESSION['uid'], $today);
        
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
        $regErr ='';
        $begDate = date('Y-m-d');;
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');
        // email is the user name
        $uname = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $userType = filter_input(INPUT_POST, 'type');
        $_SESSION['fName'] = $fName;
        $_SESSION['userName'] = $uname;
        $_SESSION['userType'] = $userType;
        
        $endDate ='12-12-9999';
        
        // Password Validation
        if (preg_match('/^.{10}/', $password) != 1) {
            $errshortPass = "Password must be at least 10 characters.";
            $regErr =1;
        }
        if (preg_match('/[a-z]/', $password) != 1) {
            $errlcasePass = "Your password must contain a lowercase letter.";
            $regErr =1;
        }
        if (preg_match('/[A-Z]/', $password) != 1) {
            $errucasePass = "Your password must contain an Uppercase letter.";
            $regErr =1;
        }
        if (preg_match('/[0-9]/', $password) != 1) {
            $errdigPass = "Your password must contain a digit.";
            $regErr =1;
        }
        
        // First and Last Name Validation
        if ($fName == null || $fName == "") {
            $errfName = "Enter a First Name";
            $regErr=1;
        }
        if (preg_match('/^[a-zA-Z]/', $fName) != 1) {
            $errfNamefirstchar = "First Name must begin with a letter";
            $regErr =1;
        }
        if ($lName == null || $lName == "") {
            $errlName = "Enter a last name";
            $regErr =1;
        }
        if (preg_match('/^[a-zA-Z]/', $lName) != 1) {
            $errlNamefirstchar = "Last Name must begin with a letter";
            $regErr =1;
        }
        // Username/Email validation
        if ($uname == null || $uname == "") {
            $errnoEmail = "Enter an Email";
            $regErr =1;
        } else if ($uname == false) {
            $errinvalidEmail = "Email is invalid";
            $regErr =1;
        }
        if (user_db::search_by_email($uname) === true) {
            $erremailTaken = "Duplicate email, please try again";
            $regErr =1;
        }
        
        
     if ($regErr ==''){
            $options = ['cost' => 12];
            $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);
            user_db::insert_user($fName, $lName, $uname, $hashpass, $userType, $begDate, $endDate);

            include 'view/login_view.php';
        } else {
           include 'view/register_view.php';
            
        }        
        
   
        die();
        break;
        
   // Patient --->>     

    case 'addNewPatientPage';
        // Add new patient page
        include 'view/addPatient.php';

        die();
        break;

    case 'addPatient';
        // add new patient to the database
    
            $err ='';
            $userid =$_SESSION['uid'];
            $fName = ucfirst(filter_input(INPUT_POST, 'fnm'));
            $lName = ucfirst(filter_input(INPUT_POST, 'lnm'));
            $pdob = filter_input(INPUT_POST, 'dbir');
            $g = filter_input(INPUT_POST, 'gen');
            
            if(strtolower($g)==='female'){
                $g ='F';
            }else{
                $g ='M';
            }
            $bdt = date('Y-m-d');
            $dis = filter_input(INPUT_POST,'disabled');
            $endDate ='9999-12-12';
            $dscDate =null;
            
       // Validate 
       if ($fName == null || $fName == "") {
            $errfName = "Enter a First Name";
            $err =1;
        }
        if (preg_match('/^[a-zA-Z]/', $fName) != 1) {
            $errfNamefirstchar = "First Name must begin with a letter";
            $err =1;
        }
        if ($lName == null || $lName == "") {
            $errlName = "Enter a last name";
            $err =1;
        }
        if (preg_match('/^[a-zA-Z]/', $lName) != 1) {
            $errlNamefirstchar = "Last Name must begin with a letter";
            $err =1;
        }
            
        if (empty($dis)) {
            $errDis = "Selection required";
            $err =1;
        } 
        
        if(empty($pdob)){
           $errPDOB = "Date of Birth Required";
           $err =1;
        }
        
        if(!isset($g)){
            $errGen ="Please select a gender";
            $err =1;
        }

         
        if($err == '1'){
            
            include 'view/addPatient.php';
            exit();
        }else{
           patient_db::insert_patient($userid, $fName, $lName, $pdob, $g, $bdt, $endDate, $dis, $dscDate); 
           $today =date('Y-m-d');        
           $pats = patient_db::selectPatients($_SESSION['uid'], $today); 
           include 'view/userProfile_view.php';
        }
        
 
        die();
        break;

    case 'patient_page':
        
        // Page to view patient information  
        
        $_SESSION['pID']= filter_input(INPUT_POST, 'pid');
        $userid = $_SESSION['uid'];
        $aPatient = patient_db::select_patient($_SESSION['pID'], $userid);
        $curDate =date('Y-m-d');
        $today = time();
        $bd =$aPatient->getDob();
        $dob = strtotime($bd);
        $todaysAge = $today - $dob;
        $age = floor($todaysAge / 31556926);
        $pFName = ucfirst($aPatient->getFName());
        $pLName = ucfirst($aPatient->getLName());
        $patientFullName = $pFName. ' '.$pLName;
        $_SESSION['PatientFN'] =$patientFullName;
  
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
        }

               
        $meds = patient_db::select_patientMeds($_SESSION['pID']);
        $_SESSION['meds']=$meds;

        $valid =true;
        if(empty($meds)){
            $nomeds =array();
            $meds=$nomeds;
        }     
       
        include 'view/patientProfile.php';
        var_dump($address);
        die();
        break;

    case 'demographic':

        // Page to update a patient demographic information

        $patientid = filter_input(INPUT_POST, 'pid');
        $userid = $_SESSION['uid'];
        $aPatient = patient_db::select_patient($patientid, $userid);
        $fname = $aPatient->getFName();
        $lname = $aPatient->getLName();
        $dob = $aPatient->getDob();
        $adob = $dob;
        $sex = $aPatient->getSex();
        $enddate = $aPatient->getEndDate();
        $dis =$aPatient->getDisabled();
        $ddate =$aPatient->getDcsDate();
        $edate ='';
        
        if($edate ==='9999-12-12'){
            $endDate ='';
        }
        
        if(empty($ddate)){
            $ddate='';
        }

        include 'view/demographicUpdate.php';

        die();
        break;
    
    case 'updateDemo':

        // insert updated patient demographic information       
        $err=0;
        $pid = $_SESSION['pID'];
        $userid = $_SESSION['uid'];
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $dob = filter_input(INPUT_POST, 'dob');
        $sex = filter_input(INPUT_POST, 'sex');
        $disabled = filter_input(INPUT_POST, 'dis');
        $dsbld = mb_strtoupper($disabled);
        $endDate = filter_input(INPUT_POST, 'endDate');
        $dcsDate =filter_input(INPUT_POST,'ddate');
        $begDate = filter_input(INPUT_POST, 'begDate');
        $today = date('Y-m-d');
        
        if($fname == null || $fname == ""){
             $errFN ='First Name Required';
            $err =1;
            
        }

        if($lname ==null || $lname ==""){
            $errLN ='Last Name Required';
            $err =1;
        }
        if($dob ==null || $dob ==""){
            $errBD ='Birth Date Required';
            $err =1;
        }
        if($sex ==null || $sex ==""){
            $errGen ='Gender Required';
            $err =1;
        }
        
        if($dsbld ==null || $dsbld ==''){
              $errDis= 'Yes or No answer required';
              $err =1;
          }else if($dsbld =='YES' || $dsbld == 'NO' ){
              
              $err =0;
          } else{
              $errDis= 'Yes or No answer required';
              $err =1;
          }
          
          if($dcsDate =='' || $dcsDate ==NULL){
              $dcsDate =NULL;
          }else{
              function checkisAValidDcsDate($dcsDate) {
                if (preg_match("/^(((((1[26]|2[048])00)|[12]\d([2468][048]|[13579][26]|0[48]))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|[12]\d))))|((([12]\d([02468][1235679]|[13579][01345789]))|((1[1345789]|2[1235679])00))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|1\d|2[0-8])))))$/", $dcsDate)) {
                    return (string)$dcsDate;
                } else {
                    $errNotValiddcs = "Must be a valid date";
                    $err =1;
                }
            }
          }
 
          if(empty($endDate)){
              $endDate ='9999-12-12';
          }else{
              if($endDate > $today){
                  $errFutureDate ="Cannot be a future date";
                  $err =1;
                   
              }
              
          }
                 
          If (!empty($endDate) || $endDate !='9999-12-12') {

            function checkisAValidDate($endDate) {
                if (preg_match("/^(((((1[26]|2[048])00)|[12]\d([2468][048]|[13579][26]|0[48]))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|[12]\d))))|((([12]\d([02468][1235679]|[13579][01345789]))|((1[1345789]|2[1235679])00))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|1\d|2[0-8])))))$/", $endDate)) {
                    return $endDate;
                } else {
                    $errNotValidDate = "Must be a valid date";
                    $err =1;
                }
            }
            
                }
        
            If (!empty($dob)) {
            function checkisAValidBD($dob) {
                if (preg_match("/^(((((1[26]|2[048])00)|[12]\d([2468][048]|[13579][26]|0[48]))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|[12]\d))))|((([12]\d([02468][1235679]|[13579][01345789]))|((1[1345789]|2[1235679])00))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|1\d|2[0-8])))))$/", $dob)) {
                    return (string)$dob;
                } else{
                    $errNotValidBD = "Must be a valid date";
                    $err =1;
                }
            }
            
                }
        
          
          If($err == 0){
              
            patient_db::update_patient($pid, $userid, $fname, $lname, 
                $dob, $sex, $begDate, $endDate, $disabled, $dcsDate);
            $aPatient = patient_db::select_patient($_SESSION['pID'], $_SESSION['uid']);
            
                
                    $bd =$aPatient->getDob();
                    $dob = strtotime($bd);
                    $today = time();
                    $todaysAge = $today - $dob;
                    $age = floor($todaysAge / 31556926);

                    $meds = patient_db::select_patientMeds($_SESSION['pID']);
                    if(empty($meds)){
                        $nomeds =array();
                        $meds=$nomeds;
                     }     
                    $curDate =date('Y-m-d');
                    $address = patient_db::select_patientAddress($_SESSION['pID'], $curDate);
                    if(!empty($address)){
                        $addressid =$address->getAddressID();
                        $number=$address->getNumber();
                        $street =$address->getStreet();
                        $city =$address->getCity();
                        $st = ucfirst($address->getState());
                        $zip = $address->getZip();
                        $email = $address->getEmail();
                        
                    }
                    
                          
                
            
            
            
            include 'view/patientProfile.php';
              
          } else {
              
            $aPatient = patient_db::select_patient($_SESSION['pID'], $_SESSION['uid']);
            $fname = $aPatient->getFName();
            $lname = $aPatient->getLName();
            $dob = $aPatient->getDob();
            $adob = date("m-d-Y", strtotime($dob));
            $sex = $aPatient->getSex();
            $enddate = $aPatient->getEndDate();
            $dis =$aPatient->getDisabled();
            $ddate =$aPatient->getDcsDate();
            $edate ='';

            if($edate ==='9999-12-12'){
                $endDate ='';
            }

            if(empty($ddate)){
                $ddate='';
            }
          
              include 'view/demographicUpdate.php';
          }
     

        die();
        break;
    
// Patient Address --->        
    case 'addAddressPage';
        
        // Page to add new address for patient
        
        $pid= filter_input(INPUT_POST, 'pID');
        $patient = patient_db::select_patient($_SESSION['pID'], $_SESSION['uid']);
        $name =$patient->getFName(). ' '.$patient->getLName();
        
        include 'view/addPntAddress.php';         
         var_dump($_SESSION['pID']);
        
        die();
        break;
       
    case 'addNewAddress';
        
        // Insert new Address for patient
        $err='';
        
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
          
          $currentDate = date('Y-m-d');
          $endDate ='9999-12-12';
         
          if($num =='' || $num ==NULL){
              $errNum= 'Enter Number';
              $err=1;
          }
      
          if($street =='' || $street ==NULL){
              $errSt= 'Enter Street';
              $err=1;
          }
          
          if($zip =='' || $zip ==NULL){
              $errZip= 'Enter Number';
                $err=1;
          }
        
        if ($err ==0) {
            patient_db::add_patientAddress($pid, $num, $street, $city, $state, $zip, $email, $currentDate ,$endDate);
            $aPatient = patient_db::select_patient($_SESSION['pID'], $_SESSION['uid']);
            $today = time();
            $bd =$aPatient->getDob();
            $dob = strtotime($bd);
            $todaysAge = $today - $dob;
            $age = floor($todaysAge / 31556926);
            
            $meds = patient_db::select_patientMeds($_SESSION['pID']);
            if(empty($meds)){
            $nomeds =array();
            $meds=$nomeds;
        }     
            $curDate =date('Y-m-d');
            $address = patient_db::select_patientAddress($_SESSION['pID'], $curDate);
            $addressid =$address->getAddressID();
            $number=$address->getNumber();
            include 'view/patientProfile.php';
        }
        

        
        //header('Location: index.php?action=home');   
        
        die();
        break;
  // Patient address case 
        
    case 'UpdateAddressPage';
        
        // Page to update patient address 
       $patientid= $_SESSION['pID'];
        //$userid =$_SESSION['uid'];
        $curDate =date('Y-m-d');
        $patientAddress = patient_db::select_patientAddress($_SESSION['pID'], $curDate);
        $patient = patient_db::select_patient($_SESSION['pID'], $_SESSION['uid']);
        $name =$patient->getFName(). ' '.$patient->getLName();
        $num =$patientAddress->getNumber();
        $street = $patientAddress->getStreet();
        $city =$patientAddress->getCity();
        $st =$patientAddress->getState();
        $zip =$patientAddress->getZip();
        $endDate =$patientAddress->getEndDate();
       
       
        if($endDate ==='9999-12-12'){
            $endDate ='';
        }
        
           $email =$patientAddress->getEmail();
        if(is_null($email)){
            $email='';
        }
        
         include 'view/addressUpdate.php';         
        
        die();
        break;
    
    case 'updateAddress';
        // update patient address
        //add validation for required fields
        $err =0;
        $pid =$_SESSION['pID'];
        $n = filter_input(INPUT_POST, 'num');
        $str = filter_input(INPUT_POST, 'street');
        $city =filter_input(INPUT_POST, 'city');
        $st =filter_input(INPUT_POST, 'st');
        $zip =filter_input(INPUT_POST, 'zip');
        $email = filter_input(INPUT_POST, 'email');
        $endDate =(string)filter_input(INPUT_POST, 'endDate');
        $bdate=(string)filter_input(INPUT_POST, 'begDate');
        $curDate =date('Y-m-d');
        
        if($n ==null || $n ==''){
            $errNum ='Street Number required';
            $err =1;
        }
        
        if(!empty($endDate)){
            function checkisAValidendDate($endDate) {
                if (preg_match("/^(((((1[26]|2[048])00)|[12]\d([2468][048]|[13579][26]|0[48]))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|[12]\d))))|((([12]\d([02468][1235679]|[13579][01345789]))|((1[1345789]|2[1235679])00))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|1\d|2[0-8])))))$/", $endDate)) {
                    return $endDate;
                } else {
                    $errNotValidDate = "Must be a valid date";
                    $err =1;
                }
            }
           
        } else {
            $endDate ='9999-12-12';
        }
        
        if($err ==0){
            $addressid = patient_db::select_patientAddressID($pid, $curDate);
            patient_db::update_patientAddress($pid, $n, $str, $city, $st, $zip, $email, $bdate, $endDate);
            
            
            $aPatient = patient_db::select_patient($_SESSION['pID'], $_SESSION['uid']);
            if(!empty($aPatient)){
                
                    $bd =$aPatient->getDob();
                    $dob = strtotime($bd);
                    $today = time();
                    $todaysAge = $today - $dob;
                    $age = floor($todaysAge / 31556926);

                    $meds = patient_db::select_patientMeds($_SESSION['pID']);
                    if(empty($meds)){
                        $nomeds =array();
                        $meds=$nomeds;
                     }     
                    $curDate =date('Y-m-d');
                    $address = patient_db::select_patientAddress($_SESSION['pID'], $curDate);
                    $addressid =$address->getAddressID();
                    $number=$address->getNumber();
                    $street =$address->getStreet();
                    $city =$address->getCity();
                    $st = ucfirst($address->getState());
                    $zip = $address->getZip();
                    $email = $address->getEmail();
                          
                
            }
            
            
            include 'view/patientProfile.php';
            
        }
        
        
       
       // header('Location: index.php?action=home');
        
        die();
        break;

   case 'addMedicationPage':
       
      // View add Medication page
       $patient = patient_db::select_patient($_SESSION['pID'],$_SESSION['uid']);
       
        include 'view/addMedication.php';

        die();
        break;
    
    case'addMedication':
         
       $errMed =0;
       $today = date_default_timezone_get('Y-m-d');
       $drug= filter_input(INPUT_POST, 'med');
       $quantity= (int)filter_input(INPUT_POST, 'qty');
       $timesPerDay= (int)filter_input(INPUT_POST, 'tpd');
       $medNote= filter_input(INPUT_POST, 'note');
       $endDate = date('9999-12-12');
       $max = 30;
       $min =1;
        
        
       if(empty($drug)){
           $errDrug ="Name Required";
           $errMed =1;
       }
       
       if(empty($quantity)){
           $errQty ="Quantity Required";
           $errMed =1;
       }
       
       if(!empty($quantity)){
           if($quantity < $min || $quantity > $max ){
    
               $errQtyAmt ="Number must be between 1 and 30";
               $errMed =1;
               
           }
       }
       
       if(!empty($timesPerDay)){
           if($timesPerDay < $min || $timesPerDay > $max ){
    
               $errTPDAmt ="Number must be between 1 and 30";
               $errMed =1;
               
           }
       }
       
       If(errMed ==0){
           patient_db::insert_patientMed($_SESSION['pID'], $drug, $quantity, $timesPerDay, $medNote, $today, $endDate);
       }
       
        
       header('Location: index.php?action=home');
       //include 'view/patientProfile.php';
        die();
        break;
        
    case'updateMedication':
       // lots of work here 
        header('Location: index.php?action=patient_page');
        
       // include'view/updateMedication.php';
        die();
        break;

    case 'adminHome':
        // Admin home page

        $getuser = user_db::select_userid($_SESSION['uid']);
        $administrator = $getuser->getUserType();
        If($administrator === 'admin'){
            $_SESSION['admin'] =true;
        }
        
      
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
      
       $patientid = filter_input(INPUT_POST, 'pID');
       patient_db::delete_patient($patientid);
        
        include 'admin/adminPage.php';
        
        die();
        break;
    case 'adminUserPage':
        // Admin view all users page
        $userType ='admin';
        //$allUsers = user_db::get_all_users($userType);
        $allUsers = user_db::getUsers($userType);
        include 'admin/adminUserView.php';
        
        die();
        break;
    case 'adminUpdatePatientPage':
        
        $patientid = filter_input(INPUT_POST, 'Pid');
        $userid = filter_input(INPUT_POST, 'uID');
        $aPatient = patient_db::select_patient($patientid, $userid);
        $fname = $aPatient->getFName();
        $lname = $aPatient->getLName();
        $dob = $aPatient->getDob();
        $adob = date("m-d-Y", strtotime($dob));
        $sex = $aPatient->getSex();
        $enddate = $aPatient->getEndDate();
        $dis =$aPatient->getDisabled();
        $ddate =$aPatient->getDcsDate();
        $edate ='';
        
        if($edate ==='9999-12-12'){
            $endDate ='';
        }
        
        if(empty($ddate)){
            $ddate='';
        }

        include 'view/demographicUpdate.php';
        
        die();
        break;
    
    case 'adminDelUser':
        // Delete user and all associated 
        
        $usertoDelID = filter_input(INPUT_POST, 'userID');
        user_db::delete_user($usertoDelID);
        
        include 'admin/adminPage.php';
        
        die();
        break;
    
    default :

        $_SESSION = array();
        session_destroy();
        // header('Location: index.php?action=login');
        include 'view/login_view.php';
}