<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include("../Control/configBd.php");
include("../Control/ControlNotificacion.php");
include("../Modelo/Notificacion.php");

$Nombre = isset($_SESSION['Usu'])  ? $_SESSION['Usu'] : header('Location: ../index.php');
$Tipo = isset($_SESSION['Tipo']) ? $_SESSION['Tipo'] : header('Location: ../index.php');

$bot = $_POST['Boton'];
$usuario = $_POST['Id'];


if ($bot == 'Aceptar') {
    $id = $_POST['id'];
    $tabla = $_POST['tabla'];
    $campo = $_POST['campo'];
    $dato = $_POST['nuevoDato'];
    $usuario = $_POST['usuario'];
    $objNoti = new Notificacion($id, $usuario, $tabla, '', 1, $campo, $dato);
    $objCtrNoti = new ControlNotificacion($objNoti);
    $msj = $objCtrNoti->ModificarDatos();
} else if ($bot == 'Cancelar') {
    $id = $_POST['id'];
    $objNoti = new Notificacion($id, '', '', '', '', '', '');
    $objCtrNoti = new ControlNotificacion($objNoti);
    $msj = $objCtrNoti->MarcarLeido();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
    <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
    <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'>
    <link rel='stylesheet' href='../CSS/Style-Index.css'>

</head>

<body>
    <div class='col-md-2'>
        <div class='row'>
            <div class='col-sm-9'>
                <br />
                <nav class='navbar navbar-expand-lg navbar-light bg-light'>
                    <a class='navbar-brand' href='VistaMenu.php'>
                        <img class='d-inline-block align-top' src='../Imagen/IdeaLogo.jpg' width='45' height='45'>
                    </a>


                    <ul class='nav nav-pills'>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' href='#'>Menu</a>

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

    <br>
    <br>
    <table class='table table-dark' border='2' align='center'>
        <thead class='thead text-center'>
            <tr>
                <td><strong>Usuario</strong></td>
                <td><strong>Campo</strong></td>
                <td><strong>Nuevo Dato</strong></td>

            </tr>
        </thead>
        <?php
        $objNoti = new Notificacion('', '', '', '', '', '', '');
        $objCtrNoti = new ControlNotificacion($objNoti);
        $objNoti = $objCtrNoti->datosNotificacion();

        if ($objNoti->num_rows > 0) {

            while ($mostrar = $objNoti->fetch_assoc()) {

        ?>
                <tr>
                    <form method='post' enctype='multipart/form-data' action='VistaNotificacion.php'>
                        <td><input type="hidden" name='usuario' value="<?php echo $mostrar['usuario'] ?>"><?php echo $mostrar['usuario'] ?></td>
                        <td><input type="hidden" name='campo' value="<?php echo $mostrar['campo'] ?>"><?php echo $mostrar['campo'] ?></td>
                        <td><input type="hidden" name='nuevoDato' value="<?php echo $mostrar['nuevoDato'] ?>"><?php echo $mostrar['nuevoDato'] ?></td>
                        <td><input type='submit' name='Boton' class='btn btn-success' value='Aceptar' id='<?php echo $mostrar['id'] ?>'></td>
                        <td><input type='submit' name='Boton' class='btn btn-danger' value='Cancelar'></td>
                        <input type='hidden' name='id' value='<?php echo $mostrar['id'] ?>'>
                        <input type='hidden' name='tabla' value='<?php echo $mostrar['tipo'] ?>'>
                    </form>

                </tr>
        <?php
            }
        }
        ?>
        <script>
            function completar(e) {
                var id = e.id;
                console.log(id);
            }
        </script>
    </table>
    <!--  </form>-->
</body>

</html>