// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_Asignaturas = '../../core/api/dashboard/asignaturas.php?action=';
const API_TIPO = '../../core/api/dashboard/tipoasignatura.php?action=readAll';
const API_ESTADO = '../../core/api/dashboard/estadoasignatura.php?action=readAll';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_Asignaturas );
});

// Función para llenar la tabla con los datos de los registros.
function fillTable( dataset )
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombreasignatura}</td>
                <td>${row.tipoasignatura}</td>
                <td>${row.estado_asignatura}</td>
                <td>
                    <a href="#" onclick="openUpdateModal(${row.id_asignatura})" class="blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_asignatura})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-rows' ).html( content );
    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    $( '.materialboxed' ).materialbox();
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    $( '.tooltipped' ).tooltip();
}

// Evento para mostrar los resultados de una búsqueda.
$( '#search-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_Asignaturas, this );
});

// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Crear Asignatura' );
    // Se establece el campo de tipo archivo como obligatorio.
    $( '#archivo_producto' ).prop( 'required', true );
    // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js
        
    //Código para capturar datos en un ComboBox

    fillSelect( API_TIPO, 'id_tipoasignatura', null );
    fillSelect( API_ESTADO, 'id_estadoasignatura', null );
}

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Modificar Asignatura' );
    // Se establece el campo de tipo archivo como opcional.
    //$( '#archivo_producto' ).prop( 'required', false );

    

    $.ajax({
        dataType: 'json',
        url: API_Asignaturas + 'readOne',
        data: { id_asignatura: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_asignatura' ).val( response.dataset.id_asignatura );
            $( '#nombreasignatura' ).val( response.dataset.nombreasignatura );
            fillSelect( API_TIPO, 'tipoasignatura', response.dataset.tipoasignatura );
            fillSelect( API_ESTADO, 'estadoasignatura', response.dataset.estado_asignatura );
            // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
            M.updateTextFields();
        } else {
            sweetAlert( 2, result.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

// Evento para crear o modificar un registro.
$( '#save-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_asignatura' ).val() ) {
        saveRow( API_Asignaturas, 'update', this, 'save-modal' );
    } else {
        saveRow( API_Asignaturas, 'create', this, 'save-modal' );
    }
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo para confirmar.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_asignatura: id };
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete( API_Asignaturas, identifier );
}