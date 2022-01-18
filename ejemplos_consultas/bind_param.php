<?php
    $mysqli = new mysqli("localhost", "manolo", "1234ae", "futbol");

    /* verificar conexión */
    if (mysqli_connect_errno()) {
        printf("Error de conexión: %s\n", mysqli_connect_error());
        exit();
    }

    $stmt = $mysqli->prepare("INSERT INTO registros VALUES (?, ?, ?, ?)");
    $stmt->bind_param('sssd', $codigo, $goleador, $dorsal, $goles);

    $codigo = 'RM';
    $goleador = 'Benzema';
    $dorsal = 9;
    $goles = 12;


    $stmt->execute();

    printf("%d Fila insertada.\n", $stmt->affected_rows);

    $stmt->close();

    $mysqli->query("DELETE FROM registros WHERE goleador='Benzema'");
    printf("%d Fila borrada.\n", $mysqli->affected_rows);

    $mysqli->close();
?>