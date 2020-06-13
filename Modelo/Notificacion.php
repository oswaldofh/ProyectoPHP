<?php

class Notificacion {
    var $idNotificacion;
    var $usuario;
    var $tipo;
    var $fecha;
    var $leido;
    var $campo;
    var $nuevoDato;


    function __construct($idNotificacion,$usuario,$tipo,$fecha,$leido,$campo,$nuevoDato){
        $this->idNotificacion= $idNotificacion;
        $this->usuario=$usuario;
        $this->tipo=$tipo;
        $this->fecha=$fecha;
        $this->leido=$leido;
        $this->campo=$campo;
        $this->nuevoDato=$nuevoDato;
    }
    function getIdNotificacion() {
        return $this->idNotificacion;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getLeido() {
        return $this->leido;
    }

    function getCampo() {
        return $this->campo;
    }

    function getNuevoDato() {
        return $this->nuevoDato;
    }

    

    function setIdNotificacion($idNotificacion) {
        $this->idNotificacion = $idNotificacion;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setLeido($leido) {
        $this->leido = $leido;
    }

    function setCampo($campo) {
        $this->campo = $campo;
    }

    function setNuevoDato($nuevoDato) {
        $this->nuevoDato = $nuevoDato;
    }

   

}
