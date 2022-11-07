<?php
include '../conexion.php';

if ((isset($_POST['usuario']))) {

    $usuario = "";

    try {
        $usuario = $_POST['usuario'];
    } catch (\Throwable $th) {}

    $consultaV = "SELECT * FROM voluntario WHERE id_voluntario ='" . $usuario . "'";
    $consultaA = "SELECT * FROM administrador WHERE id_administrador='" . $usuario . "'";

    $rConsultaA = mysqli_query($conn, $consultaA);
    $rConsultaV = mysqli_query($conn, $consultaV);

    if (!$rConsultaA && !$rConsultaV) {
        die("Consulta fallida");
    }

    $resp = array();
    $cantidadA = 0;
    $cantidadV = 0;
    $pregunta = "";

    while ($row = mysqli_fetch_array($rConsultaA)) {
        $cantidadA = $cantidadA + 1;
        $pregunta = $row['pregunta_recuperacion'];
    }
    while ($row = mysqli_fetch_array($rConsultaV)) {
        $cantidadV = $cantidadV + 1;
        $pregunta = $row['pregunta_recuperacion'];
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
            'mensaje' => "Administrador",
            'pregunta' => $pregunta
        );
        array_push($resp, $i);
    }
    if ($cantidadV != 0) {
        $i = array(
            'login' => true,
            'mensaje' => "Voluntario",
            'pregunta' => $pregunta
        );
        array_push($resp, $i);
    }

    echo json_encode($resp);
}
