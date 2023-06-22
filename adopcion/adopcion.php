<?php
include '../conexion.php';

if ((isset($_GET['campo']))) {
    $campo = $_GET['campo'];

    $consulta = "SELECT *
                 FROM adopcion
                 INNER JOIN mascota ON adopcion.id_mascota = mascota.id_mascota
                 WHERE adopcion.nombre_adopt LIKE '%$campo%' || adopcion.ci_adopt LIKE '%$campo%'";

    $resultado_consulta = mysqli_query($conn, $consulta);

    if (!$resultado_consulta) {
        die("Consulta fallida");
    }

    $resultado = array();

    while ($row = mysqli_fetch_array($resultado_consulta)) {
      $item = array(
         'id_adopcion' => $row['id_adopcion'],
         'id_voluntario' => $row['id_voluntario'],
         'id_mascota' => $row['id_mascota'],
         'nombre_adopt' => $row['nombre_adopt'],
         'ci_adopt' => $row['ci_adopt'],
         'telefono_adopt' => $row['telefono_adopt'],
         'direccion_adopt' => $row['direccion_adopt'],
         'fecha_adopcion' => $row['fecha_adopcion'],
         'nombre' => $row['nombre'],
         'tipo' => $row['tipo'],
         'vacunado' => $row['vacunado'],
         'desparacitado' => $row['desparacitado'],
         'esterilizado' => $row['esterilizado'],
         'sexo' => $row['sexo'],
         'color' => $row['color'],
         'madurez' => $row['madurez'],
         'long_pelaje' => $row['long_pelaje'],
         'fecha_nacimiento' => $row['fecha_nacimiento'],
         'foto' => $row['foto'],
         'fecha_ingreso' => $row['fecha_ingreso'],
         'fecha_salida' => $row['fecha_salida'],
         'tiempo_adopcion' => $row['tiempo_adopcion']
      );
      array_push($resultado, $item);
    }
    echo json_encode($resultado);
}