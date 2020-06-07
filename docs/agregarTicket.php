<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8"> 
 <title>Agregar Tickets</title>
 <link rel="stylesheet" type="text/css" href="../css/diseno.css">
 <script src="../../../javascript/formulario.js" type="text/javascript" ></script>
</head>
<body>
<header >
        <div id="encabezado">  
            <div id="logo1">
            <a href="../index.html" ><img src="../images/logo.png" alt="Imagen de Portada" class="logo"></a>
            </div>
        </div>  
</header>
    <nav>
        <ul class="menu">
            <a href="../index.html" target="_blank">Inicio</a>
            <a href="../docs/agregarPersona.html" target="_blank">Agregar Persona</a>
            <a href="agregarTicket.php" target="_blank">Agregar de Ticket</a>
            <a href="../php/listarTickets.php" target="_blank">Listar Tickets</a>
            <a href="../index.php" target="_blank">Buscar Personas</a>
        </ul>
    </nav>
 
<section class="secciones">
    <div class="secc1">
        <div class="secc11">
            <form id="formulario" method="POST"  action="../php/agregarVehiculo.php">
                <h2> Agregar Ticket</h2>
                <label for="tcedula">Cedula: </label>
                <br>
                <input type="text" id="cedula" name="cedula"  required placeholder="Ingrese la Cedula ..." onkeyup="validarCedula(this)"/>
                <br>
                <label for="tplaca">Placa: </label>
                <br>
                <input type="text" name="placa" id="placa" required placeholder="Ingrese la Placa ..." />
                <br>
                <label for="tmarca">Marca:</label>
                <br>
                <input type="text" id="marca" name="marca" required placeholder="Ingrese el tipo de celular ..." onkeyup="validarLetras(this)"/>
                <br>
                <label for="tmodelo">Modelo: </label>
                <br>
                <input type="text" name="modelo" id="modelo" required placeholder="Ingrese el modelo ..."onkeyup="validarLetras(this)"/>
                <br>
                <label for="tingreso">Fecha y Hora de Entrada:</label>
                <br>
                <input type="datetime-local" id="ingreso" name="ingreso" required placeholder="Ingrese fecha y hora de entrada ..."/>
                <br>
                <label for="tsalida">Fecha y Hora de Salida:</label>
                <br>
                <input type="datetime-local" id="salida" name="salida" required placeholder="Ingrese la fecha y hora de salida ..."/>
                <br>
                <br>
                <input type="submit" id="agregar" name="agregar" value="Agregar" />
                <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
            </form>
        </div>

    </div>

 </section >
 <footer>
    <div class="secc5">
        <div class="secc51">
        <h2>Estudiante</h2>
            <div class="info">
                
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