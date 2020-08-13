<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar Perfiles');
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
                    <th>Nombre Perfil</th>
                    <th>Descripcion</th>
                    <th>Porcentaje</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Trimestre</th>
                <th><a href="#" onclick="openCreateModal()" class=" waves-effect tooltipped" data-tooltip="Agregar Perfiles"><i class="small material-icons green-text text- accent-4">add_circle</i></a></th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla para mostrar un registro por fila -->
        <tbody id="tbody-rows">
        </tbody>
    </table>

        </div>
        <div class="col l3 m1"></div>



    </div>

     <!-- Componente Modal para mostrar una caja de dialogo -->
     <div id="save-modal" class="modal">
        <div class="modal-content">
            <h4 id="modal-title" class="center-align"></h4>
            <!-- Formulario para crear o actualizar un registro -->
            <form method="post" id="save-form" enctype="multipart/form-data">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input class="hide" type="text" id="id_perfil" name="id_perfil" />
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix"></i>
                        <input id="nombreperfil" type="text" name="nombreperfil" class="validate" required />
                        <label for="nombreperfil">Nombre Perfil</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix"></i>
                        <input id="descripcion" type="text" name="descripcion" class="validate" required />
                        <label for="descripcion">Descripción</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix"></i>
                        <input id="porcentaje" type="number" name="porcentaje" class="validate" required />
                        <label for="porcentaje">Porcentaje</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">date</i>
                        <input id="fecha_inicio" type="date" name="fecha_inicio" class="validate" required />
                        <label for="fecha_inicio">Fecha Inicio</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">date</i>
                        <input id="fecha_fin" type="date" name="fecha_fin" class="validate" required />
                        <label for="fecha_fin">Fecha Fin</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">date</i>
                        <input id="trimestre" type="text" name="trimestre" class="validate" required />
                        <label for="trimestre">Trimestre</label>
                    </div>
                    <div class="input-field col l8 s12 m6 white-text">
                        <select id="id_tipo_actividad" name="id_tipo_actividad">
                    </select>
                        <label> Nombre Actividad </label>
                    </div>
                    <div class="input-field col l8 s12 m6 white-text">
                        <select id="id_asignatura" name="id_asignatura">
                    </select>
                        <label> Asignatura </label>
                    </div>
                    <div class="input-field col l8 s12 m6 white-text">
                        <select id="id_estadoperfil" name="id_estadoperfil">
                        </select>
                            <label> Estado </label>
                    </div>
                    <div class="input-field col l8 s12 m6 white-text">
                        <select id="id_docente" name="id_docente">
                        </select>
                            <label> Nombre Docente </label>
                    </div>
                <div class="row center-align">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                </div>
            </form>
        </div>
    </div>

    <?php
    Dashboard::footerTemplate('perfiles.js');
    ?>