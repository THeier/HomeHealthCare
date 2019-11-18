<?php

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
        //$this->medNotes = $medNotes;
//        $this->begDate =$begDate;
//        $this->endDate =$endDate;
        
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

//    function getMedNotes() {
//        return $this->medNotes;
//    }

//    function setMedNotes($medNotes) {
//        $this->medNotes = $medNotes;
//    }
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
