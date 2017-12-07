<?php
/**
 * Description of Countries
 *
 * @author Bernardo Albuquerque
 */
class Countries
{

    private $id;
    private $name_br;
    private $name_us;
    
    public function getId() {
        return $this->id;
    }

    public function getName_br() {
        return $this->name_br;
    }

    public function getName_us() {
        return $this->name_us;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName_br($name_br) {
        $this->name_br = $name_br;
        return $this;
    }

    public function setName_us($name_us) {
        $this->name_us = $name_us;
        return $this;
    }

}