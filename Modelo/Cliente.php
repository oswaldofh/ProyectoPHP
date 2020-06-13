<?php

class Cliente {

    var $codCliente;
    var $nomCliente;
    var $tipoCliente;
    var $fechaRegistro;
    var $fechaInactivo;
    var $imagenCliente;
    var $emailCliente;
    var $telefonoCliente;
    var $creditoCliente;
    var $estadoCliente;
    var $latCliente;
    var $lonCliente;
    
    function __construct($codCliente, $nomCliente, $tipoCliente, $fechaRegistro, $fechaInactivo, 
    $imagenCliente, $emailCliente, $telefonoCliente, $creditoCliente, $estadoCliente, $latCliente, $lonCliente) {
        $this->codCliente = $codCliente;
        $this->nomCliente = $nomCliente;
        $this->tipoCliente = $tipoCliente;
        $this->fechaRegistro = $fechaRegistro;
        $this->fechaInactivo = $fechaInactivo;
        $this->imagenCliente = $imagenCliente;
        $this->emailCliente = $emailCliente;
        $this->telefonoCliente = $telefonoCliente;
        $this->creditoCliente = $creditoCliente;
        $this->estadoCliente = $estadoCliente;
        $this->latCliente = $latCliente;
        $this->lonCliente = $lonCliente;
    }

    
    function getCodCliente() {
        return $this->codCliente;
    }

    function getNomCliente() {
        return $this->nomCliente;
    }

    function getTipoCliente() {
        return $this->tipoCliente;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function getFechaInactivo() {
        return $this->fechaInactivo;
    }

    function getImagenCliente() {
        return $this->imagenCliente;
    }

    function getEmailCliente() {
        return $this->emailCliente;
    }

    function getTelefonoCliente() {
        return $this->telefonoCliente;
    }

    function getCreditoCliente() {
        return $this->creditoCliente;
    }

    function getEstadoCliente() {
        return $this->estadoCliente;
    }

    function getLatCliente() {
        return $this->latCliente;
    }
    
    function getLonCliente() {
        return $this->lonCliente;
    }
    
    function setCodCliente($codCliente) {
        $this->codCliente = $codCliente;
    }

    function setNomCliente($nomCliente) {
        $this->nomCliente = $nomCliente;
    }

    function setTipoCliente($tipoCliente) {
        $this->tipoCliente = $tipoCliente;
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    function setFechaInactivo($fechaInactivo) {
        $this->fechaInactivo = $fechaInactivo;
    }

    function setImagenCliente($imagenCliente) {
        $this->imagenCliente = $imagenCliente;
    }

    function setEmailCliente($emailCliente) {
        $this->emailCliente = $emailCliente;
    }

    function setTelefonoCliente($telefonoCliente) {
        $this->telefonoCliente = $telefonoCliente;
    }

    function setCreditoCliente($creditoCliente) {
        $this->creditoCliente = $creditoCliente;
    }

    function setEstadoCliente($estadoCliente) {
        $this->estadoCliente = $estadoCliente;
    }

    function setLatCliente($latCliente) {
        $this->latCliente = $latCliente;
    }
    function setLonCliente($lonCliente) {
        $this->lonCliente = $lonCliente;
    }


}
