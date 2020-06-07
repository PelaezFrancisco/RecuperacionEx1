<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Capitulos</title>
</head>
<body>
    <?php

    //incluir conexión a la base de datos
    include 'conexionBD.php';
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $placa = isset($_POST["placa"]) ? mb_strtoupper(trim($_POST["placa"]), 'UTF-8') : null;
    $marca = isset($_POST["marca"]) ? mb_strtoupper(trim($_POST["marca"]), 'UTF-8') : null;
    $modelo = isset($_POST["modelo"]) ? trim($_POST["modelo"]): null;
    $ingreso = isset($_POST["ingreso"]) ? trim($_POST["ingreso"]): null;
    $salida = isset($_POST["salida"]) ? trim($_POST["salida"]): null;

    //Sacamos el cli_codigo
    $sqlCli = "SELECT cli_codigo FROM clientes WHERE cli_cedula='$cedula'";
    $resultCli = $conn->query($sqlCli);

    //Insertamos el vehiculo
    if($resultCli->num_rows > 0){
        while($rowCli = $resultCli->fetch_assoc()){
            $codcli =$rowCli["cli_codigo"];
            $sqlVeh = "INSERT INTO vehiculos VALUES (0, '$codcli', '$placa', '$marca',UPPER('$modelo'))";
            $resultVeh = $conn->query($sqlVeh);
        }

    
    }else{
        
    }

    //Sacamos el veh_codigo
    $sqlV2 = "SELECT veh_codigo FROM vehiculos WHERE veh_placa='$placa'";
    $resultV2 = $conn->query($sqlV2);
    if ($resultV2->num_rows > 0) {
        //Insertamos el ticket
        while($rowV2 = $resultV2->fetch_assoc()){
            $codV2 =$rowV2["veh_codigo"];
            $sqlTic = "INSERT INTO tickets VALUES (0, '$codV2', '$ingreso', '$salida')";
            $resultTic = $conn->query($sqlTic);
        }
    }else{
        echo "<p class='error'> La cedula no existe </p>"; 
        header("location:../docs/agregarTicket.php");
    }
    $conn->close();
    header("location:../index.html");
    ?>
    
</body>
</html>