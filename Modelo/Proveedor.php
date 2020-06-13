<?php

class Proveedor{
    var $codProveedor;
    var $nomProveedor;
    var $tipoProveedor;
    var $fechaRegistro;
    var $fechaInactivo;
    var $imagenProveedor;
    var $emailProveedor;
    var $telefonoProveedor;
    var $estadoProveedor;
    var $latitudProveedor;
    var $longitudProveedor;
    
    function __construct($codProveedor, $nomProveedor, $tipoProveedor, $fechaRegistro, $fechaInactivo, $imagenProveedor, $emailProveedor, $telefonoProveedor, $estadoProveedor,$latitudProveedor,$longitudProveedor) {
        $this->codProveedor = $codProveedor;
        $this->nomProveedor = $nomProveedor;
        $this->tipoProveedor = $tipoProveedor;
        $this->fechaRegistro = $fechaRegistro;
        $this->fechaInactivo = $fechaInactivo;
        $this->imagenProveedor = $imagenProveedor;
        $this->emailProveedor = $emailProveedor;
        $this->telefonoProveedor = $telefonoProveedor;
        $this->estadoProveedor = $estadoProveedor;
        $this->latitudProveedor=$latitudProveedor;
        $this->longitudProveedor=$longitudProveedor;
    }

    function getCodProveedor() {
        return $this->codProveedor;
    }

    function getNomProveedor() {
        return $this->nomProveedor;
    }

    function getTipoProveedor() {
        return $this->tipoProveedor;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function getFechaInactivo() {
        return $this->fechaInactivo;
    }

    function getImagenProveedor() {
        return $this->imagenProveedor;
    }

    function getEmailProveedor() {
        return $this->emailProveedor;
    }

    function getTelefonoProveedor() {
        return $this->telefonoProveedor;
    }

    function getEstadoProveedor() {
        return $this->estadoProveedor;
    }

    function getLatitudProveedor() {
        return $this->latitudProveedor;
    }

    function getLongitudProveedor() {
        return $this->longitudProveedor;
    }
    function setCodProveedor($codProveedor) {
        $this->codProveedor = $codProveedor;
    }

    function setNomProveedor($nomProveedor) {
        $this->nomProveedor = $nomProveedor;
    }

    function setTipoProveedor($tipoProveedor) {
        $this->tipoProveedor = $tipoProveedor;
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    function setFechaInactivo($fechaInactivo) {
        $this->fechaInactivo = $fechaInactivo;
    }

    function setImagenProveedor($imagenProveedor) {
        $this->imagenProveedor = $imagenProveedor;
    }

    function setEmailProveedor($emailProveedor) {
        $this->emailProveedor = $emailProveedor;
    }

    function setTelefonoProveedor($telefonoProveedor) {
        $this->telefonoProveedor = $telefonoProveedor;
    }

    function setEstadoProveedor($estadoProveedor) {
        $this->estadoProveedor = $estadoProveedor;
    }
    function setLatitudProveedor($latitudProveedor) {
        $this->latitudProveedor = $latitudProveedor;
    }

    function setLongitudProveedor($longitudProveedor) {
        $this->longitudProveedor = $longitudProveedor;
    }

    
}

