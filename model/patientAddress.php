<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of patientAddress
 *
 * @author Tania Heieer
 */
class patientAddress {
    private $addressID, $patientID, $number, $street, $city, $state, $zip;
    
    function __construct($addressID, $patientID, $number, $street, $city, $state, $zip) {
        $this->addressID = $addressID;
        $this->patientID = $patientID;
        $this->number = $number;
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
    }
    
    function getAddressID() {
        return $this->addressID;
    }

    function getPatientID() {
        return $this->patientID;
    }

    function getNumber() {
        return $this->number;
    }

    function getStreet() {
        return $this->street;
    }

    function getCity() {
        return $this->city;
    }

    function getState() {
        return $this->state;
    }

    function getZip() {
        return $this->zip;
    }

    function setAddressID($addressID) {
        $this->addressID = $addressID;
    }

    function setPatientID($patientID) {
        $this->patientID = $patientID;
    }

    function setNumber($number) {
        $this->number = $number;
    }

    function setStreet($street) {
        $this->street = $street;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setState($state) {
        $this->state = $state;
    }

    function setZip($zip) {
        $this->zip = $zip;
    }



}
