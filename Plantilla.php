<?php include('includes/conexion.php'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="【 PLANTILLA TEMPORADA 24/25 】" />
    <meta name="author" content="<?php echo $domain ?>" />
    <meta name="Keywords" content="PLANTILLA NBA TEMPORADA 24/25" />
    <meta name="googlebot" content="all" />
    <link rel="canonical" href="<?php echo $root ?>" />
    <meta name="googlebot" content="index" />
    <meta name="googlebot" content="follow" />
    <meta name="robots" content="all" />
    <meta name="robots" content="index" />
    <meta name="robots" content="follow" />
    <meta name="robots" content="index,follow">
    <meta http-equiv="Content-Language" content="es" />

    <title>PLANTILLA NBA TEMPORADA 24/25</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo $root ?>assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="../../../../scraping-nba/css/styles.css">

    <!-- Estilos personalizados -->
    <style>
        body {
        background-image: url('../../../images/Encabezadp.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    </style>

    <?php 
    include('cookies.php');
    include('includes/conexion.php');
    $equipo = $_GET['apodo'];
    ?>
</head>

<body>
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">PLANTILLA NBA TEMPORADA 24/25</h1>
                <p class="lead fw-normal text-white-50 mb-0">PLANTILLA NBA TEMPORADA 24/25</p>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <?php
                    // Consulta para obtener el apodo y seleccionar el logo de la franquicia
                    $sql1 = "SELECT * FROM equipos WHERE apodo = '$equipo'";
                    $result1 = mysqli_query($conn, $sql1);
                    $row = mysqli_fetch_array($result1);
 
                    echo '
                    <div class="card h-100">
                        <h1 class="NombreFranquicia">' . $row["Nombre"] . '</h1> 
                        <br>
                        <img id="imagen-logo" class="imagen-logo" src="' . $root . '../scraping-nba/images/' . $row["apodo"] . '.png" alt="equipo NBA ' . $row["apodo"] . '"/>
                        <br>
                    </div>';

                // Consulta para obtener los jugadores del equipo
                $sql = "SELECT * FROM datos_jugadores WHERE Equipo = '" . $row["id"] . "'";
                $result = mysqli_query($conn, $sql);

                // Mostrar la información de los jugadores
                while ($row = mysqli_fetch_array($result)) {

                    // Consulta para obtener el apodo y seleccionar el logo de la franquicia
                    $sql2 = "SELECT * FROM universidades WHERE id = '$row[Universidad]'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_array($result2);

                    echo '
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="card-body p-4">
                                <div class="Datos-jugadores">
                                    <p class="Nombre">Nombre: ' . $row['Nombre'] . '</p>
                                    <p class="Dorsal">Dorsal: ' . $row['Dorsal'] . '</p>
                                    <p class="Posicion">Posición: ' . $row['Posicion'] . '</p>
                                    <p class="Edad">Edad: ' . $row['Edad'] . ' años</p>
                                    <p class="Estatura">Estatura: ' . $row['Estatura'] . ' cm</p>
                                    <p class="Peso">Peso: ' . $row['Peso'] . ' Kg</p>
                                    <p class="Universidad">Universidad: ' . $row2['Nombre'] . '</p>
                                    <p class="Salario">Salario: $' . $row['Salario'] . '</p>
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