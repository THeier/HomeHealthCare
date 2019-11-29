<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Tania Heieer
 */
class user {
    
    private $userID, $fName, $lName, $userName, $userType, $begDate, $endDate, $filePath;
    
    function __construct($userID, $fName, $lName, $userName, $userType, $begDate, $endDate,  $filePath) {
        $this->userID =$userID;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->userName = $userName;
        $this->userType = $userType;
        $this->begDate =$begDate;
        $this->endDate =$endDate;
        $this->filePath =$filePath;
        
    }

    function getUserID() {
        return $this->userID;
    }

    function setUserID($userID) {
        $this->userID = $userID;
    }
    
    function getFName() {
        return $this->fName;
    }

    function getLName() {
        return $this->lName;
    }

    function getUserName() {
        return $this->userName;
    }

    function getUserType() {
        return $this->userType;
    }

    function setFName($fName) {
        $this->fName = $fName;
    }

    function setLName($lName) {
        $this->lName = $lName;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setUserType($userType) {
        $this->userType = $userType;
    }

    function getFilePath() {
        return $this->filePath;
    }

    function setFilePath($filePath) {
        $this->filePath = $filePath;
    }
    
    // set users full name 
    function setFullName(){
        
       
    }
    function getBegDate() {
        return $this->begDate;
    }

    function getEndDate() {
        return $this->endDate;
    }

    function setBegDate($begDate) {
        $this->begDate = $begDate;
    }

    function setEndDate($endDate) {
        $this->endDate = $endDate;
    }


}
