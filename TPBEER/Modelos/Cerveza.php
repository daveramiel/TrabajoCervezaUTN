<?php  namespace Modelos;

class Cerveza
{
	private $id_cerveza;
	private $nombre;
	private $color;
	private $precio;
	private $descripcion;
	private $estado;
	
	public function __construct($nom,$col,$precio,$desc,$estado)
	{
		$this->setNombre($nom);
		$this->setColor($col);
		$this->setPrecio($precio);
		$this->setDescripcion($desc);
		$this->setEstado($estado);
	}
	public function getIdCerveza()
	{
		return $this->id_cerveza;
	}
	public function setIdCerveza($id_cerveza)
	{
		$this->id_cerveza = $id_cerveza;
	}
	public function getNombre()
	{
		return $this->nombre;
	}
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function getColor()
	{
		return $this->color;
	}
	public function setColor($color)
	{
		$this->color = $color;
	}
	public function getPrecio()
	{
		return $this->precio;
	}
	public function setPrecio($precio)
	{
		$this->precio = $precio;
	}
	public function getDescripcion()
	{
		return $this->descripcion;
	}
	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}
	
	public function getEstado()
	{
		return $this->estado;
	}
	public function setEstado($estado)
	{
		$this->estado = $estado;
	}

}
?>
