<?php include('includes/conexion.php'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="【 EQUIPOS NBA TEMPORADA 24/25 】" />
    <meta name="author" content="<?php echo $domain ?>" />
    <meta name="Keywords" content="EQUIPOS NBA TEMPORADA 24/25" />
    <meta name="googlebot" content="all" />
    <meta name="googlebot" content="index" />
    <meta name="googlebot" content="follow" />
    <meta name="robots" content="all" />
    <meta name="robots" content="index" />
    <meta name="robots" content="follow" />
    <meta name="robots" content="index,follow">
    <meta http-equiv="Content-Language" content="es" />
    <title>EQUIPOS NBA TEMPORADA 24/25</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="css/styles.css">

    <?php include('cookies.php'); ?>
    <?php $idDivision = $_GET['id']; ?>
</head>

<style>
    body {
        background-image: url('../../images/Encabezadp.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>


<body>
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">EQUIPOS NBA TEMPORADA 24/25</h1>
                <p class="lead fw-normal text-white-50 mb-0">EQUIPOS NBA TEMPORADA 24/25</p>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <?php
                $sql = "SELECT * from equipos WHERE Division = $idDivision";
                $result = mysqli_query($conn, $sql);
                $root = "";

                while ($row = mysqli_fetch_array($result)) {
                    echo '
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img id="imagen-logo" class="imagen-logo" src="' . $root . '../../../scraping-nba/images/' . $row['apodo'] . '.png" alt="equipo NBA ' . $row['Nombre'] . '"/>
                            <br>';


                    //------------------------------------- Estrellas de puntuación de equipo -------------------------------------------------
                    //-------------------------------------------------------------------------------------------------------------------------      

                    // Calcular el salario total para el equipo
                    $sqlSalario = "SELECT SUM(salario) AS PrecioTotal FROM datos_jugadores WHERE Equipo = '" . $row['Nombre'] . "'";
                    $resultSalario = mysqli_query($conn, $sqlSalario);
                    $rowSalario = mysqli_fetch_assoc($resultSalario);

                    // Mostrar estrellas según el salario total
                    if ($rowSalario['PrecioTotal'] >= 162940263 && $rowSalario['PrecioTotal'] < 193097310) {
                        echo '
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <p class="Pplantilla">Valor de plantilla: </p>
                                <br>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>';
                    } elseif ($rowSalario['PrecioTotal'] <= 193097310) {
                        echo '
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <p class="Pplantilla">Valor de plantilla: </p>
                                <br>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>';
                    } else {
                        echo '
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <p class="Pplantilla">Valor de plantilla: </p>
                                <br>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>';
                    }

                    echo '
                        <!-- Product actions -->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a id="' . $row['id'] . '" class="Botones" href="/scraping-nba/Este/Atlantico/Plantilla/' . urlencode($row['apodo']) . '">Seleccionar equipo</a>
                            </div>
                        </div>
                    </div>
                </div>';
                }
                ?>
            </div>
        </div>
    </section>
</body>

</html>