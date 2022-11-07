<?php
include '../conexion.php';

if ((isset($_GET['id']))) {
    $idVoluntario = $_GET['id'];

    $consulta = "SELECT * FROM voluntario WHERE id_voluntario = '$idVoluntario'";

    $resultado_consulta = mysqli_query($conn, $consulta);

    if (!$resultado_consulta) {
        die("Consulta fallida");
    }

    $resultado = array();

    while ($row = mysqli_fetch_array($resultado_consulta)) {
        $item = array(
            'id_voluntario' => $row['id_voluntario'],
            'ci' => $row['ci'],
            'nombre' => $row['nombre'],
            'apellido_paterno' => $row['apellido_paterno'],
            'apellido_materno' => $row['apellido_materno'],
            'telefono' => $row['telefono'],
            'email' => $row['email'],
            'sexo' => $row['sexo'],
            'direccion' => $row['direccion'],
            'fecha_nacimiento' => $row['fecha_nacimiento'],
            'foto' => $row['foto'],
            'contrasenia' => $row['contrasenia'],
            'pregunta_recuperacion' => $row['pregunta_recuperacion'],
            'respuesta_recuperacion' => $row['respuesta_recuperacion']
        );
        array_push($resultado, $item);
    }
    echo json_encode($resultado);
}
