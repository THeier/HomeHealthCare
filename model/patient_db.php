<?php

class patient_db {

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
            $pat = new patient($results['patientID'], $results['userID'], $results['fName'],
                    $results['lName'], $results['dob'], $results['sex'], $results['disabled'], 
                    $results['deceasedDate'], $results['begDate'], $results['endDate']);
            
            
              return $pat;
      }else{
            return null;
        }
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
    // sql to select pateint med by id 
    
    

}
