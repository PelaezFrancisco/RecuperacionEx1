<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Listar Usuarios</title>
    <meta name="keywords" content="Mi Agenda Telefonica" />
    <link rel="stylesheet" type="text/css" href="../css/listar.css">
</head>
<body>
    <header > 
            <div id="logo1">
                <img src="../images/logo.jpg"  width="250" height="150" alt="Imagen de Portada" >
            </div>
    </header>

    <table style="width:100%">
    <tr>
    <th>Cedula</th>
    <th>Nombres</th>
    <th>Direccion</th>
    <th>Telefono</th>
    <th>Correo</th>
    <th>Fecha Nacimiento</th>
    </tr>
    <?php

    include '../../../config/conexionBD.php';
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo " <td>" . $row["usu_cedula"] . "</td>";
        echo " <td>" . $row['usu_nombres'] ."</td>";
        echo " <td>" . $row['usu_apellidos'] . "</td>";
        echo " <td>" . $row['usu_direccion'] . "</td>";
        echo " <td>" . $row['usu_correo'] . "</td>";
        echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
        echo "</tr>";
        }
    } else {

        echo "<tr>";
        echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
        echo "</tr>";
        }

        $conn->close();
    ?>
    </table>
</body>
</html>