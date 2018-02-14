<?php
/**
 * Created by PhpStorm.
 * User: Rexx
 * Date: 04/02/2018
 * Time: 03:53 PM
 */

ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 1);
session_start();
$nom        = $_SESSION['login'];
$id         = $_SESSION['id'];
$narchivo   = $_FILES['archivo']['name'];
$tamanio    = $_FILES["archivo"]["size"];
#aqui se lee el archivo para guardarlo
$archivo    = $_FILES["archivo"]["tmp_name"];
$fp         = fopen($archivo, "rb");
$contenido  = fread($fp, $tamanio);

$directorio      = 'C:/xampp/htdocs/archivos/'.$nom.'/';
$carpeta_usuario = "C:/xampp/htdocs/archivos/".$nom."/";
if(file_exists($carpeta_usuario)) {

    $ficheros_subido = $directorio.basename($_FILES['archivo']['name']);
    if(file_exists($ficheros_subido)) {
        echo "<script>
            alert('El archivo ya existe O Se encuentra uno con el mismo nombre');
          </script>";
    }else{
        insertar($narchivo, $directorio, $id, $contenido);
        $ficheros_subido = $directorio.basename($_FILES['archivo']['name']);
        if(move_uploaded_file($_FILES['archivo']['tmp_name'], $ficheros_subido)){
            echo"<script>
            alert('Se ha subido Con Exito');
            alert('El se guardo y e almanceno');
         </script>";
        }
        echo "<script>
          </script>";
    }
}else{
    mkdir($directorio, 0700);

    $ficheros_subido = $directorio.basename($_FILES['archivo']['name']);
    insertar($narchivo, $directorio, $id,$contenido);
    if(move_uploaded_file($_FILES['archivo']['tmp_name'], $ficheros_subido)){
        echo"<script>
            alert('Se ha subido Con Exito');
            alert('El se guardo y e almanceno');
         </script>";
    }

}
#$dir_subida='C:/xampp/htdocs/Mota/P1/archivos/".$nom."/';
#$ficheros_subido=$dir_subida.basename($_FILES['archivo']['name']);

function insertar ($narchivo, $directorio, $id, $contenido){

    include 'conexion.php';
    $qry="INSERT INTO archivo
      VALUES ('','".$narchivo."',
                 '".$contenido."',
                 '".$directorio."',
                 '0',
                 '".$id."')";
    mysqli_query($db_connection, $qry);
}

?>
    <script>
        window.location.href='subir.php';
    </script>
