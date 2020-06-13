<?php
class Producto{
    var $codProducto;
    var $nomProducto;
    var $imagen;
    
    function __construct($codProducto, $nomProducto, $imagen) {
        $this->codProducto = $codProducto;
        $this->nomProducto = $nomProducto;
        $this->imagen = $imagen;
    }

    function getCodProducto() {
        return $this->codProducto;
    }

    function getNomProducto() {
        return $this->nomProducto;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setCodProducto($codProducto) {
        $this->codProducto = $codProducto;
    }

    function setNomProducto($nomProducto) {
        $this->nomProducto = $nomProducto;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }


}

