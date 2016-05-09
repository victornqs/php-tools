<?php

function session_checker(){

	if(!isset($_SESSION['nome'])){

		header ("Location:index.php");

		exit(); 
	}
}

?>
