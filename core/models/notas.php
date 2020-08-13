<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Notas extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_nota = null;
    private $promedio_final = null;
    private $id_perfil = null;
    private $id_alumno = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdNota($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_nota = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPromedio($value)
    {
        if($this->validateNaturalNumber($value)) {
            $this->promedio_final = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdPerfil($value)
    {
        if($this->validateNaturalNumber($value)) {
            $this->id_perfil = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdAlumno($value)
    {
        if($this->validateNaturalNumber($value)) {
            $this->id_alumno = $value;
            return true;
        } else {
            return false;
        }
    }


    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdNota()
    {
        return $this->id_nota;
    }

    public function getPromedio()
    {
        return $this->promedio_final;
    }

    public function getIdPerfil()
    {
        return $this->id_perfil;
    }

    public function getIdAlumno()
    {
        return $this->id_alumno;
    }
    

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchNotas($value)
    {
        $sql = 'SELECT id_nota, promedio_final, id_perfil, id_alumno
                FROM notas1
                WHERE CAST(promedio_final as character varying) ILIKE ?
                ORDER BY id_nota';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createNota()
    {
        
        $sql = 'INSERT INTO notas1(promedio_final, id_perfil, id_alumno) 
                VALUES(?, ?, ?)';
           $params = array($this->promedio_final, $this->id_perfil, $this->id_alumno);
            return Database::executeRow($sql, $params);
    }

    public function readAllNotas()
    {
        $sql = 'SELECT id_nota, promedio_final, id_perfil, id_alumno
                FROM notas1
                ORDER BY promedio_final';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneNota()
    {
        $sql = 'SELECT id_nota, promedio_final, id_perfil, id_alumno FROM notas1 WHERE id_nota = ?';
        $params = array($this->id_nota);
        return Database::getRow($sql, $params);
    }

    public function updateNota()
    {
        $sql = 'UPDATE notas1 SET promedio_final=?, id_perfil=?, id_alumno = ? 
                WHERE id_nota = ?';
            $params = array($this->promedio_final, $this->id_perfil , $this->id_alumno, $this->id_nota);  
        return Database::executeRow($sql, $params);
    }

    public function deleteNota()
    {
        $sql = 'DELETE FROM notas1 WHERE id_nota = ?';
        $params = array($this->id_nota);
        return Database::executeRow($sql, $params);
    }
}
?>