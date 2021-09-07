<?php
class Producto{
    private $codigo;
    private $nombre_prod;
    private $descripcion;
    private $precio_unit;
    private $existencia;
    
    public function Producto() {
        $this->codigo=0;
        $this->nombre_prod="";
        //etc...
    }
    //metodos get y set
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($cod){
        $this->codigo=$cod;
    }
    
    public function getNombreProducto(){
        return $this->nombre_prod;
    }
    public function setNombreProducto($nom){
        $this->nombre_prod=$nom;
    }
    
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descrip){
        $this->descripcion=$descrip;
    }
    
     public function getPrecioUnit(){
        return $this->precio_unit;
    }
    public function setPrecioUnit($pu){
        $this->precio_unit=$pu;
    }
    public function getExistencia(){
        return $this->existencia;
    }
    public function setExistencia($exist){
        $this->existencia=$exist;
    }
    
    
    
    
    
    
    
}




?>