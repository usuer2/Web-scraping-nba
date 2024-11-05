<?php include('includes/conexion.php'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="【 CONFERENCIAS NBA TEMPORADA 24/25  】" />
    <meta name="author" content="<?php echo $domain ?>" />
    <meta name="Keywords" content="CONFERENCIAS NBA TEMPORADA 24/25" />
    <meta name="googlebot" content="all" />
    <meta name="googlebot" content="index" />
    <meta name="googlebot" content="follow" />
    <meta name="robots" content="all" />
    <meta name="robots" content="index" />
    <meta name="robots" content="follow" />
    <meta name="robots" content="index,follow">
    <meta http-equiv="Content-Language" content="es" />
    <title>CONFERENCIAS NBA TEMPORADA 24/25</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="../scraping-nba/css/styles.css">

    <?php
    include('cookies.php');
    ?>

</head>
<style>
    body {
        background-image: url('../scraping-nba/images/Encabezadp.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

<body>
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">CONFERENCIAS NBA TEMPORADA 24/25</h1>
                <p class="lead fw-normal text-white-50 mb-0">CONFERENCIAS NBA TEMPORADA 24/25</p>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php
$sql = "SELECT * FROM conferencias";
$result = mysqli_query($conn, $sql);
$root = "";  // Define la raíz del proyecto o deja vacía si es necesario

while ($row = mysqli_fetch_array($result)) {
    // Almacenar el nombre de la conferencia en una variable
    $Conferencia = urlencode($row['Nombre']);
    
    echo '
    <div class="col mb-5">
        <div class="card h-100">
            <img id="imagen-logo" class="imagen-logo" src="' . $root . '../scraping-nba/images/' . $row['Nombre'] . '.png" alt="equipo NBA ' . $row['Nombre'] . '"/>
            <div class="card-body p-4">
                <div class="text-center">
                    <p class="NombreConferencia">' . $row['Nombre'] . '</p>
                </div>
            </div>
            <!-- Product actions -->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                    <a class="Botones" href="' . $Conferencia . '">Seleccionar conferencia</a>
                </div>
            </div>
        </div>
    </div>';
}
?>
