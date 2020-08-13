<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Estadogrado extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombreestado = null;

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

    public function setNombreestado($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombreestado = $value;
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

    public function getNombreestado()
    {
        return $this->nombreestado;
    }
    

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchEstado($value)
    {
        $sql = 'SELECT id_estadogrado, estado
                FROM estado_grado WHERE estadog ILIKE ? 
                ORDER BY estadog';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createEstado()
    {
        
        $sql = 'INSERT INTO estado_grado(estadog) VALUES(?)';
            $params = array($this->nombreestado);
            return Database::executeRow($sql, $params);
    }

    public function readAllEstado()
    {
        $sql = 'SELECT id_estadogrado, estadog
                FROM estado_grado
                ORDER BY estadog';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneEstado()
    {
        $sql = 'SELECT id_estadogrado, estadog FROM estado_grado WHERE id_estadogrado = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateEstado()
    {
        $sql = 'UPDATE estado_grado SET estadog = ? WHERE id_estadogrado = ?';
            $params = array($this->nombreestado , $this->id);  
        return Database::executeRow($sql, $params);
    }

    public function deleteEstado()
    {
        $sql = 'DELETE FROM estado_grado WHERE id_estadogrado = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>