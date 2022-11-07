<?php
include '../conexion.php';

$consulta = "SELECT * FROM adoptante";
$resultado_consulta = mysqli_query($conn, $consulta);

if (!$resultado_consulta) {
	die("Consulta fallida");
}

$resultado = array();

while ($row = mysqli_fetch_array($resultado_consulta)) {
	$item = array(
		'id_adoptante' => $row['id_adoptante'],
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
		'foto_carnet' => $row['foto_carnet'],
		'foto_factura' => $row['foto_factura'],
		'foto_croquis' => $row['foto_croquis'],
		'autoridad_hogar' => $row['autoridad_hogar']
	);
	array_push($resultado, $item);
}
echo json_encode($resultado);
