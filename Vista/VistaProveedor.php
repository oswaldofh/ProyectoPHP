<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
include("../Control/configBd.php");
include("../Control/ControlProveedor.php");
include("../Modelo/Proveedor.php");
include("../Modelo/Notificacion.php");
include("../Control/ControlNotificacion.php");


$Nombre = isset($_SESSION['Usu'])  ? $_SESSION['Usu'] : header('Location: ../index.php');
$Tipo = isset($_SESSION['Tipo']) ? $_SESSION['Tipo'] : header('Location: ../index.php');


if ($Tipo == 'administrador') {
    $bot = $_POST["btn"];

    try {

        //proceso foto
        $nomf = $_FILES['foto']['name']; //obtiene el nombre
        $Archf = $_FILES['foto']['tmp_name']; //contiene el archivo
        $rutf = "../Imagen/Proveedores"; //ruta donde se guardara 
        $rutaf = $rutf . "/" . $nomf; //imagen/img.jpg Ruta a aguardar
        if($nomf==""){
            $rutaf="";
        }else{
        move_uploaded_file($Archf, $rutaf);
        }

        $codP = $_POST['txtCodigoP'];
        $nomP = $_POST['txtNombreP'];
        $tipP = $_POST['Tipo'];
        $feReP = $_POST['fechaReg'];
        $feInP = $_POST['fechaIn'];
        $fotP = $rutaf;
        $emalP = $_POST['Email'];
        $telP = $_POST['Fijo'];
        $estP = $_POST['Estado'];
        $latP = $_POST['Latitud'];
        $lonP = $_POST['Longitud'];
        $bot = $_POST['Boton'];

        if ($bot == 'Guardar') {
            $objProveedor = new Proveedor($codP, $nomP, $tipP, $feReP, $feInP, $fotP, $emalP, $telP, $estP, $latP, $lonP);
            $objCtrProveedor = new ControlProveedor($objProveedor);
            if ($msj = $objCtrProveedor->guardarProveedor()) {
                echo "<script>alert('" . $msj . "');</script>";
                $codP = "";
                $nomP = "";
                $tipo = "";
                $feReP = "";
                $feInP = "";
                $fotP = "";
                $emalP = "";
                $telP = "";
                $latP = "";
                $lonP = "";
            }
        } else if ($bot == 'Modificar') {
            if($fotP==""){
             $objProveedor = new Proveedor($codP, '', '', '', '', '', '', '', '', '', '');
             $objCtrProveedor = new ControlProveedor($objProveedor);
             $objProveedor1 = $objCtrProveedor->consultarProveedor();
             $fotP = $objProveedor1->getImagenProveedor();
            }

            $objProveedor = new Proveedor($codP, $nomP, $tipP, $feReP, $feInP, $fotP, $emalP, $telP, $estP, $latP, $lonP);
            $objCtrProveedor = new ControlProveedor($objProveedor);
            if ($msj = $objCtrProveedor->modificarProveedor()) {
                echo "<script>alert('" . $msj . "');</script>";
            }
            
        } else if ($bot == 'Consultar') {
            $objProveedor = new Proveedor($codP, '', '', '', '', '', '', '', '', '', '');
            $objCtrProveedor = new ControlProveedor($objProveedor);
            $objProveedor1 = $objCtrProveedor->consultarProveedor();
            $codP = $objProveedor1->getCodProveedor();
            $nomP = $objProveedor1->getNomProveedor();
            $tipo = $objProveedor1->getTipoProveedor();
            $feReP = $objProveedor1->getFechaRegistro();
            $feInP = $objProveedor1->getFechaInactivo();
            $fotP = $objProveedor1->getImagenProveedor();
            $emalP = $objProveedor1->getEmailProveedor();
            $telP = $objProveedor1->getTelefonoProveedor();
            $latP = $objProveedor1->getLatitudProveedor();
            $lonP = $objProveedor1->getLongitudProveedor();
            $estado = $objProveedor1->getEstadoProveedor();

            if ($tipo == '1') {
                $tipP = "<option value='1' selected>Juridico</option>
                         <option value='0'>Natural</option>";
            } else {
                $tipP = "<option value='1'>Juridico</option>
                         <option value='0'selected>Natural</option>";
            }

            if ($estado == '1') {
                $estP = "<option value='1' selected>Activo</option>
                         <option value='0'>Inactivo</option>";
            } else {
                $estP = "<option value='1'>Activo</option>
                         <option value='0'selected>Inactivo</option>";
            }
        } else if ($bot == 'Agregar Producto') {
            header("Location: ../Vista/VistaProductoProveedor.php?txtCodigoP=$codP&txtNombreP=$nomP");
        } else if ($bot == 'Nuevo') {
            $codP = "";
            $nomP = "";
            $tipo = "";
            $feReP = "";
            $feInP = "";
            $fotP = "";
            $emalP = "";
            $telP = "";
            $latP = "";
            $lonP = "";
        }
    } catch (Exception $objExp) {
        echo 'Se presentó una excepción: ', $objExp->getMessage(), '\n';
    }

    echo "
<!DOCTYPE html>
<html>
    <head>
    <title>Datos Proveedor</title>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
    <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
     <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
     <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
     <meta charset='UTF-8'>
     <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'>
     <link rel='stylesheet' href='../CSS/Style-Index.css'>
     <link rel='stylesheet' href='../CSS/Proveedor.css'>
    </head>
    <body>
    
    <div class='container'>
    <div class='row'>
        <div class='col-sm-2'>
         <br>
         <br>
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
                <a class='dropdown-item' href='VistaEmpleado.php'>Empleados</a>
                <div class='dropdown-divider'></div>
                <a class='dropdown-item' href='VistaUsuario.php'>Usuarios</a>
                <div class='dropdown-divider'></div>
                <a class='dropdown-item' href='VistaProducto.php'>Productos</a>
                <div class='dropdown-divider'></div>
                <a class='dropdown-item' href='cerrarSesion.php'>Cerrar Session</a>
            </div>
            </li>
                
        </ul>

      </nav>      
        </div> --
        <div class='col'>
            <br>
            <div class='card mt-5'>
                <div class='card-header text-center'>
					   <div class='row'>
                         <div class='col'>
                         </div>
                         <div class='col'>
                            <strong>Datos Proveedor</strong>
                         </div>
                         <div class='col'>
                         <img src='$fotP' class='rounded float-left'  width='110' height='100' >
                         </div>
                     </div>				  
                </div>
                 <form method='post'enctype= 'multipart/form-data' action='VistaProveedor.php'>
                       <div class='card-body'>
                         <div class='row'>
                             <div class='form-group col'>
                                 <label class='validationCustom01'>Codigo</label>
                                 <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"txtCodigoP\" value=\"" . $codP . "\">
                              </div>
                              <div class='form-group col'>
                                 <label class='validationCustom01'>Nombre</label>
                                 <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"txtNombreP\" value=\"" . $nomP . "\">
                              </div>
                              <div class='form-group col'>
                                 <label class='validationCustom01'>Email</label>
                                 <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Email\" value=\"" . $emalP . "\">
                              </div>
                         </div>
                         <div class='row'>
                             <div class='form-group col'>
                                 <label class='validationCustom01'>Telefono</label>
                                 <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Fijo\" value=\"" . $telP . "\">
                             </div>
                             <div class='form-group col'>
                                 <label class='validationCustom01'>Fecha Registro</label>
                                 <input  type=\"date\"  class=\"form-control\" id=\"validationCustom01\" name=\"fechaReg\" value=\"" . $feReP . "\">
                             </div>
                            <div class='form-group col'>
                                 <label class='validationCustom01'>Fecha Inactivo</label>
                                 <input  type=\"date\"  class=\"form-control\" id=\"validationCustom01\" name=\"fechaIn\" value=\"" . $feInP . "\">
                            </div>
                         </div>
                         <div class='row'>
                             <div class='form-group col'>
                                 <label class='validationCustom01'>Latitud</label>
                                 <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Latitud\" value=\"" . $latP . "\">
                             </div>
                            <div class='form-group col'>
                                 <label class='validationCustom01'>Longitud</label>
                                 <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Longitud\" value=\"" . $lonP . "\">
                            </div>
                         </div>
                         ";
    if ($bot == "Consultar") {

        echo "
                                                                <div class='form-group col'>
                                                                    <label class='validationCustom01'>Estado</label>
                                                                     <select class='custom-select mr-sm-2' name='Estado'>";
        echo $estP;
        echo " </select>
                                                                </div>
                                                                ";
    } else {
        echo "
                                                                <div class='form-group col'>
                                                                    <label class='validationCustom01'>Estado</label>
                                                                     <select class='custom-select mr-sm-2' name='Estado'>
                                                                        <option value='1'>Activo</option>
                                                                        <option value='0'>Inactivo</option>
                                                                     </select>
                                                                </div>
                                                                ";
    }
    if ($bot == "Consultar") {

        echo "
                                                                <div class='form-group col'>
                                                                    <label class='validationCustom01'>Tipo</label>
                                                                     <select class='custom-select mr-sm-2' name='Tipo'>";
        echo $tipP;
        echo " </select>
                                                                </div>
                                                                ";
    } else {
        echo "
                                                                <div class='form-group col'>
                                                                <label class='validationCustom01'>Tipo</label>
                                                                <select class='custom-select' name='Tipo' >
                                                                <option value='1'>Juridica</option>
                                                                <option value='0'>Natural</option>
                                                                </select> 
                                                                </div>
                                                                ";
    }
    echo "
                  
            
                             
                             <div class='row'>
                                <div class='form-group col'>
                                     <label class='validationCustom01'>Imagen</label>
                                     <div class='custom-file'>
                                        <input type='file' class='custom-file-input' id='customFileLang' lang='es' name='foto' accept='image/*'>
                                        <label class='custom-file-label' for='customFileLang'>Seleccionar Archivo</label>
                                    </div>
                                </div> 
                             </div>
                   
                         </div>
                       </div>
                       <div class='card-footer text-center'>
                          <input type='submit' class='btn btn-outline-secondary' name='Boton' value='Nuevo'>
                          <input type='submit' class='btn btn-outline-secondary' name='Boton' value='Guardar'>
                          <input type='submit' class='btn btn-outline-secondary' name='Boton' value='Modificar'>
                          <input type='submit' class='btn btn-outline-secondary' name='Boton' value='Consultar'>
                          <input type='submit' class='btn btn-outline-secondary' name='Boton' value='Agregar Producto'>

                       </div>
                 </form>
                 <hr>
                  <br>
                  <div class='text-center'><h3>Lista de Clientes</h3></div>
                  <table class='table' border='2'>
                        <thead class='thead text-center'>
                        <tr>
                            <td><strong>imagen</strong></td>
                            <td><strong>Identificacion</strong></td>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Telefono</strong></td>
                            <td><strong>Email</strong></td>

                        </tr>
                        </thead> 
                        

";

    $objProveedor = new Proveedor('', '', '', '', '', '', '', '', '', '', '', '');
    $objProveedor = new ControlProveedor($objProveedor);
    $proveedores = $objProveedor->consultarTodos();

    while ($mostrar = mysqli_fetch_array($proveedores)) {

        echo "
                        <tr>
                            <td><img src=$mostrar[imagenProveedor] width='50px'class='rounded-0'/></td>
                            <td><strong>$mostrar[codProveedor]</strong></td>
                            <td>$mostrar[nomProveedor]</td>
                            <td>$mostrar[telefonoProveedor]</td>
                            <td>$mostrar[emailProveedor]</td>
                       
                        </tr>
                        ";
    };
    echo "

            </div>
        </div>
        <!--<div class='col-md-2'>
    
        </div>-->
    </div>
  </div>
    </body>

</html>
";
} else if ($Tipo == 'proveedor') {
    $bot = $_POST["btn"];
    try {

        //proceso foto
        $nomf = $_FILES['foto']['name']; //obtiene el nombre
        $Archf = $_FILES['foto']['tmp_name']; //contiene el archivo
        $rutf = "../Imagen/Proveedores"; //ruta donde se guardara 
        $rutaf = $rutf . "/" . $nomf; //imagen/img.jpg Ruta a aguardar
        if($nomf==""){
            $rutaf="";
        }else{
            move_uploaded_file($Archf, $rutaf);
        }

        $codP = $_POST['txtCodigoP'];
        $nomP = $_POST['txtNombreP'];
        $tipP = $_POST['Tipo'];
        $feReP = $_POST['fechaReg'];
        $feInP = $_POST['fechaIn'];
        $emalP = $_POST['Email'];
        $telP = $_POST['Fijo'];
        $estP = $_POST['Estado'];
        $latP = $_POST['Latitud'];
        $lonP = $_POST['Longitud'];
        $bot = $_POST['Boton'];

        $fotP = $rutaf;

        if ($bot == 'Modificar') {

            $objProveedor = new Proveedor($Nombre, '', '', '', '', '', '', '', '', '', '');
            $objCtrProveedor = new ControlProveedor($objProveedor);
            $objProveedor1 = $objCtrProveedor->consultarProveedor();

            if ($fotP != $objProveedor1->getImagenProveedor()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'proveedores', $fechaActual, 0, 'imagenProveedor', $fotP);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }

            if ($nomP != $objProveedor1->getNomProveedor()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'proveedores', $fechaActual, 0, 'nomProveedor', $nomP);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }

            if ($tipP != $objProveedor1->getTipoProveedor()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'proveedores', $fechaActual, 0, 'tipoProveedor', $tipP);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }

            if ($feReP != $objProveedor1->getFechaRegistro()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'proveedores', $fechaActual, 0, 'fechaRegistro', $feReP);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($emalP != $objProveedor1->getEmailProveedor()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'proveedores', $fechaActual, 0, 'emailProveedor', $emalP);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }

            if ($telP != $objProveedor1->getTelefonoProveedor()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'proveedores', $fechaActual, 0, 'telefonoProveedor', $telP);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($latP != $objProveedor1->getLatitudProveedor()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'proveedores', $fechaActual, 0, 'latProveedor', $latP);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($lonP != $objProveedor1->getLongitudProveedor()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'proveedores', $fechaActual, 0, 'lonProveedor', $lonP);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
        } else {
            $objProveedor = new Proveedor($Nombre, '', '', '', '', '', '', '', '', '', '');
            $objCtrProveedor = new ControlProveedor($objProveedor);
            $objProveedor1 = $objCtrProveedor->consultarProveedor();
            $codP = $objProveedor1->getCodProveedor();
            $nomP = $objProveedor1->getNomProveedor();
            $tipo = $objProveedor1->getTipoProveedor();
            $feReP = $objProveedor1->getFechaRegistro();
            $feInP = $objProveedor1->getFechaInactivo();
            $fotP = $objProveedor1->getImagenProveedor();
            $emalP = $objProveedor1->getEmailProveedor();
            $telP = $objProveedor1->getTelefonoProveedor();
            $latP = $objProveedor1->getLatitudProveedor();
            $lonP = $objProveedor1->getLongitudProveedor();
            $estado = $objProveedor1->getEstadoProveedor();

            if ($tipo == '1') {
                $tipP = "<option value='1' selected>Juridico</option>
                         <option value='0'>Natural</option>";
            } else {
                $tipP = "<option value='1'>Juridico</option>
                         <option value='0'selected>Natural</option>";
            }

            if ($estado == '1') {
                $estP = "<option value='1' selected>Activo</option>
                         <option value='0'>Inactivo</option>";
            } else {
                $estP = "<option value='1'>Activo</option>
                         <option value='0'selected>Inactivo</option>";
            }
        }
    } catch (Exception $objExp) {
        echo 'Se presentó una excepción: ', $objExp->getMessage(), '\n';
    }

    echo "
