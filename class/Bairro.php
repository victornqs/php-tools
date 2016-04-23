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


	function verBairroRel($inicio, $limite, $id) {
		try {
				include "wtf.php";
				$pdo = new PDO ( "mysql:host=$servidor;dbname=$dbname", "$usuario", "$senha" );

		} catch ( PDOException $e ) {
				echo $e->getMessage ();
				echo '<br>Erro ao se conectar a Base de Dados';
		}

		$stmt = $pdo->prepare( "SELECT * FROM comportas ORDER BY id DESC LIMIT $inicio,$limite" );
		$stmt->execute();
		while ( $obj = $stmt->fetch ( PDO::FETCH_OBJ ) ) {
			$id = $obj->id;
			$id_unidade = $obj->id_unidade;
			$nivel = $obj->nivel;
			$stmt = $pdo->prepare( "SELECT nome FROM unidade WHERE id=$id_unidade" );
			$stmt->execute();
			while ( $obj = $stmt->fetch ( PDO::FETCH_OBJ ) ) {
				$unidade = $obj->nome;
			}

			echo "<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"5\" class=\"trBusca\">
    		<tr onclick=\"location.href = 'fechar_comporta.php?id=$id';\" style=\"cursor: hand;\" style=\"cursor:hand\" onMouseOver=\"javascript:this.style.backgroundColor='#DDDDDD'\" onMouseOut=\"javascript:this.style.backgroundColor=''\">
    		<td width=\"5%\" align=\"center\" onmouseover=\"abrePagina('exibir_comportas_ajax.php?id=$id');\" onmouseout=\"esconde();\" onmousemove=\"funcaoDivSegueCursor('conteudo', event)\"><img src=\"imgs/add.png\" width=\"24\" height=\"24\" /></td>
    		<td width=\"5%\" align=\"center\">$id</td>
    		<td width=\"20%\" class=\"textoGeral\" align=\"center\">$data</td>
    		<td width=\"20%\" align=\"center\">$hora_abre</td>
    		<td width=\"20%\" class=\"textoGeral\" align=\"center\">$unidade</td>
    		<td width=\"20%\" align=\"center\">$nivel</td>
    		<td width=\"5%\" align=\"center\"><img src=\"imgs/icones/accept.png\" width=\"24\" height=\"24\" /></td>
    		</tr>
    		</table>";
		}
		//Fecha o banco
        $pdo = null;
	}


	function verBairro($inicio, $limite) {
		try {
				include "wtf.php";
				$pdo = new PDO ( "mysql:host=$servidor;dbname=$dbname", "$usuario", "$senha" );

		} catch ( PDOException $e ) {
				echo $e->getMessage ();
				echo '<br>Erro ao se conectar a Base de Dados';
		}
		$stmt = $pdo->prepare( "SELECT * FROM bairro ORDER BY id DESC LIMIT $inicio,$limite" );
		$stmt->execute();

		while ( $obj = $stmt->fetch ( PDO::FETCH_OBJ ) ) {
			$id = $obj->id;
			$nome = $obj->cliente;
			$id_cidade = $obj->id_cidade;

			switch ($id_cidade) {
				case 0 :
					$cidade = "Arraial do Cabo";
					break;
				case 1 :
					$cidade = "B�zios";
					break;
				case 2 :
					$cidade = "Cabo Frio";
					break;
				case 3 :
					$cidade = "Iguaba";
					break;
				case 4 :
					$cidade = "S�o Pedro";
					break;
			}

			echo "<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"5\" class=\"trBusca\">
				  <tr style=\"cursor:default\" onMouseOver=\"javascript:this.style.backgroundColor='#DDDDDD'\" onMouseOut=\"javascript:this.style.backgroundColor=''\">
					<td width=\"5%\" align=\"center\">$id</td>
					<td width=\"40%\" class=\"textoGeral\" align=\"center\">$nome</td>
					<td width=\"20%\" class=\"textoGeral\" align=\"center\">$cidade</td>
					<td width=\"5%\" align=\"center\"><img src=\"imgs/icones/accept.png\" width=\"24\" height=\"24\" /></td>
					<td width=\"5%\" align=\"center\"><img src=\"imgs/icones/block.png\" width=\"24\" height=\"24\" /></td>
				  </tr>
				</table>";
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
