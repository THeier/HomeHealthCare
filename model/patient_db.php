<?php

class patient_db {

    public function select_patients($userID) {

        $db = Database::getDB();
        $query = 'SELECT * FROM patient WHERE userID =:userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        //$statement->bindValue(':endDate', $endDate);        
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        return $results;
    }

}
