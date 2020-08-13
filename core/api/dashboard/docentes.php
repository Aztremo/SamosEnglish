<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/docentes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $docente = new  Docentes;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $docente->readAllDocentes()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay docentes registrados';
                }
                break;
            case 'search':
                $_POST = $docente->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $docente->searchDocentes($_POST['search'])) {
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
                    $_POST = $docente->validateForm($_POST);
                    if ($docente->setNombre($_POST['nombredocente'])) {
                        if ($docente->setApellido($_POST['apellidodocente'])) {
                            if ($docente->setCorreo($_POST['correodocente'])) {
                                if ($docente->setTelefono($_POST['telefonodocente'])) {
                                    if ($docente->setDireccion($_POST['direcciondocente'])) {
                                        if ($docente->setDui($_POST['duidocente'])) {
                                            if ($docente->setNacimiento($_POST['fecha_nacimientodocente'])) {
                                                if ($docente->setTitulos($_POST['titulos'])) {
                                                    if ($docente->setContra($_POST['contra_prof'])) {
                                                        if ($docente->setEscalafon($_POST['num_escalafon'])) {
                                                            if ($docente->setIdTipodocente($_POST['id_tipodocente'])) {
                                                                if ($docente->setIdNiveldoc($_POST['id_niveldoc'])) {
                                                                    if ($docente->createDocente()) {
                                                                        $result['status'] = 1;
                                                                        $result['message'] = 'Docente creado correctamente';
                                                                    } else {
                                                                        $result['exception'] = Database::getException();
                                                                    }
                                            
                                                                } else {
                                                                    $result['exception'] = 'Nivel incorrecto';
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Tipo no valido';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Ingrese un dato valido';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Intente una nueva contraseña';
                                                    }
                                                }else {
                                                    $result['exception'] = 'Titulos incorrectos';
                                                }
                                            } else {
                                                $result['exception'] = 'Nacimiento incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Dui incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Direccion incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Telefono no valido';
                                }
                            } else {
                                $result['exception'] = 'Correo no valido';
                            }
                        } else {
                            $result['exception'] = 'Apellido no valido';
                        }
                    } else {
                        $result['exception'] = 'Nombre incorrecto';
                    }
    
                 break;
                 case 'readOne':
                    if ($docente->setId($_POST['id_docente'])) {
                        if ($result['dataset'] = $docente->readOneDocente()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Este Docente no existe';
                        }
                    } else {
                        $result['exception'] = 'Docente incorrecto';
                    }
                    break;
                    case 'update':
                        $_POST = $docente->validateForm($_POST);
                        if ($docente->setId($_POST['id_docente'])) {
                            if ($data = $docente->readOneDocente()) {
                                if ($docente->setNombre($_POST['nombredocente'])) {
                                    if ($docente->setApellido($_POST['apellidodocente'])) {
                                        if ($docente->setCorreo($_POST['correodocente'])) {
                                            if ($docente->setTelefono($_POST['telefonodocente'])) {
                                                if ($docente->setDireccion($_POST['direcciondocente'])) {
                                                    if ($docente->setDui($_POST['duidocente'])) {
                                                        if ($docente->setNacimiento($_POST['fecha_nacimientodocente'])) {
                                                            if ($docente->setTitulos($_POST['titulos'])) {
                                                                if ($docente->setContra($_POST['contra_prof'])) {
                                                                    if ($docente->setEscalafon($_POST['num_escalafon'])) {
                                                                        if ($docente->setIdTipodocente($_POST['id_tipodocente'])) {
                                                                            if ($docente->setIdNiveldoc($_POST['id_niveldoc'])) {
                                                                                if ($docente->updateDocente()) {
                                                                                    $result['status'] = 1;
                                                                                    $result['message'] = 'Docente modificado correctamente';
                                                                                } else {
                                                                                    $result['exception'] = Database::getException();
                                                                                }
                                                        
                                                                            } else {
                                                                                $result['exception'] = 'Nivel incorrecto';
                                                                            }
                                                                        } else {
                                                                            $result['exception'] = 'Tipo no valido';
                                                                        }
                                                                    } else {
                                                                        $result['exception'] = 'Ingrese un dato valido';
                                                                    }
                                                                } else {
                                                                    $result['exception'] = 'Intente una nueva contraseña';
                                                                }
                                                            }else {
                                                                $result['exception'] = 'Titulos incorrectos';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Nacimiento incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Dui incorrecto';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Direccion incorrecta';
                                                }
                                            } else {
                                                $result['exception'] = 'Telefono no valido';
                                            }
                                        } else {
                                            $result['exception'] = 'Correo no valido';
                                        }
                                    } else {
                                        $result['exception'] = 'Apellido no valido';
                                    }
                                } else {
                                    $result['exception'] = 'Nombre incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Docente inexistente';
                            }
                        } else {
                            $result['exception'] = 'Dato incorrecto';
                        }
                      break;
            case 'delete':
                if ($docente->setId($_POST['id_docente'])) {
                    if ($data = $docente->readOneDocente()) {
                        if ($docente->deleteDocente()) {
                            $result['status'] = 1;
                            $result['message'] = 'Docente eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Docente inexistente';
                    }
                } else {
                    $result['exception'] = 'Docente incorrecto';
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