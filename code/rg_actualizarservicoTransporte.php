<?php
include "../classes/Historico.php";
include '../connections/Connection.php';

  if(isset($_POST['subServiTrans'])){
	
    $id_aderencia = $_POST['ad'];	
	$id_aluno = $_POST['aluno'];
	$id_zona = $_POST['zona'];  
    $id_percurso = $_POST['percurso'];
    $id_carrinha = $_POST['carrinha'];
	$id_educadora = $_POST['educadora'];
	$id_motorista = $_POST['motorista'];
	$id_rota = $_POST['rota'];
	$tabela =  'tbladerencia';
	
	 
	$sql = "UPDATE `tbladerencia` SET `id_aluno`='$id_aluno',`id_zona`='$id_zona',`id_percurso`='$id_percurso',`id_carrinha`='$id_carrinha',`id_educadora`='$id_educadora',`id_motorista`='$id_motorista',`id_rota`='$id_rota' WHERE  `id_aderencia`='$id_aderencia'"; 



	 
	 $result = mysqli_query($con, $sql);
	 $last_id = mysqli_insert_id($con);	
				
	if(!$result)
    {
        echo "<label class='erro'>Erro Na Actualização</label>".mysqli_error($con);
    }
    else
    {   $historico = new Historico();
        $historico ->setTipo('2');
		$historico ->setUsuario($usuarioId);
		$historico ->setDataHora(date('Y/m/d H:i:s'));
		$historico ->setDescricao('Actualizar Seriços Transportes');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
        echo'	<script type="text/javascript">
                     location.reload();
                  alert("Serviço Transporte Actualizado Com Sucesso!");
          window.location.href = "../display/ps_servicoTransporte.php";
		  </script>';
    } 
  }
?>