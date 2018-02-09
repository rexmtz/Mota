<?php
/**
 * Created by PhpStorm.
 * User: Rexx
 * Date: 04/02/2018
 * Time: 12:17 AM
 */
try {
    $SESSION['names'] = $_POST['nickuser'];
    $SESSION['pas'] = $_POST['pass'];

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "archivo_bd";
    $db_table_name = "usuario";

    $db_connection = mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($db_connection, $db_name);
    if (mysqli_select_db($db_connection, "usuario")) ;
    {
        $sql = "SELECT id_usuario as id_usu from usuario where nickname = '".$_POST['nickuser']."' AND pass = '".$_POST['pass']."'";
        $resEmp = mysqli_query($db_connection, $sql);

        if ($fila = mysqli_fetch_array($resEmp)) {
            session_start();

            $_SESSION['id'] = $fila['id_usu'];
            $_SESSION['login'] = $_POST['nickuser'];
            header('Location: ../P1/subir.php');

        }
        #$SESSION['names'] = $_POST['usuario'];
        #$SESSION['pas'] = $_POST['pass'];

        else {
            echo "<h1>Datos Incorrectos</h1>";
            //$errores .='<li>Datos incorrectos</li>';
            echo "<script>alert('Datos incorrectos');</script>";
            echo "<a href='login.php'>Regresar</a>";
        }
//$nombres    =$_POST['nombre'];
//$email      =$_POST['email'];
//$pass       =$_POST['pass'];
    }
}
catch(PDO_Exception $e) {
    echo"error" .$e->getMessage();
}
?>
