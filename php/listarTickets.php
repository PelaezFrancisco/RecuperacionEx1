<!DOCTYPE html>
<html>
<head>
    <title>Listar Tickets</title>
    <meta charset="utf-8"/>
    <meta name="keywords" content="Tickets Parqueo" />
    <link rel="stylesheet" type="text/css" href="../css/diseno.css">
    <script src="../javascript/formulario.js" type="text/javascript" ></script>
</head>

<body>
    <header > 
            <div>
                <img src="../images/logo.png" alt="Imagen de Portada" class="logo">
            </div> 
    </header>
    <nav>
        <ul class="menu">
            <a href="../index.html" target="_blank">Inicio</a>
            <a href="../docs/agregarPersona.html" target="_blank">Agregar Persona</a>
            <a href="../docs/agregarTicket.php" target="_blank">Agregar de Ticket</a>
            <a href="../php/listarTickets.php" target="_blank">Listar Tickets</a>
            <a href="../index.html" target="_blank">Buscar Personas</a>
        </ul>
    </nav>
    <section class="secc">
        <!--
            <form id="formulario01" method="POST" action="../controladores/crear_usuario.php" ></form>
        -->
        <div class="secc1">
            
            <table class="tabla">
                <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Ticket</th>
                <th>Ingreso</th>
                <th>Salida</th>
                </tr>
                <?php

                include 'conexionBD.php';
                $sql = "SELECT * FROM clientes, vehiculos, tickets WHERE clientes.cli_codigo=vehiculos.veh_cli_codigo 
                AND vehiculos.veh_codigo=tickets.tic_veh_codigo";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row['cli_cedula'] . "</td>";
                    echo " <td>" . $row['cli_nombres'] ."</td>";
                    echo " <td>" . $row['cli_direccion'] . "</td>";
                    echo " <td>" . $row['cli_telefono'] . "</td>";
                    echo " <td>" . $row['veh_marca'] . "</td>";
                    echo " <td>" . $row['veh_modelo'] . "</td>";
                    echo " <td>" . $row['veh_placa'] . "</td>";
                    echo " <td>" . $row['tic_codigo'] . "</td>";
                    echo " <td>" . $row['tic_ingreso'] . "</td>";
                    echo " <td>" . $row['tic_salida'] . "</td>";
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
        </div>

        
</section>

<footer>
    <div class="secc5">
        <div class="secc51">
        <div class="info">
                <h3>Estudiante</h3>
                <p>&#8226; Nombre: Juan Francisco Pelaez Becerra </p><br>
                <p>&#8226; Universidad Polit&eacute;cnica Salesiana </p><br>
                <p>&#8226; Email: <a href="mailto:jpelaezb1@est.ups.edu.ec">jpelaezb1@est.ups.edu.ec</a></p><br>
                <p>&#8226; Call: <a href="tel:+593939082637">(593) 0939082637</a></p><br>
                <p>&#169;Todos los derechos reservados</p>
            </div>
        </div>
    </div>
            
</footer>
 
</body>
</html>