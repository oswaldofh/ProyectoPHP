<?php

//include('ControlConexion.php');

class ControlCliente {

    var $objCliente;

    function __construct($objCliente) {
        $this->objCliente = $objCliente;
    }

    function guardarCliente() {
        $msj = "";
        $cod = $this->objCliente->getCodCliente();
        $nom = $this->objCliente->getNomCliente();
        $tip = $this->objCliente->getTipoCliente();
        $feRe = $this->objCliente->getFechaRegistro();
        $feIn = $this->objCliente->getFechaInactivo();
        $fot = $this->objCliente->getImagenCliente();
        $email = $this->objCliente->getEmailCliente();
        $tel = $this->objCliente->getTelefonoCliente();
        $cred = $this->objCliente->getCreditoCliente();
        $est = $this->objCliente->getEstadoCliente();
        $lat = $this->objCliente->getLatCliente();
        $lon = $this->objCliente->getLonCliente();



        $cmdSql = "INSERT INTO clientes VALUES('" . $cod . "','" . $nom . "','" . $tip . "','" . $feRe . "','"
                . $feIn . "','" . $fot . "','" . $email . "','" . $tel . "','" . $cred . "','" . $est . "','"
                . $lat . "','" . $lon . "')";

        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            if (!$objConexion->ejecutarComandoSql($cmdSql)) {
                $msj = "Registro Guardado";
            }else{
               $msj = "Ojo..No se guardo";  
            }
            $objConexion->cerrarBd();
        } catch (Exception $objExp) {
            $msj = $objExp->getMessage();
        }
        return $msj;
    }

    function modificarCliente() {
        $msj = "";

        $cod = $this->objCliente->getCodCliente();
        $nom = $this->objCliente->getNomCliente();
        $tip = $this->objCliente->getTipoCliente();
        $feRe = $this->objCliente->getFechaRegistro();
        $feIn = $this->objCliente->getFechaInactivo();
        $fot = $this->objCliente->getImagenCliente();
        $email = $this->objCliente->getEmailCliente();
        $tel = $this->objCliente->getTelefonoCliente();
        $cred = $this->objCliente->getCreditoCliente();
        $est = $this->objCliente->getEstadoCliente();
        $lat = $this->objCliente->getLatCliente();
        $lon = $this->objCliente->getLonCliente();
        $cmdSql = "UPDATE clientes SET nomCliente='" . $nom . "', tipoCliente='" . $tip . "', fechaRegistro='" . $feRe .
                "', fechaInactivo='" . $feIn . "', imgenCliente='" . $fot . "', emailCliente='" . $email . "', telefonoCliente='" . $tel .
                "', creditoCliente='" . $cred . "', estadoCliente='" . $est . "', latCliente='" . $lat . "', lonCliente='" . $lon . "' WHERE codCliente='" . $cod . "'";

        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            if (!$objConexion->ejecutarComandoSql($cmdSql)) {
                $msj = "Registro Modificado";
            }else{
               $msj = "Ojo..No se modifico";  
            }
            $objConexion->cerrarBd();
        } catch (Exception $objExp) {
            $msj = $objExp->getMessage();
        }
        return $msj;
    }

    function consultarCliente() {
        $cod = $this->objCliente->getCodCliente();
        $cmdSql = "SELECT * FROM clientes WHERE codCliente='" . $cod . "'";

        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            $recordSet = $objConexion->ejecutarSelect($cmdSql);
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);

            $this->objCliente->setCodCliente($registro['codCliente']);
            $this->objCliente->setNomCliente($registro['nomCliente']);
            $this->objCliente->setTipoCliente($registro['tipoCliente']);
            $this->objCliente->setFechaRegistro($registro['fechaRegistro']);
            $this->objCliente->setFechaInactivo($registro['fechaInactivo']);
            $this->objCliente->setImagenCliente($registro['imgenCliente']);
            $this->objCliente->setEmailCliente($registro['emailCliente']);
            $this->objCliente->setTelefonoCliente($registro['telefonoCliente']);
            $this->objCliente->setCreditoCliente($registro['creditoCliente']);
            $this->objCliente->setEstadoCliente($registro['estadoCliente']);
            $this->objCliente->setLatCliente($registro['latCliente']);
            $this->objCliente->setLonCliente($registro['lonCliente']);

            $objConexion->cerrarBd();
        } catch (Exception $e) {
            echo "ERROR " . $e->getMessage() . "\n";
        }
        return $this->objCliente;
    }


    function consultarTodos() {
        $cod = $this->objCliente->getCodCliente();
        $cmdSql = "SELECT * FROM clientes WHERE estadoCliente='1'";

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
