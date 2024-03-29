<?php

class user_db {


     function insert_user($fName, $lName, $userName, $password, $userType, $begDate, $endDate, $filePath){
        $db = database::getDB();
        $query = 'insert into user(fname, lname, userName, password, userType, begDate, endDate, filePath)'
                 .'VALUES (:fName, :lName, :userName, :password, :userType, :begDate, :endDate, :filePath)';
        $statement = $db->prepare($query);
        $statement->bindValue(':fName',$fName);
        $statement->bindValue(':lName',$lName);
        $statement->bindValue(':userName',$userName);
        $statement->bindValue(':password',$password);
        $statement->bindValue(':userType',$userType);
        $statement->bindValue(':begDate', $begDate);
        $statement->bindValue(':endDate', $endDate);
        $statement->bindValue(':filePath', $filePath);
        $statement->execute();
        $statement->closeCursor();
                
    }
    
    
    public static function delete_user($userID){
      $db = Database::getDB();
      $query = 'Delete from user where userId = :userId';
      $statement = $db->prepare($query);
      $statement->bindValue(':userId', $userID);
        $success = $statement->execute();
      
        return $success;
    }
    
    public static function get_userInfo($userName){
        $db = Database::getDB();
        $query = 'SELECT * FROM user WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $row =  $statement->fetch();
        $statement->closeCursor();
        $u = new user($row['userID'], $row['fName'], $row['lName'], 
                $row['userName'], $row['userType'], $row['begDate'], $row['endDate'], $row['filePath']);
        
        return $u;
    }

// get all users except admin
    public static function get_all_users($userType){
      $db = Database::getDB();
      $query = 'SELECT * FROM user WHERE userType !=:userType';
      $statement = $db->prepare($query);
      $statement->bindValue(':userType', $userType);
      $statement->execute();
      $results =  $statement->fetchAll();
      $statement->closeCursor();
      
      $countofArray = count($results);
            
      if(!empty($results)&& $countofArray > intval(1)){
          
          foreach ($results as $result){
            $u = new user($result['userID'], $result['fName'], $result['lName'], 
                $result['userName'], $result['userType'], $result['begDate'], $result['endDate'], $result['filePath']);
            $users[] = $u;
      }
        return $users;
      }
      elseif (array_count_values($results)==intval(1)) 
      {
            $users[]= $results;
      }      
      else
      {
          return null;
      }
    }
    
      public static function getUsers($userType){
          $db = Database::getDB();
          $query = 'SELECT COUNT(*) FROM user WHERE userType !=:userType';
          $statement = $db->prepare($query);
          $statement->bindValue(':userType', $userType);
          $statement->execute();
          $count = $statement->fetchAll();
      
            
      if($count >0 ){
          
          $db = Database::getDB();
          $query = 'SELECT * FROM user WHERE userType !=:userType';
          $statement = $db->prepare($query);
          $statement->bindValue(':userType', $userType);
          $statement->execute();
          $results =  $statement->fetchAll();
          $statement->closeCursor();
          
          foreach ($results as $result){
            $u = new user($result['userID'], $result['fName'], $result['lName'], 
                $result['userName'], $result['userType'], $result['begDate'], $result['endDate'], $result['filePath']);
            $users[] = $u;
      }
        return $users;
      }
      else
      {
          return null;
      }
    }
    
    public static function select_user_pass($userName) {
        $db = Database::getDB();

        $query = 'Select * FROM user where userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $password = $row['password'];

        return $password;
    }
    
 public static function verify_UserPass($userName, $password) {
        $db = Database::getDB();
        $query = 'SELECT * FROM user where userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $results = $statement->fetchAll();
        if (empty($results)) {
            return false;
        }
        if ($results[0]['userName'] === $userName && password_verify($password, $results[0]['password'])) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function select_userid ($userName){
        $db = Database::getDB();
        
        $query = 'Select * from user where userName =:userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $row =$statement->fetch();
        $statement->closeCursor();
        $userId = $row['userID'];
        
        return $userId;
    }
    
    public static function search_by_email($userName) {
        $db = Database::getDB();

        $query = 'SELECT * FROM user where userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $results = $statement->fetchAll();
        if (empty($results)) {
            return false;
        } else if ($results[0]['userName'] === $userName) {
            return true;
        }
    }
    
    public static function countActiveUsers($userType,$endDate){
        
        $db = Database::getDB();
        
        $query = 'Select COUNT(userID) from user WHERE userType !=:userType AND endDate >=:endDate';
        $statement = $db->prepare($query);
        $statement->bindValue(':userType', $userType);
        $statement->bindValue(':endDate', $endDate);
        $statement->execute();
        $count =$statement->fetchColumn();
        $statement->closeCursor();
             
        return $count;
        
        
    }
     public static function countInactiveUsers($userType, $endDate){
        
        $db = Database::getDB();
        
        $query = 'Select COUNT(userID) from user WHERE userType !=:userType AND endDate <:endDate';
        $statement = $db->prepare($query);
        $statement->bindValue(':userType', $userType);
        $statement->bindValue(':endDate', $endDate);
        $statement->execute();
        $count =$statement->fetchColumn();
        $statement->closeCursor();
             
        return $count;
        
        
    }
}


