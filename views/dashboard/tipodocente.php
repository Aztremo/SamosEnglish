<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Tipo docente');
?>

<main>

    <div class="row">
        <!-- Formulario de búsqueda -->
        <form method="post" id="search-form">
            <div class="col l5 "></div>
            <div class="input-field col l3 s m4">
                <i class="material-icons prefix">search</i>
                <input id="search" type="text" name="search"/>
                <label for="search">Buscador</label>
            </div>
            <div class="input-field col l4 s6 m4">
                <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Buscar"><i class="material-icons">search</i></button>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col l4"></div>
        <div class="col l6 m16 s12">

        <!-- Tabla para mostrar los registros existentes -->
    <table class=" highlight centered white-text">
        <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
        <thead>
            <tr>
                <th>NOMBRE TIPO</th>
                <th><a href="#" onclick="openCreateModal()" class=" waves-effect tooltipped" data-tooltip="Agregar Tipo docente"><i class="small material-icons green-text text- accent-4">add_circle</i></a></th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla para mostrar un registro por fila -->
        <tbody id="tbody-rows">
        </tbody>
    </table>

        </div>
        <div class="col l3 m1"></div>



    </div>

    <div id="save-modal" class="modal">
    <div class="modal-content">
        <h4 id="modal-title" class="center-align"></h4>
        <!-- Formulario para crear o actualizar un registro -->
        <form method="post" id="save-form" enctype="multipart/form-data">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="text" id="id_tipodocente" name="id_tipodocente"/>
            <div class="row center-align">
                <div class="input-field center-align">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="nombreTipo" type="text" name="nombreTipo" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" class="validate white-text" required/>
                    <label for="nombreTipo">Nombre Tipo</label>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>

<?php
Dashboard::footerTemplate('tipodocente.js');
?>



