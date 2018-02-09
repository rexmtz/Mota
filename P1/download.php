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
    echo "
  <strong>Hola ".$nom."</strong>";
    buscar();
    echo "<p>
      <a href='logout.php' class=btn btn-danger btn-block>Cerrar Sesion</a>
  </p>
 ";
}

function buscar(){}
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="archivo_bd";

$db_connection= mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($db_connection, $db_name);
if (!$db_connection ) {
    die('No se ha podido conectar a la base de datos');
}
$tildes = $db_connection->query("SET NAMES 'utf8'");


#$id = $_GET['id'];
$id = 1;
$qry =
    "SELECT archivo.id_archivo as id, archivo.nombre as nombre, usuario.nickname as usuario, archivo.ubicacion as ubi 
FROM archivo,usuario 
WHERE id='".$id."' AND archivo.id_usuario=usuario.id_usuario";
#$contenido = mysqli_result($res, 0, txt);
$result = mysqli_query($db_connection,$qry);
$nombre = mysql_result($result, 0, "nombre");
$lugar  = mysqli_result($result, 0, "ubi");
$nick   = mysqli_result($result, 0, "usuario");
#while ($fila = mysqli_fetch_assoc($result)){
#    $lugar  = $fila['ubi'];
#    $nombre = $fila['name'];
#    $nick   = $fila['usuario'];
#
#}


#header("Content-type: application/txt.open");
#header("Location: archivos/".$nick."/".$nombre."");
echo $nombre, "<br>";
echo $lugar, "<br>";
header("Content-Disposition: attachment; filename=".$nombre."");
header("Content-type: txt");
echo $nombre;

?>