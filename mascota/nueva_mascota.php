<?php
include '../conexion.php';

if (
    isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['vacunado'])
    && isset($_POST['esterilizado']) && isset($_POST['raza']) && isset($_POST['sexo'])
    && isset($_POST['color']) && isset($_POST['descripcion']) && isset($_POST['fecha_nacimiento'])
    && isset($_POST['foto']) && isset($_POST['fecha_ingreso']) && isset($_POST['fecha_salida'])
) {

    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $vacunado = $_POST['vacunado'];
    $esterilizado = $_POST['esterilizado'];
    $raza = $_POST['raza'];
    $sexo = $_POST['sexo'];
    $color = $_POST['color'];
    $descripcion = $_POST['descripcion'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $foto = $_POST['foto'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $fecha_salida = $_POST['fecha_salida'];

    $consulta = "INSERT INTO mascota (`nombre`, `tipo`, `vacunado`, `esterilizado`, `raza`, `sexo`, `color`, `descripcion`, `fecha_nacimiento`, `foto`, `fecha_ingreso`, `fecha_salida`) VALUES ('$nombre', '$tipo', '$vacunado', '$esterilizado', '$raza', '$sexo', '$color', '$descripcion', '$fecha_nacimiento', '$foto', '$fecha_ingreso', '$fecha_salida');";

    $resultado_consulta = mysqli_query($conn, $consulta);

    $resultado = array();

    if($resultado_consulta){
        $item = array(
            'salida' => true,
            'mensaje' => 'Se agrego correctamente a la mascota'
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
