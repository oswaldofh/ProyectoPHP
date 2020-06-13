<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include("../Control/configBd.php");
include("../Control/ControlEmpleado.php");
include("../Modelo/Empleado.php");
include("../Modelo/Notificacion.php");
include("../Control/ControlNotificacion.php");
$Nombre = isset($_SESSION['Usu'])  ? $_SESSION['Usu'] : header('Location: ../index.php');
$Tipo = isset($_SESSION['Tipo']) ? $_SESSION['Tipo'] : header('Location: ../index.php');

if ($Tipo == 'empleado') {
    $bot = $_POST["btn"];
    try {

        if ($bot == 'Modificar') {

            //proceso archivo
            $nomA = $_FILES['HojaVida']['name']; //obtiene el nombre
            $Arch = $_FILES['HojaVida']['tmp_name']; //contiene el archivo
            $rut = "../Document/Empleado"; //ruta donde se guardara 
            $ruta = $rut . "/" . $nomA; //imagen/img.jpg Ruta a aguardar
            if ($nomA == "") {
                $ruta = "";
            } else {
                move_uploaded_file($Arch, $ruta);
            }

            
            //proceso foto
            $nomf = $_FILES['Foto']['name']; //obtiene el nombre
            $Archf = $_FILES['Foto']['tmp_name']; //contiene el archivo
            $rutf = "../Imagen/Empleados"; //ruta donde se guardara 
            $rutaf = $rutf . "/" . $nomf; //imagen/img.jpg Ruta a aguardar
            if ($nomf == "") {
                $rutaf = "";
            } else {
                move_uploaded_file($Archf, $rutaf);
            }

            $objEmpleado = new Empleado($Nombre, '', '', '', '', '', '', '', '', '', '', '', '', '');
            $objCtrEmpleado = new ControlEmpleado($objEmpleado);
            $objEmpleado1 = $objCtrEmpleado->ConsultarEmpleado();
            $Codigo = $_POST['txtCodigo'];
            $NomEmp = $_POST['txtNombre'];
            $FechaIng = $_POST['fechaIn'];
            $FechaRet = $_POST['fechaRe'];
            $Salario = $_POST['Salario'];
            $Deducion = $_POST['Deducion'];
            $Correo = $_POST['Email'];
            $Fijo = $_POST['Fijo'];
            $Celular = $_POST['Celular'];
            $Estad = $_POST['Estado'];
            $LatEmpleado = $_POST['LatEmpleado'];
            $LonEmpleado = $_POST['LonEmpleado'];
            $Foto=$rutaf;

            if ($Foto!= $objEmpleado1->getFotoEmpleado()){
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'empleados', $fechaActual, 0, 'fotoEmpleado', $Foto);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
                
            }
            if ($NomEmp != $objEmpleado1->getNomEmpleado()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'empleados', $fechaActual, 0, 'nomEmpleado', $NomEmp);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($FechaIng != $objEmpleado1->getFechaIngreso()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'empleados', $fechaActual, 0, 'fechaIngreso', $FechaIng);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($Salario != $objEmpleado1->getSalarioBasico()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'empleados', $fechaActual, 0, 'salarioBasico', $Salario);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($Deducion != $objEmpleado1->getDeducciones()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'empleados', $fechaActual, 0, 'deduciones', $Deducion);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($Deducion != $objEmpleado1->getDeducciones()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'empleados', $fechaActual, 0, 'deduciones', $Deducion);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($Correo != $objEmpleado1->getEmailEmpleado()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'empleados', $fechaActual, 0, 'emailEmpleado', $Correo);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }

            if ($Fijo != $objEmpleado1->getTelefono()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'empleados', $fechaActual, 0, 'telefono', $Fijo);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
            if ($Celular != $objEmpleado1->getCelular()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'empleados', $fechaActual, 0, 'celular', $Celular);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }

            if ($LatEmpleado != $objEmpleado1->getLatEmpleado()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'empleados', $fechaActual, 0, 'latEmpleado', $LatEmpleado);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }

            if ($LonEmpleado != $objEmpleado1->getLonEmpleado()) {
                $fechaActual = date('Y-m-d');
                $objNotificacion = new Notificacion('', $Nombre, 'empleados', $fechaActual, 0, 'lonEmpleado', $LonEmpleado);
                $objCtrlNotificacion = new ControlNotificacion($objNotificacion);
                $msj = $objCtrlNotificacion->guardarNotificacion();
                echo "<script>alert('" . $msj . "');</script>";
            }
        } else {
            $objEmpleado = new Empleado($Nombre, '', '', '', '', '', '', '', '', '', '', '', '', '');
            $objCtrEmpleado = new ControlEmpleado($objEmpleado);
            $objEmpleado1 = $objCtrEmpleado->ConsultarEmpleado();

            $Codigo = $objEmpleado1->getCodEmpleado();
            $NomEmp = $objEmpleado1->getNomEmpleado();
            $FechaIng = $objEmpleado1->getFechaIngreso();
            $FechaRet = $objEmpleado1->getFechaRetiro();
            $Salario = $objEmpleado1->getSalarioBasico();
            $Deducion = $objEmpleado1->getDeducciones();
            $Foto = $objEmpleado1->getFotoEmpleado();
            $HjVd = $objEmpleado1->getHojaVida();
            $Correo = $objEmpleado1->getEmailEmpleado();
            $Fijo = $objEmpleado1->getTelefono();
            $Celular = $objEmpleado1->getCelular();
            $estado = $objEmpleado1->getEstadoEmpleado();
            $LatEmpleado = $objEmpleado1->getLatEmpleado();
            $LonEmpleado = $objEmpleado1->getLonEmpleado();
            if ($estado == '1') {
                $Estad = "<option value='1' selected>Activo</option>
                         <option value='0'>Inactivo</option>";
            } else {
                $Estad = "<option value='1'>Activo</option>
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
    <title>Datos empleados</title>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
    <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
     <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
     <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
     <meta charset='UTF-8'>
     <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'>
     <link rel='stylesheet' href='../CSS/Style-Index.css'>
    </head>
    <body>
    <div class='container'>
          <div class='row'>
              <div class='col-md-2'>
                <div class='row'>
                    <div class='class='col-sm-9'>
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
               
                    </div>
                    <div class='class='col-sm-1'>
                    </div>
                    <div class='class='col-sm-2'>
                    </div>
                 </div>
              </div>
              <div class='col-md-8'>    
                 <div>
                    <form action='VistaEmpleado.php' enctype= 'multipart/form-data' method='post'>
                         <div class='card mt-5'>
                             <div class='card-header text-center'>
                                <strong>Formulario  Empleado</strong>
                             </div>
                             <div class='card-body'>

                               <div class='row'>
                                   <div class='col-sm-4'>
                                       <div class='card' style='width: 100%;'>
                                           <img id='Empleados' src='$Foto' >
                                       </div>
                                    </div>

                                    <!--INFORMACION PERSONAL-->  
                                    <div class='col-sm-7'>
                                        <div class='panel-group' id='accordion'>
                                            <div class='panel panel-default'>
                                               <div class='panel-heading'>
                                                  <h4 class='panel-title'>
                                                    <a data-toggle='collapse' data-parent='#accordion' href='#collapse1'>Informacion Personal</a>
                                                  </h4>
                                               </div>
                                            </div>
                                            <div id='collapse1' class='panel-collapse collapse in'>
                                              <div class='panel-body'>
                                                   <div class='form-group  col-md-7 mb-3'>
                                                      <label class='validationCustom01'>Codigo</label>
                                                      <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"txtCodigo\" value=\"" . $Codigo . "\" readonly >
                                                   </div>

                                                    <div class='form-group col-md-7'>
                                                      <label class='validationCustom01'>Nombre</label>
                                                      <input type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"txtNombre\" value=\"" . $NomEmp . "\">
                                                   </div>

                                                   <div class='form-group col-md-7'>
                                                      <label class='validationCustom01'>Email</label>
                                                      <input type=\"text\" class=\"form-control\" id=\"validationCustom01\" name=\"Email\" value=\"" . $Correo . "\">
                                                   </div>

                                                   <div class='form-group col-md-7'>
                                                      <label class='validationCustom01'>Telefono Fijo</label>
                                                      <input type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Fijo\" value=\"" . $Fijo . "\">
                                                   </div>

                                                   <div class='form-group col-md-7'>
                                                      <label class='validationCustom01'>Telefono Celular</label>
                                                      <input type=\"text\" class=\"form-control\" id=\"validationCustom01\" name=\"Celular\" value=\"" . $Celular . "\">
                                                   </div>

                                                   <div class='form-group col-md-7'>
                                                   <label class='validationCustom01'>Latitud</label>
                                                   <input type=\"text\" class=\"form-control\" id=\"validationCustom01\" name=\"LatEmpleado\" value=\"" . $LatEmpleado . "\">
                                                </div>

                                                <div class='form-group col-md-7'>
                                                <label class='validationCustom01'>Longitud</label>
                                                <input type=\"text\" class=\"form-control\" id=\"validationCustom01\" name=\"LonEmpleado\" value=\"" . $LonEmpleado . "\">
                                             </div>
                                              </div>                                               
                                            </div>

                                            <!--INFORMACION EMPRESARIAL-->  
                                         <div class='panel-heading'>
                                             <h4 class='panel-title'>
                                                  <a data-toggle='collapse' data-parent='#accordion' href='#collapse2'>Informacion Empresarial</a>
                                             </h4>
                                         </div>
                                      
                                        
                                         <div id='collapse2' class='panel-collapse collapse in'>
                                              <div class='panel-body'>
                                           
                                             <div class='form-group  col-md-7'>
                                                 <label class='validationCustom01'>Fecha de Ingreso</label>
                                                 <input type=\"date\" class=\"form-control\" id=\"validationCustom01\" name=\"fechaIn\" value=\"" . $FechaIng . "\">
                                              </div>

                                             <div class='form-group  col-md-7'>
                                                  <label class='validationCustom01'>Fecha de Retiro</label>
                                                  <input type=\"date\" class=\"form-control\" id=\"validationCustom01\" name=\"fechaRe\" value=\"" . $FechaRet . "\" readonly>
                                              </div>

                                              <div class='form-group col-md-7 '>
                                                  <label class='validationCustom01'>Salario Basico</label>
                                                  <input type=\"text\" class=\"form-control\" id=\"validationCustom01\" name=\"Salario\" value=\"" . $Salario . "\">
                                              </div>

                                              <div class='form-group col-md-7'>
                                                 <label class='validationCustom01'>Deducciones</label>
                                                 <input type=\"text\" class=\"form-control\" id=\"validationCustom01\" name=\"Deducion\" value=\"" . $Deducion . "\">
                                               </div>
                                          </div>
                                         </div>


                                         <!--ARCHIVOS-->  
                                        <div class='panel panel-default'>
                                                   <div class='panel-heading'>
                                                     <h4 class='panel-title'>
                                                          <a data-toggle='collapse' data-parent='#accordion' href='#collapse3'>Adjuntar Archivos</a>
                                                      </h4>
                                                 </div>
                                              </div>
                                              <div id='collapse3' class='panel-collapse collapse in'>
                                                  <div class='panel-body'>
                                                       <div class='form-group '>
                                                          <label class='validationCustom01'>Hoja de Vida</label>
                                                          <input type='file' accept=\".pdf,.docx,.doc\" class=\"form-control\" id=\"validationCustom01\" name='HojaVida'>
                                                        </div>

                                                        <div class='form-group '>
                                                          <label class='validationCustom01'>Foto</label>
                                                          <input type='file' class=\"form-control\" id=\"validationCustom01\" name='Foto' accept='image/*' >
                                                        </div>
                                                  </div>
                                                </div>
                                        </div><!--Fin Acordion-->
                                        ";
    if ($bot == "Consultar") {

        echo "
                                                                                <div class='form-group col-sm-7'>
                                                                                    <label class='validationCustom01'>Estado</label>
                                                                                     <select class='custom-select mr-sm-2' name='Estado'>";
        echo $Estad;
        echo " </select>
                                                                                </div>
                                                                                ";
    } else {
        echo "
                                            <div class='form-group '>
                                            <label class='validationCustom01'>Estado</label>
                                             <select name='Estado' class='custom-select mr-sm-2' id='inlineFormCustomSelect' onchange='ShowSelected();'>
                                                <option value='1'>Activo</option>
                                                <option value='0'>Inactivo</option>
                                             </select>
                                         </div>
 
                                                                                ";
    }
    echo "
                                      
                                    </div>
                                    <div class='col-sm-1'>
                                    </div>
                               </div>   
                     
                             </div>
                            <div class='card-footer text-center'>
                                <input class='btn btn-outline-secondary' type='submit' name='btn' value='Modificar'> 
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
        $rutf = "../Imagen/Empleados"; //ruta donde se guardara 
        $rutaf = $rutf . "/" . $nomf; //imagen/img.jpg Ruta a aguardar
        if ($nomf == "") {
            $rutaf = "";
        } else {
            move_uploaded_file($Archf, $rutaf);
        }

        //proceso archivo
        $nomA = $_FILES['HojaVida']['name']; //obtiene el nombre
        $Arch = $_FILES['HojaVida']['tmp_name']; //contiene el archivo
        $rut = "../Document/Empleado"; //ruta donde se guardara 
        $ruta = $rut . "/" . $nomA; //imagen/img.jpg Ruta a aguardar
        if ($nomA == "") {
            $ruta = "";
        } else {
            move_uploaded_file($Arch, $ruta);
        }
        
        $Codigo = $_POST['txtCodigo'];
        $NomEmp = $_POST['txtNombre'];
        $FechaIng = $_POST['fechaIn'];
        $FechaRet = $_POST['fechaRe'];
        $Salario = $_POST['Salario'];
        $Deducion = $_POST['Deducion'];
        $Foto = $rutaf;
        $HjVd = $ruta;
        $Correo = $_POST['Email'];
        $Fijo = $_POST['Fijo'];
        $Celular = $_POST['Celular'];
        $Estad = $_POST['Estado'];
        $LatEmpleado = $_POST['LatEmp'];
        $LonEmpleado = $_POST['LonEmp'];
        $bot = $_POST['Boton'];


        if ($bot == 'Guardar') {
            $objEmpleado = new Empleado(
                $Codigo,
                $NomEmp,
                $FechaIng,
                $FechaRet,
                $Salario,
                $Deducion,
                $Foto,
                $HjVd,
                $Correo,
                $Fijo,
                $Celular,
                $Estad,
                $LatEmpleado,
                $LonEmpleado
            );
            $objCtrEmpleado = new ControlEmpleado($objEmpleado);

            if ($msj = $objCtrEmpleado->guardarEmpleado()) {
                echo "<script>alert('" . $msj . "');</script>";
                $Codigo = "";
                $NomEmp = "";
                $FechaIng = "";
                $FechaRet = "";
                $Salario = "";
                $Deducion = "";
                $Foto = "";
                $HjVd = "";
                $Correo = "";
                $Fijo = "";
                $Celular = "";
                $Estad = "";
                $LatEmpleado = "";
                $LonEmpleado = "";
            }
        } else if ($bot == 'Modificar') {

            if ($Foto == "") {
                $objEmpleado = new Empleado($Codigo, '', '', '', '', '', '', '', '', '', '', '', '', '');
                $objCtrEmpleado = new ControlEmpleado($objEmpleado);
                $objEmpleado1 = $objCtrEmpleado->ConsultarEmpleado();
                $Foto = $objEmpleado1->getFotoEmpleado();
            }
           
            if ($HjVd == "") {
                $objEmpleado = new Empleado($Codigo, '', '', '', '', '', '', '', '', '', '', '', '', '');
                $objCtrEmpleado = new ControlEmpleado($objEmpleado);
                $objEmpleado1 = $objCtrEmpleado->ConsultarEmpleado();
                $HjVd = $objEmpleado1->getHojaVida();
            }
            $objEmpleado = new Empleado(
                $Codigo,
                $NomEmp,
                $FechaIng,
                $FechaRet,
                $Salario,
                $Deducion,
                $Foto,
                $HjVd,
                $Correo,
                $Fijo,
                $Celular,
                $Estad,
                $LatEmpleado,
                $LonEmpleado
            );
            
            $objCtrEmpleado = new ControlEmpleado($objEmpleado);

            $msj = $objCtrEmpleado->ModificarEmpleado();
            if ($msj != "") {
                echo "<script>alert('Empleado Modificado');</script>";
            } else {
                echo "<script>alert('Empleado no modificado');</script>";
            }
        } else if ($bot == 'Consultar') {
            $objEmpleado = new Empleado($Codigo, '', '', '', '', '', '', '', '', '', '', '', '', '');
            $objCtrEmpleado = new ControlEmpleado($objEmpleado);
            $objEmpleado1 = $objCtrEmpleado->ConsultarEmpleado();

            $Codigo = $objEmpleado1->getCodEmpleado();
            $NomEmp = $objEmpleado1->getNomEmpleado();
            $FechaIng = $objEmpleado1->getFechaIngreso();
            $FechaRet = $objEmpleado1->getFechaRetiro();
            $Salario = $objEmpleado1->getSalarioBasico();
            $Deducion = $objEmpleado1->getDeducciones();
            $Foto = $objEmpleado1->getFotoEmpleado();
            $HjVd = $objEmpleado1->getHojaVida();
            $Correo = $objEmpleado1->getEmailEmpleado();
            $Fijo = $objEmpleado1->getTelefono();
            $Celular = $objEmpleado1->getCelular();
            $estado = $objEmpleado1->getEstadoEmpleado();
            $LatEmpleado = $objEmpleado1->getLatEmpleado();
            $LonEmpleado = $objEmpleado1->getLonEmpleado();

            if ($estado == '1') {
                $Estad = "<option value='1' selected>Activo</option>
                         <option value='0'>Inactivo</option>";
            } else {
                $Estad = "<option value='1'>Activo</option>
                         <option value='0'selected>Inactivo</option>";
            }
        } else if ($bot == 'Nuevo') {
            $Codigo = "";
            $NomEmp = "";
            $FechaIng = "";
            $FechaRet = "";
            $Salario = "";
            $Deducion = "";
            $Foto = "";
            $HjVd = "";
            $Correo = "";
            $Fijo = "";
            $Celular = "";
            $Estad = "";
            $LatEmpleado = "";
            $LonEmpleado = "";
        }
    
    echo "
<!DOCTYPE html>
<html>
    <head>
        <title>Datos empleados</title>
        <meta charset='UTF-8'>
        <link rel='stylesheet' href='../CSS/Style-Index.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
    </head>
    <body>
    <div class='container'>
    <div class='row'>
        <div class='col-md-2'>
          <div class='row'>
              <div class='class='col-sm-9'>
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
              <div class='class='col-sm-1'>
              </div>
              <div class='class='col-sm-2'>
              </div>
           </div>
        </div>
        <div class='col-md-8'>    
           <div>
              <form action='VistaEmpleado.php' method='post' enctype= 'multipart/form-data'>
                   <div class='card mt-5'>
                       <div class='card-header text-center'>
                          <strong>Formulario  Empleado</strong>
                       </div>
                       <div class='card-body'>

                         <div class='row'>
                         <div class='col-sm-4'>
                         <div class='card' style='width: 100%;'>
                             <img width='206' height='200' src='$Foto' >
                         </div>
                      </div>

                              <!--INFORMACION PERSONAL-->  
                              <div class='col-sm-7'>
                                  <div class='panel-group' id='accordion'>
                                      <div class='panel panel-default'>
                                         <div class='panel-heading'>
                                            <h4 class='panel-title'>
                                              <a data-toggle='collapse' data-parent='#accordion' href='#collapse1'>Informacion Personal</a>
                                            </h4>
                                         </div>
                                      </div>
                                      <div id='collapse1' class='panel-collapse collapse in'>
                                        <div class='panel-body'>
                                             <div class='form-group  col-md-5 mb-3'>
                                                <label class='validationCustom01'>Codigo</label>
                                                <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"txtCodigo\" value=\"" . $Codigo . "\">
                                             </div>

                                              <div class='form-group col-md-5 mb-3'>
                                                <label class='validationCustom01'>Nombre</label>
                                                <input type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"txtNombre\" value=\"" . $NomEmp . "\">
                                             </div>

                                             <div class='form-group col-md-7 mb-3'>
                                                <label class='validationCustom01'>Email</label>
                                                <input type=\"text\" class=\"form-control\" id=\"validationCustom01\" name=\"Email\" value=\"" . $Correo . "\">
                                             </div>

                                             <div class='form-group col-md-7 mb-3'>
                                                <label class='validationCustom01'>Telefono Fijo</label>
                                                <input type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Fijo\" value=\"" . $Fijo . "\">
                                             </div>

                                             <div class='form-group col-md-7 mb-3'>
                                                <label class='validationCustom01'>Telefono Celular</label>
                                                <input type=\"text\" class=\"form-control\" id=\"validationCustom01\" name=\"Celular\" value=\"" . $Celular . "\">
                                             </div>
                                             <div class='form-group col-md-7 mb-3'>
                                                <label class='validationCustom01'>Latitud</label>
                                                <input type=\"text\" class=\"form-control\" id=\"validationCustom01\" name=\"LatEmp\" value=\"" . $LatEmpleado . "\">
                                             </div>
                                             <div class='form-group col-md-7 mb-3'>
                                                <label class='validationCustom01'>Longitud</label>
                                                <input type=\"text\" class=\"form-control\" id=\"validationCustom01\" name=\"LonEmp\" value=\"" . $LonEmpleado . "\">
                                             </div>
                                        </div>                                               
                                      </div>

                                      <!--INFORMACION EMPRESARIAL-->  
                                   <div class='panel-heading'>
                                       <h4 class='panel-title'>
                                            <a data-toggle='collapse' data-parent='#accordion' href='#collapse2'>Informacion Empresarial</a>
                                       </h4>
                                   </div>
                                
                                  
                                   <div id='collapse2' class='panel-collapse collapse in'>
                                        <div class='panel-body'>
                                     
                                       <div class='form-group  col-md-7'>
                                           <label class='validationCustom01'>Fecha de Ingreso</label>
                                           <input type=\"date\" class=\"form-control\" id=\"validationCustom01\" name=\"fechaIn\" value=\"" . $FechaIng . "\">
                                        </div>

                                       <div class='form-group  col-md-7'>
                                            <label class='validationCustom01'>Fecha de Retiro</label>
                                            <input type=\"date\" class=\"form-control\" id=\"validationCustom01\" name=\"fechaRe\" value=\"" . $FechaRet . "\" readonly>
                                        </div>

                                        <div class='form-group col-md-7 '>
                                            <label class='validationCustom01'>Salario Basico</label>
                                            <input type=\"text\" class=\"form-control\" id=\"validationCustom01\" name=\"Salario\" value=\"" . $Salario . "\">
                                        </div>

                                        <div class='form-group col-md-7'>
                                           <label class='validationCustom01'>Deducciones</label>
                                           <input type=\"text\" class=\"form-control\" id=\"validationCustom01\" name=\"Deducion\" value=\"" . $Deducion . "\">
                                         </div>
                                    </div>
                                   </div>


                                   <!--ARCHIVOS-->  
                                  <div class='panel panel-default'>
                                             <div class='panel-heading'>
                                               <h4 class='panel-title'>
                                                    <a data-toggle='collapse' data-parent='#accordion' href='#collapse3'>Adjuntar Archivos</a>
                                                </h4>
                                           </div>
                                        </div>
                                        <div id='collapse3' class='panel-collapse collapse in'>
                                            <div class='panel-body'>
                                                 <div class='form-group '>
                                                    <label class='validationCustom01'>Hoja de Vida</label>
                                                    <input type='file' accept=\".pdf,.doc\" class=\"form-control\" id=\"validationCustom01\" name='HojaVida'>
                                                  </div>
                                            </div>
                                        
                                          <div class='form-group col-sm-8'>
                                          <label class='validationCustom01'>Imagen</label>
                                          <div class='custom-file'>
                                              <label class='custom-file-label' for='customFileLang'>Seleccionar Archivo</label>
                                              <input type='file' class='custom-file-input' id='customFileLang' lang='es' name='foto' accept='image/*'>
                                          </div>
                                          </div>
                                          </div>
                                  </div><!--Fin Acordion-->
                                  ";
    if ($bot == "Consultar") {

        echo "
                    <div class='form-group col-sm-7'>
                    <label class='validationCustom01'>Estado</label>
                      <select class='custom-select mr-sm-2' name='Estado'>";
        echo $Estad;
        echo " </select>
             </div>
                                                                                                              ";
    } else {
        echo "
                                                                          <div class='form-group '>
                                                                          <label class='validationCustom01'>Estado</label>
                                                                           <select name='Estado' class='custom-select mr-sm-2' id='inlineFormCustomSelect' onchange='ShowSelected();'>
                                                                              <option value='1'>Activo</option>
                                                                              <option value='0'>Inactivo</option>
                                                                           </select>
                                                                       </div>
                               
                                                                                                              ";
    }
    echo "

                              </div>
                              <div class='col-sm-1'>
                              </div>
                         </div>   
               
                       </div>
                      <div class='card-footer text-center'>
                         <input class='btn btn-outline-secondary' type='submit' name='Boton' value='Nuevo'>
                          <input class='btn btn-outline-secondary' type='submit' name='Boton' value='Guardar'>
                          <input class='btn btn-outline-secondary' type='submit' name='Boton' value='Modificar'>
                          <input class='btn btn-outline-secondary' type='submit' name='Boton' value='Consultar'>    
                      </div>
                   </div>
              </form>
              <hr>
              <br>
              <div class='text-center'><h3>Lista de Empleados</h3></div>
              <table class='table' border='2'>
                        <thead class='thead text-center'>
                        <tr>
                            <td><strong>Imagen</strong></td>
                            <td><strong>Codigo</strong></td>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Fecha Ingreso</strong></td>
                        </tr>
                        </thead> 

";
    $objEmpleado = new Empleado('', '', '', '', '', '', '', '', '', '', '', '', '', '');
    $objCtrEmpleado = new ControlEmpleado($objEmpleado);
    $empleados = $objCtrEmpleado->ConsultarTodos();

    while ($mostrar = mysqli_fetch_array($empleados)) {
        echo "
                        <tr>
                        <td><img src=$mostrar[fotoEmpleado] width='50px'class='rounded-0'/></td>
                            <td>$mostrar[codEmpleado]</td>
                            <td>$mostrar[nomEmpleado]</td>
                            <td>$mostrar[fechaIngreso]</td>       
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
