<?php
include '../conexion.php';

if (
    isset($_POST['ci']) && isset($_POST['nombre']) && isset($_POST['paterno'])
    && isset($_POST['materno']) && isset($_POST['telefono']) && isset($_POST['email'])
    && isset($_POST['sexo']) && isset($_POST['direccion']) && isset($_POST['fecha_nacimiento'])
    && isset($_POST['foto']) && isset($_POST['foto_carnet']) && isset($_POST['foto_factura']) && isset($_POST['foto_croquis'])
    && isset($_POST['autoridad_hogar'])
) {

    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $direccion = $_POST['direccion'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $foto = $_POST['foto'];
    $foto_carnet = $_POST['foto_carnet'];
    $foto_factura = $_POST['foto_factura'];
    $foto_croquis = $_POST['foto_croquis'];
    $autoridad_hogar = $_POST['autoridad_hogar'];

    $consulta = "INSERT INTO adoptante (`ci`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `email`, `sexo`, `direccion`, `fecha_nacimiento`, `foto`, `foto_carnet`, `foto_factura`, `foto_croquis`, `autoridad_hogar`) VALUES ('$ci', '$nombre', '$paterno', '$materno', '$telefono', '$email', '$sexo', '$direccion', '$fecha_nacimiento', '$foto', '$foto_carnet', '$foto_factura', '$foto_croquis', '$autoridad_hogar')";

    $resultado_consulta = mysqli_query($conn, $consulta);

    $resultado = array();

    if($resultado_consulta){
        $item = array(
            'salida' => true,
            'mensaje' => 'Se agrego correctamente al adoptante'
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
