<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of patient
 *
 * @author Tania Heieer
 */
class patient {
   private $patientID, $userID, $fName, $lName, $dob, $sex, $begDate, $endDate, $disabled, $dcsDate;
     function __construct($patientID, $userID, $fName, $lName, $dob, $sex, $begDate, $endDate, $disabled, $dcsDate) {
       $this->patientID = $patientID;
       $this->userID = $userID;
       $this->fName = $fName;
       $this->lName = $lName;
       $this->dob = $dob;
       $this->sex = $sex;
       $this->begDate = $begDate;
       $this->endDate = $endDate;
       $this->disabled = $disabled;
       $this->dcsDate = $dcsDate;
   }

   function getDcsDate() {
       return $this->dcsDate;
   }

   function setDcsDate($dcsDate) {
       $this->dcsDate = $dcsDate;
   }

      function getPatientID() {
       return $this->patientID;
   }

   function getUserID() {
       return $this->userID;
   }

   function getFName() {
       return $this->fName;
   }

   function getLName() {
       return $this->lName;
   }

   function getSex() {
       return $this->sex;
   }
   
   function getDob() {
       return $this->dob;
   }

   function getDisabled() {
       return $this->disabled;
   }

   function getBegDate() {
       return $this->begDate;
   }

   function getEndDate() {
       return $this->endDate;
   }

   function setPatientID($patientID) {
       $this->patientID = $patientID;
   }

   function setUserID($userID) {
       $this->userID = $userID;
   }

   function setFName($fName) {
       $this->fName = $fName;
   }

   function setLName($lName) {
       $this->lName = $lName;
   }

   function setDob($dob) {
       $this->dob = $dob;
   }
   
   function setSex() {
       return $this->sex;
   }

   function setDisabled($disabled) {
       $this->disabled = $disabled;
   }

   function setBegDate($begDate) {
       $this->begDate = $begDate;
   }

      
}
