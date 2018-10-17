<?php
include "../classes/Historico.php";
include '../connections/Connection.php';




  if(isset($_POST['sub'])){
	  
     $id_aluno = $_POST['aluno']; 
     $escola = $_POST['escola'];  
     $nome_aluno = $_POST['nome'];
     $apelido_aluno = $_POST['apelido'];
     $id_zona = $_POST['morada'];
     $foto = $_POST['foto'];
	 $data_nascimento = $_POST['data'];
     $id_encarregado = $_POST['encarregado'];
	 $id_escola = $_POST['escola'];
	 $tabela = 'tblaluno';
	 
	 
	 $sql = "UPDATE `tblaluno` SET `nome_aluno`= '$nome_aluno',`apelido_aluno`='$apelido_aluno',`id_zona`='$id_zona',`foto`='$foto',`data_nascimento`='$data_nascimento',`id_encarregado`='$id_encarregado',`id_escola`= '$id_escola' WHERE `id_aluno`='$id_aluno'";
	 
	 
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
                  alert("Aluno Actualizado Com Sucesso!");
          window.location.href = "../display/ps_aluno.php";
		  </script>';
    }
		
    }

  
  
  
?>