<?php
include '../conexion.php';

if (
    isset($_POST['id']) && isset($_POST['telefono']) && isset($_POST['email']) && isset($_POST['direccion'])
    && isset($_POST['foto']) && isset($_POST['pregunta']) && isset($_POST['respuesta'])
) {

    $id = $_POST['id'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $foto = $_POST['foto'];
    $pregunta = $_POST['pregunta'];
    $respuesta = $_POST['respuesta'];

    $consulta = "UPDATE voluntario SET telefono = '$telefono', email = '$email', direccion = '$direccion', foto = '$foto', pregunta_recuperacion = '$pregunta', respuesta_recuperacion = '$respuesta' WHERE id_voluntario = '$id'";

    $resultado_consulta = mysqli_query($conn, $consulta);

    $resultado = array();

    if($resultado_consulta){
        $item = array(
            'salida' => true,
            'mensaje' => 'Se modificó correctamente al voluntario'
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
