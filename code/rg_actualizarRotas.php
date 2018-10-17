<?php
include "../classes/Historico.php";
include '../connections/Connection.php';




  if(isset($_POST['subrotas'])){
	 
     $id_rota = $_POST['rota'];	 
     $nome_rota = $_POST['nomeRota']; 
     $origem_rota = $_POST['origem'];  
     $destino_rota = $_POST['destino'];
     $localizacao = $_POST['localizacao'];
     $id_carrinha = $_POST['carrinha'];
	 $tabela = 'tblrotas';
	 
	  $sql = "UPDATE `tblrotas` SET `nome_rota`= '$nome_rota',`origem_rota`='$origem_rota',`destino_rota`='$destino_rota',`localizacao`='$localizacao',`id_carrinha`='$id_carrinha' WHERE `id_rota`='$id_rota'";

	
	 $result = mysqli_query($con, $sql);
	 $last_id = mysqli_insert_id($con);	
				
	if(!$result)
    {
        echo "<label class='erro'>Erro Na Inser&ccedil;&auml;o</label>".mysqli_error($con);
    }
    else
    {   $historico = new Historico();
        $historico ->setTipo('2');
		$historico ->setUsuario($usuarioId);
		$historico ->setDataHora(date('Y/m/d H:i:s'));
		$historico ->setDescricao('Actualizar Aluno');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
		echo'	<script type="text/javascript">
                     location.reload();
                  alert("Rota Actualizada Com Sucesso!");
          window.location.href = "../display/ps_rotas.php";
		  </script>';
    }
		
    }
?>