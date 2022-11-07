<?php
include '../conexion.php';

if (
    isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['vacunado']) && isset($_POST['esterilizado'])
    && isset($_POST['descripcion']) && isset($_POST['foto']) && isset($_POST['fecha_salida'])
) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $vacunado = $_POST['vacunado'];
    $esterilizado = $_POST['esterilizado'];
    $descripcion = $_POST['descripcion'];
    $foto = $_POST['foto'];
    $fecha_salida = $_POST['fecha_salida'];

    $consulta = "UPDATE mascota SET nombre = '$nombre', vacunado = '$vacunado', esterilizado = '$esterilizado', descripcion = '$descripcion', foto = '$foto', fecha_salida = '$fecha_salida' WHERE id_mascota = '$id'";

    $resultado_consulta = mysqli_query($conn, $consulta);

    $resultado = array();

    if($resultado_consulta){
        $item = array(
            'salida' => true,
            'mensaje' => 'Se modificó correctamente a la mascota'
        );
        array_push($resultado,$item);
    }else{
        $item = array(
            'salida' => false,
            'mensaje' => 'Consulta cancelada'
        );
        array_push($resultado,$item);
    }
    echo json_encode($resultado);
}
