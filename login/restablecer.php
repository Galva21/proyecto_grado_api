<?php
include '../conexion.php';

if ((isset($_POST['usuario']) && isset($_POST['respuesta']) && isset($_POST['contrasenia'])) || $_SERVER['REQUEST_METHOD'] == "POST") {

    $usuario = "";
    $respuesta = "";
    $nuevaContra = "";

    try {
        $usuario = $_POST['usuario'];
        $respuesta = $_POST['respuesta'];
        $nuevaContra = $_POST['contrasenia'];
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

    $consultaV = "SELECT * FROM voluntario WHERE id_voluntario ='" . $usuario . "'";
    $consultaA = "SELECT * FROM administrador WHERE id_administrador='" . $usuario . "'";

    $rConsultaA = mysqli_query($conn, $consultaA);
    $rConsultaV = mysqli_query($conn, $consultaV);

    if (!$rConsultaA && !$rConsultaV) {
        die("Consulta fallida");
    }

    $resp = array();

    $cantidadA = 0;
    $respuestaA = "";

    $cantidadV = 0;
    $respuestaV = "";

    while ($row = mysqli_fetch_array($rConsultaA)) {
        $cantidadA = $cantidadA + 1;
        $respuestaA = $row["respuesta_recuperacion"];
    }
    while ($row = mysqli_fetch_array($rConsultaV)) {
        $cantidadV = $cantidadV + 1;
        $respuestaV = $row["respuesta_recuperacion"];
    }

    if ($cantidadA == 0 && $cantidadV == 0) {
        $i = array(
            'salida' => false,
            'mensaje' => "No se encuentra registrado ningun usuario con esas credenciales"
        );
        array_push($resp, $i);
    }
    if ($cantidadA != 0) {
        if ($respuestaA == $respuesta) {
            $c = "UPDATE administrador SET contrasenia = '" . $nuevaContra . "' WHERE id_administrador = '" . $usuario . "'";
            $r = mysqli_query($conn, $c);
            if ($r) {
                $i = array(
                    'salida' => true,
                    'mensaje' => "Se restablecio la contraseña del administrador"
                );
                array_push($resp, $i);
            }
        } else {
            $i = array(
                'salida' => false,
                'mensaje' => "La respuesta es incorrecta",
            );
            array_push($resp, $i);
        }
    }
    if ($cantidadV != 0) {
        if ($respuestaV == $respuesta) {
            $c = "UPDATE voluntario SET contrasenia = '" . $nuevaContra . "' WHERE id_voluntario = '" . $usuario . "'";
            $r = mysqli_query($conn, $c);
            if ($r) {
                $i = array(
                    'salida' => true,
                    'mensaje' => "Se restablecio la contraseña del voluntario",
                );
                array_push($resp, $i);
            }
        } else {
            $i = array(
                'salida' => false,
                'mensaje' => "La respuesta es incorrecta",
            );
            array_push($resp, $i);
        }
    }

    echo json_encode($resp);
}
