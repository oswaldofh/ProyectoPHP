<?php

include("../control/ControlConexion.php");

class ControlProducto {

    var $objProducto;

    function __construct($objProducto) {
        $this->objProducto = $objProducto;
    }

    function GuardarProducto() {
        $msg = "";

        $cod = $this->objProducto->getCodProducto();
        $nom = $this->objProducto->getNomProducto();
        $fot = $this->objProducto->getImagen();
        $comandoSql = "INSERT INTO productos VALUES('','" . $nom . "','" . $fot . "')";
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

    function ModificarProducto() {
        $msg = "";

        $cod = $this->objProducto->getCodProducto();
        $nom = $this->objProducto->getNomProducto();
        $fot = $this->objProducto->getImagen();
        $comandoSql = "UPDATE productos SET nomProducto='" . $nom . "',	imagen='" . $fot . "' WHERE codProducto='" . $cod . "'";
        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);

            if (!$objConexion->ejecutarComandoSql($comandoSql)) {
                $msg = "Registro Modificado";
            } else {
                $msg = "No se Modifico el registro";
            }
            $objConexion->cerrarBd();
        } catch (Exception $objExp) {
            $msg = $objExp->getMessage();
        }
        return $msg;
    }

    function ConsultarProducto() {

        $cod = $this->objProducto->getCodProducto();
        $cmdSql = "SELECT * FROM productos WHERE codProducto='" . $cod . "'";
        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            $recordSet = $objConexion->ejecutarSelect($cmdSql);
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);
            $this->objProducto->setCodProducto($registro['codProducto']);
            $this->objProducto->setNomProducto($registro['nomProducto']);
            $this->objProducto->setImagen($registro['imagen']);
            $objConexion->cerrarBd();
        } catch (Exception $objExp) {
            echo $objExp->getMessage();
        }
        return $this->objProducto;
    }
    
     function consultartodo()
    {
        $cmdSql = "SELECT * FROM productos";

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
