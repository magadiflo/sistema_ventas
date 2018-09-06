//Variable glonal
var tabla;

function init() {
    mostrarForm(false);
    listar();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
}
function limpiar() {
    $("#id_categoria").val("");
    $("#nombre").val("");
    $("#descripcion").val("");
}
function mostrarForm(flag) {
    limpiar();
    if (flag) {
        $("#listado_registros").hide();
        $("#formulario_registros").show();
        //El botón btn_guardar el disabled lo pondré a falso
        $("#btn_guardar").prop("disabled", false);
    } else {
        $("#listado_registros").show();
        $("#formulario_registros").hide();
    }
}
function cancelarForm() {
    limpiar();
    mostrarForm(false);
}
/*Función que hará petición AJAX 
al archivo ubicado en ajax/categoria.php
enviandole un valor a la variable op a 
través del método get
*/
function listar() {
    //Usando la variable global definida al inicio
    tabla = $('#tbl_listado').dataTable({
        "aProcessing": true, //Activamos el procesamiento del datatables
        "aServerSide": true, //Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/categoria.php?op=listar',
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 5,//Paginación
        "order": [[0, "desc"]]//Ordenando por columna 0, de forma descendente
    }).DataTable();//Importante, que inicie con mayúscula este DataTable(); si no no actualizará automaticamente.
}
/*e.preventDefault(); No se activará la acción predeterminada del evento
Es decir aquí se tendría que ejecutar el evento del botón submit, pero en ese 
caso no lo hará sino serguirá el flujo de código que aquí sigue uno a continuación 
de otro*/
function guardaryeditar(e) {
    e.preventDefault();
    $("#btn_guardar").prop("disabled", true);
    //Todos los datos del #formulario se le envían a la var formData
    var formData = new FormData($("#formulario")[0]);
    //El POST: es porque en el archivo ajax/categoria.php se esperan recibir los datos a través del método POST
    //El parámetro (datos) = recibe los echo's que se imprime en ajax/cateogria.php
    $.ajax({
        url: "../ajax/categoria.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            bootbox.alert(datos);
            mostrarForm(false);
            tabla.ajax.reload();
        }
    });
    limpiar();
}
/*
>>>{id_categoria: idCategoria}, el primer id_categoria dentro de las
 llaves será la variable que se enviará por medio del método POST 
 al archivo ajax/categoria.php donde ese archivo espera 
 un $_POST["id_categoria"], ambos nombres deben ser idénticos.
 y el segundo idCategoría es el valor que se está ingresando por
 parámetro dentro de la función mostrar(idCategoría)
>>>function(data, status), la función va a obtener un valor que 
será almacenado en data, el cual será obtenido de toda 
la url: "..ajax/categoria.php?op=mostrar"
-------------------------------------------------------------
$("#id_categoria").val(data.id); de data.id, el id, es el nombre tal cual
está en la base de datos registrada ese nombre de columna
*/
//Mostrar Datos para editar
function mostrar(idCategoria) {
    $.post("../ajax/categoria.php?op=mostrar", { id_categoria: idCategoria }, function (data, status) {
        data = JSON.parse(data);
        mostrarForm(true);
        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
        $("#id_categoria").val(data.id);
    });
}

//Función que se eejecuta al inicio
init();