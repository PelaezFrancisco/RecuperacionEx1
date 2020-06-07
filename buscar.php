<?php
 //incluir conexión a la base de datos
 include "php/conexionBD.php";
 $cedula = $_GET['cedula'];

 $sql = "SELECT * FROM clientes WHERE cli_cedula=$cedula";
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 <th style='color:black'>Cedula</th>
 <th style='color:black'>Nombre</th>
 <th style='color:black'>Direccion</th>
 <th style='color:black'>Telefono</th>
 </tr>";
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {

 echo "<tr>";
 echo " <td style='color:black' >" . $row['cli_cedula'] . "</td>";
 echo " <td style='color:black' >" . $row['cli_nombres'] . "</td>";
 echo " <td style='color:black' >" . $row['cli_direccion'] ."</td>";
 echo " <td style='color:black' >" . $row['cli_telefono'] ."</td>";
 echo "</tr style='color:black'>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='4'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "</table>";
 $conn->close(); 