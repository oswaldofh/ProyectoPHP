<?php
class  Usuario{
    var $idUsuario;
    var $nomUsuario;
    var $contrasena;
    var $tipoAcceso;
    
    function __construct($idUsuario, $nomUsuario, $contrasena, $tipoAcceso) {
        $this->idUsuario = $idUsuario;
        $this->nomUsuario = $nomUsuario;
        $this->contrasena = $contrasena;
        $this->tipoAcceso = $tipoAcceso;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNomUsuario() {
        return $this->nomUsuario;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getTipoAcceso() {
        return $this->tipoAcceso;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNomUsuario($nomUsuario) {
        $this->nomUsuario = $nomUsuario;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setTipoAcceso($tipoAcceso) {
        $this->tipoAcceso = $tipoAcceso;
    }


    
    
}

