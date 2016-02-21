<?php
class Realizado{
	
    private $id;
    private $id_data;
    private $realizado;
    private $percentual;
    private $usuario;
    private $data;
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $id_data
	 */
	public function getId_data() {
		return $this->id_data;
	}

	/**
	 * @return the $realizado
	 */
	public function getRealizado() {
		return $this->realizado;
	}

	/**
	 * @return the $percentual
	 */
	public function getPercentual() {
		return $this->percentual;
	}

	/**
	 * @return the $usuario
	 */
	public function getUsuario() {
		return $this->usuario;
	}

	/**
	 * @return the $data
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param field_type $id_data
	 */
	public function setId_data($id_data) {
		$this->id_data = $id_data;
	}

	/**
	 * @param field_type $realizado
	 */
	public function setRealizado($realizado) {
		$this->realizado = $realizado;
	}

	/**
	 * @param field_type $percentual
	 */
	public function setPercentual($percentual) {
		$this->percentual = $percentual;
	}

	/**
	 * @param field_type $usuario
	 */
	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	/**
	 * @param field_type $data
	 */
	public function setData($data) {
		$this->data = $data;
	}
	
}

?>
