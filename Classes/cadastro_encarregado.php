<?php
include "Historico.php";
	class cadastroencarregado{

		private $nome_encarregado, $apelido_encarregado, $contacto_encarregado, $email_encarregado, $id_zona, $foto;
		
		
		
		
		//encapsulamento de dados;
		public function setNome_encarregado($nome_encarregado){
			$this->nome_encarregado = $nome_encarregado;
		}

		public function getNome_encarregado(){
			return $this->nome_encarregado;
		}
		
		public function setApelido_encarregado($apelido_encarregado){
			$this->apelido_encarregado = $apelido_encarregado;
		}

		public function getApelido_encarregado(){
			return $this->apelido_encarregado;
		}
		
		public function setContacto_encarregado($contacto_encarregado){
			$this->contacto_encarregado = $contacto_encarregado;
		}

		public function getContacto_encarregado(){
			return $this->contacto_encarregado;
		}
		
		public function setEmail_encarregado($email_encarregado){
			$this->email_encarregado = $email_encarregado;
		}

		public function getEmail_encarregado(){
			return $this->email_encarregado;
		}
		
		public function setId_zona($id_zona){
			$this->id_zona = $id_zona;
		}

		public function getId_zona(){
			return $this->id_zona;
		}
		
		public function setFoto($foto){
			$this->foto = $foto;
		}

		public function getFoto(){
			return $this->foto;
		}

	
		public function IntroduzDadosEncarregado(){
			global $con;
			
			
			
			$nome_encarregado = $this->getNome_encarregado();
			$apelido_encarregado = $this->getApelido_encarregado();
			$contacto_encarregado = $this->getContacto_encarregado();
			$email_encarregado = $this->getEmail_encarregado();
			$id_zona = $this->getId_zona();
			$foto = $this->getFoto();
			$id_user = 3;
			$tabela = 'tblencarregado`';
			

                $sql = "INSERT INTO `tblencarregado`(`nome_encarregado`, `apelido_encarregado`, `contacto_encarregado`, `email_encarregado`, `id_zona`, `foto`,`usuarioId`) 
				VALUES ('$nome_encarregado','$apelido_encarregado','$contacto_encarregado','$email_encarregado','$id_zona','$foto','$id_user')";

	            $result = mysqli_query($con, $sql);
			    $last_id = mysqli_insert_id($con);	
				
	if(!$result)
    {
        echo "<label class='erro'>Erro Na Inser&ccedil;&auml;o</label>".mysqli_error($con);
    }
    else
    {   echo "Entrou Na Inser&ccedil;&auml;o";
        
        $historico = new Historico();
        $historico ->setTipo('1');
		$historico ->setUsuario($usuarioId);
		$historico ->setDataHora(date('Y/m/d H:i:s'));
		$historico ->setDescricao('Adiciona Encarregado');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
         echo'	<script type="text/javascript">
             window.location.href = "../display/ps_encarregado.php";
		     alert("Encarregado Inserido com sucesso!");
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