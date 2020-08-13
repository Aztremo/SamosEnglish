<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/asignaturas.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $asignaturas = new Asignaturas;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
	if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $asignaturas->readAllAsignaturas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay asignaturas registradas';
                }
                break;
            case 'search':
                $_POST = $asignaturas->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $asignaturas->searchAsignaturas($_POST['search'])) {
                        $result['status'] = 1;
						$rows = count($result['dataset']);
						if ($rows > 1) {
							$result['message'] = 'Se encontraron '.$rows.' coincidencias';
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
                $_POST = $asignaturas->validateForm($_POST);
                
                if ($asignaturas->setNombreasignatura($_POST['nombreasignatura'])) {
                    if ($asignaturas->setIdtipoasignatura($_POST['id_tipoasignatura'])) {
                        if (isset($_POST['id_estadoasignatura'])) {
                            if ($asignaturas->setIdestadoasignatura($_POST['id_estadoasignatura'])) {
                                if ($asignaturas->createAsignatura()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Asignatura creada correctamente';
                                } else {
                                    $result['exception'] = Database::getException();;
                                }
                            } else {
                                $result['exception'] = 'Estado incorrecto';
                            }
                        } else {
                            $result['exception']='Seleccione un estado';
                        }
                    } else {
                        $result['exception'] = 'Tipo incorrecto';
                    }
                } else {
                    $result['exception'] = 'Asignatura incorrecta';
                }
                
                break;
            case 'readOne':
                if ($asignaturas->setIdasignatura($_POST['id_asignatura'])) {
                    if ($result['dataset'] = $asignaturas->readOneAsignaturas()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Asignatura inexistente';
                    }
                } else {
                    $result['exception'] = 'Asignatura incorrecta';
                }
                break;
            case 'update':
                $_POST = $asignaturas->validateForm($_POST);
                if ($asignaturas->setIdasignatura($_POST['id_asignatura'])) {
                    if ($data = $asignaturas->readOneAsignaturas()) {
                        if ($asignaturas->setNombreasignatura($_POST['nombreasignatura'])) {
                            if ($asignaturas->setIdEstadoasignatura($_POST['id_estadoasignatura'])) {
                                if ($asignaturas->setIdTipoasignatura($_POST['id_tipoasignatura'])) {
                                if ($asignaturas->updateAsignatura()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Asignatura modificada correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                } 
                            } else {
                                $result['exception'] = 'Seleccione un Tipo';
                            }
                        } else {
                            $result['exception'] = 'Seleccione un Estado';
                        }
                    } else {
                        $result['exception'] = 'Asignatura inexistente';
                    }
                } else {
                    $result['exception'] = 'Asignatura incorrecta';
                }
            } else {
                $result['exception'] = 'Id de Asignatura incorrecto';
            }
                break;
            case 'delete':
                if ($asignaturas->setIdasignatura($_POST['id_asignatura']) ) {
                    if ($asignaturas->deleteAsignaturas()) {
                        $result['status'] = 1;
                        $result['message'] = 'Asignatura eliminada correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }    
                } else {
                    $result['exception'] = 'Asignatura incorrecta';
                }
                break;
            
            exit('Acción no disponible dentro de la sesión');
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
?>