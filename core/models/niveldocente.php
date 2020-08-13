<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class niveldocente extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $niveldocente = null;

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

    public function setNiveldocente($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->niveldocente = $value;
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

    public function getNiveldocente()
    {
        return $this->niveldocente;
    }
    

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchNiv($value)
    {
        $sql = 'SELECT id_niveldoc, nivel_docente   
                FROM niveldocente
                WHERE nivel_docente  ILIKE ? 
                ORDER BY nivel_docente';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createNiv()
    {
        
        $sql = 'INSERT INTO niveldocente(nivel_docente) VALUES(?)';
            $params = array($this->niveldocente);
            return Database::executeRow($sql, $params);
    }

    public function readAllNiv()
    {
        $sql = 'SELECT id_niveldoc, nivel_docente   
                FROM niveldocente
                ORDER BY nivel_docente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneNiv()
    {
        $sql = 'SELECT id_niveldoc, nivel_docente FROM niveldocente WHERE id_niveldoc = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateNiv()
    {
        $sql = 'UPDATE niveldocente SET nivel_docente  = ? WHERE id_niveldoc = ?';
            $params = array($this->niveldocente , $this->id);  
        return Database::executeRow($sql, $params);
    }

    public function deleteNiv()
    {
        $sql = 'DELETE FROM niveldocente WHERE id_niveldoc = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>