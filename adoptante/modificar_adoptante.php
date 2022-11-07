<?php
include '../conexion.php';

if (
    isset($_POST['id']) && isset($_POST['telefono']) && isset($_POST['email']) && isset($_POST['direccion'])
    && isset($_POST['foto']) && isset($_POST['foto_carnet']) && isset($_POST['foto_factura']) && isset($_POST['foto_croquis'])
    && isset($_POST['autoridad_hogar'])
) {

    $id = $_POST['id'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $foto = $_POST['foto'];
    $foto_carnet = $_POST['foto_carnet'];
    $foto_factura = $_POST['foto_factura'];
    $foto_croquis = $_POST['foto_croquis'];
    $autoridad_hogar = $_POST['autoridad_hogar'];

    $consulta = "UPDATE adoptante SET foto = '$foto', telefono = '$telefono', email = '$email', direccion = '$direccion', foto_carnet = '$foto_carnet', foto_factura = '$foto_factura', foto_croquis = '$foto_croquis',autoridad_hogar = '$autoridad_hogar'  WHERE id_adoptante = '$id'";

    $resultado_consulta = mysqli_query($conn, $consulta);

    $resultado = array();

    if($resultado_consulta){
        $item = array(
            'salida' => true,
            'mensaje' => 'Se modificó correctamente al adoptante'
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
