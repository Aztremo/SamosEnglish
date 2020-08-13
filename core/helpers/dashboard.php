<?php
/*
*	Clase para definir las plantillas de las páginas web del sitio privado.
*/
class Dashboard
{
    /*
    *   Método para imprimir la plantilla del encabezado.
    *
    *   Parámetros: $title (título de la página web y del contenido principal).
    *
    *   Retorno: ninguno.
    */
    public static function headerTemplate($title)
    {
        // Se establece la zona horaria a utilizar durante la ejecución de la página web.
        ini_set('date.timezone', 'America/El_Salvador');
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en las páginas web.
        session_start();
        // Se imprime el código HTML de la cabecera del documento.
        print('
            <!DOCTYPE html>
            <html lang="es" white-text>
                <head>
                    <meta charset="utf-8">
                    <title class="white-text">Dashboard - '.$title.'</title>
                    <link type="image/png" rel="icon" href="../../resources/img/logo.png"/>
                    <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css"/>
                    <link type="text/css" rel="stylesheet" href="../../resources/css/material-icons.css"/>
                    <link type="text/css" rel="stylesheet" href="../../resources/css/dashboard.css"/>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                </head>
                <body >
        ');
        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de administrador para mostrar el menú de opciones, de lo contrario se muestra un menú vacío.
        if (isset($_SESSION['id_usuario'])) {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para no iniciar sesión otra vez, de lo contrario se direcciona a main.php
            if ($filename != 'index.php' && $filename != 'register.php') {
                // Se llama al método que contiene el código de las cajas de dialogo (modals).
                self::modals();
                // Se imprime el código HTML para el encabezado del documento con el menú de opciones.
                print('
                <header>
        
                <div class="row">
                    <div class="col s12 m12 l3">
                        <div class="container section">
        
                            <a href="#" class="sidenav-trigger" data-target="menu-side">
                                <i class="material-icons">menu</i></a>
                            </a>
                
                            <ul class="sidenav sidenav-fixed" id="menu-side">
                                <li>
                                    <div class="user-view">
                                        <div class="background center-align">
                                        </div>
                                        <div class="row">
                                            <div class="col l10">
                                                <a href="main.php">
                                                    <img src="../../resources/img/logo.png" class="circle">
                                                </a>
                                            </div>  
                                            <div class="col l2">
                                                <a href="" class="white-text waves-effect wavesl-teal btn-small-floating disabled">
                                                    
                                                </a>
                                            </div>
                                        </div> 
                                        <a href="#">
                                            <span class="name white-text"><b>'.$_SESSION['alias_usuario'].'</b></span>
                                        </a>
                                        <a href="#">
                                            <span class="email white-text">SamosSystem@gmail.com</span>
                                        </a>
                                    </div>
                                </li>
                <!--Enlaces del menu-->
                                <li>
                                    <div class="container">
                                        <div class="row">
                                            <div class="input-field s2 ">
                                                <i class="material-icons prefix white-text ">search</i>
                                                <input type="text" id="buscar" class="autocomplete black-text">
                                                <label for="buscar" class="white-text"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                

                                <li>
                                    <li><a class="dropdown-trigger white-text " href="#!" data-target="primero"><b>Mi cuenta: '.$_SESSION['alias_usuario'].'</b><i class="material-icons white-text left">account_circle</i></a></li>
                                    <ul id="primero" class="dropdown-content ">
                                        <li><a href="#" class="white-text" onclick="openModalProfile()"><i class="material-icons white-text ">face</i>Editar Perfil</a></li>
                                        <li><a href="#password-modal" class="modal-trigger white-text"><i class="material-icons white-text ">lock</i>Cambiar Contraseña</a></li>
                                        <li><a href="#" class="white-text" onclick="signOff()"><i class="material-icons white-text">clear</i>Salir</a></li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="Gestionalumnos.php" class="white-text waves-effect wavesl-teal">
                                        <i class="material-icons white-text ">face</i>
                                        Gestion Alumnos 
                                    </a>
                                </li>
                                <li>
                                    <a href="Gestiondocentes.php" class="white-text waves-effect wavesl-teal">
                                        <i class="material-icons white-text">person</i>
                                        Gestion Docentes 
                                    </a>
                                </li>
                                <li>
                                    <a href="Gestionasignatura.php" class="white-text waves-effect wavesl-teal">
                                        <i class="material-icons white-text">list</i>
                                        Gestion asignaturas
                                    </a>
                                </li>
                                <li>
                                    <a href="Gestionperfiles.php" class="white-text waves-effect wavesl-teal">
                                        <i class="material-icons white-text">library_books</i>
                                        Gestion Perfiles
                                    </a>
                                </li>
                                <li>
                                    <a href="Gestiongrados.php" class="white-text waves-effect wavesl-teal">
                                        <i class="material-icons white-text">people</i>
                                        Gestion Grados
                                    </a>
                                </li>
                                <li>
                                    <a href="Boletas.php" class="white-text waves-effect wavesl-teal">
                                        <i class="material-icons white-text">import_contacts</i>
                                        Boletas
                                    </a>
                                </li>
                                <li>
                                    <a href="datoscolegio.php" class="white-text waves-effect wavesl-teal">
                                        <i class="material-icons white-text">chrome_reader_mode</i>
                                        Datos del colegio
                                    </a>
                                </li>
                            </ul>
                
                        </div>
                    </div>
        
            <!--Tarjetas de cada tipo de deporte-->    
            
                    <div class="col s12 m12 l2">
                    </div>
                    
                    <div class="col s12 m12 l8">
                        <h3 class="center-align">'.$title.'</h3>
                    </div>
        
                    <div class="col s12 m12 l2">
                    </div>
                </div>
                
            </header>
            
    
                        
                ');
            } else {
                header('location: main.php');
            }
        } else {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ($filename != 'index.php' && $filename != 'register.php') {
                header('location: index.php');
            } else {
                // Se imprime el código HTML para el encabezado del documento con un menú vacío cuando sea iniciar sesión o registrar el primer usuario.
                print('
                    <header>
                        <div class="navbar-fixed">
                            <nav>
                                <div class="nav-wrapper">
                                    <a href="index.php" class="brand-logo center black-text">SISTEMA DE NOTAS</a>

                                </div>
                            </nav>
                        </div>
                    </header>
                    <main class="container" grey>
                        <h3 class="center-align">'.$title.'</h3>
                ');
            }
        }
    }

    /*
    *   Método para imprimir la plantilla del pie.
    *
    *   Parámetros: $controller (nombre del archivo que sirve como controlador de la página web).
    *
    *   Retorno: ninguno.
    */
    public static function footerTemplate($controller)
    {
        // Se imprime el código HTML para el pie del documento.
        print('
                    </main><br><br><br><br>

                    <footer class="page-footer">
                        <div class="container">
                          <div class="row">
                              <div class="col l3"></div>
                            <div class="col l5 s12">
                              <h5 class="white-text">Dashboard</h5>
                              <p class="grey-text text-lighten-4">Sistema control de notas
                              Proyecto formativo 2020</p>                              
                            </div>
                          </div>
                        </div>
                        <div class="footer-copyright">
                          <div class="container center-align">
                          ©Samos System Copyright
                          <a class="grey-text text-lighten-4 right" href="../../SamosEnglish/views/dashboard/main.php">Mira este sitio en inglés aquí</a>
                          </div>
                        </div>
                      </footer>

                    
                    <script type="text/javascript" src="../../resources/js/jquery-3.4.1.min.js"></script>
                    <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                    <script type="text/javascript" src="../../core/helpers/components.js"></script>
                    <script type="text/javascript" src="../../core/controllers/dashboard/initialization.js"></script>
                    <script type="text/javascript" src="../../core/controllers/dashboard/account.js"></script>
                    <script type="text/javascript" src="../../core/controllers/dashboard/'.$controller.'"></script>
                </body>
            </html>
        ');
    }

    /*
    *   Método para imprimir las cajas de dialogo (modals) de editar pefil y cambiar contraseña.
    */
    private function modals()
    {
        // Se imprime el código HTML de las cajas de dialogo (modals).
        print('
            <!-- Componente Modal para mostrar el formulario de editar perfil -->
            <div id="profile-modal" class="modal">
                <div class="modal-content">
                    <h4 class="center-align white-text">Editar perfil</h4>
                    <form method="post" id="profile-form">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="nombres_perfil" type="text" name="nombres_perfil" class="validate white-text" required/>
                                <label for="nombres_perfil">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="apellidos_perfil" type="text" name="apellidos_perfil" class="validate white-text" required/>
                                <label for="apellidos_perfil">Apellidos</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">email</i>
                                <input id="correo_perfil" type="email" name="correo_perfil" class="validate white-text" required/>
                                <label for="correo_perfil">Correo</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person_pin</i>
                                <input id="alias_perfil" type="text" name="alias_perfil" class="validate white-text" required/>
                                <label for="alias_perfil">Alias</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Componente Modal para mostrar el formulario de cambiar contraseña -->
            <div id="password-modal" class="modal">
                <div class="modal-content">
                    <h4 class="center-align white-text">Cambiar contraseña</h4>
                    <form method="post" id="password-form">
                        <div class="row center-align">
                            <label>CLAVE ACTUAL</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_actual_1" type="password" name="clave_actual_1" class="validate white-text" required/>
                                <label for="clave_actual_1">Clave</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_actual_2" type="password" name="clave_actual_2" class="validate white-text" required/>
                                <label for="clave_actual_2">Confirmar clave</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <label>CLAVE NUEVA</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate white-text" required/>
                                <label for="clave_nueva_1">Clave</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate white-text" required/>
                                <label for="clave_nueva_2">Confirmar clave</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                        </div>
                    </form>
                </div>
            </div>
        ');
    }
}
?>