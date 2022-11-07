<?php
include '../conexion.php';

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $consulta = "DELETE FROM adoptante WHERE id_adoptante = '$id'";

    $resultado_consulta = mysqli_query($conn, $consulta);

    $resultado = array();

    if($resultado_consulta){
        $item = array(
            'salida' => true,
            'mensaje' => 'Se eliminó correctamente al adoptante'
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
