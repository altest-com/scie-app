<?php
require '../core/BaseEntity.php';

class Evaluado extends BaseEntity
{
    private $id;
    private $nombre;
    private $pApellido;
    private $sApellido;
    private $curp;
    private $rfc;
    private $idGenero;
    private $fechaCreacion;
    private $fechaModificacion;
    private $estatus;

    public function __construct($id)
    {
        parent::__construct("evaluados");
        $this->id = $id;
        $this->refresh();
    }

    public function updateEvaluado($nombre, $pApellido, $sApellido, $curp, $rfc, $idGenero, $fechaCreacion, $estatus)
    {
        parent::updateById($this->id, 'nombre', $nombre);
        parent::updateById($this->id, 'primer_apellido', $pApellido);
        parent::updateById($this->id, 'segundo_apellido', $sApellido);
        parent::updateById($this->id, 'curp', $curp);
        parent::updateById($this->id, 'rfc', $rfc);
        parent::updateById($this->id, 'id_genero', $idGenero);
        parent::updateById($this->id, 'fecha_creacion', $fechaCreacion);
        parent::updateById($this->id, 'fecha_modificacion', date("Y-m-d h:i:s", time()));
        parent::updateById($this->id, 'estatus', $estatus);
        $this->refresh();
    }

    private function refresh()
    {
        $info = json_decode(json_encode(parent::getById($this->id)));
        $this->nombre = $info->{'nombre'};
        $this->pApellido = $info->{'primer_apellido'};
        $this->sApellido = $info->{'segundo_apellido'};
        $this->curp = $info->{'curp'};
        $this->rfc = $info->{'rfc'};
        $this->idGenero = $info->{'id_genero'};
        $this->fechaCreacion = $info->{'fecha_creacion'};
        $this->fechaModificacion = $info->{'fecha_modificacion'};
        $this->estatus = $info->{'estatus'};
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getPApellido()
    {
        return $this->pApellido;
    }

    /**
     * @return mixed
     */
    public function getSApellido()
    {
        return $this->sApellido;
    }

    /**
     * @return mixed
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * @return mixed
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * @return mixed
     */
    public function getIdGenero()
    {
        return $this->idGenero;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * @return mixed
     */
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }

    /**
     * @return mixed
     */
    public function getEstatus()
    {
        return $this->estatus;
    }
}
