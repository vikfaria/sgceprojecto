<?php
include "Historico.php";
	class cadastrocarinha{

		private $matricula, $lotacao, $id_tipo_carinha, $contacto, $id_motorista ,$id_educadora, $foto;

		
		
		//encapsulamento de dados;
		public function setMatricula($matricula){
			$this->matricula = $matricula;
		}

		public function getMatricula(){
			return $this->matricula;
		}
		
		public function setLotacao($lotacao){
			$this->lotacao = $lotacao;
		}

		public function getLotacao(){
			return $this->lotacao;
		}
        
		public function setId_tipo_carinha($id_tipo_carinha){
			$this->id_tipo_carinha = $id_tipo_carinha;
		}

		public function getId_tipo_carinha(){
			return $this->id_tipo_carinha;
		}
		
		 
		public function setContacto($contacto){
			$this->contacto = $contacto;
		}

		public function getContacto(){
			return $this->contacto;
		}
		
		public function setId_motorista($id_motorista){
			$this->id_motorista = $id_motorista;
		}

		public function getId_motorista(){
			return $this->id_motorista;
		}
		
		public function setId_educadora($id_educadora){
			$this->id_educadora = $id_educadora;
		}

		public function getId_educadora(){
			return $this->id_educadora;
		}
		
		public function setFoto($foto){
			$this->foto = $foto;
		}

		public function getFoto(){
			return $this->foto;
		}
      
	  
	  
	
		public function IntroduzDadosCarinha(){
			global $con;
			
		
			
			
			$matricula = $this->getMatricula();
			$lotacao = $this->getLotacao();
			$id_tipo_carinha = $this->getId_tipo_carinha();
			$contacto = $this->getContacto();
			$id_motorista = $this->getId_motorista();
			$id_educadora = $this->getId_educadora();
			$foto = $this->getFoto();
			$tabela = 'tblcarinha`';
			
			
			
			
			// VALUES ()	
                $sql = "INSERT INTO `tblcarinha`( `matricula`, `lotacao`, `id_tipo_carinha`, `contacto`, `id_motorista`, `id_educadora`, `foto`) 
				                         VALUES ('$matricula','$lotacao','$id_tipo_carinha','$contacto','$id_motorista','$id_educadora','$foto')";
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
		$historico ->setDescricao('Adiciona Carrinha');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
         echo'	<script type="text/javascript">
             window.location.href = "../display/ps_carinha.php";
		     alert("Carrinha Inserido com sucesso!");
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