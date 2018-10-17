<?php
include "Historico.php";
	class cadastromotoristas{

		private $nomeMotorista, $apelidoMotorista, $cellMotorista, $emailMotorista, $moradaMotorista, $foto, $carta_motorista;
		
		  
		
		//encapsulamento de dados;
		public function setNomeMotorista($nomeMotorista){
			$this->nomeMotorista = $nomeMotorista;
		}

		public function getNomeMotorista(){
			return $this->nomeMotorista;
		}
		
		public function setApelidoMotorista($apelidoMotorista){
			$this->apelidoMotorista = $apelidoMotorista;
		}

		public function getApelidoMotorista(){
			return $this->apelidoMotorista;
		}
		
		
		public function setCellMotorista($cellMotorista){
			$this->cellMotorista = $cellMotorista;
		}

		public function getCellMotorista(){
			return $this->cellMotorista;
		}
		
		public function setEmailMotorista($emailMotorista){
			$this->emailMotorista = $emailMotorista;
		}

		public function getEmailMotorista(){
			return $this->emailMotorista;
		}
		
		public function setMoradaMotorista($moradaMotorista){
			$this->moradaMotorista = $moradaMotorista;
		}

		public function getMoradaMotorista(){
			return $this->moradaMotorista;
		}
		
		public function setFoto($foto){
			$this->foto = $foto;
		}

		public function getFoto(){
			return $this->foto;
		}
		
		public function setCarta_motorista($carta_motorista){
			$this->carta_motorista = $carta_motorista;
		}

		public function getCarta_motorista(){
			return $this->carta_motorista;
		}
		
		
	
		public function IntroduzDadosMotoristas(){
			global $con;
			
		
			
			$nomeMotorista = $this->getNomeMotorista();
			$apelidoMotorista = $this->getApelidoMotorista();
			$cellMotorista = $this->getCellMotorista();
			$emailMotorista = $this->getEmailMotorista();
			$moradaMotorista = $this->getMoradaMotorista();
			$foto = $this->getFoto();
			$carta_motorista = $this->getCarta_motorista();
			$tabela = 'tblmotorista';

			
			
				
                 $sql = "INSERT INTO `tblmotorista`(`nome_motorista`, `apelido_motorista`, `carta_motorista`, `contacto_motorista`, `email_motorista`, `id_zona`, `foto_motorista`) 
				VALUES ('$nomeMotorista','$apelidoMotorista','$carta_motorista','$cellMotorista','$emailMotorista','$moradaMotorista','$foto')";
				
				
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
		$historico ->setDescricao('Adiciona Motorista');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
         echo'	<script type="text/javascript">
             window.location.href = "../display/ps_motoristas.php";
		     alert("Motorista Inserido com sucesso!");
             </script>';

    }
			
/*
		public function VerificaEmail(){
			global $con;
			$email = $this->getEmail(); 
			
			$linha = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tblusuario where UsuarioEmail = '$email' ")) ;
			

			if($linha == 0 ){
				return true;
			}else{
				return false;
			}
		}

		public function VerificaUserName(){
			global $con;
			$userName = $this->getUserName();
			$linha = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tblusuario where UsuarioNome = '$userName' ")) ;
			

			if($linha == 0 ){
				return true;
			}else{
				return false;
			}
		}


		public function VerificaPassword($password2){//verifica se as senhas sao iguais ou nao
			$senha = $this->getSenha();
			if($senha != $password2){
				return false;
			}else{
				return true;
			}
		}

		public function VerificaErroImg($foto){
				$tamanho = 10000000;
				$error = array();

				//verifica se o arquivo e uma imagem
				if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp|jpg)$/", $foto['type'])){
					$error[1] = 'Por valor, selecione uma imagem';
				}

				//pega as dimensoes da imagem
				$dimensoes = getimagesize($foto["tmp_name"]);

				verifica se a largura da imagem e maior que a permitida
				if($dimensoes[0] > $largura){
					$error[2] = 'a largura da imagem nao deve ultrapassar'.$largura.'pixels';
				}

				

				//senao ouvi nenhum erro
				if(count($error) == 0){
					
					return true;
				}

				if(count($error)!=0){
					foreach ($error as $erro) {
						print_r($error)."<br/>";
						
					}

					return false;
				}

		*/
	   }


	}


?>