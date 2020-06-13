<?php
//include('ControlConexion.php');
class ControlProveedor
{
    var $objProveedor;

    function __construct($objProveedor)
    {
        $this->objProveedor = $objProveedor;
    }

    
    function guardarProveedor()
    {
        $msj = "";
        $cod = $this->objProveedor->getCodProveedor();
        $nom = $this->objProveedor->getNomProveedor();
        $tip = $this->objProveedor->getTipoProveedor();
        $feR = $this->objProveedor->getFechaRegistro();
        $feI = $this->objProveedor->getFechaInactivo();
        $fot = $this->objProveedor->getImagenProveedor();
        $email = $this->objProveedor->getEmailProveedor();
        $tel = $this->objProveedor->getTelefonoProveedor();
        $est = $this->objProveedor->getEstadoProveedor();
        $lat = $this->objProveedor->getLatitudProveedor();
        $lon=$this->objProveedor->getLongitudProveedor();


        $cmdSql = "INSERT INTO proveedores VALUES('" . $cod . "','" . $nom . "','" . $tip . "','" . $feR . "','"
            . $feI . "','" . $fot . "','" . $email . "','" . $tel . "','" . $est . "','" . $lat . "','" . $lon . "')";

        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            if (!$objConexion->ejecutarComandoSql($cmdSql)) {
                $msj = "Registro Guardado";
               
            } else {
                $msj = "Ojo..No se guardo";
            }
            $objConexion->cerrarBd();
        } catch (Exception $objExp) {
            $msj = $objExp->getMessage();
        }
        return $msj;
    }

    function modificarProveedor()
    {
        $msj = "";
        $cod = $this->objProveedor->getCodProveedor();
        $nom = $this->objProveedor->getNomProveedor();
        $tip = $this->objProveedor->getTipoProveedor();
        $feR = $this->objProveedor->getFechaRegistro();
        $feI = $this->objProveedor->getFechaInactivo();
        $fot = $this->objProveedor->getImagenProveedor();
        $email = $this->objProveedor->getEmailProveedor();
        $tel = $this->objProveedor->getTelefonoProveedor();
        $est = $this->objProveedor->getEstadoProveedor();
        $lat = $this->objProveedor->getLatitudProveedor();
        $lon=$this->objProveedor->getLongitudProveedor();

        $cmdSql = "UPDATE proveedores SET nomProveedor='" . $nom . "', tipoProveedor='" . $tip . "', fechaRegistro='" . $feR .
            "', fechaInactivo='" . $feI . "', imagenProveedor='" . $fot . "', emailProveedor='" . $email . "', telefonoProveedor='" . $tel .
            "', estadoProveedor='" . $est . "', latProveedor='" . $lat . "', lonProveedor='" . $lon . "' WHERE codProveedor='" . $cod . "'";

        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            if (!$objConexion->ejecutarComandoSql($cmdSql)) {
                $msj = "Registro Modificado";
            } else {
                $msj = "Ojo..No se modifico";
            }
            $objConexion->cerrarBd();
        } catch (Exception $objExp) {
            $msj = $objExp->getMessage();
        }
        return $msj;
    }

    function consultarProveedor()
    {
        $cod = $this->objProveedor->getCodProveedor();
        $cmdSql = "SELECT * FROM proveedores WHERE codProveedor='" . $cod . "'";

        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            $recordSet = $objConexion->ejecutarSelect($cmdSql);
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);

            $this->objProveedor->setCodProveedor($registro['codProveedor']);
            $this->objProveedor->setNomProveedor($registro['nomProveedor']);
            $this->objProveedor->setTipoProveedor($registro['tipoProveedor']);
            $this->objProveedor->setFechaRegistro($registro['fechaRegistro']);
            $this->objProveedor->setFechaInactivo($registro['fechaInactivo']);
            $this->objProveedor->setImagenProveedor($registro['imagenProveedor']);
            $this->objProveedor->setEmailProveedor($registro['emailProveedor']);
            $this->objProveedor->setTelefonoProveedor($registro['telefonoProveedor']);
            $this->objProveedor->setEstadoProveedor($registro['estadoProveedor']);
            $this->objProveedor->setLatitudProveedor($registro['latProveedor']);
            $this->objProveedor->setLongitudProveedor($registro['lonProveedor']);



            $objConexion->cerrarBd();
        } catch (Exception $e) {
            echo "ERROR " . $e->getMessage() . "\n";
        }
        return $this->objProveedor;
    }

    function consultarTodos()
    {
        $cod = $this->objProveedor->getCodProveedor();
        $cmdSql = "SELECT * FROM proveedores WHERE estadoProveedor='1'";

        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            $recordSet = $objConexion->ejecutarSelect($cmdSql);
        

            $objConexion->cerrarBd();
        } catch (Exception $e) {
            echo "ERROR " . $e->getMessage() . "\n";
        }
        return $recordSet;
    }
}
