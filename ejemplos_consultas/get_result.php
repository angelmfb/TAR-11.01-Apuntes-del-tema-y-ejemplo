<?php 
    $mysqli = new mysqli("localhost", "manolo", "1234ae", "futbol"); 

    if($mysqli->connect_error)
    {
        die("$mysqli->connect_errno: $mysqli->connect_error");
    }

    $consulta = "SELECT goleador, dorsal, codigo FROM registros WHERE goleador=? ORDER BY Name LIMIT 1";

    $sentencia = $mysqli->stmt_init();
    if(!$sentencia->prepare($consulta))
    {
        print "Error falló el prepare\n";
    }
    else
    {
        $sentencia->bind_param("z", $goleador);

        $array_goleador = array('Benzema','Juanmi','Vinicius','Depay');

        foreach($array_goleador as $goleador)
        {
            $sentencia->execute();
            $resultado = $sentencia->get_result();
            while ($fila = $resultado->fetch_array(MYSQLI_NUM))
            {
                foreach ($fila as $f)
                {
                    print "$f ";
                }
                print "\n";
            }
        }
    }

    $sentencia->close();
    $mysqli->close();
?>