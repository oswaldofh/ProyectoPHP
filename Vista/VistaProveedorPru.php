<?php

error_reporting(E_ALL ^ E_NOTICE);
//session_start();
include("../Control/configBd.php");
include("../Control/ControlProveedor.php");
include("../Modelo/Proveedor.php");

//proceso foto
$nomf = $_FILES['foto']['name']; //obtiene el nombre
$Archf = $_FILES['foto']['tmp_name']; //contiene el archivo
$rutf = "../Imagen/Proveedores"; //ruta donde se guardara 
$rutaf = $rutf . "/" . $nomf; //imagen/img.jpg Ruta a aguardar
move_uploaded_file($Archf, $rutaf);

$codP = $_POST['txtCodigo'];
$nomP = $_POST['txtNombre'];
$tipP = $_POST['Tipo'];
$feReP = $_POST['fechaReg'];
$feInP = $_POST['fechaIn'];
$fotP = $rutaf;
$emalP = $_POST['Email'];
$telP = $_POST['Fijo'];
$estP = $_POST['Estado'];
$bot = $_POST['Boton'];

if ($bot == 'Guardar') {
    $objProveedor = new Proveedor($codP, $nomP, $tipP, $feReP, $feInP, $fotP, $emalP, $telP, $estP, '', '');
    $objCtrProveedor = new ControlProveedor($objProveedor);
    if ($msj = $objCtrProveedor->guardarProveedor()) {
        echo "<script>alert('" . $msj . "');</script>";
    }
} else if ($bot == 'Modificar') {
    if($fotP==""){

    }
    $objProveedor = new Proveedor($codP, $nomP, $tipP, $feReP, $feInP, $fotP, $emalP, $telP, $estP, '', '');
    $objCtrProveedor = new ControlProveedor($objProveedor);
    if ($msj = $objCtrProveedor->modificarProveedor()) {
        echo "<script>alert('" . $msj . "');</script>";
    }
} else if ($bot == 'Consultar') {
    $objProveedor = new Proveedor($codP, '', '', '', '', '', '', '', '', '', '');
    $objCtrProveedor = new ControlProveedor($objProveedor);
    $objProveedor1 = $objCtrProveedor->consultarProveedor();
      if($Np=$objProveedor1->getNomProveedor()==""){
            echo "<script>alert('Proveedor ".$cod." no existe');</script>";
        }else{
          echo "<script>alert('Proveedor ".$cod."  existe');</script>";  
        }
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
                                      <input type='text' class='form-control' id='validationCustom01' name='txtCodigo'>
                                   </div>
                                   <div class='form-group col'>
                                      <label class='validationCustom01'>Nombre</label>
                                     <input type='text' class='form-control' id='validationCustom01' name='txtNombre'>
                                   </div>
                                   <div class='form-group col'>
                                      <label class='validationCustom01'>Email</label>
                                       <input type='text' class='form-control' id='validationCustom01' name='Email'>
                                   </div>
                              </div>
                              <div class='row'>
                                  <div class='form-group col'>
                                      <label class='validationCustom01'>Telefono</label>
                                      <input type='text' class='form-control' id='validationCustom01' name='Fijo'>
                                  </div>
                                  <div class='form-group col'>
                                      <label class='validationCustom01'>Fecha Registro</label>
                                       <input type='date' class='form-control' id='validationCustom01' name='fechaReg'>
                                  </div>
                                 <div class='form-group col'>
                                      <label class='validationCustom01'>Fecha Inactivo</label>
                                      <input type='date' class='form-control' id='validationCustom01' name='fechaIn'>
                                 </div>
                              </div>
                              <div class='row'>
                                   <div class='form-group col'>
                                       <label class='validationCustom01'>Estado</label>
                                       <select class='custom-select' name='Estado' >
                                         <option value='1'>Activo</option>
                                         <option value='0'>Inactivo</option>
                                      </select>
                                  </div>
                                  <div class='form-group col'>
                                      <label class='validationCustom01'>Tipo</label>
                                      <select class='custom-select' name='Tipo' >
                                         <option value='1'>Juridica</option>
                                         <option value='0'>Natural</option>
                                      </select> 
                                  </div>
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
                               <input type='submit' class='btn btn-outline-secondary' name='Boton' value='Guardar'>
                               <input type='submit' class='btn btn-outline-secondary' name='Boton' value='Modificar'>
                               <input type='submit' class='btn btn-outline-secondary' name='Boton' value='Consultar'>
                            </div>
                      </form>
                     
                 </div>
             </div>
             <div class='col-md-2'>
               <div class='IProveedor'>
                   <img src='../Imagen/IdeaLogo.jpg' class='rounded float-left'  width='110' height='100' >
               </div>
             </div>
         </div>
       </div>





        <!--<form >
            <div class='jumbotron text-center' style='background-color:#AED6F1;'>
                <h3>Datos Proveedor</h3>
            </div>
            <div class='container'>

                <div class='row'>
                    <div class='col-sm-6' style='text-align: center;'>
                        <label >Codigo</label>
                        <input type='text' name='txtCodigo' >
                    </div>
              
                    <div class='col-sm-6' style='text-align: center;'>
                        <label>Nombre</label>
                        <input type='text' name=''>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-sm-6' style='text-align: center;'>
                         <label>Tipo</label>
                        <select id='Tipo'  onchange='ShowSelected();'>
                            <option value='1'>Juridica</option>
                            <option value='0'>Natural</option>
                        </select>
                        <br>
                    </div>
                    
                    
                    <div class='col-sm-6' style='text-align: center;'>
                        <label>Fecha Registro</label>
                        <input type='date' name=''>
                    </div>

                    <div class='col-sm-6' style='text-align: center;'>
                        <label>Fecha Inactivo</label>
                        <input type='date' name=''>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-sm-6' style='text-align: center;'>
                        <label>Foto</label>
                        <input type='file' name='' accept='image/*'>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-sm-6' style='text-align: center;'>
                        <label>Email</label>
                        <input type='text' name=''>
                    </div>
                    <div class='col-sm-6' style='text-align: center;'>
                        <label>Telefono</label>
                        <input type='text' name=''>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-sm-6' style='text-align: center;'>
                         <label>Estado</label>
                        <select id='Estado' name='' onchange='ShowSelected();'>
                            <option value='1'>Activo</option>
                            <option value='0'>Inactivo</option>
                        </select>
                        <br>
                    </div>
                </div

                <div class='row'>
                    <div class='col-sm-8' style='text-align: right;' >
                       
                </div>
        </form>-->
    </body>
</html>
";

