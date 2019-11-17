<?php

class patient_db {
    
       function insert_patient($userID, $fName, $lName, $dob, $sex, $disabled, $begDate, $endDate){
        $db = database::getDB();
        $query = 'insert into patient(userID, fName, lName, dob, sex, begDate, endDate, disabled)'
                 .'VALUES (:userID, :fName, :lName, :dob, :sex, :begDate, :endDate, :disabled)';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID',$userID);
        $statement->bindValue(':fName',$fName);
        $statement->bindValue(':lName',$lName);
        $statement->bindValue(':dob',$dob);
        $statement->bindValue(':sex', $sex);
        $statement->bindValue(':begDate',$begDate);
        $statement->bindValue(':endDate',$endDate);
        $statement->bindValue(':disabled',$disabled);
        $statement->execute();
        $statement->closeCursor();
                
    }
    //need to fix code for update its not done
    function update_patient($patientID, $userID, $fName, $lName, $dob, $sex, $disabled, $deceasedDate, $begDate, $endDate){
        $db = database::getDB();
        $query = 'UPDATE patient '
                . 'SET patientID =:patientID, '
                . 'userID =:userID, fName =:fName, '
                . 'lName =:lName, dob =:dob, '
                . 'sex =:sex, disabled =:disabled, '
                . 'deceasedDate =:deceasedDate, '
                . 'begDate =:begDate, endDate =:endDate '
                . ' WHERE patientID = :patientID AND userID =:userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':patientID',$patientID);
        $statement->bindValue(':userID',$userID);
        $statement->bindValue(':fName',$fName);
        $statement->bindValue(':lName',$lName);
        $statement->bindValue(':dob',$dob);
        $statement->bindValue(':sex', $sex);
        $statement->bindValue(':disabled', $disabled);
        $statement->bindValue(':begDate',$begDate);
        $statement->bindValue(':endDate', $endDate);
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
                    $results['lName'], $results['dob'], $results['sex'], $results['disabled'], 
                    $results['deceasedDate'], $results['begDate'], $results['endDate']);
            
            
              return $pats;
      }else{
            return null;
        }
    }
    
    public static function delete_patient($patientID, $userID){
        
        $db = Database::getDB();
        $query = 'DELETE FROM patient
              WHERE patientID = :patientID AND userID =:userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':patientID', $patientID);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public function selectPatients($userid){
       
        $db = Database::getDB();
        $query = 'SELECT * FROM patient WHERE userid =:userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userid);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        
        
        if(!empty($results))
        {     
          foreach ($results as $result){                  
            $pt = new patient ($result['patientID'], 
                    $result['userID'], $result['fName'], 
                    $result['lName'], $result['dob'], $result['sex'], 
                    $result['disabled'], $result['deceasedDate'], 
                    $result['begDate'], $result['endDate']);
            $pats[]= $pt;
            
          }
            return $pats;
            
        }else {
            return NULL;
        }
   
        
        
    }
    // sql to select patient address by id
   
    public function select_patientAddress($patientid) { 
        
        $db = Database::getDB();
        $query = 'SELECT * FROM patientaddress WHERE patientid =:PatientID';
        $statement = $db->prepare($query);
        $statement->bindValue(':PatientID', $patientid);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
               
        if (!empty($results)) 
          {
            $patAdd = new patientAddress($results['addressID'], 
                    $results['patientID'], $results['number'],
                    $results['street'], $results['city'], 
                    $results['state'], $results['zip'], 
                    $results['email']);
          
              return $patAdd;
      }else{
            return null;
        }
    }
    
    
    // sql to select pateint med by id 
    public static function insert_patientMed($patientID, $drug, $quantity, $timesPerDay){
        $db = Database::getDB();
        $query = 'INSERT INTO patientmed (patientID, drug, quantity, timesPerDay) '
                . 'VALUES (:patientID, :drug, :quantity, :timesPerDay)';
        $statement = $db->prepare($query);
        $statement->bindValue(':patientID', $patientID);
        $statement->bindValue(':drug', $drug);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':timesPerDay', $timesPerDay);
        $statement->execute();
        $statement->closeCursor();
        
        
    }
     public function select_patientMeds($patientid) { 
        
        $db = Database::getDB();
        $query = 'SELECT * FROM patientmed WHERE patientid =:PatientID';
        $statement = $db->prepare($query);
        $statement->bindValue(':PatientID', $patientid);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
               
        if (!empty($results)) 
          {
            foreach ($results as $result){
            $meds = new patientMedications($result['medID'], 
                    $result['patientID'], $result['drug'],
                    $result['quantity'], $result['timesPerDay'], 
                    $result['medNotes'], $result['begDate'], $result['endDate']);
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
                    $results['quantity'], $results['timesPerDay'], 
                    $results['medNotes'], $results['begDate'], $results['endDate']);
        
              return $med;
      }else{
            return null;
        }
    }
    
    

}
