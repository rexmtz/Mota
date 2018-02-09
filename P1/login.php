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
<h2>Login</h2>
<?php
/**
 * Created by PhpStorm.
 * User: Rexx
 * Date: 05/02/2018
 * Time: 01:05 AM
 */
session_start();
if(isset($_SESSION['login'])){
    $nom = $_SESSION['login'];
    $id = $_SESSION['id'];
    echo "
  <strong>Hola ".$nom."</strong>
  <form method='post' enctype='multipart/form-data' action='archivo.php'>
    <label> Selecciona un archivo: </label>
    <br/>
    <input type='file' name='archivo' />
    <br/>
    <input type='submit' name='btn' values='Enviar' />
    </form>
  <p>
      <a href='logout.php' class=btn btn-danger btn-block>Cerrar Sesion</a>
  </p>
 ";
}
else{
    echo "
    <table BORDER>
      <form role='form' action='logear.php' method='post'>
        <tr>
          <td>Usuario: </td>
          <td>
            <input type='text' name='nickuser'><br>
          </td>
        </tr>
        <tr>
          <td>Password: </td>
          <td>
            <input type=password name='pass'><br>
          </td>
        </tr>
        <tr>
          <TH COLSPAN=2><input type='submit' value='Enviar'></TH>
        </tr>
      </form>
    </table>
    </body>
    </html>
    ";
}
?>