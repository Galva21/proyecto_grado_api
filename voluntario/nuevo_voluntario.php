<?php
include '../conexion.php';

if (
    isset($_POST['ci']) && isset($_POST['nombre']) && isset($_POST['paterno'])
    && isset($_POST['materno']) && isset($_POST['telefono']) && isset($_POST['email'])
    && isset($_POST['sexo']) && isset($_POST['direccion']) && isset($_POST['fecha_nacimiento'])
    && isset($_POST['foto']) && isset($_POST['contrasenia']) && isset($_POST['pregunta'])
    && isset($_POST['respuesta'])
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
    $contrasenia = $_POST['contrasenia'];
    $pregunta = $_POST['pregunta'];
    $respuesta = $_POST['respuesta'];

    $consulta = "INSERT INTO voluntario (`id_voluntario`, `ci`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `email`, `sexo`, `direccion`, `fecha_nacimiento`, `foto`, `contrasenia`, `pregunta_recuperacion`, `respuesta_recuperacion`) VALUES ('V$ci', '$ci', '$nombre', '$paterno', '$materno', '$telefono', '$email', '$sexo', '$direccion', '$fecha_nacimiento', '$foto', '$contrasenia', '$pregunta', '$respuesta');";

    $resultado_consulta = mysqli_query($conn, $consulta);

    $resultado = array();

    if($resultado_consulta){
        $item = array(
            'salida' => true,
            'mensaje' => 'Se agrego correctamente al voluntario'
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
