<?php

include "class/MySQL.class.php";

class Usuario extends MySQL{
    
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $nivel_acesso;
    private $login;
    private $senha;	
    private $data_ultimo_login;	
    
    
    function setUsuario($nome, $email, $telefone, $nivel_acesso, $login){
        
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->nivel_acesso = $nivel_acesso;
        $this->login = $login;
        $this->senha = 0;		
        
        parent::executeQuery("INSERT INTO usuario(nome, email, telefone, nivel_acesso, login, senha) VALUES('$this->nome','$this->email','$this->telefone', '$this->nivel_acesso','$this->login','$this->senha')");
        @parent::disconnect();
        
    }

    //Inicio Get -------------------------------------------------------------------------------------------------------------------------
    
   
    function getNome($id){        
        $query = parent::executeQuery("SELECT nome from usuario WHERE id='$id'");
        $usuario = mysql_fetch_array($query);
        $this->nome = $usuario['nome'];
        return $this->nome;
    }  
	
    function verificaLoginCadastrado($login){        
        $query = parent::executeQuery("SELECT login from usuario WHERE login='$login'");
        $usuario = mysql_fetch_array($query);
        $this->login = $usuario['login'];
        return $this->login;
    } 	 
    

    
    //Fim Get -------------------------------------------------------------------------------------------------------------------------
    
    function delUsuario($id){
        $this->id = $id;
        parent::executeQuery("DELETE FROM usuario WHERE id='$this->id'");
    }    
    
    
    function updateUsuario($id, $nome, $email, $telefone, $nivel_acesso, $login, $senha){
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->nivel_acesso = $nivel_acesso;
        $this->login = $login;
        $this->senha = $senha;		
        parent::executeQuery("UPDATE usuario SET nome='$this->nome', email='$this->email', telefone='$this->telefone', nivel_acesso='$this->nivel_acesso, login='$this->login', senha='$this->senha' WHERE id='$this->id'");
    }  
	
	
	function verUsuarios($inicio, $limite){
		$query = parent::executeQuery("SELECT * FROM usuario ORDER BY id DESC LIMIT $inicio,$limite");
        while($l = mysql_fetch_array($query)){
            $id = $l['id'];
			$nome = $l['nome'];
			$email = $l['email'];
			$login = $l['login'];
			

			
			
            echo "<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"5\" class=\"trBusca\">
				  <tr style=\"cursor:default\" onMouseOver=\"javascript:this.style.backgroundColor='#DDDDDD'\" onMouseOut=\"javascript:this.style.backgroundColor=''\">
					<td width=\"5%\" align=\"center\">$id</td>
					<td width=\"20%\" class=\"textoGeral\" align=\"center\">$nome</td>
					<td width=\"20%\" align=\"center\">$email</td>
					<td width=\"20%\" align=\"center\">$login</td>					
					<td width=\"5%\" align=\"center\"><img src=\"imgs/icones/accept.png\" width=\"24\" height=\"24\" /></td>
				  </tr>
				</table>";
				//echo "<p>";
            
        }
	}
	
	function totaldeRegistros(){
		$query = parent::executeQuery("SELECT * FROM usuario");
        $l = mysql_num_rows($query);
		return $l;
	}  
    
}

?>
