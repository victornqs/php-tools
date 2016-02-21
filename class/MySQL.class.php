<?php
 $checkurl = $_SERVER['PHP_SELF'];
 if (@preg_match("class.php", $checkurl)) 
 //if(eregi("class.php", "$checkurl")) ---> Mudou a versao do php essa funcao nao funciona mais assim
 {
   header("Location: /tp/");
 }

class MySQL
 {
   var $host="localhost";
   var $user="root";
   var $password="password";
   var $database="basedata";

   var $query;
   var $link;
   var $result;

   function MySQL()
   {
     //Apenas instancia o Objeto
   }

function connect()
{
   $this->link=mysql_connect($this->host,$this->user,$this->password);
   if(!$this->link)
   {
     echo "Falha na conexao com o Banco de Dados!<br />";
     echo "Erro: " . mysql_error();
     die();
   }
   elseif(!mysql_select_db($this->database, $this->link))
   {
     echo "O Banco de Dados solicitado n�o pode ser aberto!<br />";
     echo "Erro: " . mysql_error();
     die();
   }
}

function executeQuery($query)
 {
   $this->connect();
   $this->query=$query;
   if($this->result=mysql_query($this->query))
   {
     $this->disconnect();
     return $this->result;
   }
   else
   {
     echo "Ocorreu um erro na execu��o da SQL<BR>";
     echo "Erro :" . mysql_error()."<BR>";
     echo "SQL: " . $query."<BR>";
     die();
     disconnect();
   }
 }
function executeQueryId($query)
 {
   $this->connect();
   $this->query=$query;
   if($this->result=mysql_query($this->query))
   {
     return $this->result;
   }
   else
   {
     echo "Ocorreu um erro na execu��o da SQL<BR>";
     echo "Erro :" . mysql_error()."<BR>";
     echo "SQL: " . $query."<BR>";
     die();
     disconnect();
   }
 }
 function disconnect()
   {
     return mysql_close($this->link);
   }
}


?>
