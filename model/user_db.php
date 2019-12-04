<?php

class user_db {


     function insert_user($fName, $lName, $userName, $password, $userType, $begDate, $endDate){
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
        $statement->bindValue(':filePath', 'images/default avatar.jpg');
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
            
      if(!empty($results)&& $countofArray >1){
          
          foreach ($results as $result){
            $u = new user($result['userID'], $result['fName'], $result['lName'], 
                $result['userName'], $result['userType'], $result['begDate'], $result['endDate'], $result['filePath']);
            $users[] = $u;
      }
        return $users;
      }
      elseif (array_count_values($results)==1) 
      {
            $users[]= $results;
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
    
}