<!DOCTYPE html>
<html>
    <head>
    <title>Datos Proveedor</title>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
    <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
     <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
     <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
     <meta charset='UTF-8'>
     <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'>
     <link rel='stylesheet' href='../CSS/Style-Index.css'>
     <link rel='stylesheet' href='../CSS/Proveedor.css'>
    </head>
    <body>
    
    <div class='container'>
    <div class='row'>
        <div class='col-sm-2'>
         <br>
         <br>
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
                <a class='dropdown-item' href='cerrarSesion.php'>Cerrar Session</a>
            </div>
            </li>
        </ul>

      </nav>      
        </div> --
        <div class='col'>
            <br>
            <div class='card mt-5'>
                <div class='card-header text-center'>
                      <strong>Datos Proveedor</strong>
                </div>
                 <form method='post'enctype= 'multipart/form-data' action='VistaProveedor.php'>
                       <div class='card-body'>
                         <div class='row'>
                             <div class='form-group col'>
                                 <label class='validationCustom01'>Codigo</label>
                                 <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"txtCodigoP\" value=\"" . $codP . "\">
                              </div>
                              <div class='form-group col'>
                                 <label class='validationCustom01'>Nombre</label>
                                 <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"txtNombreP\" value=\"" . $nomP . "\">
                              </div>
                              <div class='form-group col'>
                                 <label class='validationCustom01'>Email</label>
                                 <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Email\" value=\"" . $emalP . "\">
                              </div>
                         </div>
                         <div class='row'>
                             <div class='form-group col'>
                                 <label class='validationCustom01'>Telefono</label>
                                 <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Fijo\" value=\"" . $telP . "\">
                             </div>
                             <div class='form-group col'>
                                 <label class='validationCustom01'>Fecha Registro</label>
                                 <input  type=\"date\"  class=\"form-control\" id=\"validationCustom01\" name=\"fechaReg\" value=\"" . $feReP . "\">
                             </div>
                            <div class='form-group col'>
                                 <label class='validationCustom01'>Fecha Inactivo</label>
                                 <input  type=\"date\"  class=\"form-control\" id=\"validationCustom01\" name=\"fechaIn\" value=\"" . $feInP . "\">
                            </div>
                         </div>
                         <div class='row'>
                             <div class='form-group col'>
                                 <label class='validationCustom01'>Latitud</label>
                                 <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Latitud\" value=\"" . $latP . "\">
                             </div>
                            <div class='form-group col'>
                                 <label class='validationCustom01'>Longitud</label>
                                 <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Longitud\" value=\"" . $lonP . "\">
                            </div>
                         </div>
                         ";
    if ($bot == "Consultar") {

        echo "
                                                                <div class='form-group col'>
                                                                    <label class='validationCustom01'>Estado</label>
                                                                     <select class='custom-select mr-sm-2' name='Estado'>";
        echo $estP;
        echo " </select>
                                                                </div>
                                                                ";
    } else {
        echo "
                                                                <div class='form-group col'>
                                                                    <label class='validationCustom01'>Estado</label>
                                                                     <select class='custom-select mr-sm-2' name='Estado'>
                                                                        <option value='1'>Activo</option>
                                                                        <option value='0'>Inactivo</option>
                                                                     </select>
                                                                </div>
                                                                ";
    }
    if ($bot == "Consultar") {

        echo "
                                                                <div class='form-group col'>
                                                                    <label class='validationCustom01'>Tipo</label>
                                                                     <select class='custom-select mr-sm-2' name='Tipo'>";
        echo $tipP;
        echo " </select>
                                                                </div>
                                                                ";
    } else {
        echo "
                                                                <div class='form-group col'>
                                                                <label class='validationCustom01'>Tipo</label>
                                                                <select class='custom-select' name='Tipo' >
                                                                <option value='1'>Juridica</option>
                                                                <option value='0'>Natural</option>
                                                                </select> 
                                                                </div>
                                                                ";
    }
    echo "
                  
            
                             
                             <div class='row'>
                                <div class='form-group col'>
                                     <label class='validationCustom01'>Imagen</label>
                                     <div class='custom-file'>
                                        <input type='file' class='custom-file-input' id='customFileLang' lang='es' name='foto' accept='image/*'>
                                        <label class='custom-file-label' for='customFileLang'>Seleccionar Archivo</label>
                                    </div>
                                </div> 
                             </div>
                   
                         </div>
                       </div>
                       <div class='card-footer text-center'>
                       <button type='reset' class='btn btn-outline-secondary'>Nuevo</button>
                          <input type='submit' class='btn btn-outline-secondary' name='Boton' value='Modificar'>
                       </div>
                 </form>
    </body>
</html>
";
} else {
    echo "<script>alert('No tienes permiso para ingresar a esta opcion');window.location= 'VistaMenu.php'</script>";
}
