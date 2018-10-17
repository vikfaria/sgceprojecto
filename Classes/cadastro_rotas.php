<?php
include "Historico.php";
	class cadastrorotas{

		private $nome_rota, $origem_rota, $destino_rota, $localizacao, $distancia, $tempo,  $id_carrinha;
		
	 
		
		
		//encapsulamento de dados;
		public function setNome_rota($nome_rota){
			$this->nome_rota = $nome_rota;
		}

		public function getNome_rota(){
			return $this->nome_rota;
		}
		
		public function setOrigem_rota($origem_rota){
			$this->origem_rota = $origem_rota;
		}

		public function getOrigem_rota(){
			return $this->origem_rota;
		}
		
		public function setDestino_rota($destino_rota){
			$this->destino_rota = $destino_rota;
		}

		public function getDestino_rota(){
			return $this->destino_rota;
		}
		
		public function setLocalizacao($localizacao){
			$this->localizacao = $localizacao;
		}

		public function getLocalizacao(){
			return $this->localizacao;
		}
		
		public function setDistancia($distancia){
			$this->distancia = $distancia;
		}

		public function getDistancia(){
			return $this->distancia;
		}
		
		public function setTempo($tempo){
			$this->tempo = $tempo;
		}

		public function getTempo(){
			return $this->tempo;
		}
		
		public function setId_carrinha($id_carrinha){
			$this->id_carrinha = $id_carrinha;
		}

		public function getId_carrinha(){
			return $this->id_carrinha;
		}
		
		

	
		public function IntroduzDadosRotas(){
			global $con;
			

			
			$nome_rota = $this->getNome_rota();
			$origem_rota = $this->getOrigem_rota();
			$destino_rota = $this->getDestino_rota();
			$localizacao = $this->getLocalizacao();
			$distancia = $this->getDistancia();
			$tempo = $this->getTempo();
			$id_carrinha = $this->getId_carrinha();
			$tabela = 'tblrotas';
			
			
				
           $sql = "INSERT INTO `tblrotas`( `nome_rota`, `origem_rota`, `destino_rota`, `localizacao`, `distancia`, `tempo`, `id_carrinha`)
				                       VALUES ('$nome_rota','$origem_rota','$destino_rota','$localizacao','$distancia','$tempo','$id_carrinha')";
		   


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
		$historico ->setDescricao('Adiciona Rota');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
         echo'	<script type="text/javascript">
            window.location.href = "../display/ps_rotas.php";
		     alert("Rota Inserido com sucesso!");
             </script>';

    }


	}


	}


?>