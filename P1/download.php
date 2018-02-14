<?php
/**
 * Created by PhpStorm.
 * User: Rexx
 * Date: 08/02/2018
 * Time: 04:15 PM
 */

ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 1);
session_start();
if(isset($_SESSION['login'])){
    $nom = $_SESSION['login'];

    include ('conexion.php');
    conteo();
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

        $con= "{$row->con}";

        $nombre= "{$row->name}";

    }else {
        echo "Error: " . mysqli_error($db_connection);
    }


    header("Content-type: txt");
    header("Content-Disposition:: attachment; filename=".$nombre."");
#header("Location: archivos/".$prueba."/".$nombre."");
    echo $con;
}else{
    echo "inicie sesion.<br>";
    echo "<a href='login.php'>Logear</a>";
}

function conteo ($id,$incremento){
    include ('conexion.php');
    $qry2 = "UPDATE archivo
      SET `descargas` = '".$incremento."' 
      WHERE `archivo`.`id_archivo` = '".$id."' ";
    mysqli_query($db_connection, $qry2);
}

?>

