<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include('../Modelo/Notificacion.php');
include('../Control/ControlNotificacion.php');

$Nombre = isset($_SESSION['Usu'])  ? $_SESSION['Usu'] : header('Location: ../index.php');
$Tipo = isset($_SESSION['Tipo']) ? $_SESSION['Tipo'] : header('Location: ../index.php');
$objnoti = new Notificacion('', '', '', '', '', '', '');
$objCtrNoti = new ControlNotificacion($objnoti);
$cantidad = $objCtrNoti->notiSinLeer();
$data = mysqli_fetch_assoc($cantidad);
echo $data['total'];

//while ($mostrar = mysqli_fetch_array($cantidad)) {
//    $cantidad=$mostrar['cant'];
//}
?>

<!DOCTYPE html>
<html>

<head>
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
   <link rel="stylesheet" href="../CSS/Style-Index.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>

   <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <a class="navbar-brand" href="#">
         <img class="d-inline-block align-top" src="../Imagen/IdeaLogo.jpg" width="45" heigth="45">
      </a>
      <?php
      switch ($Tipo) {
         case 'administrador':

      ?>
            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaMenu.php">Home</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaCliente.php">Clientes</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaProveedor.php">Proveedores</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaProducto.php">Productos</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaEmpleado.php">Empleados</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaUsuario.php">Usuarios</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaUbicacion.php">Mapa Ubi</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/cerrarSesion.php">Cerrar Sesión</a>
            </li>
            <li class="dropdown notifications-menu" id="Notificacion">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i id="Campana" class="far fa-bell fa-lg fa-pulse"></i>
                  <span class="label label-warning"><?php echo $data['cant']; ?></span>
               </a>
               <ul class="dropdown-menu">
                  <li class="header"><?php echo $data['cant']; ?> modificaciones pendientes</li>
                  <li>
                     <!-- inner menu: contains the actual data -->
                     <ul class="menu">

                        <?php
                        $desc = $objCtrNoti->datosNotificacion();
                        $usuario = '';
                        while ($noti = mysqli_fetch_array($desc)) {
                           if ($usuario != $noti['usuario']) {
                              $usuario = $noti['usuario'];
                        ?>
                              <li>
                                 <a href="VistaNotificacion.php?">
                                    <i class="fa fa-users text-aqua"></i> El usuario <?php echo $noti['usuario']; ?> solicita modificacion de su perfil
                                 </a>
                              </li>
                        <?php
                           }
                        } ?>

                     </ul>
                  </li>
               </ul>
            </li>

         <?php
            break;
         case 'cliente':

         ?>
            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaMenu.php">Home</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaCliente.php">Clientes</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/cerrarSesion.php">Cerrar Sesión</a>
            </li>
         <?php
            break;
         case 'empleado':
         ?>
            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaMenu.php">Home</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaEmpleado.php">Empleados</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/cerrarSesion.php">Cerrar Sesión</a>
            </li>

         <?php
            break;
         case 'proveedor':
         ?>
            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaMenu.php">Home</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/VistaProveedor.php">Proveedores</a>
            </li>

            <li class='nav-item active'>
               <a class="btn btn-outline-secondary" href="../vista/cerrarSesion.php">Cerrar Sesión</a>
            </li>
      <?php
            break;
         default:
            header('Location: ../index.php');
            break;
      }
      ?>



      <div class="alert alert-dark" role="alert">
         <span class="navbar-text-">
            Bienvenido <?php echo "$Nombre" ?>
         </span>
      </div>
   </nav>


</body>

</html>