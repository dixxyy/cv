<?php

$sname = 'localhost';
$uname = 'root';
$pwd = '';
$db_name = 'cv';

$conn = mysqli_connect($sname, $uname, $pwd, $db_name);

if (!$conn) {
    echo 'Connection failed!';
}