//Variable glonal
var tabla;

function init() {
    mostrarForm(false);
    listar();
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


//Función que se eejecuta al inicio
init();