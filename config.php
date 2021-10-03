<?php


$hostname = ""; //Ruta del servidor 
$dbname = ""; // Nombre de base de daos
$username = ""; // Usuario del servidor 
$pass = "";// Contraseña del servidor 

// Create connection
$con = pg_connect(" host = $hostname dbname = $dbname user = $username password = $pass ");

