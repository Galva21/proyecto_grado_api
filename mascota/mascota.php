<?php
include '../conexion.php';

if ((isset($_GET['id']))) {
    $idMascota = $_GET['id'];

    $consulta = "SELECT * FROM mascota WHERE id_mascota = '$idMascota'";

    $resultado_consulta = mysqli_query($conn, $consulta);

    if (!$resultado_consulta) {
        die("Consulta fallida");
    }

    $resultado = array();

    while ($row = mysqli_fetch_array($resultado_consulta)) {
        $item = array(
            'id_mascota' => $row['id_mascota'],
            'nombre' => $row['nombre'],
            'tipo' => $row['tipo'],
            'vacunado' => $row['vacunado'],
            'esterilizado' => $row['esterilizado'],
            'raza' => $row['raza'],
            'sexo' => $row['sexo'],
            'color' => $row['color'],
            'descripcion' => $row['descripcion'],
            'fecha_nacimiento' => $row['fecha_nacimiento'],
            'foto' => $row['foto'],
            'fecha_ingreso' => $row['fecha_ingreso'],
            'fecha_salida' => $row['fecha_salida'],
        );
        array_push($resultado, $item);
    }
    echo json_encode($resultado);
}
