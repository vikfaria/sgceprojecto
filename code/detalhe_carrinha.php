<?php

require_once '../Connections/connection.php';
include ("../Classes/classes.php");
		
 $aux = new classes();		
		  
		  
 if(isset($_POST["employee_id"]))  
 {  
        
      
      $output = '';  
      $query = "SELECT * FROM `tblcarinha` WHERE `id_carrinha` = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($con, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($linha = mysqli_fetch_array($result))  
      {  
            
		   $id_carrinha = $linha['id_carrinha'];	 
           $matricula = $linha['matricula'];
           $lotacao = $linha['lotacao'];
           $id_tipo_carinha = $linha['id_tipo_carinha'];
           $contacto = $linha['contacto'];
           $id_motorista = $linha['id_motorista'];
           $id_educadora = $linha['id_educadora'];
           $foto = $linha['foto'];
		   
	       $tipo_carinha = $aux->getRow("tbltipocarinha", "nome_tipo_carinha", "id_tipo_carinha", $id_tipo_carinha);
	       $motorista = $aux->getRow("tblmotorista", "nome_motorista", "id_motorista", $id_motorista);
	       $educadora = $aux->getRow("tbleducadora", "nome_educadora", "id_educadora", $id_educadora);
		   
           $output .= '  
		        <tr>  
                     <td width="30%"><label>Foto</label></td>  
                     <td width="70%">'.$linha["foto"].'</td>  
                </tr> 
				<tr>  
                     <td width="30%"><label>Modelo</label></td>  
                     <td width="70%">'.$tipo_carinha.'</td>  
                </tr> 
				<tr>  
                     <td width="30%"><label>Locatcao</label></td>  
                     <td width="70%">'.$linha["lotacao"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Matricula</label></td>  
                     <td width="70%">'.$linha["matricula"].'</td>  
                </tr>  
                 
                <tr>  
                     <td width="30%"><label>Contacto</label></td>  
                     <td width="70%">'.$linha["contacto"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Motorista</label></td>  
                     <td width="70%">'.$motorista.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Educadora</label></td>  
                     <td width="70%">'.$educadora.'</td>  
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>

	