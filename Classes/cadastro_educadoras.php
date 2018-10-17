<?php
include "Historico.php";
	class cadastroeducadoras{

		private $nomeEducadora, $apelidoEducadora, $cellEducadora, $emailEducadora, $moradaEducadora, $foto;
		
		
		
		//encapsulamento de dados;
		public function setNomeEducadora($nomeEducadora){
			$this->nomeEducadora = $nomeEducadora;
		}

		public function getNomeEducadora(){
			return $this->nomeEducadora;
		}
		
		public function setApelidoEducadora($apelidoEducadora){
			$this->apelidoEducadora = $apelidoEducadora;
		}

		public function getApelidoEducadora(){
			return $this->apelidoEducadora;
		}
		
		
		public function setCellEducadora($cellEducadora){
			$this->cellEducadora = $cellEducadora;
		}

		public function getCellEducadoraa(){
			return $this->cellEducadora;
		}
		
		public function setEmailEducadora($emailEducadora){
			$this->emailEducadora = $emailEducadora;
		}

		public function getEmailEducadora(){
			return $this->emailEducadora;
		}
		
		public function setMoradaEducadora($moradaEducadora){
			$this->moradaEducadora = $moradaEducadora;
		}

		public function getMoradaEducadora(){
			return $this->moradaEducadora;
		}
		
		public function setFoto($foto){
			$this->foto = $foto;
		}

		public function getFoto(){
			return $this->foto;
		}
		
	
		public function IntroduzDadosEducadoras(){
			global $con;
			
			
			
			$nomeEducadora = $this->getNomeEducadora();
			$apelidoEducadora = $this->getApelidoEducadora();
			$cellEducadora = $this->getCellEducadoraa();
			$emailEducadora = $this->getEmailEducadora();
			$moradaEducadora = $this->getMoradaEducadora();
			$foto = $this->getFoto();
			$id_educadora = 3;
			$tabela = 'tbleducadora`';

			
			
				
                $sql = "INSERT INTO `tbleducadora`(`nome_educadora`, `apelido_educadora`, `contacto_educadora`, `email_educadora`, `id_zona`, `foto`,`usuarioId`) 
				VALUES ('$nomeEducadora','$apelidoEducadora','$cellEducadora','$emailEducadora','$moradaEducadora','$foto','$id_educadora')";
				
				
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
		$historico ->setDescricao('Adiciona Educadora');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
         echo'	<script type="text/javascript">
             window.location.href = "../display/ps_educadoras.php";
		     alert("Educadora Inserida com sucesso!");
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