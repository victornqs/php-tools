<?php
class Data{
    private $id;
    private $dia;
    private $mes;
    private $ano;
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $dia
	 */
	public function getDia() {
		return $this->dia;
	}

	/**
	 * @return the $mes
	 */
	public function getMes() {
		return $this->mes;
	}

	/**
	 * @return the $ano
	 */
	public function getAno() {
		return $this->ano;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param field_type $dia
	 */
	public function setDia($dia) {
		$this->dia = $dia;
	}

	/**
	 * @param field_type $mes
	 */
	public function setMes($mes) {
		$this->mes = $mes;
	}

	/**
	 * @param field_type $ano
	 */
	public function setAno($ano) {
		$this->ano = $ano;
	}

    
    
}

?>
