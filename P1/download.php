<?php
/**
 * Created by PhpStorm.
 * User: Rexx
 * Date: 08/02/2018
 * Time: 04:15 PM
 */

session_start();
if(isset($_SESSION['login'])){
    $nom = $_SESSION['login'];
}

function buscar(){}
$db_host="localhost";
$db_user="edgar";
$db_password="14120221";
$db_name="archivo_bd";

$db_connection= mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($db_connection, $db_name);
if (!$db_connection ) {
    die('No se ha podido conectar a la base de datos');
}
$tildes = $db_connection->query("SET NAMES 'utf8'");


$id = $_GET['id'];
#$id = 1;
$qry =
    "SELECT archivo.id_archivo as id, archivo.nombre as name,
archivo.descargas as des, archivo.contenido as con 
FROM archivo,usuario 
WHERE id_archivo='".$id."' AND archivo.id_usuario=usuario.id_usuario";
#$contenido = mysqli_result($res, 0, txt);
$result = mysqli_query($db_connection,$qry);
if ($result) {
    $row    = mysqli_fetch_object($result);
    $des= "{$row->des}";
    $incremento = intval($des + 1);

    $id= "{$row->id}";
#    echo $id;
#    echo " ";
    $con= "{$row->con}";
#    echo $con;
#    echo " ";
#
    $nombre= "{$row->name}";
#    echo $nombre;
#    echo " ";
#
#    #$nombre = mysqli_fetch_object($result);
#    $lugar="{$row->ubi}";
#    echo $lugar;
#    echo " ";
#    $prueba="{$row->usuario}";
#    echo $prueba;
}else {
    echo "Error: " . mysqli_error($db_connection);
}
#$nombre = mysqli_fetch_assoc($result);
#$lugar  = mysql_result($result, 0, "ubi");
#$nick   = mysqli_result($result, 0, "usuario");

#while ($fila = mysqli_fetch_assoc($result)){
#    $lugar  = $fila['ubi'];
#    $nombre = $fila['name'];
#    $nick   = $fila['usuario'];
#    #header("Location: archivos/".$nick."/".$nombre."");
#    echo $lugar  ;
#    echo $nombre ;
#    echo $nick   ;
#}


#header("Content-type: application/txt");
#echo $nombre, "<br>";
#echo $lugar, "<br>";

header("Content-type: txt");
header("Content-Disposition:: attachment; filename=".$nombre."");
#header("Location: archivos/".$prueba."/".$nombre."");
echo $con;
mysqli_query($db_connection, "UPDATE archivo
      SET `descargas` = '".$incremento."' 
      WHERE `archivo`.`id_archivo` = '".$id."' ");

?>

