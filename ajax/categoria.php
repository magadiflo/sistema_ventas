<?php
    require_once '../modelos/Categoria.php';
    
    $categoria = new Categoria();

    $idCategoria = isset($_POST["id_categoria"]) ? limpiarCadena($_POST["id_categoria"]) : ""; 
    $nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : ""; 
    $descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : ""; 

    switch($_GET["op"]){
        case 'guardaryeditar':
            if(empty($idCategoria)){
                $res = $categoria->insertar($nombre, $descripcion);
                echo $res ? "Categoría registrada." : "Categoría no se pudo registrar.";
            }else{
                $res = $categoria->editar($idCategoria, $nombre, $descripcion);
                echo $res ? "Categoría actualizada." : "Categoría no se pudo actualizar.";
            }
        break;
        case 'desactivar':
            $res = $categoria->desactivar($idCategoria);
            echo $res ? "Categoría desactivada." : "Categoría no se pudo desactivar.";
        break;
        case 'activar':
            $res = $categoria->activar($idCategoria);
            echo $res ? "Categoría activada." : "Categoría no se pudo activar.";
        break;
        //Codifica el resultado utilizando json
        case 'mostrar':
            $res = $categoria->mostrar($idCategoria);
            echo json_encode($res);
        break;
        case 'listar':
            $res = $categoria->listar();
            //Declarando un array, debe tener el mismo nombre de la bd. Ejmp. ->id, ->nombre
            $data = Array();
            while($reg = $res->fetch_object()){
                $data[] = array(
                                "0"=>$reg->id, 
                                "1"=>$reg->nombre, 
                                "2"=>$reg->descripcion, 
                                "3"=>$reg->condicion
                            );
            }
            $results = Array(
                            "sEcho"=>1, //Información para el datatables
                            "iTotalRecords"=>count($data), //Enviamos el total registros al datatable
                            "iTotalDisplayRecords"=>count($data), //Enviamos el total de registros a visualizar
                            "aaData"=>$data 
            );     
            echo json_encode($results);       
        break;
    }
?>