<?php
require_once 'user.php';

class Admin extends User {
    private $admin = 1;
    function isAdmin()
    {
        return true;
    }
    function fullName()
    {
		//return $this->name . ' ' . $this->family;
        //return $this->name . ' ' . $this->family . " is admin.";
        return parent::fullName() . " is admin.";
	}
    function setEmail($Uemail)
    {
        parent::setEmail($Uemail);
        //$this->.... = ....;
        //$this->.... = ....;
        //parent::setEmail($Uemail);
    }
}