<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
include("../control/configBd.php");
include("../modelo/Producto.php");
include("../control/ControlProducto.php");
$Nombre = isset($_SESSION['Usu'])  ? $_SESSION['Usu'] : header('Location: ../index.php');
$Tipo = isset($_SESSION['Tipo']) ? $_SESSION['Tipo'] : header('Location: ../index.php');


if ($Tipo == 'administrador') {
    
    try {

        if ($_POST["btn"] == " ") {
            echo "<script>alert('No presiono ningun boton');</script>";
        } else {

        $nomA = $_FILES['imagen']['name']; //obtiene el nombre
        $Arch = $_FILES['imagen']['tmp_name']; //contiene el archivo
        $rut = "../Imagen/Producto"; //ruta de la capeta
        $ruta = $rut . "/" . $nomA; //Imagen/img.jpg donde se guardara

        if($nomA==""){
            $ruta="";
        }else{
            move_uploaded_file($Arch, $ruta); //mover el archivo
        }

            $cod = $_POST["txtCodProducto"];
            $nom = $_POST["txtNomProducto"];
            $fot = $ruta; //imagen/img.jpg
            $bot = $_POST["btn"];

            if ($bot == "Guardar") {
                $objProducto = new Producto('', $nom, $fot);
                $objCtrProducto = new ControlProducto($objProducto);
                if ($men = $objCtrProducto->GuardarProducto()) {
                    echo "<script>alert('" . $men . "');</script>";
                    $cod = ""; 
                    $nom = ""; 
                    $fot = "";
                }
            } else if ($bot == "Modificar") {
                if($fot==""){
                    $objProducto = new Producto($cod, '', '');
                    $objCtrProducto = new ControlProducto($objProducto);
                    $objProducto1 = $objCtrProducto->ConsultarProducto();
                    $fot = $objProducto1->getImagen();
                }
                
                $objProducto = new Producto($cod, $nom, $fot);
                $objCtrProducto = new ControlProducto($objProducto);
                if ($msg = $objCtrProducto->ModificarProducto()) {
                    echo "<script>alert('" . $msg . "');</script>";
                    $cod = ""; 
                    $nom = ""; 
                    $fot = "";
                }
            } else if ($bot == "Consultar") {
                
                $objProducto = new Producto($cod, '', '');
                $objCtrProducto = new ControlProducto($objProducto);
                $objProducto1 = $objCtrProducto->ConsultarProducto();
                $cod = $objProducto1->getCodProducto();
                $nom = $objProducto1->getNomProducto();
                $fot = $objProducto1->getImagen();

                if (is_null($nom)) {
                    echo "<script>alert('Producto no existe');</script>";
                }
            } else if ($bot == "Nuevo") {
                $cod = ""; 
                $nom = ""; 
                $fot = "";
            }
        }
    } catch (Exception $objExp) {
        echo 'Se presentó una excepción: ', $objExp->getMessage(), "\n";
    }

    echo "
<!DOCTYPE html>
<html>
    <head>
    <title>Productos</title>
    <meta charset='UTF-8'>
    <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'>
    <link rel='stylesheet' href='../CSS/Style-Index.css'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
    <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
    </head>
   
    <body>
            <div class='container'>
                <div class='row'>
                 <div class='col-sm-3'>
                   <div class='row'>
                      <div class='col-sm-10'>
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
                   <div class='col-sm-1'>
                   </div>
                    <div class='col-sm-1'>
                    </div>
               </div>
            </div>

                <div class='col-sm-6'><!--Se va ingresar Formulario-->
                     <div class='card bg-light mt-3'>
                        <div class='card-header text-center'>
                           <strong>FORMULARIO PRODUCTOS</strong>
                        </div>
                        <form method='post' enctype= 'multipart/form-data' action='VistaProducto.php'> <!--Inico del formulario-->
                            <div class='card-body ml-4'>
                                    <div class='card' style='max-width: 450px;' >
                                        <div class='card ml-5' style='max-width: 350px;'>
                                            <div class='Imagen' style='text-align: center'><!--Carga Imagen-->
                                                <img src='$fot' width='100px'/>
                                            </div> 
                                    </div> 
                                    <div class='row no-gutters'>
                            
                                        <div class='col-md-8'>
                                            <div class='card-body'>
                                              <label for='validationDefaultUsername'>Codigo: </label>
                                                <div class='input-group'>
                                                    <div class='input-group-prepend'>
                                                        <span class='input-group-text' id='inputGroupPrepend2'><i class='fas fa-ad'></i></span>  
                                                    </div>
                                                    <input id ='txtCodProducto' type=\"text\" name=\"txtCodProducto\" value=\"" . $cod . "\">
                                                </div>

                                                    <label for='validationDefaultUsername'>Nombre: </label>
                                                <div class='input-group'>
                                                    <div class='input-group-prepend'>
                                                        <span class='input-group-text' id='inputGroupPrepend2'><i class='fas fa-ad'></i></span>  
                                                    </div>
                                                        <input type=\"text\" name=\"txtNomProducto\" value=\"" . $nom . "\" >
                                                </div>
                                                    <label for='validationDefaultUsername'>Imagen: </label>
                                                <div class='input-group'>
                                                     <input type=\"file\" name=\"imagen\" accept=\"image/*\" value=\"foto\" >
                                                </div>
                                
                                            </div>
                                        </div>
                                                
                                    </div>
                                </div>
                                    
                        
                            </div>
                        
                            <div class='card-footer text-muted'>
                                <input class='btn btn-outline-secondary' type='submit' name='btn' value='Guardar'>
                                <input class='btn btn-outline-secondary' type='submit' name='btn' value='Modificar'>
                                <input class='btn btn-outline-secondary' type='submit' name='btn' value='Consultar'>
                                <input class='btn btn-outline-secondary' type='submit' name='btn' value='Nuevo'>
                            </div>
                            
                        </form>
                        <hr>
                        <br>
                        <div class='text-center'><h3>Lista de Productos</h3></div>
                        <table class='table' border='2'>
                        <thead class='thead text-center'>
                        <tr>
                            <td><strong>Codigo</strong></td>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Imagen</strong></td>
                        </tr>
                        </thead> 

";
    $objProducto = new Producto('', '', '');
    $objCtrProducto = new ControlProducto($objProducto);
    $productos = $objCtrProducto->consultartodo();

    while ($mostrar = mysqli_fetch_array($productos)) {
        echo "
                        <tr>

                            <td>$mostrar[codProducto]</td>
                            <td>$mostrar[nomProducto]</td>
                            <td><img src=$mostrar[imagen] width='50px'class='rounded-0'/></td>
                 
                       
                        </tr>
";
    };

    echo "
                    </table>

                                <div class='col-sm-3'>
                                
                                </div>
                     </div>
                </div>
                
    </body>
</html>
";
} else {
    echo "<script>alert('No tienes permiso para ingresar a esta opcion');window.location= 'VistaMenu.php'</script>";
}
