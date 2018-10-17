<?php
include "Historico.php";
	class cadastrousuario{
	
		private $usuarioId, $usuarioNome, $usuarioSenha, $usuarioAvatar, $usuNivelAcesso, $nome,  $UsuarioApelido, $UsuarioSexo, $UsuarioEmail, $UsuarioEstado ;
	
		
		//encapsulamento de dados;
		public function setUsuarioId($usuarioId){
			$this->usuarioId = $usuarioId;
		}

		public function getUsuarioId(){
			return $this->usuarioId;
		}
		
		public function setUsuarioNome($usuarioNome){
			$this->usuarioNome = $usuarioNome;
		}

		public function getUsuarioNome(){
			return $this->UsuarioNome;
		}
		
		public function setUsuarioSenha($usuarioSenha){
			$this->usuarioSenha = $usuarioSenha;
		}

		public function getUsuarioSenha(){
			return $this->UsuarioSenha;
		}
		
		public function setUsuarioAvatar($usuarioAvatar){
			$this->usuarioAvatar = $usuarioAvatar;
		}

		public function getUsuarioAvatar(){
			return $this->UsuarioAvatar;
		}
		
		public function setUsuNivelAcesso($usuNivelAcesso){
			$this->usuNivelAcesso = $usuNivelAcesso;
		}

		public function getUsuNivelAcesso(){
			return $this->usuNivelAcesso;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getNome(){
			return $this->nome;
		}
		
		public function setUsuarioApelido($UsuarioApelido){
			$this->UsuarioApelido = $UsuarioApelido;
		}

		public function getUsuarioApelido(){
			return $this->UsuarioApelido;
		}
		
		public function setUsuarioSexo($UsuarioSexo){
			$this->UsuarioSexo = $UsuarioSexo;
		}

		public function getUsuarioSexo(){
			return $this->UsuarioSexo;
		}
		
		public function setUsuarioEmail($UsuarioEmail){
			$this->UsuarioEmail = $UsuarioEmail;
		}

		public function getUsuarioEmail(){
			return $this->UsuarioEmail;
		}
		
		public function setUsuarioEstado($UsuarioEstado){
			$this->UsuarioEstado = $UsuarioEstado;
		}

		public function getUsuarioEstado(){
			return $this->UsuarioEstado;
		}
		

	
		public function IntroduzDadosUsuario(){
			global $con;
			
		 $usuarioId = $this->getUsuarioId();
		 $usuarioNome = $this->getUsuarioNome();
		 $usuarioSenha = $this->getUsuarioSenha();
		 $usuarioAvatar = $this->getUsuarioAvatar();
		 $usuNivelAcesso = $this->getUsuNivelAcesso();
		 $nome = $this->getNome();
		 $UsuarioApelido = $this->getUsuarioApelido();
		 $UsuarioSexo = $this->getUsuarioSexo();
		 $UsuarioEmail = $this->getUsuarioEmail();
		 $UsuarioEstado	= $this->getUsuarioEstado();
		 $tabela = 'tblusuario`';
			
			
				
            $sql = "INSERT INTO `tblusuario`(`usuarioId`, `usuarioNome`, `usuarioSenha`, `usuarioAvatar`, `usuNivelAcesso`, `nome`, `UsuarioApelido`, `UsuarioSexo`, `UsuarioEmail`, `UsuarioEstado`)
				                       VALUES ('$usuarioId','$usuarioNome','$usuarioSenha','$usuarioAvatar','$usuNivelAcesso','$nome','$UsuarioApelido','$UsuarioSexo','$UsuarioEmail','$UsuarioEstado')";
		    $result = mysqli_query($con, $sql);
			$last_id = mysqli_insert_id($con);	
				
	if(!$result)
    {
        echo "<label class='erro'>Erro Na Inser&ccedil;&auml;o</label>".mysqli_error($con);
    }
    else
    {   $historico = new Historico();
        $historico ->setTipo('1');
		$historico ->setUsuario($usuarioId);
		$historico ->setDataHora(date('Y/m/d H:i:s'));
		$historico ->setDescricao('Adiciona Utilizador');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
         echo'	<script type="text/javascript">
             window.location.href = "../display/ps_usuarios.php";
		     alert("Utilizador Inserido com sucesso!");
             </script>';

    }

	   }


	}


?>