<?php

include "Historico.php";
	class cadastropresenca{

	
	    
		private $id_aluno, $data_presenca, $hora_presenca, $id_educadora, $id_carrinha, $latitude, $longitude, $nome_rua, $id_zona, $id_estado, $id_tpresenca, $id_estadopresenca;

		
		//encapsulamento de dados;
		public function setId_aluno($id_aluno){
			$this->id_aluno = $id_aluno;
		}

		public function getId_aluno(){
			return $this->id_aluno;
		}
		
		public function setData_presenca($data_presenca){
			$this->data_presenca = $data_presenca;
		}

		public function getdData_presenca(){
			return $this->data_presenca;
		}
		
		public function setHora_presenca($hora_presenca){
			$this->hora_presenca = $hora_presenca;
		}

		public function getHora_presenca(){
			return $this->hora_presenca;
		}
		
		public function setId_educadora($id_educadora){
			$this->id_educadora = $id_educadora;
		}

		public function getId_educadora(){
			return $this->id_educadora;
		}
		
		public function setId_carrinha($id_carrinha){
			$this->id_carrinha = $id_carrinha;
		}

		public function getId_carrinha(){
			return $this->id_carrinha;
		}
		
		public function setLatitude($latitude){
			$this->latitude = $latitude;
		}

		public function getLatitude(){
			return $this->latitude;
		}
		
		public function setLongitude($longitude){
			$this->longitude = $longitude;
		}

		public function getLongitude(){
			return $this->longitude;
		}
		
		public function setNome_rua($nome_rua){
			$this->nome_rua = $nome_rua;
		}

		public function getNome_rua(){
			return $this->nome_rua;
		}
		
		public function setId_zona($id_zona){
			$this->id_zona = $id_zona;
		}

		public function getId_zona(){
			return $this->id_zona;
		}
		
		public function setId_estado($id_estado){
			$this->id_estado = $id_estado;
		}

		public function getId_estado(){
			return $this->id_estado;
		}
		
		public function setId_tpresenca($id_tpresenca){
			$this->id_tpresenca = $id_tpresenca;
		}

		public function getId_tpresenca(){
			return $this->id_tpresenca;
		}
		
		public function setId_estadopresenca($id_estadopresenca){
			$this->id_estadopresenca = $id_estadopresenca;
		}

		public function getId_estadopresenca(){
			return $this->id_estadopresenca;
		}

		public function IntroduzDadosPresenca(){
			global $con;

	        $id_aluno = $this->getId_aluno();
			$data_presenca = $this->getdData_presenca();
			$hora_presenca = $this->getHora_presenca();
			$id_educadora = $this->getId_educadora();
			$id_carrinha = $this->getId_carrinha();
			$latitude = $this->getLatitude();
			$longitude = $this->getLongitude();
			$nome_rua = $this->getNome_rua();
			$id_zona = $this->getId_zona();
			$id_estado = $this->getId_estado();
			$id_tpresenca = $this->getId_tpresenca();
			$id_estadopresenca = $this->getId_estadopresenca();
			$tabela = 'tblpresenca';

$sql = "INSERT INTO `tblpresenca`(`id_aluno`, `data_presenca`, `hora_presenca`, `id_educadora`, `id_carrinha`, `latitude`, `longitude`, `nome_rua`, `id_zona`, `id_estado`, `id_tpresenca`, `id_estadopresenca`)
				                      VALUES ('$id_aluno','$data_presenca','$hora_presenca','$id_educadora','$id_carrinha','$latitude','$longitude','$nome_rua','$id_zona','$id_estado','$id_tpresenca','$id_estadopresenca')";

					
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
		$historico ->setDescricao('Adicionada Presença');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
        echo "<label class='sucesso'>Inserido Com Sucesso</label>";
		//@header("location:../display/referias.php");
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