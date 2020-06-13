<?php
class ControlProductoProveedor
{

    var $objProducProv;

    function __construct($objProducProv)
    {
        $this->objProducProv = $objProducProv;
    }

    function GuardarProProv() {
        $msg = "";

        $codP = $this->objProducProv->getCodProducto();
        $codPP= $this->objProducProv->getCodProveedor();
        $comandoSql = "INSERT INTO productoproveedor VALUES('','" . $codP . "','" . $codPP . "')";
        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);

            if (!$objConexion->ejecutarComandoSql($comandoSql)) {
                $msg = "Registro guardado";
            } else {
                $msg = "No se guardo el registro";
            }
            $objConexion->cerrarBd();
        } catch (Exception $objExp) {
            $msg = $objExp->getMessage();
        }
        return $msg;
    }
}
