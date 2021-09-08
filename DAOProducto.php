<?php
include 'credenciales.php';
include 'Producto.php';

class DAOProducto {
    private $con;
    
    public function __construct() {
        
    }
    public function conectar(){
        try {
             $this->con= new mysqli(SERVIDOR, USUARIO, CONTRA,BD) or die ("Error al conectar");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
  
    }
    public function desconectar(){
        $this->con->close();
    }
    public function getTabla(){
        $sql ="select * from producto";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        //ahora crearemos una tabla en bootstrap
        //los enlaces a los css y js estaran en las respectivas visatas
        $tabla = "<table class='table'>"
                . "<thead class='thead-dark'>";
        
        $tabla .="<tr>"
                    . "<th>CODIGO</th>"
                    . "<th>NOMBRE PRODUCTO</th>"
                    . "<th>DESCRIPCION</th>"
                    . "<th>PRECIO UNITARIO ($)</th>"
                    . "<th>EXISTENCIA</th>"
                    . "<th>ACCION</th>"
                . "</tr></thead><tbody>";
        
        while($fila = mysqli_fetch_assoc($res)){
            $tabla .= "<tr>"
                        . "<td>".$fila["codigo"]."</td>"
                        . "<td>".$fila["nombre_prod"]."</td>"
                        . "<td>".$fila["descripcion"]."</td>"
                        . "<td>".$fila["precio_unit"]."</td>"
                        . "<td>".$fila["existencia"]."</td>"
                        . "<td><a href=\"javascript:cargar('".$fila["codigo"]."','".$fila["nombre_prod"]."','".$fila["descripcion"]."','".$fila["precio_unit"]."','".$fila["existencia"]."')\">Select</a></td>"
                    . "</tr>";  
        }
        $tabla .="</tbody></table>";
        $res->close();
        return $tabla;
 
    }
    
    public function insertar($obj){
        $prod = new Producto();
        $prod = $obj;
        $sql="insert into producto values(".$prod->getCodigo().",'".$prod->getNombreProducto()."','".$prod->getDescripcion()."',".$prod->getPrecioUnit().",".$prod->getExistencia().")";
        $this->conectar();
        if($this->con->query($sql)){
            //aplicamos cuadros de mensaje de SweetAlert
            echo "<script>swal({title:'Exito',text:'El registro fue insetado satisfactoriamente',type:'success'});</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El registro no se pudo insertar',type:'error'});</script>";
        }  
        $this->desconectar();
    }
    public function eliminar($codigo){
        $sql="delete from producto where codigo=$codigo";
        $this->conectar();
        if($this->con->query($sql)){
            //aplicamos cuadros de mensaje de SweetAlert
            echo "<script>swal({title:'Exito',text:'El registro fue eliminado satisfactoriamente',type:'success'});</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El registro no se pudo eliminar',type:'error'});</script>";
        }  
        $this->desconectar();
    }
    public function getFiltro($buscar, $criterio){
        $sql ="select * from producto where $criterio like '%$buscar%'";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        //ahora crearemos una tabla en bootstrap
        //los enlaces a los css y js estaran en las respectivas visatas
        $tabla = "<table class='table'>"
                . "<thead class='thead-dark'>";
        
        $tabla .="<tr>"
                    . "<th>CODIGO</th>"
                    . "<th>NOMBRE PRODUCTO</th>"
                    . "<th>DESCRIPCION</th>"
                    . "<th>PRECIO UNITARIO ($)</th>"
                    . "<th>EXISTENCIA</th>"
                    . "<th>ACCION</th>"
                . "</tr></thead><tbody>";
        
        while($fila = mysqli_fetch_assoc($res)){
            $tabla .= "<tr>"
                        . "<td>".$fila["codigo"]."</td>"
                        . "<td>".$fila["nombre_prod"]."</td>"
                        . "<td>".$fila["descripcion"]."</td>"
                        . "<td>".$fila["precio_unit"]."</td>"
                        . "<td>".$fila["existencia"]."</td>"
                        . "<td><a href=\"javascript:cargar('".$fila["codigo"]."','".$fila["nombre_prod"]."','".$fila["descripcion"]."','".$fila["precio_unit"]."','".$fila["existencia"]."')\">Select</a></td>"
                    . "</tr>";  
        }
        $tabla .="</tbody></table>";
        $res->close();
        return $tabla;
 
    }
    
 
}
?>
