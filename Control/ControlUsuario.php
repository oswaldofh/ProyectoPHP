<?php
include('ControlConexion.php');
class ControlUsuario {

    var $objUsuario;

    function __construct($objUsuario) {
        $this->objUsuario = $objUsuario;
    }

    function validarIngreso() {
        $valido ="";
        $objUsuarioLogin = new Usuario('', '', '', '');
        $usario = $this->objUsuario->getNomUsuario();
        $contra = $this->objUsuario->getContrasena();
        $objConexion = new ControlConexion();
        try {
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            $comandoSql = "SELECT * FROM usuarios WHERE nomUsuario='" . $usario . "' AND contrasena='" . $contra . "'";
            $recordSet = $objConexion->ejecutarSelect($comandoSql);
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);
            $objUsuarioLogin->setNomUsuario($registro['nomUsuario']);
            $objUsuarioLogin->setContrasena($registro['contrasena']);
            $objUsuarioLogin->setTipoAcceso($registro['tipoAcceso']);
            
        } catch (Exception $ex) {
            echo "ERROR " . $ex->getMessage() . "\n";
        }
        $objConexion->cerrarBd();

        if ($this->objUsuario->getNomUsuario() == $objUsuarioLogin->getNomUsuario() &&
                $this->objUsuario->getContrasena() == $objUsuarioLogin->getContrasena() &&
                $this->objUsuario->getNomUsuario() != "" &&
                $this->objUsuario->getContrasena() != "") {

            $valido = $objUsuarioLogin->getTipoAcceso();
        } else {
            $valido = "";
        }
        return $valido;
    }

    function guardarUsuario()
    {
        $msj = "";

        $nom = $this->objUsuario->getNomUsuario();
        $cont = $this->objUsuario->getContrasena();
        $tip = $this->objUsuario->getTipoAcceso();

        $cmdSql = "INSERT INTO usuarios VALUES(' ','" . $nom . "','" . $cont . "','" . $tip . "')";

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

    function modificarUsuario()
    {
        $msj = "";

        $nom = $this->objUsuario->getNomUsuario();
        $cont = $this->objUsuario->getContrasena();
        $tip = $this->objUsuario->getTipoAcceso();

        $cmdSql = "UPDATE usuarios SET contrasena='" . $cont . "', tipoAcceso='" . $tip . "' WHERE nomUsuario='" . $nom . "'";

        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);

            if (!$objConexion->ejecutarComandoSql($cmdSql)) {
                $msj = "Registro Modificado";
            } else {
                $msj = "Ojo..No se Modifico";
            }
            $objConexion->cerrarBd();
        } catch (Exception $objExp) {
            $msj = $objExp->getMessage();
        }
        return $msj;
    }

    function consultarUsuario()
    {
        
        $nom = $this->objUsuario->getNomUsuario();
        $cmdSql = "SELECT * FROM usuarios WHERE nomUsuario='" . $nom . "'";

        try {
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat']);
            $recordSet = $objConexion->ejecutarSelect($cmdSql);
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);

            $this->objUsuario->setNomUsuario($registro['nomUsuario']);
            $this->objUsuario->setContrasena($registro['contrasena']);
            $this->objUsuario->setTipoAcceso($registro['tipoAcceso']);

            $objConexion->cerrarBd();
        } catch (Exception $e) {
            echo "ERROR " . $e->getMessage() . "\n";
        }
        return $this->objUsuario;

    }

    function consultarTodos()
    {
        
        $nom = $this->objUsuario->getNomUsuario();
        $cmdSql = "SELECT * FROM usuarios";

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
