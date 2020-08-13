<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/notas.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $nota = new Notas;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $nota->readAllNotas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay notas ingresadas';
                }
                break;
            case 'search':
                $_POST = $nota->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $nota->searchNotas($_POST['search'])) {
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
                    $_POST = $nota->validateForm($_POST);
                    if ($nota->setPromedio($_POST['promedio_final'])) {
                        if ($nota->setIdPerfil($_POST['id_perfil'])) {
                            if ($nota->setIdAlumno($_POST['id_alumno'])) {
                                if ($nota->createNota()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Notas ingresadas correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }   
                            } else {
                                $result['exception'] = 'Id incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Id no valido';
                        }
                    } else {
                        $result['exception'] = 'Ingrese un dato valido';
                    }
                break;
                 case 'readOne':
                    if ($nota->setIdNota($_POST['id_nota'])) {
                        if ($result['dataset'] = $nota->readOneNota()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'La Nota que busca no existe';
                        }
                    } else {
                        $result['exception'] = 'Nota incorrecta';
                    }
                break;
                    case 'update':
                        $_POST = $nota->validateForm($_POST);
                        if ($nota->setIdNota($_POST['id_nota'])) {
                            if ($data = $nota->readOneNota()) {
                                if ($nota->setPromedio($_POST['promedio_final'])) {
                                    if ($nota->setIdPerfil($_POST['id_perfil'])) {
                                        if ($nota->setIdAlumno($_POST['id_alumno'])) {
                                            if ($nota->updateNota()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Notas modificadas correctamente';
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
                        }else {
                            $result['exception'] = 'Id incorrecto';
                        }
                                                   
                    break;
            case 'delete':
                if ($nota->setIdNota($_POST['id_nota'])) {
                    if ($data = $nota->readOneNota()) {
                        if ($nota->deleteNota()) {
                            $result['status'] = 1;
                            $result['message'] = 'Nota eliminada correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Nota inexistente';
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