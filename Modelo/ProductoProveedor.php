<?php
class ProductoProveedor{
    var $codProPru;
    var $codProducto;
    var $codProveedor;
    
    function __construct($codProPru, $codProducto, $codProveedor) {
        $this->codProPru = $codProPru;
        $this->codProducto = $codProducto;
        $this->codProveedor = $codProveedor;
    }

    function getCodProPru() {
        return $this->codProPru;
    }

    function getCodProducto() {
        return $this->codProducto;
    }

    function getCodProveedor() {
        return $this->codProveedor;
    }

    function setCodProPru($codProPru) {
        $this->codProPru = $codProPru;
    }

    function setCodProducto($codProducto) {
        $this->codProducto = $codProducto;
    }

    function setCodProveedor($codProveedor) {
        $this->codProveedor = $codProveedor;
    }


}
