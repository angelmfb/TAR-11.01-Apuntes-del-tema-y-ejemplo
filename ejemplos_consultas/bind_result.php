<?php
    $mysqli = new mysqli("localhost", "manolo", "1234ae", "futbol");

    if (mysqli_connect_errno()) {
        printf("Falló la conexión: %s\n", mysqli_connect_error());
        exit();
    }

    if ($sentencia = $mysqli->prepare("SELECT goleador, dorsal FROM registros ORDER BY Name LIMIT 5")) {
        $sentencia->execute();

        $sentencia->bind_result($col1, $col2);

        while ($sentencia->fetch()) {
            printf("%s %s\n", $col1, $col2);
        }
        $sentencia->close();
    }
    $mysqli->close();
?>