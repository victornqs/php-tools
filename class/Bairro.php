<?php

/**
 * Description of PDO
 *
 * @author Victor Barreto
 */

class Bairro{

	private $id;
	private $nome;
	private $id_cidade;


	function setBairro($nome, $id_cidade) {
		try {
				include "wtf.php";
				$pdo = new PDO ( "mysql:host=$servidor;dbname=$dbname", "$usuario", "$senha" );

		} catch ( PDOException $e ) {
				echo $e->getMessage ();
				echo '<br>Erro ao se conectar a Base de Dados';
		}

		$this->nome = $nome;
		$this->id_cidade = $id_cidade;
		$stmt = $pdo->prepare("INSERT INTO bairro(nome, id_cidade) VALUES('$this->nome','$this->id_cidade')");
		$stmt->execute();
		//Fecha o banco
        $pdo = null;
	}


	function getBairroSel() {
		try {
				include "wtf.php";
				$pdo = new PDO ( "mysql:host=$servidor;dbname=$dbname", "$usuario", "$senha" );

		} catch ( PDOException $e ) {
				echo $e->getMessage ();
				echo '<br>Erro ao se conectar a Base de Dados';
		}

		$stmt = $pdo->prepare( "SELECT * FROM bairro" );
		$stmt->execute();
		while ( $obj = $stmt->fetch ( PDO::FETCH_OBJ ) ) {
			$nome = $obj->nome;
			$id = $obj->id;
			echo "<option value=$id>" . $nome . "</option>";
		}
		//Fecha o banco
        $pdo = null;
	}
	
	function totaldeRegistros() {
		try {
				include "wtf.php";
				$pdo = new PDO ( "mysql:host=$servidor;dbname=$dbname", "$usuario", "$senha" );

		} catch ( PDOException $e ) {
				echo $e->getMessage ();
				echo '<br>Erro ao se conectar a Base de Dados';
		}

		$stmt = $pdo->prepare( "SELECT * FROM bairro" );
		$stmt->execute();
		$l = $stmt->rowCount();;
		//Fecha o banco
        $pdo = null;
		return $l;
	}
}

?>
