<?php
/**
 * Created by PhpStorm.
 * User: Rexx
 * Date: 10/02/2018
 * Time: 01:48 PM
 */

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="archivo_bd";
$db_table_name="usuario";

#archivo_bd
$db_connection= mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($db_connection, $db_name);
if (!$db_connection ) {
    die('No se ha podido conectar a la base de datos');
}

$tildes = $db_connection->query("SET NAMES 'utf8'");


?>