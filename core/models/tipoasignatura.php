<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Tipoasignatura extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombretipo = null;

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

    public function setNombretipo($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombretipo = $value;
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

    public function getNombretipo()
    {
        return $this->nombretipo;
    }
    

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchTipo($value)
    {
        $sql = 'SELECT id_tipoasignatura, tipoasignatura
                FROM tipo_asignatura
                WHERE tipoasignatura ILIKE ? 
                ORDER BY tipoasignatura';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createTipo()
    {
        
        $sql = 'INSERT INTO tipo_asignatura(tipoasignatura) VALUES(?)';
            $params = array($this->nombretipo);
            return Database::executeRow($sql, $params);
    }

    public function readAllTipo()
    {
        $sql = 'SELECT id_tipoasignatura, tipoasignatura
                FROM tipo_asignatura
                ORDER BY tipoasignatura';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneTipo()
    {
        $sql = 'SELECT id_tipoasignatura, tipoasignatura FROM tipo_asignatura WHERE id_tipoasignatura = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateTipo()
    {
        $sql = 'UPDATE tipo_asignatura SET tipoasignatura = ? WHERE id_tipoasignatura = ?';
            $params = array($this->nombretipo , $this->id);  
        return Database::executeRow($sql, $params);
    }

    public function deleteTipo()
    {
        $sql = 'DELETE FROM tipo_asignatura WHERE id_tipoasignatura = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>