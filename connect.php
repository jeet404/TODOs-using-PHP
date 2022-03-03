<?php

// error_reporting(0);

define('servername', 'localhost');
define('username', 'root');
define('password', '');
define('dbname', 'todos');

$conn = mysqli_connect(servername, username, password, dbname);

if (!$conn) {
    die("There are some issue in Connection");
} else {
    // echo "Connected Successfully";
}
