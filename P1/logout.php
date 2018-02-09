<?php
/**
 * Created by PhpStorm.
 * User: Rexx
 * Date: 04/02/2018
 * Time: 12:24 AM
 */

//Inicia una nueva sesión o reanuda la existente
session_start();
//Destruye toda la información registrada de una sesión
session_destroy();
//Redirecciona a la página de login
header('location: subir.php');
?>
