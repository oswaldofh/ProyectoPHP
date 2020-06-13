<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
include("../Control/configBd.php");
include("../Control/ControlUsuario.php");
include("../Modelo/Usuario.php");

$Nombre = isset($_SESSION['Usu'])  ? $_SESSION['Usu'] : header('Location: ../index.php');
$Tipo = isset($_SESSION['Tipo']) ? $_SESSION['Tipo'] : header('Location: ../index.php');

if ($Tipo == 'administrador') {

    try {

        $nomU = $_POST["Nombre"];
        $contU = $_POST["Contra"];
        $tipU = $_POST["Tipo"];
        $bot = $_POST["Boton"];

        switch ($bot) {
            case "Guardar":
                $objUsuario = new Usuario('', $nomU, $contU, $tipU);
                $objCtrUsuario = new ControlUsuario($objUsuario);
                if ($msj = $objCtrUsuario->guardarUsuario()) {
                    echo "<script>alert('" . $msj . "');</script>";
                }
                break;
            case 'Modificar':
                $objUsuario = new Usuario('', $nomU, $contU, $tipU);
                $objCtrUsuario = new ControlUsuario($objUsuario);
                if ($msj = $objCtrUsuario->modificarUsuario()) {
                    echo "<script>alert('" . $msj . "');</script>";
                }

                break;
            case 'Consultar':
                $objUsuario = new Usuario('', $nomU, '', '');
                $objCtrUsuario = new ControlUsuario($objUsuario);
                $objUsuario1 = $objCtrUsuario->consultarUsuario();
                $nomU = $objUsuario1->getNomUsuario();
                $contU = $objUsuario1->getContrasena();
                $tipU = $objUsuario1->getTipoAcceso();

                break;
            default:
                $objUsuario = new Usuario('', '', '', '');
                $objCtrUsuario = new ControlUsuario($objUsuario);
                $objUsuario1 = $objCtrUsuario->consultarUsuario();
                break;
        }
    } catch (Exception $objExp) {
        echo 'Se presentó una excepción: ', $objExp->getMessage(), "\n";
    }

    echo "
<!DOCTYPE html>
<html>
    <head>
    <title>Datos Usuarios</title>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
    <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
     <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
     <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
     <meta charset='UTF-8'>
     <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'>
     <link rel='stylesheet' href='../CSS/Style-Index.css'>
     <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    </head>
    <body>
        
      <div class='container'>
      <div class='row'>
          <div class='col-md-4'>
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
    
          </div>
          </div>
          <div class='col-md-4'>
              <form method='post'enctype= 'multipart/form-data' action='VistaUsuario.php'>
                  <div class='card mt-5'>
                      <div class='card-header text-center'>
                          <strong>Creacion de Usuario</strong>
                      </div>
                      <div class='card-body'>
                          <div class='form-group text-center'>
                             <label for='Usuario1'>Usuario</label>
                             <input  type=\"text\"  class=\"form-control\" id=\"validationCustom01\" name=\"Nombre\" value=\"" . $nomU . "\" placeholder='Ingrese el numero de identificacion'>
                          </div>
                          <br>
                          <div class='form-group text-center'>
                             <label for='Usuario1'>Contraseña</label>
                             <input  type=\"password\"  class=\"form-control\" id=\"validationCustom01\" name=\"Contra\" value=\"" . $contU . "\">
                          </div>
                          <div class='form-group text-center'>
                              <label for='Usuario1'>Tipo de Usuario</label>
                              <select class='form-control'id='Tipo' name='Tipo'>
                                <option value='administrador'>Administrador</option>
                                <option value='empleado'>Empleado</option>
                                <option value='proveedor'>Proveedor</option>
                                <option value='cliente'>Cliente</option>
                              </select>
                             
                       </div>
                      </div>
                      <div class='card-footer'>
                          <input class='btn btn-outline-secondary' type='submit' name='Boton' value='Guardar'>
                          <input class='btn btn-outline-secondary' type='submit' name='Boton' value='Modificar'>
                          <input class='btn btn-outline-secondary' type='submit' name='Boton' value='Consultar'>
                       </div>
                  </div>
             
              </form> 
              <hr>
                        <br>
                        <div class='text-center'><h3>Lista de Productos</h3></div>
                        <table class='table' border='2'>
                        <thead class='thead text-center'>
                        <tr>
                            <td><strong>Codigo</strong></td>
                            <td><strong>Tipo Acceso</strong></td>
                        </tr>
                        </thead> 

";
    $objUsuario = new Usuario('', '', '', '');
    $objCtrUsuario = new ControlUsuario($objUsuario);
    $usuarios = $objCtrUsuario->consultarTodos();

    while ($mostrar = mysqli_fetch_array($usuarios)) {
        echo "
                        <tr>
                            <td>$mostrar[nomUsuario]</td>
                            <td>$mostrar[tipoAcceso]</td>
                        </tr>
";
    };

    echo "
                    </table>
 
          </div>
          <div class='col-md-4'>
             
          </div>
      <div>
  </div>
</body>
</html>
";
} else {
    echo "<script>alert('No tienes permiso para ingresar a esta opcion');window.location= 'VistaMenu.php'</script>";
}
