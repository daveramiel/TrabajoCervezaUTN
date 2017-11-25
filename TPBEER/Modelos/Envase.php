<?php  namespace Modelos;
	class Envase{
		private $modificador_precio;
		private $nombre_cantidad;
		private $idEnvase;
		private $estado;


	function __construct($nomCantidad,$modPrecio){
		$this->setModificadorPrecio($modPrecio);
		$this->setNombreCantidad($nomCantidad);
	}

    public function getModificadorPrecio()
    {
        return $this->modificador_precio;
    }

    public function setModificadorPrecio($modificador_precio)
    {
        $this->modificador_precio = $modificador_precio;

        return $this;
    }

    public function getNombreCantidad()
    {
        return $this->nombre_cantidad;
    }

    public function setNombreCantidad($nombre_cantidad)
    {
        $this->nombre_cantidad = $nombre_cantidad;

        return $this;
    }

    public function getIdEnvase()
    {
        return $this->idEnvase;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function setIdEnvase($idEnvase){
    	$this->idEnvase = $idEnvase;
    }
}
?>