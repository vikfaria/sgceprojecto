<?php
include "Historico.php";
	class cadastroservicotransporte{

		private $id_aluno, $id_zona, $id_percurso, $id_carrinha, $id_educadora, $id_motorista, $id_rota;
	
		//encapsulamento de dados;
		public function setId_aluno($id_aluno){
			$this->id_aluno = $id_aluno;
		}

		public function getId_aluno(){
			return $this->id_aluno;
		}
		
		public function setId_zona($id_zona){
			$this->id_zona = $id_zona;
		}

		public function getId_zona(){
			return $this->id_zona;
		}
		
		public function setId_percurso($id_percurso){
			$this->id_percurso = $id_percurso;
		}

		public function getId_percurso(){
			return $this->id_percurso;
		}
		
		public function setId_carrinha($id_carrinha){
			$this->id_carrinha = $id_carrinha;
		}

		public function getId_carrinha(){
			return $this->id_carrinha;
		}
		
		public function setId_educadora($id_educadora){
			$this->id_educadora = $id_educadora;
		}

		public function getId_educadora(){
			return $this->id_educadora;
		}
		
		public function setId_motorista($id_motorista){
			$this->id_motorista = $id_motorista;
		}

		public function getId_motorista(){
			return $this->id_motorista;
		}
		
		
		
		public function setId_rota($id_rota){
			$this->id_rota = $id_rota;
		}

		public function getId_rota(){
			return $this->id_rota;
		}
		
		public function IntroduzDadosServicoTransporte(){
			global $con;
			
	        $id_aluno = $this->getId_aluno();
			$id_zona = $this->getId_zona();
			$id_percurso = $this->getId_percurso();
			$id_carrinha = $this->getId_carrinha();
			$id_educadora = $this->getId_educadora();
			$id_motorista = $this->getId_motorista();
			$id_rota   =  $this->getId_rota();
			$tabela = 'tbladerencia';
		 
            $sql = "INSERT INTO `tbladerencia`(`id_aluno`, `id_zona`, `id_percurso`, `id_carrinha`, `id_educadora`, `id_motorista`,`id_rota`)
				    VALUES ('$id_aluno','$id_zona','$id_percurso','$id_carrinha','$id_educadora','$id_motorista','$id_rota')";
					
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
		$historico ->setDescricao('Adiciona Serviço Transporte');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
         echo'	<script type="text/javascript">
             window.location.href = "../display/ps_servicoTransporte.php";
		     alert("Serviço de Transporte Inserido com sucesso!");
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