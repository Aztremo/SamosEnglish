<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/grado.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $grado = new Grado;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
	if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $grado->readAllGrado()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
            case 'search':
                $_POST = $grado->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $grado->searchGrado($_POST['search'])) {
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
                $_POST = $grado->validateForm($_POST);
                
                if ($grado->setCantidad($_POST['cantidad'])) {
                    if ($grado->setGrado($_POST['grado'])) {
                        if (isset($_POST['grado_estado'])) {
                            if ($grado->setEstado($_POST['grado_estado'])) {
                                if ($grado->createGrado()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Grado creado correctamente';
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
                        $result['exception'] = 'Grado incorrecto';
                    }
                } else {
                    $result['exception'] = 'Cantidad incorrecto';
                }
                
                break;
            case 'readOne':
                if ($grado->setId($_POST['id_grado'])) {
                    if ($result['dataset'] = $grado->readOneGrado()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'update':
                $_POST = $grado->validateForm($_POST);
                if ($grado->setId($_POST['id_grado'])) {
                    if ($data = $grado->readOneGrado()) {
                        if ($grado->setCantidad($_POST['cantidad'])) {
                            if ($grado->setEstado($_POST['grado_estado'])) {
                                if ($grado->updateGrado()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Grado modificado correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                } 
                            } else {
                                $result['exception'] = 'Seleccione un Estado';
                            }
                        } else {
                            $result['exception'] = 'Cantidad incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Grado inexistente';
                    }
                } else {
                    $result['exception'] = 'Grado incorrecto';
                }
                break;
            case 'delete':
                if ($grado->setId($_POST['id_grado']) ) {
                    if ($grado->deleteGrado()) {
                        $result['status'] = 1;
                        $result['message'] = 'Grado eliminado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }    
                } else {
                    $result['exception'] = 'Grado incorrecto';
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