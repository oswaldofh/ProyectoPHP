<?php
include("../control/ControlConexion.php");

class ControlUbicacion{

    var $objUbicacion;

    function __construct($objUbicacion) {
        $this->objUbicacion = $objUbicacion;
    }

    function consultartodo()
    {
        $cmdSql = "SELECT latCliente as latitud, lonCliente as longitud, nomCliente as nombre, fechaRegistro as fecha, 
        emailCliente as email, telefonoCliente as telefono FROM clientes 
        UNION SELECT latProveedor as latitud, lonProveedor as longitud, nomProveedor as nombre, fechaRegistro as fecha,
        emailProveedor as email, telefonoProveedor as telefono FROM proveedores
        UNION SELECT latEmpleado as latitud, lonEmpleado as longitud, nomEmpleado as nombre, fechaIngreso as fecha,
        emailEmpleado as email, celular as telefono FROM empleados";

        try {

            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            $recordSet = $objConexion->ejecutarSelect($cmdSql);
            $objConexion->cerrarBd();
            
        } catch (Exception $objExp) {
            echo $objExp->getMessage();
        }
        return $recordSet;
    }
}


