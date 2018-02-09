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

// Ejecuta la sentencia SQL
    $result = mysqli_query($db_connection,
        "SELECT archivo.id_archivo as id, archivo.nombre as nombre, usuario.nickname as usuario, archivo.ubicacion as ubi 
FROM `archivo`,`usuario` 
where archivo.id_usuario=usuario.id_usuario
");

    echo '<table border=1px class="table">';
    if(isset($_SESSION['login'])){
        echo '<td>' .'id'.'</td><td>' .'nombre'.'</td><td>' .'subido por'.'</td><td>Descargar</td>';
        while($fila = mysqli_fetch_assoc($result))
        {
            echo '<tr>';
            echo  '<td>' . $fila['id'] . '</td><td>' . $fila['nombre'] . '</td><td>' . $fila['usuario'] . '</td>
                <td><a class=link href="download.php?id='.$fila['id'].'" download="">Download</a></td>';
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