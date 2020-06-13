<?php
class Ubicacion{
var $latitud;
var $longitud;
var $nombre;
var $fecha;
var $email;
var $telefono;

function __construct($latitud, $longitud, $nombre, $fecha, $email, $telefono) {
    $this->latitud = $latitud;
    $this->longitud = $longitud;
    $this->nombre = $nombre;
    $this->fecha = $fecha;
    $this->email = $email;
    $this->telefono = $telefono;
}

function getLatitud() {
    return $this->latitud;
}
function getLongitud() {
    return $this->longitud;
}
function getNombre() {
    return $this->nombre;
}
function getFecha() {
    return $this->fecha;
}
function getEmail() {
    return $this->email;
}
function getTelefono() {
    return $this->telefono;
}

function setLatitud($latitud) {
    $this->latitud = $$latitud;
}
function setLongitud($longitud) {
    $this->longitud = $longitud;
}
function setNombre($nombre) {
    $this->nombre = $nombre;
}
function setFecha($fecha) {
    $this->fecha = $fecha;
}
function setEmail($email) {
    $this->email = $email;
}
function setTelefono($telefono) {
    $this->telefono = $telefono;
}




}