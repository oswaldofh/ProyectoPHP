<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include("../Control/configBd.php");
include("../Control/ControlProveedor.php");
include("../Control/ControlEmpleado.php");
include("../Control/ControlCliente.php");
include("../Modelo/Proveedor.php");
include("../Modelo/Cliente.php");
include("../Modelo/Empleado.php");
include("../Modelo/Ubicacion.php");
include("../Control/ControlUbicacion.php");



$Nombre = isset($_SESSION['Usu'])  ? $_SESSION['Usu'] : header('Location: ../index.php');
$Tipo = isset($_SESSION['Tipo']) ? $_SESSION['Tipo'] : header('Location: ../index.php');
$tipo = $_POST['ubicacion'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mapa Ubicacion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
    <link rel="stylesheet" href="../CSS/Ubicacion.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
</head>

<body>
  <form class="form-inline" action="VistaUbicacion.php" method="post">
      <div class="container">
         <div class="row">
           <div class="col-sm-3">
          <br>
           <div class="row">
           <nav class='navbar navbar-expand-lg navbar-light bg-light'>
                       <a class='navbar-brand' href='VistaMenu.php'>
                           <img class='d-inline-block align-top' src='../Imagen/IdeaLogo.jpg' width='45' heigth='45'>
                       </a> 

                       <ul class='nav nav-pills'>
                       <li class='nav-item dropdown'>
                          <a  class='nav-link dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' href='#'>Menu</a>
                          
                          <div class='dropdown-menu'>
                       <a class='dropdown-item' href='VistaMenu.php'>Home</a>
                       <div class='dropdown-divider'></div>
                       <a class='dropdown-item' href='VistaCliente.php'>Clientes</a>
                        <div class='dropdown-divider'></div>
                       <a class='dropdown-item' href='VistaProveedor.php'>Proveedores</a>
                        <div class='dropdown-divider'></div>
                       <a class='dropdown-item' href='VistaEmpleado.php'>Empleados</a>
                         <div class='dropdown-divider'></div>
                       <a class='dropdown-item' href='VistaUsuario.php'>Usuarios</a>
                       <div class='dropdown-divider'></div>
                       <a class='dropdown-item' href='cerrarSesion.php'>Cerrar Session</a>
                    </div>
                       </li>
                           
                     </ul>
                  </nav>
           </div>
           <br/>
                     
              <div class="row">
                   <div class="col">
                       <!--<label class="my-1 mr-2" for="">Opciones: </label>-->
                        <select class="custom-select mr-sm-2" name="ubicacion" id="ubi">
                           <option value="empleado">Empleado</option>
                           <option value="cliente">Cliente</option>
                           <option value="proveedor">Proveedor</option>
                           <option value="todos" >Todos</option>
                        </select>
                        
                        <input class="btn btn-primary" type="submit" name="btn" value="Consultar">
                   </div>
              </div>
           </div>
          
           <div class="col">
           <br/>
              <div id="mapid" style="width: 100%; height: 350%;"></div>
           </div>
         </div>
      </div>

      <script>
            var mymap = L.map('mapid').setView([6.2518401, -75.563591], 10); //donde inicia

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/navigation-preview-night-v4',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap);

            <?php
            if ($tipo == 'proveedor') {
                $objProveedor = new Proveedor('', '', '', '', '', '', '', '', '', '', '', '');
                $objProveedor = new ControlProveedor($objProveedor);
                $proveedores = $objProveedor->consultarTodos();

                foreach ($proveedores as $row) {
                    $lat = stripslashes($row['latProveedor']);
                    $lon = stripcslashes($row['lonProveedor']);
                    $nom = stripcslashes($row['nomProveedor']);
                    $fec = stripcslashes($row['fechaRegistro']);
                    $eml = stripcslashes($row['emailProveedor']);
                    $tel = stripcslashes($row['telefonoProveedor']);

            ?>
                    L.marker([<?php echo $lat ?>, <?php echo $lon ?>])
                        .bindPopup("<b><?php echo $nom ?>.<br>Tel: <?php echo $tel ?> <br><?php echo $eml ?>.<br>FecReg: <?php echo $fec ?>")
                        .addTo(mymap);
                <?php
                }
            } else if ($tipo == 'cliente') {
                $objCliente = new Cliente('', '', '', '', '', '', '', '', '', '', '', '');
                $objCtrCliente = new ControlCliente($objCliente);
                $clientes = $objCtrCliente->consultarTodos();

                foreach ($clientes as $row) {
                    $lat = stripslashes($row['latCliente']);
                    $lon = stripcslashes($row['lonCliente']);
                    $nom = stripcslashes($row['nomCliente']);
                    $fec = stripcslashes($row['fechaRegistro']);
                    $eml = stripcslashes($row['emailCliente']);
                    $tel = stripcslashes($row['telefonoCliente']);

                ?>
                    L.marker([<?php echo $lat ?>, <?php echo $lon ?>])
                        .bindPopup("<b><?php echo $nom ?>.<br>Tel: <?php echo $tel ?> <br><?php echo $eml ?>.<br>FecReg: <?php echo $fec ?>")
                        .addTo(mymap);
                <?php
                }
            } else if ($tipo == "empleado") {
                $objEmpleado = new Empleado('', '', '', '', '', '', '', '', '', '', '', '');
                $objCtrEmpleado = new ControlEmpleado($objEmpleado);
                $empleados = $objCtrEmpleado->ConsultarTodos();

                foreach ($empleados as $row) {
                    $lat = stripslashes($row['latEmpleado']);
                    $lon = stripcslashes($row['lonEmpleado']);
                    $nom = stripcslashes($row['nomEmpleado']);
                    $fec = stripcslashes($row['fechaIngreso']);
                    $eml = stripcslashes($row['emailEmpleado']);
                    $tel = stripcslashes($row['celular']);

                ?>
                    L.marker([<?php echo $lat ?>, <?php echo $lon ?>])
                        .bindPopup("<b><?php echo $nom ?>.<br>Tel: <?php echo $tel ?> <br><?php echo $eml ?>.<br>FecReg: <?php echo $fec ?>")
                        .addTo(mymap);
                <?php
                }
            } else if ($tipo == "todos") {
                $objUbicacion = new Ubicacion('', '', '', '', '', '');
                $objCtrUbicacion = new ControlUbicacion($objUbicacion);
                $ubicaciones = $objCtrUbicacion->consultartodo();


                foreach ($ubicaciones as $row) {
                    $lat = stripslashes($row['latitud']);
                    $lon = stripcslashes($row['longitud']);
                    $nom = stripcslashes($row['nombre']);
                    $fec = stripcslashes($row['fecha']);
                    $eml = stripcslashes($row['email']);
                    $tel = stripcslashes($row['telefono']);

                ?>
                    L.marker([<?php echo $lat ?>, <?php echo $lon ?>])
                        .bindPopup("<b><?php echo $nom ?>.<br>Tel: <?php echo $tel ?> <br><?php echo $eml ?>.<br>FecReg: <?php echo $fec ?>")
                        .addTo(mymap);
            <?php
                }
            }

            ?>
        </script>
  </form>


    <!--<form action="VistaUbicacion.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <label for="ubi">Opciones:</label>
                    <select name="ubicacion" id="ubi">
                        <option value="empleado">Empleado</option>
                        <option value="cliente">Cliente</option>
                        <option value="proveedor">Proveedor</option>
                        <option value="todos" >Todos</option>
                    </select>
                    <input type="submit" name="btn" value="Cambiar">
                </div>
                <div class="col-sm-10">
                    <div id="mapid" style="width: 100%; height: 1000%;"></div>
                </div>
            </div>
        </div>
        <script>
            var mymap = L.map('mapid').setView([6.2518401, -75.563591], 10); //donde inicia

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/navigation-preview-night-v4',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap);

            <?php
            if ($tipo == 'proveedor') {
                $objProveedor = new Proveedor('', '', '', '', '', '', '', '', '', '', '', '');
                $objProveedor = new ControlProveedor($objProveedor);
                $proveedores = $objProveedor->consultarTodos();

                foreach ($proveedores as $row) {
                    $lat = stripslashes($row['latProveedor']);
                    $lon = stripcslashes($row['lonProveedor']);
                    $nom = stripcslashes($row['nomProveedor']);
                    $fec = stripcslashes($row['fechaRegistro']);
                    $eml = stripcslashes($row['emailProveedor']);
                    $tel = stripcslashes($row['telefonoProveedor']);

            ?>
                    L.marker([<?php echo $lat ?>, <?php echo $lon ?>])
                        .bindPopup("<b><?php echo $nom ?>.<br>Tel: <?php echo $tel ?> <br><?php echo $eml ?>.<br>FecReg: <?php echo $fec ?>")
                        .addTo(mymap);
                <?php
                }
            } else if ($tipo == 'cliente') {
                $objCliente = new Cliente('', '', '', '', '', '', '', '', '', '', '', '');
                $objCtrCliente = new ControlCliente($objCliente);
                $clientes = $objCtrCliente->consultarTodos();

                foreach ($clientes as $row) {
                    $lat = stripslashes($row['latCliente']);
                    $lon = stripcslashes($row['lonCliente']);
                    $nom = stripcslashes($row['nomCliente']);
                    $fec = stripcslashes($row['fechaRegistro']);
                    $eml = stripcslashes($row['emailCliente']);
                    $tel = stripcslashes($row['telefonoCliente']);

                ?>
                    L.marker([<?php echo $lat ?>, <?php echo $lon ?>])
                        .bindPopup("<b><?php echo $nom ?>.<br>Tel: <?php echo $tel ?> <br><?php echo $eml ?>.<br>FecReg: <?php echo $fec ?>")
                        .addTo(mymap);
                <?php
                }
            } else if ($tipo == "empleado") {
                $objEmpleado = new Empleado('', '', '', '', '', '', '', '', '', '', '', '');
                $objCtrEmpleado = new ControlEmpleado($objEmpleado);
                $empleados = $objCtrEmpleado->ConsultarTodos();

                foreach ($empleados as $row) {
                    $lat = stripslashes($row['latEmpleado']);
                    $lon = stripcslashes($row['lonEmpleado']);
                    $nom = stripcslashes($row['nomEmpleado']);
                    $fec = stripcslashes($row['fechaIngreso']);
                    $eml = stripcslashes($row['emailEmpleado']);
                    $tel = stripcslashes($row['celular']);

                ?>
                    L.marker([<?php echo $lat ?>, <?php echo $lon ?>])
                        .bindPopup("<b><?php echo $nom ?>.<br>Tel: <?php echo $tel ?> <br><?php echo $eml ?>.<br>FecReg: <?php echo $fec ?>")
                        .addTo(mymap);
                <?php
                }
            } else if ($tipo == "todos") {
                $objUbicacion = new Ubicacion('', '', '', '', '', '');
                $objCtrUbicacion = new ControlUbicacion($objUbicacion);
                $ubicaciones = $objCtrUbicacion->consultartodo();


                foreach ($ubicaciones as $row) {
                    $lat = stripslashes($row['latitud']);
                    $lon = stripcslashes($row['longitud']);
                    $nom = stripcslashes($row['nombre']);
                    $fec = stripcslashes($row['fecha']);
                    $eml = stripcslashes($row['email']);
                    $tel = stripcslashes($row['telefono']);

                ?>
                    L.marker([<?php echo $lat ?>, <?php echo $lon ?>])
                        .bindPopup("<b><?php echo $nom ?>.<br>Tel: <?php echo $tel ?> <br><?php echo $eml ?>.<br>FecReg: <?php echo $fec ?>")
                        .addTo(mymap);
            <?php
                }
            }

            ?>
        </script>
    </form>-->
</body>

</html>