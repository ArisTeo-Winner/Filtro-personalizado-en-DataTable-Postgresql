<?php


$hostname = ""; //Ruta del servidor 
$dbname = ""; // Nombre de base de daos
$username = ""; // Usuario 
$pass = "";// Contraseña

// Create connection
$con = pg_connect(" host = $hostname dbname = $dbname user = $username password = $pass ");

