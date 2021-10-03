<?php


$hostname = "localhost";
$dbname = "practica";
$username = "postgres";
$pass = "Rammstein";

// Create connection
$con = pg_connect(" host = $hostname dbname = $dbname user = $username password = $pass ");

