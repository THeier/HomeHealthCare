<?php

class patient_db {
    
       function insert_patient($userID, $fName, $lName, $dob, $sex, $begDate, $endDate, $disabled, $dcsDate){
        $db = database::getDB();
        $query = 'insert into patient(userID, fName, lName, dob, sex, begDate, endDate, disabled, dcsDate)'
                 .'VALUES (:userID, :fName, :lName, :dob, :sex, :begDate, :endDate, :disabled, :dcsDate)';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID',$userID);
        $statement->bindValue(':fName',$fName);
        $statement->bindValue(':lName',$lName);
        $statement->bindValue(':dob',$dob);
        $statement->bindValue(':sex', $sex);
        $statement->bindValue(':begDate',$begDate);
        $statement->bindValue(':endDate',$endDate);
        $statement->bindValue(':disabled',$disabled);
        $statement->bindValue(':dcsDate',$dcsDate);
        $statement->execute();
        $statement->closeCursor();
                
    }
    //need to fix code for update its not done
    function update_patient($patientID, $userID, $fName, $lName, $dob, $sex, $begDate, $endDate, $disabled, $dcsDate ){
        $db = database::getDB();
        $query = 'UPDATE patient SET patientID =:patientID, '
                . 'userID =:userID, fName =:fName, '
                . 'lName =:lName, dob =:dob, '
                . 'sex =:sex, begDate =:begDate, endDate =:endDate, disabled =:disabled, dcsDate =:dcsDate'
                . ' WHERE patientID = :patientID AND userID =:userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':patientID',$patientID);
        $statement->bindValue(':userID',$userID);
        $statement->bindValue(':fName',$fName);
        $statement->bindValue(':lName',$lName);
        $statement->bindValue(':dob',$dob);
        $statement->bindValue(':sex', $sex);
        $statement->bindValue(':begDate',$begDate);
        $statement->bindValue(':endDate', $endDate);
        $statement->bindValue(':disabled', $disabled);
        $statement->bindValue(':dcsDate',$dcsDate);
        $statement->execute();
        $statement->closeCursor();
                
    }
    

    public function select_patient($patientid, $userid) { 
        
        $db = Database::getDB();
        $query = 'SELECT * FROM patient WHERE patientid =:PatientID AND userid =:userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':PatientID', $patientid);
        $statement->bindValue(':userID', $userid);        
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
               
        if (!empty($results)) 
          {
            $pats = new patient($results['patientID'], $results['userID'], $results['fName'],
                    $results['lName'], $results['dob'], $results['sex'], $results['begDate'], 
                    $results['endDate'], $results['disabled'], $results['dcsDate']);
            
            
              return $pats;
      }else{
            return null;
        }
    }
    
    public static function select_allPatients(){
        $db = Database::getDB();
        $query = 'SELECT * FROM patient ORDER BY userID';
        $statement =$db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
               
         if(!empty($results))
        {     
          foreach ($results as $result){                  
            $p = new patient ($result['patientID'], 
                    $result['userID'], $result['fName'], 
                    $result['lName'], $result['dob'], $result['sex'], 
                    $result['begDate'], $result['endDate'],
                    $result['disabled'], $result['dcsDate']);
            $allPats[]= $p;
            
          }
            return $allPats;
            
        }else {
            return NULL;
        }
    }
    
