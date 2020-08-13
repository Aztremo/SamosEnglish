<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class nivel extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nivel = null;

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

    public function setNivel($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nivel = $value;
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

    public function getNivel()
    {
        return $this->nivel;
    }
    

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchNiv($value)
    {
        $sql = 'SELECT id_nivel, nivel   
                FROM nivel
                WHERE nivel  ILIKE ? 
                ORDER BY nivel';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createNiv()
    {
        
        $sql = 'INSERT INTO nivel(nivel) VALUES(?)';
            $params = array($this->nivel);
            return Database::executeRow($sql, $params);
    }

    public function readAllNiv()
    {
        $sql = 'SELECT id_nivel, nivel   
                FROM nivel
                ORDER BY nivel';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneNivel()
    {
        $sql = 'SELECT id_nivel, nivel FROM nivel WHERE id_nivel = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateNiv()
    {
        $sql = 'UPDATE nivel SET nivel  = ? WHERE id_nivel = ?';
            $params = array($this->nivel , $this->id);  
        return Database::executeRow($sql, $params);
    }

    public function deleteNiv()
    {
        $sql = 'DELETE FROM nivel WHERE id_nivel = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>