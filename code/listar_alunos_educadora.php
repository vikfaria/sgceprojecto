
<?php 
$sql="SELECT * FROM `tblfilho`";
$stmt=mysqli_query($con, $sql);
?>

<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
      <tr >
 
		<th >Nome Filho</th>
        <th >Apelido</th>
		<th >Morada</th>
		<th>Localização</th>
		<th >Percurso</th>
		<th>Primogenito</th>
		<td style="text-align: center; width: 150px"></td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
 

     while($linha = mysqli_fetch_assoc($stmt))
     {
		 $nome = $linha['nomeFilho'];
		 $apelido = $linha['apelidoFilho'];
		 $morada = $linha['moradaFilho'];
		 $localizacao = $linha['localizacao'];
		 $percurso = $linha['percurso'];
		 $primogenito = $linha['primogenito'];
		 

		/* 
		 //Verificacao da palavra pass
		 if($pass == md5("1230"))
			 $estadPass = "disabled";
		 //Sexo
		 if($sexo == "M")
			 $checkedSM = "checked";
		 else
			 $checkedSF = "checked";
		 //Nivel de Acesso
		 if($nivel == 0)
			 $nivel = "Administrador";
		 else if($nivel == 1)
		 {
			 $nivel = "Operador";
			 $checkedO = "checked";
		 }
		 else if($nivel == 2)
		 {
			 $nivel = "Usuario Normal";
			 $checkedU = "checked";
		 }
		 if($estado == 1)
			 $estado = 'on';
		 else
			 $estado = 'busy';
		 */
?>
  <tr>
	<td ><?=$nome?></td>
	<td ><?=$apelido?></td> 
	<td ><?=$morada?></td> 
	<td ><?=$localizacao?></td> 
	<td ><?=$percurso?></td> 
	<td ><?=$primogenito?></td> 
	

<?php
     }
?>
</tbody>
<tfoot class="hide-if-no-paging">
  <tr>
	  <td colspan="5" class="text-center">
		  <ul class="pagination"></ul>
	  </td>
  </tr>
</tfoot>
</table>