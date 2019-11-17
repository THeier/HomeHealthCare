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
   private $patientID, $userID, $fName, $lName, $dob, $sex, $deceasedDate, $begDate, $endDate, $disabled;
     function __construct($patientID, $userID, $fName, $lName, $dob, $sex, $deceasedDate, $begDate, $endDate, $disabled) {
       $this->patientID = $patientID;
       $this->userID = $userID;
       $this->fName = $fName;
       $this->lName = $lName;
       $this->dob = $dob;
       $this->sex = $sex;
       $this->deceasedDate = $deceasedDate;
       $this->begDate = $begDate;
       $this->endDate = $endDate;
       $this->disabled = $disabled;
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

   function getDeceasedDate() {
       return $this->deceasedDate;
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

   function setDeceasedDate($deceasedDate) {
       $this->deceasedDate = $deceasedDate;
   }

   function setBegDate($begDate) {
       $this->begDate = $begDate;
   }

      
}
