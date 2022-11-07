<?php
include '../conexion.php';

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $consulta = "DELETE FROM voluntario WHERE id_voluntario = '$id'";

    $resultado_consulta = mysqli_query($conn, $consulta);

    $resultado = array();

    if($resultado_consulta){
        $item = array(
            'salida' => true,
            'mensaje' => 'Se eliminó correctamente al voluntario'
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
