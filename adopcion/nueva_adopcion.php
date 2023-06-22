<?php
include '../conexion.php';

if (
    isset($_POST['id_voluntario']) && isset($_POST['id_mascota'])
    && isset($_POST['nombre_adopt']) && isset($_POST['ci_adopt']) && isset($_POST['telefono_adopt'])
    && isset($_POST['direccion_adopt']) && isset($_POST['fecha_adopcion'])
) {

    $id_voluntario = $_POST['id_voluntario'];
    $id_mascota = $_POST['id_mascota'];
    $nombre_adopt = $_POST['nombre_adopt'];
    $ci_adopt = $_POST['ci_adopt'];
    $telefono_adopt = $_POST['telefono_adopt'];
    $direccion_adopt = $_POST['direccion_adopt'];
    $fecha_adopcion = $_POST['fecha_adopcion'];

    $consulta = "INSERT INTO adopcion (`id_voluntario`, `id_mascota`, `nombre_adopt`, `ci_adopt`, `telefono_adopt`, `direccion_adopt`, `fecha_adopcion`) VALUES ('$id_voluntario', '$id_mascota', '$nombre_adopt', '$ci_adopt', '$telefono_adopt', '$direccion_adopt', '$fecha_adopcion')";

    $resultado_consulta = mysqli_query($conn, $consulta);

    $resultado = array();

    if($resultado_consulta){
        $item = array(
            'salida' => true,
            'mensaje' => 'Se agrego correctamente la adopcion'
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