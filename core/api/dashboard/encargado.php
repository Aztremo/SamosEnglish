<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/encargados.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $carga = new Encargados;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $carga->readAllEncargado()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay clientes regitrados';
                }
                break;
            case 'search':
                $_POST = $carga->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $carga->searchEncargado($_POST['search'])) {
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
                $_POST = $carga->validateForm($_POST);

                if ($carga->setNombres($_POST['nombres'])) {
                    if ($carga->setApellidos($_POST['apellidos'])) {
                        if ($carga->setCorreo($_POST['correo'])) {
                            if ($carga->setDireccion($_POST['direccion'])) {
                                if ($carga->setDui($_POST['dui'])) {
                                    if ($carga->setNacimiento($_POST['fecha'])) {
                                        if ($carga->setTelefono($_POST['telefono'])) {
                                            if ($carga->setTrabajo($_POST['trabajo'])) {
                                                if ($carga->setMunicipio($_POST['municipio'])) {
                                                    if ($carga->setHijos($_POST['hijos'])) {
                                                        if ($carga->createEncargado()) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Nivel agregado correctamente';
                                                        } else {
                                                            $result['exception'] = Database::getException();
                                                        }
                                                    } else {
                                                        $result['exception'] = 'hijos incorrectos';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Clave menor a 6 caracteres';
                                                }
                                            } else {
                                                $result['exception'] = 'Claves diferentes';
                                            }
                                        } else {
                                            $result['exception'] = 'Teléfono incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Fecha de nacimiento incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'DUI incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Dirección incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                

                break;
            case 'readOne':
                if ($carga->setId($_POST['id_encargado'])) {
                    if ($result['dataset'] = $carga->readOneEncargado()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'cliente inexistente';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            case 'update':                
                $_POST = $carga->validateForm($_POST);

                if ($carga->setId($_POST['id_encargado'])) {
                    if ($data = $carga->readOneEncargado()) {
                        if ($carga->setNombres($_POST['nombres'])) {
                            if ($carga->setApellidos($_POST['apellidos'])) {
                                if ($carga->setCorreo($_POST['correo'])) {
                                    if ($carga->setDireccion($_POST['direccion'])) {
                                        if ($carga->setDui($_POST['dui'])) {
                                            if ($carga->setNacimiento($_POST['fecha'])) {
                                                if ($carga->setTelefono($_POST['telefono'])) {
                                                    if ($carga->setTrabajo($_POST['trabajo'])) {
                                                        if ($carga->setMunicipio($_POST['municipio'])) {
                                                            if ($carga->setHijos($_POST['hijos'])) {
                                                                if ($carga->updateEncargado()) {
                                                                    $result['status'] = 1;
                                                                    $result['message'] = 'Nivel agregado correctamente';
                                                                } else {
                                                                    $result['exception'] = Database::getException();
                                                                }
                                                            } else {
                                                                $result['exception'] = 'hijos incorrectos';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Clave menor a 6 caracteres';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Claves diferentes';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Teléfono incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Fecha de nacimiento incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'DUI incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Dirección incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'delete':
                if ($carga->setId($_POST['id_encargado']) ) {
                    if ($carga->deleteEncargado()) {
                        $result['status'] = 1;
                        $result['message'] = 'Cliente eliminado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }    
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
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