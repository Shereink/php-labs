<?php

function showall($file_path) {
    $lines = file($file_path);
    foreach ($lines as $value) {
        $words = explode(",", $value);
        echo "The date is :" . $words[0] . "<br>";
        echo "IP address :" . $words[1] . "<br>";
        echo "Email  :" . $words[2] . "<br>";
        echo "Name :" . $words[3] . "<br>";
        echo "<hr>";
    }
}

function search($file_path, $key) {
    $lines = file($file_path);
    foreach ($lines as $value) {
        $words = explode(",", $value);
        if (trim($words[3]) === $key) {
            echo "The date is :" . $words[0] . "<br>";
            echo "IP address :" . $words[1] . "<br>";
            echo "Email  :" . $words[2] . "<br>";
            echo "Name :" . $words[3] . "<br>";
            echo "<hr>";
        }
    }
}
