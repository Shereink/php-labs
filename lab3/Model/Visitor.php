<?php

defined("_ALLOW_ACCESS") or die("No Direct access allowed");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author webre
 */
class Visitor {

    //put your code here

    private $_is_counted;
    private $_count_session_key;

    public function __construct() {
        $this->_count_session_key = "is_counted";
        if(isset( $_SESSION[$this->_count_session_key]) && $_SESSION[$this->_count_session_key] === true)  
            $this-> _is_counted = true;
        else
            $this-> _is_counted = false;
    }

    public function get_is_counted() {
        return $this->_is_counted;
    }

    public function get_count_session_key() {
        return $this->_count_session_key;
    }

    public function set_is_counted($_is_counted) {
        return $this->_is_counted = $_is_counted;
    }

    public function save_count_status_in_user_session() {
        $_SESSION[$this->_count_session_key] = $this->_is_counted;
    }

}