        public static function delete_patient($patientID){
        
        $db = Database::getDB();
        $query = 'DELETE FROM patient
              WHERE patientID = :patientID';
        $statement = $db->prepare($query);
        $statement->bindValue(':patientID', $patientID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    // update to only select those currently active
    
    public function selectPatients($userid, $endDate){
       
        $db = Database::getDB();
        $query = 'SELECT * FROM patient WHERE userid =:userID AND endDate >=:endDate';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userid);
        $statement->bindValue(':endDate', $endDate);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        
        
        if(!empty($results))
        {     
          foreach ($results as $result){                  
            $pt = new patient ($result['patientID'], 
                    $result['userID'], $result['fName'], 
                    $result['lName'], $result['dob'], $result['sex'], 
                    $result['begDate'], $result['endDate'],
                    $result['disabled'], $result['dcsDate']);
            $pats[]= $pt;
            
          }
            return $pats;
            
        }else {
            return NULL;
        }
   
        
        
    }
    // ALL ADDRESS SQL
    // sql to select patient address by id --> WHERE THE END DATE IS LESS THAN OR EQUAL TO CURRENT DATE
   
    public function select_patientAddress($patientID,$endDate) { 
        
        $db = Database::getDB();
        $query = 'SELECT * FROM patientaddress WHERE patientID =:patientID AND endDate >=:endDate';
        $statement = $db->prepare($query);
        $statement->bindValue(':patientID', $patientID);
        $statement->bindValue(':endDate', $endDate);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
               
        if (!empty($results)) 
          {
            $patAdd = new patientAddress($results['addressID'], 
                    $results['patientID'], $results['number'],
                    $results['street'], $results['city'], 
                    $results['state'], $results['zip'], 
                    $results['email'], $results['begDate'], $results['endDate']);
          
              return $patAdd;
      }else{
            return null;
        }
    }
    
    
    
    public function add_patientAddress($patientID, $number, $street, $city, $state, $zip, $email, $begDate, $endDate){
        
        $db = database::getDB();
        $query = 'insert into patientaddress(patientID, number, street, city, state, zip, email, begDate, endDate)'
                 .'VALUES (:patientID, :number, :street, :city, :state, :zip, :email, :begDate, :endDate)';
        $statement = $db->prepare($query);
        $statement->bindValue(':patientID',$patientID);
        $statement->bindValue(':number',$number);
        $statement->bindValue(':street',$street);
        $statement->bindValue(':city',$city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip',$zip);
        $statement->bindValue(':email',$email);
        $statement->bindValue(':begDate',$begDate);
        $statement->bindValue(':endDate',$endDate);
        $statement->execute();
        $statement->closeCursor();
        
    }

    // update patient address
    function update_patientAddress($patientID, $number, $street, $city, $state, $zip, $email, $begDate, $endDate){
        $db = database::getDB();
        $query = 'UPDATE patientaddress '
                . 'SET patientID =:patientID, '
                . 'number =:number, street =:street, '
                . 'city =:city, state =:state, '
                . 'zip =:zip, email =:email, '
                . 'begDate =:begDate, endDate =:endDate '
                 .'WHERE patientID = :patientID' ;
        $statement = $db->prepare($query);
        $statement->bindValue(':patientID',$patientID);
        $statement->bindValue(':number',$number);
        $statement->bindValue(':street',$street);
        $statement->bindValue(':city',$city);
        $statement->bindValue(':state',$state);
        $statement->bindValue(':zip', $zip);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':begDate',$begDate);
        $statement->bindValue(':endDate', $endDate);
        $statement->execute();
        $statement->closeCursor();
                
    }
    
    function select_patientAddressID($patientID,$endDate){
        
        $db = Database::getDB();
        $query = 'SELECT * FROM patientaddress WHERE patientid =:patientID AND endDate =:endDate';
        $statement = $db->prepare($query);
        $statement->bindValue(':patientID', $patientID);
        $statement->bindValue(':endDate', $endDate);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $id = $row['addressID'];
         
         return $id;
        
    }

    // ALL PATIENT MED SQL
    // sql to select pateint med by id 
    public static function insert_patientMed($patientID, $drug, $quantity, $timesPerDay, $medNote, $begDate, $endDate){
        $db = Database::getDB();
        $query = 'INSERT INTO patientmed (patientID, drug, quantity, timesPerDay, medNote, begDate, endDate) '
                . 'VALUES (:patientID, :drug, :quantity, :timesPerDay, :medNote, :begDate, :endDate)';
        $statement = $db->prepare($query);
        $statement->bindValue(':patientID', $patientID);
        $statement->bindValue(':drug', $drug);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':timesPerDay', $timesPerDay);
        $statement->bindValue(':medNote', $medNote);
        $statement->bindValue(':begDate', $begDate);
        $statement->bindValue(':endDate', $endDate);
        $statement->execute();
        $statement->closeCursor();
        
        
    }
     public function select_patientMeds($patientid) { 
        
        $db = Database::getDB();
        $query = 'SELECT * FROM patientmed WHERE patientid =:patientID';
        $statement = $db->prepare($query);
        $statement->bindValue(':patientID', $patientid);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
               
        if (!empty($results)) 
          {
            foreach ($results as $result){
            $meds = new patientMedications($result['medID'], 
                    $result['patientID'], $result['drug'],
                    $result['quantity'], $result['timesPerDay'], $result['medNote'], $result['begDate'], $result['endDate']);
            $ptMeds[]=$meds;
            }
              return $ptMeds;
      }else{
            return null;
        }
    }
    
  
    public function select_patMed($patientid) { 
        
        $db = Database::getDB();
        $query = 'SELECT * FROM patientmed WHERE patientid =:PatientID';
        $statement = $db->prepare($query);
        $statement->bindValue(':PatientID', $patientid);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
               
        if (!empty($results)) 
          {
                    $med = new patientMedications($results['medID'], 
                    $results['patientID'], $results['drug'],
                    $results['quantity'], $results['timesPerDay']);
        
              return $med;
      }else{
            return null;
        }
    }
    
    

}
