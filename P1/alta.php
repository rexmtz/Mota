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

    include ('conexion.php');

$result = mysqli_query($db_connection, "INSERT INTO usuario
    VALUES ('','".$usuario."',
               '".$pass."',
               '".$email."')");
?>

<script>
    alert('Se ha Registro Con Exito');
    window.location.href='subir.php';
</script>

