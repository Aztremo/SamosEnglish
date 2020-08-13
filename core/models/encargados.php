<?php
/*
*	Clase para manejar la tabla clientes de la base de datos. Es clase hija de Validator.
*/
class Encargados extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombres = null;
    private $apellidos = null;
    private $correo = null;
    private $telefono = null;
    private $dui = null;
    private $nacimiento = null;
    private $direccion = null;
    private $municipio = null;
    private $trabajo = null;
    private $hijos = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombres($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellidos = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefono($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDui($value)
    {
        if ($this->validateDUI($value)) {
            $this->dui = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNacimiento($value)
    {
        if ($this->validateDate($value)) {
            $this->nacimiento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion($value)
    {
        if ($this->validateString($value, 1, 200)) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setMunicipio($value)
    {
        if ($this->validateString($value, 1, 200)) {
            $this->municipio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTrabajo($value)
    {
        if ($this->validateBoolean($value)) {
            $this->trabajo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setHijos($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->hijos = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getDUI()
    {
        return $this->dui;
    }

    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getMunicipio()
    {
        return $this->municipio;
    }

    public function getTrabajo()
    {
        return $this->trabajo;
    }

    public function getHijos()
    {
        return $this->hijos;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchEncargado($value)
    {
        $sql = 'SELECT id_encargado, nombre_encargado, apellido_encargado, correo_encargado, direccion_encargado, cantidad_hijos
                FROM encargados
                WHERE apellido_encargado ILIKE ? OR nombre_encargado ILIKE ?
                ORDER BY nombre_encargado';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createEncargado()
    {
        $sql = 'INSERT INTO encargados(nombre_encargado, apellido_encargado, correo_encargado, direccion_encargado, dui_encargado, telefono_encargado, municipio_encargado, lugar_trabajo, fecha_nacimiento_encargado, cantidad_hijos)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->direccion, $this->dui, $this->telefono, $this->municipio, $this->trabajo, $this->nacimiento, $this->hijos);
        return Database::executeRow($sql, $params);
    }

    public function readAllEncargado()
    {
        $sql = 'SELECT id_encargado, nombre_encargado, apellido_encargado, correo_encargado, direccion_encargado, cantidad_hijos
                FROM encargados
                ORDER BY nombre_encargado';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneEncargado()
    {
        $sql = 'SELECT id_encargado, nombre_encargado, apellido_encargado, correo_encargado, direccion_encargado, dui_encargado, telefono_encargado, municipio_encargado, lugar_trabajo, fecha_nacimiento_encargado, cantidad_hijos
                FROM encargados
                WHERE id_encargado = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateEncargado()
    {
        $sql = 'UPDATE encargados
                SET nombre_encargado = ?, apellido_encargado = ?, correo_encargado = ?, direccion_encargado = ?, dui_encargado = ?, telefono_encargado = ?, municipio_encargado = ?, lugar_trabajo = ?, fecha_nacimiento_encargado = ?, cantidad_hijos = ?
                WHERE id_encargado = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->direccion, $this->dui, $this->telefono, $this->municipio, $this->trabajo, $this->nacimiento, $this->hijos, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteEncargado()
    {
        $sql = 'DELETE FROM encargados
                WHERE id_encargado = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>