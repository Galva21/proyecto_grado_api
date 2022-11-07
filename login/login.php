<?php
include '../conexion.php';

if ((isset($_POST['usuario']) && isset($_POST['contrasenia'])) || $_SERVER['REQUEST_METHOD'] == "POST") {

    $usuario = "";
    $contrasenia = "";

    try {
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
    } catch (\Throwable $th) {
        // $postbody = file_get_contents("php://input");
        // $datos = json_decode($postbody,true);
        // if(!isset($datos['usuario']) || !isset($datos['contrasenia'])){
        //     echo error_log("Error en la consulta");
        // }else{
        //     $usuario = $datos['usuario'];
        //     $contrasenia = $datos['contrasenia'];
        // }
    }

    $consultaV = "SELECT * FROM voluntario WHERE id_voluntario ='" . $usuario . "' and contrasenia='" . $contrasenia . "'";
    $consultaA = "SELECT * FROM administrador WHERE id_administrador='" . $usuario . "' and contrasenia='" . $contrasenia . "'";

    $rConsultaA = mysqli_query($conn, $consultaA);
    $rConsultaV = mysqli_query($conn, $consultaV);

    if (!$rConsultaA && !$rConsultaV) {
        die("Consulta fallida");
    }

    $resp = array();
    $cantidadA = 0;
    $cantidadV = 0;

    while ($row = mysqli_fetch_array($rConsultaA)) {
        $cantidadA = $cantidadA + 1;
    }
    while ($row = mysqli_fetch_array($rConsultaV)) {
        $cantidadV = $cantidadV + 1;
    }

    if ($cantidadA == 0 && $cantidadV == 0) {
        $i = array(
            'login' => false,
            'mensaje' => "No se encuentra registrado ningun usuario con esas credenciales"
        );
        array_push($resp, $i);
    }
    if ($cantidadA != 0) {
        $i = array(
            'login' => true,
            'mensaje' => "Administrador"
        );
        array_push($resp, $i);
    }
    if ($cantidadV != 0) {
        $i = array(
            'login' => true,
            'mensaje' => "Voluntario"
        );
        array_push($resp, $i);
    }

    echo json_encode($resp);
}
