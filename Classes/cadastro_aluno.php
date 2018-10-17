<?php
include "Historico.php";
	class cadastroaluno{

		private $nome_aluno, $apelido_aluno, $foto, $data_nascimento, $morada_id, $id_encarregado,  $id_escola ;
		
	 
		
		
		//encapsulamento de dados;
		public function setNome_aluno($nome_aluno){
			$this->nome_aluno = $nome_aluno;
		}

		public function getNome_aluno(){
			return $this->nome_aluno;
		}
		
		public function setApelido_aluno($apelido_aluno){
			$this->apelido_aluno = $apelido_aluno;
		}

		public function getApelido_aluno(){
			return $this->apelido_aluno;
		}
		
		public function setFoto($foto){
			$this->foto = $foto;
		}

		public function getFoto(){
			return $this->foto;
		}
		
		public function setData_nascimento($data_nascimento){
			$this->data_nascimento = $data_nascimento;
		}

		public function getData_nascimento(){
			return $this->data_nascimento;
		}
		
		public function setMorada_id($morada_id){
			$this->morada_id = $morada_id;
		}

		public function getMorada_id(){
			return $this->morada_id;
		}
		
		public function setId_encarregado($id_encarregado){
			$this->id_encarregado = $id_encarregado;
		}

		public function getId_encarregado(){
			return $this->id_encarregado;
		}
		
		public function setId_escola($id_escola){
			$this->id_escola = $id_escola;
		}

		public function getId_escola(){
			return $this->id_escola;
		}
		

	
		public function IntroduzDadosAluno(){
			global $con;
			
	
			
			$nome_aluno = $this->getNome_aluno();
			$apelido_aluno = $this->getApelido_aluno();
			$morada_id = $this->getMorada_id();
			$foto = $this->getFoto();
			$data_nascimento = $this->getData_nascimento();
			$id_encarregado = $this->getId_encarregado();
			$id_escola = $this->getId_escola();
			$tabela = 'tblaluno`';
			
			
				
            $sql = "INSERT INTO `tblaluno`(`nome_aluno`, `apelido_aluno`, `id_zona`, `foto`, `data_nascimento`, `id_encarregado`, `id_escola`)
				                       VALUES ('$nome_aluno','$apelido_aluno','$morada_id','$foto','$data_nascimento','$id_encarregado','$id_escola')";
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
		$historico ->setDescricao('Adiciona Aluno');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
         echo'	<script type="text/javascript">
             window.location.href = "../display/ps_aluno.php";
		     alert("Aluno Inserido com sucesso!");
             </script>';

    }


		
/*
		
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