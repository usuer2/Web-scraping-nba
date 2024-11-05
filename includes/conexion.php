<?php
// Base de datos host
// --------------------------
$dbhost	= "localhost";
// Base de datos usario
// --------------------------
//$dbuser	= "admin_cursos";	### !!! Tienes que cambiar con el tuyo !!!
$dbuser	= "root";	### !!! Tienes que cambiar con el tuyo !!!

// Base de datos contasena
// ----------------------------
//$dbpass	= "TSTT8Q3Nxy";	### !!! Tienes que cambiar con el tuyo !!!
$dbpass	= "";	### !!! Tienes que cambiar con el tuyo !!!
// -----------------------
//$dbname	= "admin_fitosanitarios";	### !!! Tienes que cambiar con el tuyo !!!
$dbname	= "datos_nba";	### !!! Tienes que cambiar con el tuyo !!!
// Base de datos caracteres
// ----------------------------------
$charset = 'utf8mb4';
// Establecer la conexiÃÂ³n
// -------------------------------
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ("Imposible conexiÃÂ³n con el servidor MySQL >>>");
// Seleccionar base de datos
// -------------------------------
$db_select = mysqli_select_db($conn, $dbname) or die("La base de datos no estÃÂ¡ seleccionada: $dbname >>>");
// Establecer conjunto de caracteres de conexiÃÂ³n
//------------------------------------------------
$db_conn_charset = mysqli_set_charset($conn, 'utf8mb4');
?>
