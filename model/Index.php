<?php
/**
 * Description of Index
 *
 * @author Bernardo Albuquerque
 */
class Index
{

    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $gender;
    private $country_id;
    private $name_br;
    private $created;
    private $modified;

    function getId() {
        return $this->id;
    }

    function getFirst_name() {
        return $this->first_name;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function getEmail() {
        return $this->email;
    }

    function getGender() {
        return $this->gender;
    }
    
    function getCountry_id() {
        return $this->country_id;
    }

    function getName_br() {
        return $this->name_br;
    }

    function getCreated() {
        return $this->created;
    }

    function getModified() {
        return $this->modified;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }
    
    function setCountry_id($country_id) {
        $this->country_id = $country_id;
    }

    function setName_br($name_br) {
        $this->name_br = $name_br;
    }

    function setCreated($created) {
        $this->created = $created;
    }

    function setModified($modified) {
        $this->modified = $modified;
    }

}