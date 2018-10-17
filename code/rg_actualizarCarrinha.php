<?php
include "../classes/Historico.php";
include '../connections/Connection.php';



  if(isset($_POST['subCarrinha'])){
	  
	 $id_carrinha = $_POST['id_carrinha'];
     $id_tipo_carinha = $_POST['modelo']; 
     $lotacao = $_POST['lotacao'];  
     $matricula = $_POST['matricula'];
     $contacto = $_POST['contacto'];
     $id_motorista = $_POST['motorista'];
     $id_educadora = $_POST['educadora'];
	 $foto = $_POST['foto'];
	 $tabela = 'tblcarinha';
	 
	 
	 $sql = "UPDATE `tblcarinha` SET `matricula`='$matricula',`lotacao`='$lotacao',`id_tipo_carinha`='$id_tipo_carinha',`contacto`='$contacto',`id_motorista`='$id_motorista',`id_educadora`='$id_educadora',`foto`='$foto' WHERE `id_carrinha`= '$id_carrinha'";	 

	 
	 
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
		$historico ->setDescricao('Actualizar Carrinha');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
        echo'	<script type="text/javascript">
                     location.reload();
                  alert("Carrinha Actualizado Com Sucesso!");
          window.location.href = "../display/ps_carinha.php";
		  </script>';
    }

	 
	 
  }
  
  
  
?>