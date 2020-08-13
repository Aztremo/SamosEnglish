<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Tipoperfil extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $tipoperfil = null;

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

    public function setTipoperfil($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->tipoperfil = $value;
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

    public function getTipoperfil()
    {
        return $this->tipoperfil;
    }
    

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchTipo($value)
    {
        $sql = 'SELECT id_tipo_actividad, nombre_actividad
                FROM tipo_perfil
                WHERE nombre_actividad ILIKE ? 
                ORDER BY nombre_actividad';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createTipo()
    {
        
        $sql = 'INSERT INTO tipo_perfil(nombre_actividad) VALUES(?)';
            $params = array($this->tipoperfil);
            return Database::executeRow($sql, $params);
    }

    public function readAllTipo()
    {
        $sql = 'SELECT id_tipo_actividad, nombre_actividad
                FROM tipo_perfil
                ORDER BY nombre_actividad';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneTipo()
    {
        $sql = 'SELECT id_tipo_actividad, nombre_actividad FROM tipo_perfil WHERE id_tipo_actividad = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateTipo()
    {
        $sql = 'UPDATE tipo_perfil SET nombre_actividad = ? WHERE id_tipo_actividad = ?';
            $params = array($this->tipoperfil , $this->id);  
        return Database::executeRow($sql, $params);
    }

    public function deleteTipo()
    {
        $sql = 'DELETE FROM tipo_perfil WHERE id_tipo_actividad = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>