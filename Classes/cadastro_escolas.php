<?php
include "Historico.php";
include '../get/variaveis.php';
	class cadastroescolas{

		private $nomeEscola, $cellEscola, $moradaEscola;

 
	
		//encapsulamento de dados;
		public function setNomeEscola($nomeEscola){
			$this->nomeEscola = $nomeEscola;
		}

		public function getNomeEscola(){
			return $this->nomeEscola;
		}
		
		public function setCellEscola($cellEscola){
			$this->cellEscola = $cellEscola;
		}

		public function getCellEscola(){
			return $this->cellEscola;
		}
		
		public function setMoradaEscola($moradaEscola){
			$this->moradaEscola = $moradaEscola;
		}

		public function getMoradaEscola(){
			return $this->moradaEscola;
		}
		
		
	
	    
	
		public function IntroduzDadosEscola(){
			global $con;
			
			$nomeEscola = $this->getNomeEscola();
			$cellEscola = $this->getCellEscola();
			$moradaEscola = $this->getMoradaEscola();
			$tabela = 'tblescola';
	
                $sql = " INSERT INTO `tblescola`(`nome_escola`, `contacto_escola`, `id_zona`) 
				                         VALUES ('$nomeEscola','$cellEscola','$moradaEscola')";
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
		$historico ->setDescricao('Adiciona Escola');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
          echo'	<script type="text/javascript">
             window.location.href = "../display/ps_escola.php";
		     alert("Escola Inserida com sucesso!");
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