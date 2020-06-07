<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgregarPersona</title>
</head>
<body>
    <?php

    //incluir conexión a la base de datos
    include 'conexionBD.php';
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;

    //Ingresar los campos la base de datos 
    $sql = "INSERT INTO clientes VALUES (0, '$cedula', '$nombres', '$direccion','$telefono')";
    $sql2 = "SELECT * FROM clientes WHERE cli_cedula='$cedula'";
    $result = $conn->query($sql2);
    if($result->num_rows > 0){
        echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
    }else {
        if ($conn->query($sql) === TRUE) {
            header("location:../index.html");
        }
    }
 //cerrar la base de datos
    $conn->close();
    ?>
    
</body>
</html>