<?php
	class cadastroUtilizador{

		private $nome, $apelido, $email, $userName, $senha, $avatar, $nivelAcesso, $sexo;
		
		//encapsulamento de dados;
		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setApelido($apelido){
			$this->apelido = $apelido;
		}

		public function getApelido(){
			return $this->apelido;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setUserName($userName){
			$this->userName = $userName;
		}

		public function getUserName(){
			return $this->userName;
		}
		public function setAvatar($avatar){
			$this->avatar = $avatar;
		}

		public function getAvatar(){
			return $this->avatar;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}

		public function getSenha(){
			return $this->senha;
		}
		public function setNivelAcesso($nivelAcesso){
			$this->nivelAcesso = $nivelAcesso;
		}

		public function getNivelAcesso(){
			return $this->nivelAcesso;
		}

		public function setSexo($sexo){
			$this ->sexo = $sexo;
		}

		public function getSexo(){
			return $this->sexo; 
		}

		public function IntroduzDadosUtilizadores(){
			global $con;
			$nome = $this->getUserName();
			$senha = $this->getSenha();
			$foto = $this->getAvatar();
			$nivelAcesso = $this->getNivelAcesso();
			$nome = $this->getNome();
			$apelido = $this->getApelido();
			$email = $this->getEmail();
			$userName = $this->getUserName(); 
			$sexo = $this->getSexo();
			
			
			/*if(empty($foto['name'])){//verifica se foi selecionada alguma foto
				if($sexo == 'M'){
						$nome_imagem = 'avatarHomem.jpg';
				}elseif($sexo == 'F'){
						$nome_imagem = 'avatarMulher.png';
				}


				$sql = "INSERT INTO tblusuario values(default, '$userName',md5('$senha'), '$nome_imagem', '$nivelAcesso', '$nome','$apelido','$sexo','$email', '1')";

				if(mysqli_query($con, $sql)){
						return true;
				}else{
						return false;
				}
				
			}elseif($this->VerificaErroImg($foto)){//verifica se foi selecionada uma imagem e se passou nas condicoes do metod
				//pega a extensao da imagem
					preg_match("/\.(pjpeg|jpeg|png|gif|bmp|jpg){1}$/i", $foto['name'], $ext);

					//gera um nome unico para imagem
					$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

					//caminho onde ficara a imagem
					$caminho_imagem = "../assets/images/usuarios/".$nome_imagem;

					//faz o upload da imagem para o caminho
					move_uploaded_file($foto['tmp_name'], $caminho_imagem);

					$sql = "INSERT INTO tblusuario values(default, '$userName','$senha', '$nome_imagem', '$nivelAcesso', '$nome','$apelido','$sexo','$email', '1')";

					if(mysqli_query($con, $sql)){
						return true;
					}else{
						return false;
					}

			}
					
			
		}

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

				//verifica se a largura da imagem e maior que a permitida
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