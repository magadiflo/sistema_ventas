<?php
    require '../config/Conexion.php';

    class Categoria{

        public function __construct(){

        }

        public function insertar($nombre, $descripcion){
            $sql = "INSERT INTO categoria(nombre, descripcion, condicion) 
                    VALUES('$nombre', '$descripcion', '1')";
            return ejecutarConsulta($sql);
        }
        public function editar($idCategoria, $nombre, $descripcion){
            $sql = "UPDATE categoria SET nombre='$nombre', 
                                         descripcion = '$descripcion' 
                                     WHERE id = '$idCategoria'";
            return ejecutarConsulta($sql);
        }
        public function desactivar($idCategoria){
            $sql = "UPDATE categoria SET condicion = '0' 
                                    WHERE id = '$idCategoria'";
            return ejecutarConsulta($sql);
        }
        public function activar($idCategoria){
            $sql = "UPDATE categoria SET condicion = '1' 
                                    WHERE id = '$idCategoria'";
            return ejecutarConsulta($sql);
        }
        public function mostrar($idCategoria){
            $sql = "SELECT * FROM categoria WHERE id = '$idCategoria'";
            return ejecutarConsultaSimpleFila($sql);
        }
        public function listar(){
            $sql = "SELECT * FROM categoria";
            return ejecutarConsulta($sql);
        }
        
    }
    
?>