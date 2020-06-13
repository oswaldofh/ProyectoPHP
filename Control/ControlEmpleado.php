<?php

//include('ControlConexion.php');

class ControlEmpleado
{

    var $objEmpleado;

    function __construct($objEmpleados)
    {
        $this->objEmpleado = $objEmpleados;
    }

    function guardarEmpleado()
    {
        $mensaje = " ";
        $cod = $this->objEmpleado->getCodEmpleado();
        $nomEmp = $this->objEmpleado->getNomEmpleado();
        $fechIn = $this->objEmpleado->getFechaIngreso();
        $fechRe = $this->objEmpleado->getFechaRetiro();
        $salar = $this->objEmpleado->getSalarioBasico();
        $dedu = $this->objEmpleado->getDeducciones();
        $foto = $this->objEmpleado->getFotoEmpleado();
        $hoja = $this->objEmpleado->getHojaVida();
        $correo = $this->objEmpleado->getEmailEmpleado();
        $fijo = $this->objEmpleado->getTelefono();
        $cel = $this->objEmpleado->getCelular();
        $estado = $this->objEmpleado->getEstadoEmpleado();
        $latitutd = $this->objEmpleado->getLatEmpleado();
        $longitud = $this->objEmpleado->getLonEmpleado();

        $cmdSql = "INSERT INTO empleados VALUES('" . $cod . "','" . $nomEmp . "','" . $fechIn . "','" . $fechRe . "','"
            . $salar . "','" . $dedu . "','" . $foto . "','" . $hoja . "','" . $correo . "','" . $fijo . "','" . $cel .
            "','" . $estado . "','" . $latitutd . "','" . $longitud . "')";

        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            if (!$objConexion->ejecutarComandoSql($cmdSql)) {
                $mensaje = "Registro Guardado";
            } else {
                $mensaje = "Ojo..No se guardo";
            }
            $objConexion->cerrarBd();
        } catch (Exception $objExp) {
            $mensaje = $objExp->getMessage();
        }
        return $mensaje;
    }

    function ModificarEmpleado()
    {
        $mensaje = " ";
        $cod = $this->objEmpleado->getCodEmpleado();
        $nomEmp = $this->objEmpleado->getNomEmpleado();
        $fechIn = $this->objEmpleado->getFechaIngreso();
        $fechRe = $this->objEmpleado->getFechaRetiro();
        $salar = $this->objEmpleado->getSalarioBasico();
        $dedu = $this->objEmpleado->getDeducciones();
        $foto = $this->objEmpleado->getFotoEmpleado();
        $hoja = $this->objEmpleado->getHojaVida();
        $correo = $this->objEmpleado->getEmailEmpleado();
        $fijo = $this->objEmpleado->getTelefono();
        $cel = $this->objEmpleado->getCelular();
        $estado = $this->objEmpleado->getEstadoEmpleado();
        $latitutd = $this->objEmpleado->getLatEmpleado();
        $longitud = $this->objEmpleado->getLonEmpleado();

        $cmdSql = "UPDATE empleados SET nomEmpleado='" . $nomEmp . "', fechaIngreso='" . $fechIn . "', fechaRetiro='" . $fechRe .
            "', salarioBasico='" . $salar . "', deduciones='" . $dedu . "', fotoEmpleado='" . $foto . "', hojaVida='" . $hoja .
            "', emailEmpleado='" . $correo . "', telefono='" . $fijo . "', celular='" . $cel . "', estadoEmpleado='" . $estado .
            "', latEmpleado='" . $latitutd . "', lonEmpleado='" . $longitud . "' WHERE codEmpleado='" . $cod . "'";

        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            if (!$objConexion->ejecutarComandoSql($cmdSql)) {
                $mensaje = "Registro Update";
            } else {
                $msj = "Ojo..No se modifico";
            }
            $objConexion->cerrarBd();
        } catch (Exception $objExp) {
            $mensaje = $objExp->getMessage();
        }
        return $mensaje;
    }

    function ConsultarEmpleado()
    {

        $cod = $this->objEmpleado->getCodEmpleado();
        $cmdSql = "SELECT * FROM empleados WHERE codEmpleado='" . $cod . "' and estadoEmpleado='1'";
        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            $recordSet = $objConexion->ejecutarSelect($cmdSql);
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);

            $this->objEmpleado->setCodEmpleado($registro['codEmpleado']);
            $this->objEmpleado->setNomEmpleado($registro['nomEmpleado']);
            $this->objEmpleado->setFechaIngreso($registro['fechaIngreso']);
            $this->objEmpleado->setFechaRetiro($registro['fechaRetiro']);
            $this->objEmpleado->setSalarioBasico($registro['salarioBasico']);
            $this->objEmpleado->setDeducciones($registro['deduciones']);
            $this->objEmpleado->setFotoEmpleado($registro['fotoEmpleado']);
            $this->objEmpleado->setHojaVida($registro['hojaVida']);
            $this->objEmpleado->setEmailEmpleado($registro['emailEmpleado']);
            $this->objEmpleado->setTelefono($registro['telefono']);
            $this->objEmpleado->setCelular($registro['celular']);
            $this->objEmpleado->setEstadoEmpleado($registro['estadoEmpleado']);
            $this->objEmpleado->setLatEmpleado($registro['latEmpleado']);
            $this->objEmpleado->setLonEmpleado($registro['lonEmpleado']);

            $objConexion->cerrarBd();
        } catch (Exception $e) {
            echo "ERROR " . $e->getMessage() . "\n";
        }
        return $this->objEmpleado;
    }

    function ConsultarTodos()
    {

        $cod = $this->objEmpleado->getCodEmpleado();
        $cmdSql = "SELECT * FROM empleados WHERE estadoEmpleado='1'";
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
