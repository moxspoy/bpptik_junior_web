<?php

class Student {
    private $NIM;
    private $name;
    private $birthDate;
    private $address;

    public function __construct ($NIM, $name, $birhtDate, $address){
        $this->NIM = $NIM;
        $this->name = $name;
        $this->birhDate = $birhtDate;
        $this->$address = $address;
    }

    function getNIM() {
        return $NIM;
    }

    function getName() {
        return $name;
    }

    function getBirthDate() {
        return $birthDate;
    }

    function getAddress() {
        return $address;
    }
}

?>