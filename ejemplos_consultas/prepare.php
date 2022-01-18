<?php
    $mysqli = new mysqli("localhost", "manolo", "1234ae", "futbol");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $equipo = "betis";

    /* crear una sentencia preparada */
    if ($stmt = $mysqli->prepare("SELECT jugador FROM equipos WHERE Name=?")) {

        $stmt->bind_param("s", $equipo);

        $stmt->execute();

        $stmt->bind_result($jugador);

        $stmt->fetch();

        printf("%s is in jugador %s\n", $equipo, $jugador);

        $stmt->close();
    }

    /* cerrar conexión */
    $mysqli->close();
?>