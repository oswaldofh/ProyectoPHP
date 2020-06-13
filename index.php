<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
include("Control/configBd.php");
include("Control/ControlUsuario.php");
include("Modelo/Usuario.php");

try {
    $Usu = $_POST['txtUsu'];
    $Con = $_POST['txtContra'];
    $bot = $_POST['btnIngresar'];
    $_SESSION['Usu'] = $_POST['txtUsu'];
    

    if ($bot == 'Ingresar') {
        $objUsuario = new Usuario('', $Usu, $Con, '');
        $objCtrUsuario = new ControlUsuario($objUsuario);
        if($tipo = $objCtrUsuario->validarIngreso()){
        $_SESSION['Tipo'] = $tipo;
        header('Location: Vista/VistaMenu.php');
    }else{
        echo "<script>alert('usuario o contraseña incorrecta');</script>";
    }

    }
} catch (Exception $objExp) {
    echo 'Se presentó una excepción: ', $objExp->getMessage(), '\n';
}

echo "
<!DOCTYPE html>
<html>
    <head>
        <title>PROYECTO FINAL</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
        <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
         <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
         <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
          <meta charset='UTF-8'>
          <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'>
         <link rel='stylesheet' href='CSS/Style-Index.css'>
        <!-- Jorge Codigo que se tenia desde el principio
        <link rel='stylesheet' type='text/css' href='Estilo.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script> -->
    </head>
    <body>
           <div class='container'>
              <div class='row'>
                  <div class='col-lg-4 m-auto'>
                    <div class='card mt-5 bg-light'>
                       <div class='card-title text-center mt-3'>
                         <img src='Imagen/LoginIdex.png' width='150px' heigth='150px'>
                       </div>
                       <div class='card-body'>
                           
                          <form method='post' action='index.php'>
                             <div class='input-group- mb-3'>
                                <div class='input-group-prepend'>
                                    <span class='input-group-text'>
                                       <i class='fa fa-user fa-2x'></i>
                                    </span>
                                    <input type='text' name='txtUsu'  class='form-control py-4' placeholder='Ingrese el Usuario' required>
                                </div>
                                 <br>
                                <div class='input-group-prepend'>
                                <span class='input-group-text'>
                                   <i class='fa fa-lock fa-2x'></i>
                                </span>
                                    <input type='password' name='txtContra' class='form-control py-4' placeholder='Ingrese la Contraseña' required>
                                </div>
                             <div>
                               <br>

                               <div class='col text-center'>
                                 <input type='submit'  class='btn btn-outline-primary' name='btnIngresar' id='ingresar' value='Ingresar'>
                                </div>
                                 </form>
                       </div>
                    </div> 
                  </div>
              </div>
           </div>
    </body>
</html>
";
