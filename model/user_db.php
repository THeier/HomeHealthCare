<?php

class user_db {


     function insert_user($fName, $lName, $userName, $password, $userType, $begDate){
        $db = database::getDB();
        $query = 'insert into user(fname, lname, userName, password, userType, begDate, filePath)'
                 .'VALUES (:fName, :lName, :userName, :password, :userType, :begDate, :filePath)';
        $statement = $db->prepare($query);
        $statement->bindValue(':fName',$fName);
        $statement->bindValue(':lName',$lName);
        $statement->bindValue(':userName',$userName);
        $statement->bindValue(':password',$password);
        $statement->bindValue(':userType',$userType);
        $statement->bindValue(':begDate', $begDate);
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
                $row['userName'], $row['userType'], $row['filePath']);
        
        return $u;
    }


    public static function get_all_users(){
      $db = Database::getDB();
      $query = 'SELECT * from user';
      $statement = $db->prepare($query);
      $statement->execute();
      $results =  $statement->fetchAll();
      $statement->closeCursor();
      $fakePassword = "we don't want to pass this around";
      
      if(!empty($results))
      {
        foreach($results as $result)
        {
            $u = new user($result['userName'], $fakePassword);
            $u->setUserId($result['userId']);
            $users[] = $u;
        }
        return $users;
      }
      else
      {
          return null;
      }
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
}


