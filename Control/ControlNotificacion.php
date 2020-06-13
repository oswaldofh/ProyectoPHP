<?php
include("configBd.php");
include("../Control/ControlConexion.php");

class ControlNotificacion {
    var $objNotificacion;

    function __construct($objNotificacion)
    {
        $this->objNotificacion=$objNotificacion;
    }


    function guardarNotificacion(){
        $msg = "";

        $nombre=$this->objNotificacion->getUsuario();
        $tipo = $this->objNotificacion->getTipo();
        $fecha=$this->objNotificacion->getFecha();
        $leido=$this->objNotificacion->getLeido();
        $campo=$this->objNotificacion->getCampo();
        $nuevoDato= $this->objNotificacion->getNuevoDato();

        $cmdSql = "INSERT INTO notificaciones VALUES(' ','" . $nombre . "','" . $tipo. "','" . $fecha. "','"
        . $leido . "','" . $campo. "','" . $nuevoDato . "')";
        
        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            if (!$objConexion->ejecutarComandoSql($cmdSql)) {
                $msj = "Registro pendiente por aprobacion";
            }else{
               $msj = "Ojo..No se guardo";  
            }
            $objConexion->cerrarBd();
        } catch (Exception $objExp) {
            $msj = $objExp->getMessage();
        }
        return $msj;
    }

    function notiSinLeer(){
       
        $cmdSql = "SELECT count('*') as cant FROM notificaciones WHERE leido='0'";
       try {
           $objConexion = new ControlConexion();
           $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
           $cantidad = $objConexion->ejecutarSelect($cmdSql);
           $objConexion->cerrarBd();
           
       } catch (Exception $e) {
           echo "ERROR " . $e->getMessage() . "\n";
       }
       return $cantidad;

    }

    function datosNotificacion(){
        $cmdSql = "SELECT * FROM notificaciones WHERE leido='0'";
        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            $resulset = $objConexion->ejecutarSelect($cmdSql);
            $objConexion->cerrarBd();
            
        } catch (Exception $e) {
            echo "ERROR " . $e->getMessage() . "\n";
        }
        return $resulset;
    }

    function ModificarDatos()
    {

        $id=$this->objNotificacion->getIdNotificacion();
        $Tabla=$this->objNotificacion->getTipo();
        $campo=$this->objNotificacion->getCampo();
        $dato= $this->objNotificacion->getNuevoDato();
        $Usuario=$this->objNotificacion->getUsuario();
        if ($Tabla=='clientes') {
            $cmdSql = "UPDATE $Tabla SET $campo = '" . $dato . "' WHERE CodCliente =$Usuario";
            $cmdSql2="update notificaciones set leido= '1' where id=$id";
            var_dump($cmdSql);
            var_dump($cmdSql2);
        }
        if ($Tabla=='proveedores') {
            $cmdSql = "UPDATE $Tabla SET $campo = '" . $dato . "' WHERE codProveedor =$Usuario";
            $cmdSql2="update notificaciones set leido= '1' where id=$id";
            var_dump($cmdSql);
            var_dump($cmdSql2);
        }
        if ($Tabla=='empleados') {
            $cmdSql = "UPDATE $Tabla SET $campo = '" . $dato . "' WHERE codEmpleado =$Usuario";
            $cmdSql2="update notificaciones set leido= '1' where id=$id";
            var_dump($cmdSql);
            var_dump($cmdSql2);
        }

        try {

            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            $msg = $objConexion->ejecutarComandoSql($cmdSql);
            $objConexion->ejecutarComandoSql($cmdSql2);

            $objConexion->cerrarBd();
            
        } catch (Exception $e) {
            echo "ERROR " . $e->getMessage() . "\n";
        }
        return $msg;

    }
    function MarcarLeido(){
        $id=$this->objNotificacion->getIdNotificacion();

        $cmdSql="update notificaciones set leido= '1' where id=$id";
        try {

            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            $objConexion->ejecutarComandoSql($cmdSql);

            $objConexion->cerrarBd();
            
        } catch (Exception $e) {
            echo "ERROR " . $e->getMessage() . "\n";
        }

    }
}


?>