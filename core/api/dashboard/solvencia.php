<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/solvencia.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $solvencia = new Solvencias;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $solvencia->readAllSolvencias()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay solvencias ingresadas';
                }
                break;
            case 'search':
                $_POST = $solvencia->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $solvencia->searchSolvencia($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
            break;
            case 'create':
                $_POST = $solvencia->validateForm($_POST);
                if ($solvencia->setIdEstado($_POST['id_estadosolvencia'])) {
                    if ($solvencia->setIdAnio($_POST['id_anio'])) {
                        if ($solvencia->createSolvencia()) {
                            $result['status'] = 1;
                            $result['message'] = 'Solvencias ingresadas correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }   
                    } else {
                        $result['exception'] = 'Id no valido';
                    }
                } else {
                    $result['exception'] = 'Ingrese un dato valido';
                }
            break;
            case 'readOne':
                if ($solvencia->setIdSolvencia($_POST['id_solvencia'])) {
                    if ($result['dataset'] = $solvencia->readOneSolvencia()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'La Nota que busca no existe';
                    }
                } else {
                    $result['exception'] = 'Nota incorrecta';
                }
            break;
            case 'update':
                $_POST = $solvencia->validateForm($_POST);
                if ($solvencia->setIdSolvencia($_POST['id_solvencia'])) {
                    if ($data = $solvencia->readOneSolvencia()) {
                        if ($solvencia->setIdEstado($_POST['id_estadosolvencia'])) {
                            if ($solvencia->setIdAnio($_POST['id_anio'])) {
                                if ($solvencia->updateSolvencia()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Solvencias modificadas correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }         
                            } else {
                                $result['exception'] = 'id incorrecto';
                            }   
                        } else {
                            $result['exception'] = 'Id no valido';
                        }
                    } else {
                        $result['exception'] = 'Ingrese una nota valido';
                    }
                } else {
                    $result['exception'] = 'Intentelo de nuevo';
                }                          
            break;
            case 'delete':
                if ($solvencia->setIdSolvencia($_POST['id_solvencia'])) {
                    if ($data = $solvencia->readOneSolvencia()) {
                        if ($solvencia->deleteSolvencia()) {
                            $result['status'] = 1;
                            $result['message'] = 'Solvencia eliminada correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Solvencia inexistente';
                    }
                } else {
                    $result['exception'] = ' Valor incorrecto';
                }
        }

        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        exit('Acceso no disponible');
    }
} else {
    exit('Recurso denegado');
}