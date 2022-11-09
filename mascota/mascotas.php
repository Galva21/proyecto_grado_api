<?php
include '../conexion.php';

$consulta = "SELECT * FROM mascota";
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
		'desparacitado' => $row['desparacitado'],
		'esterilizado' => $row['esterilizado'],
		'raza' => $row['raza'],
		'sexo' => $row['sexo'],
		'color' => $row['color'],
		'madurez' => $row['madurez'],
		'descripcion' => $row['descripcion'],
		'fecha_nacimiento' => $row['fecha_nacimiento'],
		'foto' => $row['foto'],
		'fecha_ingreso' => $row['fecha_ingreso'],
		'fecha_salida' => $row['fecha_salida'],
		'tiempo_adopcion' => $row['tiempo_adopcion'],
	);
	array_push($resultado, $item);
}
echo json_encode($resultado);
