// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_PERFILES = '../../core/api/dashboard/perfiles.php?action=';
const API_TIPOD = '../../core/api/dashboard/tipoperfil.php?action=readAll';
const API_Asignaturas = '../../core/api/dashboard/asignaturas.php?action=readAll';
const API_ESTADO = '../../core/api/dashboard/estadoperfil.php?action=readAll';
const API_DOCENTES = '../../core/api/dashboard/docentes.php?action=readAll';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_PERFILES);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function (row) {

        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombreperfil}</td>
                <td>${row.descripcion}</td>
                <td>${row.porcentaje}</td>
                <td>${row.fecha_inicio}</td>
                <td>${row.fecha_fin}</td>
                <td>${row.trimestre}</td>              
                <td>
                    <a href="#" onclick="openUpdateModal(${row.id_perfil})" class="blue-text tooltipped" data-tooltip="Update"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_perfil})" class="red-text tooltipped" data-tooltip="Remove"><i class="material-icons">delete</i></a>                  
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-rows').html(content);
    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    $('.materialboxed').materialbox();
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    $('.tooltipped').tooltip();
}

// Evento para mostrar los resultados de una búsqueda.
$('#search-form').submit(function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_PERFILES, this);
});

// Función que prepara formulario para insertar un registro.
function openCreateModal() {
    // Se limpian los campos del formulario.
    $('#save-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#save-modal').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Add Profile');
    // Se establece el campo de tipo archivo como obligatorio.
    //$( '#archivo_producto' ).prop( 'required', true );
    // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js
  
    //Código para capturar datos en un ComboBox
    fillSelect( API_TIPOD, 'id_tipo_actividad',null );
    fillSelect( API_Asignaturas, 'id_asignatura', null );
    fillSelect( API_ESTADO, 'id_estadoperfil', null );
    fillSelect( API_DOCENTES, 'id_docente', null );
}

// Función que prepara formulario para modificar un registro.
function openUpdateModal(id) {
    // Se limpian los campos del formulario.
    $('#save-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#save-modal').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Modify Profile');
    // Se establece el campo de tipo archivo como opcional.
    //$( '#archivo_producto' ).prop( 'required', false );

    $.ajax({
            dataType: 'json',
            url: API_PERFILES + 'readOne',
            data: {
                id_perfil: id
            },
            type: 'post'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
                $('#id_perfil').val(response.dataset.id_perfil);
                $('#nombreperfil').val(response.dataset.nombreperfil);
                $('#descripcion').val(response.dataset.descripcion);
                $('#porcentaje').val(response.dataset.porcentaje);
                $('#fecha_inicio').val(response.dataset.fecha_inicio);
                $('#fecha_fin').val(response.dataset.fecha_fin);
                $('#trimestre').val(response.dataset.trimestre);
                fillSelect( API_TIPOD, 'nombre_actividad', response.dataset.nombre_actividad );
                fillSelect( API_Asignaturas, 'nombreasignatura', response.dataset.nombreasignatura );
                fillSelect( API_ESTADO, 'estado', response.dataset.estado );
                fillSelect( API_DOCENTES, 'nombredocente', response.dataset.nombredocente );
                //(response.dataset.id_estado_producto == 1) ? $('#estado_producto').prop('checked', true): $('#estado_producto').prop('checked', false);
                // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
                M.updateTextFields();
            } else {
                sweetAlert(2, result.exception, null);
            }
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
}

// Evento para crear o modificar un registro.
$('#save-form').submit(function (event) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ($('#id_perfil').val()) {
        saveRow(API_PERFILES, 'update', this, 'save-modal');
    } else {
        saveRow(API_PERFILES, 'create', this, 'save-modal');
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog(id) {
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = {
        id_perfil: id
    };
    confirmDelete(API_PERFILES, identifier);
}