<?php
/**
 * Created by PhpStorm.
 * User: Rexx
 * Date: 04/02/2018
 * Time: 12:17 AM
 */


$usuario    =$_POST['usuario'];
$email      =$_POST['email'];
$pass       =$_POST['pass'];

$db_host="localhost";
$db_user="edgar";
$db_password="14120221";
$db_name="archivo_bd";
$db_table_name="usuario";

#archivo_bd
$db_connection= mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($db_connection, $db_name);
if (!$db_connection ) {
    die('No se ha podido conectar a la base de datos');
}

$tildes = $db_connection->query("SET NAMES 'utf8'");
$result = mysqli_query($db_connection, "INSERT INTO usuario
    VALUES ('','".$usuario."',
               '".$pass."',
               '".$email."')");
?>

<script>
    alert('Se ha Registro Con Exito');
    window.location.href='subir.php';
</script>

