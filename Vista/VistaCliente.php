<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include("../Control/configBd.php");
include("../Control/ControlCliente.php");
include("../Modelo/Cliente.php");
include("../Control/ControlNotificacion.php");
include("../Modelo/Notificacion.php");


$Nombre = isset($_SESSION['Usu'])  ? $_SESSION['Usu'] : header('Location: ../index.php');
$Tipo = isset($_SESSION['Tipo']) ? $_SESSION['Tipo'] : header('Location: ../index.php');


if ($Tipo == 'cliente') {
    $bot = $_POST['Boton'];
    try {
        $objCliente = new Cliente($Nombre, '', '', '', '', '', '', '', '', '', '', '');
        $objCtrCliente = new ControlCliente($objCliente);
        $objCliente1 = $objCtrCliente->consultarCliente();

        if ($bot == 'Modificar') {
            //proceso foto
            $nomf = $_FILES['foto']['name']; //obtiene el nombre
            $Archf = $_FILES['foto']['tmp_name']; //contiene el archivo
            $rutf = "../Imagen/Clientes"; //ruta donde se guardara 
            $rutaf = $rutf . "/" . $nomf; //imagen/img.jpg Ruta a aguarda
            move_uploaded_file($Archf, $rutaf);
            if ($nomf == "") {
                $rutaf = "";
            } else {
                move_uploaded_file($Arch, $ruta);
            }

            $codC = $_POST['txtCodigo'];
            $nomC = $_POST['txtNombre'];
            $tipC = $_POST['Tipo'];
            $feReC = $_POST['fechaReg'];
            $feInC = $_POST['fechaIn'];
            $emalC = $_POST['Email'];
            $telC = $_POST['Fijo'];
            $credC = $_POST['Credito'];
            $estC = $_POST['Estado'];
            $latC = $_POST['latCliente'];
            $lonC = $_POST['lonCliente'];
            $fotC = $rutaf;


            if ($fotC != $objCliente1->getImagenCliente()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'clientes', $fechaActual, 0, 'imgenCliente', $fotC);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }

            if ($nomC != $objCliente1->getNomCliente()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'clientes', $fechaActual, 0, 'nomCliente', $nomC);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }

            if ($tipC != $objCliente1->getTipoCliente()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'clientes', $fechaActual, 0, 'tipoCliente', $tipC);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($feReC != $objCliente1->getFechaRegistro()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'clientes', $fechaActual, 0, 'fechaRegistro', $feReC);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($emalC != $objCliente1->getEmailCliente()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'clientes', $fechaActual, 0, 'emailCliente', $emalC);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($telC != $objCliente1->getTelefonoCliente()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'clientes', $fechaActual, 0, 'telefonoCliente', $telC);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($credC != $objCliente1->getCreditoCliente()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'clientes', $fechaActual, 0, 'creditoCliente', $credC);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($estC != $objCliente1->getEstadoCliente()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'clientes', $fechaActual, 0, 'estadoCliente', $estC);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($latC != $objCliente1->getLatCliente()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'clientes', $fechaActual, 0, 'latCliente', $latC);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($lonC != $objCliente1->getLonCliente()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'clientes', $fechaActual, 0, 'lonCliente', $lonC);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
        } else {
            $objCliente = new Cliente($Nombre, '', '', '', '', '', '', '', '', '', '', '');
            $objCtrCliente = new ControlCliente($objCliente);
            $objCliente1 = $objCtrCliente->consultarCliente();


            $codC = $objCliente1->getCodCliente();
            $nomC = $objCliente1->getNomCliente();
            $tipo = $objCliente1->getTipoCliente();
            $feReC = $objCliente1->getFechaRegistro();
            $feInC = $objCliente1->getFechaInactivo();
            $fotC = $objCliente1->getImagenCliente();
            $emalC = $objCliente1->getEmailCliente();
            $telC = $objCliente1->getTelefonoCliente();
            $credC = $objCliente1->getCreditoCliente();
            $estado = $objCliente1->getEstadoCliente();
            $latC = $objCliente1->getLatCliente();
            $lonC = $objCliente1->getLonCliente();




            if ($tipo == '1') {
                $tipC = "<option value='1' selected>Juridico</option>
                         <option value='0'>Natural</option>";
            } else {
                $tipC = "<option value='1'>Juridico</option>
                         <option value='0'selected>Natural</option>";
            }

            if ($estado == '1') {
                $estC = "<option value='1' selected>Activo</option>
                         <option value='0'>Inactivo</option>";
            } else {
                $estC = "<option value='1'>Activo</option>
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
        <title>Datos Clientes</title>
        <meta charset='UTF-8'>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
        <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
         <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
         <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
         <meta charset='UTF-8'>
         <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'>
         <link rel='stylesheet' href='../CSS/Style-Index.css'>
         <script>
         function Borrar()
         {
            var Ele = getElemetById('txtCodigo'); 
            Ele.value='';
         }
     </script>
        </head>
        <body>
        <div class='container'>
        <div class='row'>
             <div class='col-md-2'>
                <div class='row'>
                <div class='col-sm-9'>
                      <br/>
                     <nav class='navbar navbar-expand-lg navbar-light bg-light'>
                          <a class='navbar-brand' href='VistaMenu.php'>
                              <img class='d-inline-block align-top' src='../Imagen/IdeaLogo.jpg' width='45' height='45'>
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
                </div>
              
    
                </div>
                
             </div>
             <div class='col-md-8'>
                   <div>
                      <form  method='post' enctype= 'multipart/form-data' action='VistaCliente.php'>
                         <div class='card mt-5'>
                            <div class='card-header text-center'>
                                 <strong>Formulario  Clientes</strong>
                            </div>
                            <div class='card-body'>
                                <div class='row'>
    
                                      <div class='col-sm-4'>
                                         <div class='card' style='width: 100%;'>
                                            <img id='Empleados' src='$fotC'   width='206' height='200'> 
                                         </div>  
                                         ";
    if ($bot == "Consultar") {

        echo "
                                                <div class='form-group col-sm-7'>
                                                    <label class='validationCustom01'>Estado</label>
                                                     <select class='custom-select mr-sm-2' name='Estado'>";
        echo $estC;
        echo " </select>
                                                </div>
                                                ";
    } else {
        echo "
                                                <div class='form-group col-sm-7'>
                                                    <label class='validationCustom01'>Estado</label>
                                                     <select class='custom-select mr-sm-2' name='Estado'>
                                                        <option value='1'>Activo</option>
                                                        <option value='0'>Inactivo</option>
                                                     </select>
                                                </div>
                                                ";
    }
    echo "
                                         
                                      </div>
                                      <div class='col-sm-8'> 
                                         <div class='panel-group'>
                                             <div class='panel panel-default'>
                                                 <div class='panel-heading'>
                                                     <h4 class='panel-title'>
                                                         <a data-toggle='collapse' href='#informacion'>Datos del Cliente</a>
                                                     </h4>
                                                 </div>
                                                 <div class='panel-collapse collapse' id='informacion'>
                                                      <div class='form-group '>
                                                        <label class='validationCustom01'>Codigo</label>
                                                        <input id='txtCodigo' type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"txtCodigo\" value=\"" . $codC . "\">
                                                      </div>
                                                      <div class='form-group '>
                                                        <label class='validationCustom01'>Nombre</label>
                                                        <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"txtNombre\" value=\"" . $nomC . "\">
                                                      </div>
                                                      <div class='form-group '>
                                                        <label class='validationCustom01'>Email</label>
                                                        <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Email\" value=\"" . $emalC . "\">
                                                      </div>
                                                      <div class='form-group '>
                                                        <label class='validationCustom01'>Telefono</label>
                                                        <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Fijo\" value=\"" . $telC . "\">
                                                      </div>
                                                      <div class='form-group '>
                                                        <label class='validationCustom01'>Latitud</label>
                                                        <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"latCliente\" value=\"" . $latC . "\">
                                                      </div>
                                                      <div class='form-group '>
                                                        <label class='validationCustom01'>Longitud</label>
                                                        <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"lonCliente\" value=\"" . $lonC . "\">
                                                      </div>
                                                 </div>
                                             </div>
                                             <div class='panel panel-default'>
                                             <div class='panel-heading'>
                                                 <h4 class='panel-title'>
                                                     <a data-toggle='collapse' href='#Adicional'>Informacion Adicional</a>
                                                 </h4>
                                             </div>
                                             <div class='panel-collapse collapse' id='Adicional'>
                                                  <div class='form-group col-sm-5'>
                                                    <label class='validationCustom01'>Fecha de Registro</label>
                                                    <input  type=\"date\"  class=\"form-control\" id=\"validationCustom01\" name=\"fechaReg\" value=\"" . $feReC . "\">
                                                  </div>
                                                  <div class='form-group col-sm-5'>
                                                    <label class='validationCustom01'>Fecha Inactivo</label>
                                                    <input  type=\"date\"  class=\"form-control\" id=\"validationCustom01\" name=\"fechaIn\" value=\"" . $feInC . "\" readonly>
                                                </div>
                                                <div class='form-group col-sm-5 '>
                                                    <label class='validationCustom01'>Credito</label>
                                                    <input  type=\"number\"  class=\"form-control\" id=\"validationCustom01\" min=\"0\" name=\"Credito\" value=\"" . $credC . "\">
                                                </div>
                                                ";
    if ($bot == "Consultar") {

        echo "
                                                                                                            <div class='form-group col'>
                                                                                                                <label class='validationCustom01'>Tipo de Cliente</label>
                                                                                                                 <select class='custom-select mr-sm-2' name='Tipo'>";
        echo $tipC;
        echo " </select>
                                                                                                            </div>
                                                                                                            ";
    } else {
        echo "
                                                    <div class='form-group col-sm-5'>
                                                    <label class='validationCustom01'>Tipo de Cliente</label>
                                                     <select class='custom-select mr-sm-2' name='Tipo'>
                                                        <option>$tipC</option>
                                                     </select>
                                                </div>
                                                                                                            ";
    }
    echo "
                                                <div class='form-group col-sm-8'>
                                                    <label class='validationCustom01'>Imagen</label>
                                                    <div class='custom-file'>
                                                        <label class='custom-file-label' for='customFileLang'>Seleccionar Archivo</label>
                                                        <input type='file' class='custom-file-input' id='customFileLang' lang='es' name='foto' accept='image/*'>
                                                    </div>
                                                </div>
                                                 
                                             </div>
                                         </div>
                                         </div>
                                           
                                      </div>
                                      <div class='col-sm-0'>
                                           
                                      </div>
    
                                </div>
                            </div> 
                            <div class='card-footer text-center'>
                            <input type='submit' name='Boton' class='btn btn-outline-secondary' value='Modificar'>
                            </div>
                         </div>                
                           
                      </form> 
                    </div>           
             </div>
             <div class='col-md-2'>
             </div>
        </div>
     </div> 
     </body>
 </html>
 ";
} else if ($Tipo == 'administrador') {
    //proceso foto
    $nomf = $_FILES['foto']['name']; //obtiene el nombre
    $Archf = $_FILES['foto']['tmp_name']; //contiene el archivo
    $rutf = "../Imagen/Clientes"; //ruta donde se guardara 
    $rutaf = $rutf . "/" . $nomf; //imagen/img.jpg Ruta a aguardar
    if($nomf==""){
        $rutaf="";
    }else{
        move_uploaded_file($Archf, $rutaf);
    }

    $codC = $_POST['txtCodigo'];
    $nomC = $_POST['txtNombre'];
    $tipC = $_POST['Tipo'];
    $feReC = $_POST['fechaReg'];
    $feInC = $_POST['fechaIn'];
    $fotC = $rutaf;
    $emalC = $_POST['Email'];
    $telC = $_POST['Fijo'];
    $credC = $_POST['Credito'];
    $estC = $_POST['Estado'];
    $latC = $_POST['latCliente'];
    $lonC = $_POST['lonCliente'];
    $bot = $_POST['Boton'];

    if ($bot == 'Guardar') {

        $objCliente = new Cliente(
            $codC,
            $nomC,
            $tipC,
            $feReC,
            $feInC,
            $fotC,
            $emalC,
            $telC,
            $credC,
            $estC,
            $latC,
            $lonC
        );
        $objCtrCliente = new ControlCliente($objCliente);
        if ($msj = $objCtrCliente->guardarCliente()) {
            echo "<script>alert('" . $msj . "');</script>";
            // header("Refresh: 5; URL=VistaCliente.php"); //redirecionar la paina
            $codC = "";
            $nomC = "";
            $tipo = "";
            $feReC = "";
            $feInC = "";
            $fotC = "";
            $emalC = "";
            $telC = "";
            $credC = "";
            $estado = "";
            $latC = "";
            $lonC = "";
        }
    } else if ($bot == 'Modificar') {
        if($fotC==""){
            $objCliente = new Cliente($codC, '', '', '', '', '', '', '', '', '', '', '');
            $objCtrCliente = new ControlCliente($objCliente);
            $objCliente1 = $objCtrCliente->consultarCliente(); 
            $fotC = $objCliente1->getImagenCliente();
        }
        $objCliente = new Cliente($codC, $nomC, $tipC, $feReC, $feInC, $fotC, $emalC, $telC, $credC, $estC, $latC, $lonC);
        $objCtrCliente = new ControlCliente($objCliente);
        if ($msj = $objCtrCliente->modificarCliente()) {
            echo "<script>alert('" . $msj . "');</script>";
           
        }
    } else if ($bot == 'Consultar') {
        $objCliente = new Cliente($codC, '', '', '', '', '', '', '', '', '', '', '');
        $objCtrCliente = new ControlCliente($objCliente);
        $objCliente1 = $objCtrCliente->consultarCliente();
        $codC = $objCliente1->getCodCliente();
        $nomC = $objCliente1->getNomCliente();
        $tipo = $objCliente1->getTipoCliente();
        $feReC = $objCliente1->getFechaRegistro();
        $feInC = $objCliente1->getFechaInactivo();
        $fotC = $objCliente1->getImagenCliente();
        $emalC = $objCliente1->getEmailCliente();
        $telC = $objCliente1->getTelefonoCliente();
        $credC = $objCliente1->getCreditoCliente();
        $estado = $objCliente1->getEstadoCliente();
        $latC = $objCliente1->getLatCliente();
        $lonC = $objCliente1->getLonCliente();

        if ($tipo == '1') {
            $tipC = "<option value='1' selected>Juridico</option>
                     <option value='0'>Natural</option>";
        } else {
            $tipC = "<option value='1'>Juridico</option>
                     <option value='0'selected>Natural</option>";
        }

        if ($estado == '1') {
            $estC = "<option value='1' selected>Activo</option>
                     <option value='0'>Inactivo</option>";
        } else {
            $estC = "<option value='1'>Activo</option>
                     <option value='0'selected>Inactivo</option>";
        }
    } else if ($bot == 'Nuevo') {
        $codC = "";
        $nomC = "";
        $tipo = "";
        $feReC = "";
        $feInC = "";
        $fotC = "";
        $emalC = "";
        $telC = "";
        $credC = "";
        $estado = "";
        $latC = "";
        $lonC = "";
    }

    echo "
<!DOCTYPE html>
<html>
    <head>
    <title>Datos Clientes</title>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
    <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
     <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
     <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
     <meta charset='UTF-8'>
     <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'>
     <link rel='stylesheet' href='../CSS/Style-Index.css'>
     <script>
     function Borrar()
     {
        var Ele = getElemetById('txtCodigo'); 
        Ele.value='';
     }
 </script>
    </head>
    <body>
    <div class='container'>
    <div class='row'>
         <div class='col-md-2'>
            <div class='row'>
            <div class='col-sm-9'>
                  <br/>
                 <nav class='navbar navbar-expand-lg navbar-light bg-light'>
                      <a class='navbar-brand' href='VistaMenu.php'>
                          <img class='d-inline-block align-top' src='../Imagen/IdeaLogo.jpg' width='45' height='45'>
                      </a> 
                  

                 <ul class='nav nav-pills'>
                  <li class='nav-item dropdown'>
                    <a  class='nav-link dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' href='#'>Menu</a>
                    
                    <div class='dropdown-menu'>
                        <a class='dropdown-item' href='VistaMenu.php'>Home</a>
                        <div class='dropdown-divider'></div>
                       <a class='dropdown-item' href='VistaProducto.php'>Productos</a>
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
          

            </div>
            
         </div>
         <div class='col-md-8'>
               <div>
                  <form  method='post' enctype= 'multipart/form-data' action='VistaCliente.php'>
                     <div class='card mt-5'>
                        <div class='card-header text-center'>
                             <strong>Formulario  Clientes</strong>
                        </div>
                        <div class='card-body'>
                            <div class='row'>

                                  <div class='col-sm-4'>
                                     <div class='card' style='width: 100%;'>
                                        <img id='Empleados' src='$fotC'   width='206' height='200'> 
                                     </div>  
                                     ";
    if ($bot == "Consultar") {

        echo "
                                            <div class='form-group col-sm-7'>
                                                <label class='validationCustom01'>Estado</label>
                                                 <select class='custom-select mr-sm-2' name='Estado'>";
        echo $estC;
        echo " </select>
                                            </div>
                                            ";
    } else {
        echo "
                                            <div class='form-group col-sm-7'>
                                                <label class='validationCustom01'>Estado</label>
                                                 <select class='custom-select mr-sm-2' name='Estado'>
                                                    <option value='1'>Activo</option>
                                                    <option value='0'>Inactivo</option>
                                                 </select>
                                            </div>
                                            ";
    }
    echo "
                                     
                                  </div>
                                  <div class='col-sm-8'> 
                                     <div class='panel-group'>
                                         <div class='panel panel-default'>
                                             <div class='panel-heading'>
                                                 <h4 class='panel-title'>
                                                     <a data-toggle='collapse' href='#informacion'>Datos del Cliente</a>
                                                 </h4>
                                             </div>
                                             <div class='panel-collapse collapse' id='informacion'>
                                                  <div class='form-group '>
                                                    <label class='validationCustom01'>Codigo</label>
                                                    <input id='txtCodigo' type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"txtCodigo\" value=\"" . $codC . "\">
                                                  </div>
                                                  <div class='form-group '>
                                                    <label class='validationCustom01'>Nombre</label>
                                                    <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"txtNombre\" value=\"" . $nomC . "\">
                                                  </div>
                                                  <div class='form-group '>
                                                    <label class='validationCustom01'>Email</label>
                                                    <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Email\" value=\"" . $emalC . "\">
                                                  </div>
                                                  <div class='form-group '>
                                                    <label class='validationCustom01'>Telefono</label>
                                                    <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Fijo\" value=\"" . $telC . "\">
                                                  </div>
                                                  <div class='form-group '>
                                                        <label class='validationCustom01'>Latitud</label>
                                                        <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"latCliente\" value=\"" . $latC . "\">
                                                      </div>
                                                      <div class='form-group '>
                                                        <label class='validationCustom01'>Longitud</label>
                                                        <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"lonCliente\" value=\"" . $lonC . "\">
                                                      </div>
                                             </div>
                                         </div>
                                         <div class='panel panel-default'>
                                         <div class='panel-heading'>
                                             <h4 class='panel-title'>
                                                 <a data-toggle='collapse' href='#Adicional'>Informacion Adicional</a>
                                             </h4>
                                         </div>
                                         <div class='panel-collapse collapse' id='Adicional'>
                                              <div class='form-group col-sm-5'>
                                                <label class='validationCustom01'>Fecha de Registro</label>
                                                <input  type=\"date\"  class=\"form-control\" id=\"validationCustom01\" name=\"fechaReg\" value=\"" . $feReC . "\">
                                              </div>
                                              <div class='form-group col-sm-5'>
                                                <label class='validationCustom01'>Fecha Inactivo</label>
                                                <input  type=\"date\"  class=\"form-control\" id=\"validationCustom01\" name=\"fechaIn\" value=\"" . $feInC . "\" readonly>
                                            </div>
                                            <div class='form-group col-sm-5 '>
                                                <label class='validationCustom01'>Credito</label>
                                                <input  type=\"number\"  class=\"form-control\" id=\"validationCustom01\" min=\"0\" name=\"Credito\" value=\"" . $credC . "\">
                                            </div>
                                            ";
    if ($bot == "Consultar") {

        echo "
                                                                                                        <div class='form-group col'>
                                                                                                            <label class='validationCustom01'>Tipo de Cliente</label>
                                                                                                             <select class='custom-select mr-sm-2' name='Tipo'>";
        echo $tipC;
        echo " </select>
                                                                                                        </div>
                                                                                                        ";
    } else {
        echo "
                                                <div class='form-group col-sm-5'>
                                                <label class='validationCustom01'>Tipo de Cliente</label>
                                                 <select class='custom-select mr-sm-2' name='Tipo'>
                                                    <option>$tipC</option>
                                                 </select>
                                            </div>
                                                                                                        ";
    }
    echo "
                                            <div class='form-group col-sm-8'>
                                                <label class='validationCustom01'>Imagen</label>
                                                <div class='custom-file'>
                                                    <label class='custom-file-label' for='customFileLang'>Seleccionar Archivo</label>
                                                    <input type='file' class='custom-file-input' id='customFileLang' lang='es' name='foto' accept='image/*'>
                                                </div>
                                            </div>
                                             
                                         </div>
                                     </div>
                                     </div>
                                       
                                  </div>
                                  <div class='col-sm-0'>
                                       
                                  </div>

                            </div>
                        </div> 
                        <div class='card-footer text-center'>
                             <input type='submit' name='Boton' class='btn btn-outline-secondary' value='Nuevo'>
                             <input type='submit' name='Boton' class='btn btn-outline-secondary' value='Guardar'>
                             <input type='submit' name='Boton' class='btn btn-outline-secondary' value='Modificar'>
                             <input type='submit' name='Boton' class='btn btn-outline-secondary' value='Consultar'>
                        </div>
                     </div>                
                       
                  </form> 
                  <hr>
                  <br>
                  <div class='text-center'><h3>Lista de Clientes</h3></div>
                  <table class='table' border='2'>
                        <thead class='thead text-center'>
                        <tr>
                            <td><strong>imagen</strong></td>
                            <td><strong>Codigo</strong></td>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Tipo Cliente</strong></td>
                        </tr>
                        </thead> 

";
    $objCliente = new Cliente('', '', '', '', '', '', '', '', '', '', '', '');
    $objCtrCliente = new ControlCliente($objCliente);
    $Clientes = $objCtrCliente->consultarTodos();

    while ($mostrar = mysqli_fetch_array($Clientes)) {
        if (($mostrar['tipoCliente']) == '1') {
            $tipC = "Juridica";
        } else {
            $tipC = "Natural";
        }
        echo "
                        <tr>
                            <td><img src=$mostrar[imgenCliente] width='50px'class='rounded-0'/></td>
                            <td>$mostrar[codCliente]</td>
                            <td>$mostrar[nomCliente]</td>
                            <td>$tipC</td>

                            
                 
                       
                        </tr>
";
    };

    echo "
                    </table>
               </div>           
         </div>
         <div class='col-md-2'>
         </div>
    </div>
 </div>

    </body>
</html>
";
} else {
    echo "<script>alert('No tienes permiso para ingresar a esta opcion');window.location= 'VistaMenu.php'</script>";
}
