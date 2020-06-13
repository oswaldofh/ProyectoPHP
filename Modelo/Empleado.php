<?php

class Empleado {
    var $codEmpleado;
    var $nomEmpleado;
    var $fechaIngreso;
    var $fechaRetiro;
    var $salarioBasico;
    var $deducciones;
    var $fotoEmpleado;
    var $hojaVida;
    var $emailEmpleado;
    var $telefono;
    var $celular;
    var $estadoEmpleado;
    var $latEmpleado;
    var $lonEmpleado;

    function __construct($codEmpleado, $nomEmpleado, $fechaIngreso, $fechaRetiro, $salarioBasico, 
    $deducciones, $fotoEmpleado, $hojaVida, $emailEmpleado, $telefono, $celular, 
    $estadoEmpleado, $latEmpleado,$lonEmpleado) {
        $this->codEmpleado = $codEmpleado;
        $this->nomEmpleado = $nomEmpleado;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaRetiro = $fechaRetiro;
        $this->salarioBasico = $salarioBasico;
        $this->deducciones = $deducciones;
        $this->fotoEmpleado = $fotoEmpleado;
        $this->hojaVida = $hojaVida;
        $this->emailEmpleado = $emailEmpleado;
        $this->telefono = $telefono;
        $this->celular = $celular;
        $this->estadoEmpleado = $estadoEmpleado;
        $this->latEmpleado = $latEmpleado;
        $this->lonEmpleado = $lonEmpleado;
    }
    function getCodEmpleado() {
        return $this->codEmpleado;
    }

    function getNomEmpleado() {
        return $this->nomEmpleado;
    }

    function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    function getFechaRetiro() {
        return $this->fechaRetiro;
    }

    function getSalarioBasico() {
        return $this->salarioBasico;
    }

    function getDeducciones() {
        return $this->deducciones;
    }

    function getFotoEmpleado() {
        return $this->fotoEmpleado;
    }

    function getHojaVida() {
        return $this->hojaVida;
    }

    function getEmailEmpleado() {
        return $this->emailEmpleado;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCelular() {
        return $this->celular;
    }

    function getEstadoEmpleado() {
        return $this->estadoEmpleado;
    }

    function getLatEmpleado() {
        return $this->latEmpleado;
    }

    function getLonEmpleado() {
        return $this->lonEmpleado;
    }

    function setCodEmpleado($codEmpleado) {
        $this->codEmpleado = $codEmpleado;
    }

    function setNomEmpleado($nomEmpleado) {
        $this->nomEmpleado = $nomEmpleado;
    }

    function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    function setFechaRetiro($fechaRetiro) {
        $this->fechaRetiro = $fechaRetiro;
    }

    function setSalarioBasico($salarioBasico) {
        $this->salarioBasico = $salarioBasico;
    }

    function setDeducciones($deducciones) {
        $this->deducciones = $deducciones;
    }

    function setFotoEmpleado($fotoEmpleado) {
        $this->fotoEmpleado = $fotoEmpleado;
    }

    function setHojaVida($hojaVida) {
        $this->hojaVida = $hojaVida;
    }

    function setEmailEmpleado($emailEmpleado) {
        $this->emailEmpleado = $emailEmpleado;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setEstadoEmpleado($estadoEmpleado) {
        $this->estadoEmpleado = $estadoEmpleado;
    }

    function setLatEmpleado($latEmpleado) {
        $this->latEmpleado = $latEmpleado;
    }

    function setLonEmpleado($lonEmpleado) {
        $this->lonEmpleado = $lonEmpleado;
    }
}
