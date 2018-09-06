<?php
    require_once 'global.php';

    $conexion = new mysqli(HOST, USERNAME, PASSWORD, DB); 
    
    if($conexion->connect_errno){
        $estilo = "style='color: red; font-weight: bold;'";
        printf("<p $estilo> Falló la conexion: %s\n </p>", $conexion->connect_error);
        exit();
    }
    $conexion->set_Charset(ENCODE);

    if(!function_exists('ejecutarConsulta')){
        function ejecutarConsulta($sql){
            global $conexion;
            $query = $conexion->query($sql);
            return $query;
        }
        function ejecutarConsultaSimpleFila($sql){
            global $conexion;
            $query = $conexion->query($sql);
            $row = $query->fetch_assoc();//Obtiene una fila en un array
            return $row;
        }
        function ejecutarConsulta_retornarID($sql){
            global $conexion;
            $query = $conexion->query($sql);
            return $conexion->insert_id;
        }
        function limpiarCadena($cadena){
            global $conexion;
            $cadena = mysqli_real_escape_string($conexion, trim($cadena));
            return htmlspecialchars($cadena);
        }
    }
/*
mysqli_real_escape_string ............Ejemplo:

$usuario = 'nombre';
$pass = '123"fd';
$sql = 'select * from usuario where nombre = "$nombre" and pass = "$pass"';

Se ve bonito, pero que pasa cuando ves la frase tal cual ?
select * from usuario where nombre = "nombre" and pass = "123"fd";
Notarás que el pass tiene de entrada un error de sintaxis.
Con el mysql_real_escape_string te proteges de esto:
$sql = 'select * from usuario where nombre = "'.mysql_real_escape_string($nombre).'" and pass = "'.mysql_real_escape_string($pass).'"';

Resultado:
select * from usuario where nombre = "nombre" and pass = "123\"fd";


htmlspecialchars .......................Ejemplo
Convierte los caractéres especiales en entidades html. 
Debemos usar esta función cuando queramos escapar carateres que tienen un significado por si solos en HTML.

$cadena = '10 es < que 21, y 10 es > que 4, "estoy entre comillas dobles"';
echo htmlspecialchars($cadena);

$cadena = "Esto es un texto <b>grueso</b>";
echo htmlspecialchars($cadena) . "<br>";
*/


?>