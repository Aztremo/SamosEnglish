// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CARGA = '../../core/api/dashboard/encargado.php?action=';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_CARGA );
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombre_encargado}</td>
                <td>${row.apellido_encargado}</td>
                <td>${row.correo_encargado}</td>
                <td>${row.direccion_encargado}</td>
                <td>${row.cantidad_hijos}</td>
                <td>
                    <a href="#" onclick="openUpdateModal(${row.id_encargado})" class="blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_encargado})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
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
    searchRows( API_CARGA, this );
});

// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Agregar Encargado' );
    // Se establece el campo de tipo archivo como obligatorio.
    //$( '#archivo_categoria' ).prop( 'required', true );
}

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Modificar Encargado' );
    // Se establece el campo de tipo archivo como opcional.
    //$( '#archivo_categoria' ).prop( 'required', false );

    $.ajax({
        dataType: 'json',
        url: API_CARGA + 'readOne',
        data: { id_encargado: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_encargado' ).val( response.dataset.id_encargado );
            $( '#nombres' ).val( response.dataset.nombre_encargado );
            $( '#apellidos' ).val( response.dataset.apellido_encargado );
            $( '#dui' ).val( response.dataset.dui_encargado );
            $( '#telefono' ).val( response.dataset.telefono_encargado );
            $( '#correo' ).val( response.dataset.correo_encargado );
            $( '#direccion' ).val( response.dataset.direccion_encargado );
            $( '#municipio' ).val( response.dataset.municipio_encargado );
            $( '#trabajo' ).val( response.dataset.lugar_trabajo );
            $( '#fecha' ).val( response.dataset.fecha_nacimiento_encargado );
            $( '#hijos' ).val( response.dataset.cantidad_hijos );
            // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
            M.updateTextFields();
        } else {
            sweetAlert( 2, response.exception, null );
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
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_encargado' ).val() ) {
        saveRow( API_CARGA, 'update', this, 'save-modal' );
    } else {
        saveRow( API_CARGA, 'create', this, 'save-modal' );
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_encargado: id };
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete( API_CARGA, identifier );
}

// Función para llenar la tabla con los datos enviados por readRows().


function openPedidos( id )
{
    // Se limpian los campos del formulario.
    //$( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#pedidos' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Pedidos Realizados' );
    // Se establece el campo de tipo archivo como opcional.
    //$( '#archivo_categoria' ).prop( 'required', false );

    $.ajax({
        dataType: 'json',
        url: API_CLIENTES + 'readOne',
        data: { id_pedido: id },
        type: 'post'
    })
    
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombre}</td>
                <td>${row.apellido}</td>
                <td>${row.dui}</td>
                
                <td>
                    <a href="#" onclick="openUpdateModal(${row.id_cliente})" class="blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_cliente})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-pedidos' ).html( content );
    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    $( '.materialboxed' ).materialbox();
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    $( '.tooltipped' ).tooltip();
}
}