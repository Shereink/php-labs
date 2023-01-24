<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("autoload.php");
define("_ALLOW_ACCESS",1);
session_start();



try {
    $visitor = new Visitor();
    $counter = new Counter();
    if(!$visitor->get_is_counted()){
        $counter->increment_counter();
        $counter->save_count_in_file();
        $visitor->set_is_counted(true);
        $visitor->save_count_status_in_user_session();
    }    
    $counted_users = $counter->get_visitor_count();
    echo "<h3> Counted Unique Visitors  : </h3> " . $counted_users ;

} catch (Exception $e) {
    echo "<p >**" . $e->getMessage() . "</p>";
    echo "<p>##" . $e->getTraceAsString() . "</p>";
}