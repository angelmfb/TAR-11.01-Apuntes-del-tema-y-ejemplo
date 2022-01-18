<?php
    $mysqli = new mysqli("localhost", "manolo", "1234ae", "futbol");
    if ($mysqli->connect_errno) {
        echo "Falla la conexión: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!($sentencia = $mysqli->prepare("INSERT INTO equipos(id) VALUES (?)"))) {
        echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    $id = 1;
    if (!$sentencia->bind_param("i", $id)) {
        echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
    }

    if (!$sentencia->execute()) {
        echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
    }

    for ($id = 2; $id < 5; $id++) {
        if (!$sentencia->execute()) {
            echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }
    }

    $sentencia->close();


    $resultado = $mysqli->query("SELECT id FROM test");
    var_dump($resultado->fetch_all());
?>