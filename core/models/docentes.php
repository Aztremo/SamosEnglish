<?php
/*
*	Clase para manejar la tabla clientes de la base de datos.
*/
class Docentes extends Validator
{
    // Aquí van las propiedades y métodos de los clientes.

    private $id_docente = null;
    private $nombredocente = null;
    private $apellidodocente = null;
    private $correodocente = null;
    private $telefonodocente = null;
    private $direcciondocente = null;
    private $duidocente = null;
    private $fecha_nacimientodocente = null;
    private $titulos = null;
    private $contra_prof = null;
    private $num_escalafon = null;
    private $id_tipodocente = null;
    private $id_niveldoc = null;


    // Métodos para asignar valores a los atributos.

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_docente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombredocente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellido($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellidodocente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correodocente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefono($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->telefonodocente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion($value)
    {
        if ($this->validateString($value, 1, 50)) {
            $this->direcciondocente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDui($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->duidocente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNacimiento($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->fecha_nacimientodocente = $value;
            return true;
        } else {
            return false;
        }
    }
    

    public function setTitulos($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->titulos = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setContra($value)
    {
        if ($this->validatePassword($value)) {
            $this->contra_prof = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEscalafon($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->num_escalafon = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdTipodocente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_tipodocente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdNiveldoc($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_niveldoc = $value;
            return true;
        } else {
            return false;
        }
    }



    //Métodos para obtener valores de los atributos.

    public function getId()
    {
        return $this->id_docente;
    }

    public function getNombre()
    {
        return $this->nombredocente;
    }

    public function getApellido()
    {
        return $this->apellidodocente;
    }

    public function getCorreo()
    {
        return $this->correodocente;
    }

    public function getTelefono()
    {
        return $this->telefonodocente;
    }

    public function getDireccion()
    {
        return $this->direcciondocente;
    }

    public function getDui()
    {
        return $this->duidocente;
    }

    public function getNacimiento()
    {
        return $this->fecha_nacimientodocente;
    }

    public function getTitulos()
    {
        return $this->titulos;
    }

    public function getContra()
    {
        return $this->contra_prof;
    }

    public function getEscalafon()
    {
        return $this->num_escalafon;
    }

    public function getIdTipodocente()
    {
        return $this->Id_tipodocente;
    }

    public function getIdNiveldoc()
    {
        return $this->id_niveldoc;
    }


    //Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).

    public function searchDocentes($value)
    {
        $sql = 'SELECT id_docente, nombredocente, apellidodocente, correodocente, telefonodocente, direcciondocente, duidocente, fecha_nacimientodocente, titulos, contra_prof, num_escalafon, id_tipodocente, id_niveldoc
                FROM docente2
                WHERE nombredocente ILIKE ? OR apellidodocente ILIKE ?
                ORDER BY nombredocente';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createDocente()
    {
       
        $sql = 'INSERT INTO docente2(nombredocente, apellidodocente, correodocente, telefonodocente, direcciondocente, duidocente, fecha_nacimientodocente, titulos, contra_prof, num_escalafon, id_tipodocente, id_niveldoc)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombredocente, $this->apellidodocente, $this->correodocente, $this->telefonodocente, $this->direcciondocente, $this->duidocente, $this->fecha_nacimientodocente, $this->titulos, $this->contra_prof, $this->num_escalafon, $this->id_tipodocente, $this->id_niveldoc);
        return Database::executeRow($sql, $params);
    }

    public function readAllDocentes()
    {
        $sql = 'SELECT id_docente, nombredocente, apellidodocente, correodocente, telefonodocente, direcciondocente, duidocente, fecha_nacimientodocente, titulos, contra_prof, num_escalafon, id_tipodocente, id_niveldoc
                FROM docente2 ORDER BY id_docente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneDocente()
    {
        $sql = 'SELECT id_docente, nombredocente, apellidodocente, correodocente, telefonodocente, direcciondocente, duidocente, fecha_nacimientodocente, titulos, contra_prof, num_escalafon, id_tipodocente, id_niveldoc
                FROM docente2
                WHERE id_docente = ?';
        $params = array($this->id_docente);
        return Database::getRow($sql, $params);
    }

    public function updateDocente()
    {
        $sql = 'UPDATE docente2
                    SET nombredocente = ?, apellidodocente = ?, correodocente = ?, telefonodocente =?, direcciondocente =?, duidocente =?, fecha_nacimientodocente =?, titulos =?, contra_prof =?, num_escalafon =?, id_tipodocente =?,  id_niveldoc=?
                    WHERE id_docente = ?';
        $params = array($this->nombredocente, $this->apellidodocente, $this->correodocente, $this->telefonodocente, $this->direcciondocente, $this->duidocente, $this->fecha_nacimientodocente, $this->titulos, $this->contra_prof, $this->num_escalafon, $this->id_tipodocente, $this->id_niveldoc, $this->id_docente);
        return Database::executeRow($sql, $params);
    }

    public function deleteDocente()
    {
        $sql = 'DELETE FROM docente2
                WHERE id_docente = ?';
        $params = array($this->id_docente);
        return Database::executeRow($sql, $params);
    }

}