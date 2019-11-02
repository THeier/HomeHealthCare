<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of patientMedications
 *
 * @author Tania Heieer
 */
class patientMedications {
   
    private $medID, $patientID, $drug, $quanity, $timesPerDay;
    
    function __construct($medID, $patientID, $drug, $quanity, $timesPerDay) {
        $this->medID = $medID;
        $this->patientID = $patientID;
        $this->drug = $drug;
        $this->quanity = $quanity;
        $this->timesPerDay = $timesPerDay;
    }
    function getMedID() {
        return $this->medID;
    }

    function getPatientID() {
        return $this->patientID;
    }

    function getDrug() {
        return $this->drug;
    }

    function getQuanity() {
        return $this->quanity;
    }

    function getTimesPerDay() {
        return $this->timesPerDay;
    }

    function setMedID($medID) {
        $this->medID = $medID;
    }

    function setPatientID($patientID) {
        $this->patientID = $patientID;
    }

    function setDrug($drug) {
        $this->drug = $drug;
    }

    function setQuanity($quanity) {
        $this->quanity = $quanity;
    }

    function setTimesPerDay($timesPerDay) {
        $this->timesPerDay = $timesPerDay;
    }


}
