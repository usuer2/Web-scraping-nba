<?php
include('includes/conexion.php');
include('includes/initializer.php');

$resultados_por_pagina = 25;

$query_total = "SELECT COUNT(id) AS total FROM cursos_proteccion_de_datos WHERE ". $column;
$result_total = mysqli_query($conn, $query_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_resultados = $row_total['total'];

$total_paginas = ceil($total_resultados / $resultados_por_pagina);

if (!isset($_GET['page'])) {
    $pagina = 1;
} else {
    $pagina = $_GET['page'];

    if ($pagina < 1 || $pagina > $total_paginas) {
        header("HTTP/1.0 404 Not Found");
        exit;
    }
}

$indice_inicio = ($pagina - 1) * $resultados_por_pagina;

$query_resultados = "SELECT * FROM cursos_proteccion_de_datos WHERE " . $column . " LIMIT $indice_inicio,
    $resultados_por_pagina";
$result = mysqli_query($conn, $query_resultados);
// echo " " . $query_resultados
?>

    