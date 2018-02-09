<?php
/**
 * Created by PhpStorm.
 * User: Rexx
 * Date: 04/02/2018
 * Time: 03:53 PM
 */
session_start();
$nom = $_SESSION['login'];
$id = $_SESSION['id'];
$narchivo =$_FILES['archivo']['name'];

$directorio      = 'C:/xampp/htdocs/Mota/P1/archivos/'.$nom.'/';
$carpeta_usuario = "C:/xampp/htdocs/Mota/P1/archivos/".$nom."/";
if(file_exists($carpeta_usuario)) {

    $ficheros_subido = $directorio.basename($_FILES['archivo']['name']);
    if(file_exists($ficheros_subido)) {
        echo "<script>
            alert('El archivo ya existe O Se encuentra uno con el mismo nombre');
          </script>";
    }else{
        insertar($narchivo, $directorio, $id);
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
    insertar($narchivo, $directorio, $id);
    if(move_uploaded_file($_FILES['archivo']['tmp_name'], $ficheros_subido)){
        echo"<script>
            alert('Se ha subido Con Exito');
            alert('El se guardo y e almanceno');
         </script>";
    }

}
#$dir_subida='C:/xampp/htdocs/Mota/P1/archivos/".$nom."/';
#$ficheros_subido=$dir_subida.basename($_FILES['archivo']['name']);

function insertar ($narchivo, $directorio, $id){
    $db_host="localhost";
    $db_user="root";
    $db_password="";
    $db_name="archivo_bd";
    $db_table_name="archivo";
    $db_connection= mysqli_connect($db_host, $db_user, $db_password);
    mysqli_select_db($db_connection, $db_name);
    if (!$db_connection ) {
    die('No se ha podido conectar a la base de datos');
    }

    $tildes = $db_connection->query("SET NAMES 'utf8'");
    $result = mysqli_query($db_connection, "INSERT INTO archivo
      VALUES ('','".$narchivo."',
                 '".$directorio."',
                 '".$id."')");
    }

?>
    <script>
        window.location.href='subir.php';
    </script>
