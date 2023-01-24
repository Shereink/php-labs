<?php

defined("_ALLOW_ACCESS") or die("No Direct access allowed");

/**
 * Description of Persons
 *
 * @author webre
 */
class Counter {

    //put your code here
    private $_visitor_count;

    public function __construct() {
        if (file_exists(_Counter_FILE_)) {
            $contents = file(_Counter_FILE_);
            $this->_visitor_count = $contents[0];
        } else {
            $this->_visitor_count = 0;
        }
    }

    public function get_visitor_count() {
        return $this->_visitor_count;
    }

    public function set_visitor_count($count) {
        $this->_visitor_count = $count;
    }

    public function increment_counter() {
        $this->_visitor_count++;
    }

    public function save_count_in_file() {
        $fp = fopen(_Counter_FILE_, "w+");
        fwrite($fp, $this->_visitor_count);
        fclose($fp);
    }

}
