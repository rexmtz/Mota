<script type="text/javascript">
//  $(document).ready(function(){
//      var a = 0;

//      $(".link").click(function(){
//          a = a + 1;
//          alert("has descargado "+a+" veces el archivo");
//          console.log(a)
//      });
//  });
</script>
<html>
<body>
<h1><center>Practica 1</center></h1>
<hr>
<h3>
    <a href='listado.php'>Listado</a>
    <a href='login.php'>Login</a>
    <a href='subir.php'>Registro</a>
</h3>
<hr>
<h2>Listado</h2>
<?php
/**
 * Created by PhpStorm.
 * User: Rexx
 * Date: 05/02/2018
 * Time: 11:00 PM
 */

ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 1);
session_start();
if(isset($_SESSION['login'])){
    $nom = $_SESSION['login'];
    echo "
  <strong>Hola ".$nom."</strong>";
   tabla();
  echo "<p>
      <a href='logout.php' class=btn btn-danger btn-block>Cerrar Sesion</a>
  </p>
 ";
}else{
    tabla();
}




function tabla(){

    include 'conexion.php';
// Ejecuta la sentencia SQL
    $sql = "SELECT archivo.id_archivo as id, archivo.nombre as nombre,
      usuario.nickname as usuario, archivo.ubicacion as ubi, archivo.descargas as des
      FROM `archivo`,`usuario` 
      where archivo.id_usuario=usuario.id_usuario";
    $result = mysqli_query($db_connection, $sql);

    echo '<table border=1px class="table">';
    if(isset($_SESSION['login'])){
        echo '<td>' .'id'.'</td><td>' .'nombre'.'</td><td>' .'subido por'.'</td><td>Download</td><td>N° de Descargas</td>';
        while($fila = mysqli_fetch_assoc($result))
        {
            echo '<tr>';
            echo  '<td>' . $fila['id'] . '</td><td>' . $fila['nombre'] . '</td><td>' . $fila['usuario'] . '</td>
                <td><a class=link href="download.php?id='.$fila['id'].'" download="">Download</a></td>
                <td>' . $fila['des'] . '</td>';
            echo '</tr>';
        }
    }else{
        echo '<td>' .'id'.'</td><td>' .'nombre'.'</td><td>' .'subido por'.'</td>';
        while($fila = mysqli_fetch_assoc($result))
        {
            echo '<tr>';
            echo  '<td>' . $fila['id'] . '</td><td>' . $fila['nombre'] . '</td><td>' . $fila['usuario'] . '</td>';
            echo '</tr>';
        }
    }
    echo '</table><br>';
}

?>
