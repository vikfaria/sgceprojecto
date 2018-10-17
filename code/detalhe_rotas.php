<?php

require_once '../Connections/connection.php';
include ("../Classes/classes.php");
		
 $aux = new classes();		
		  
		  
 if(isset($_POST["rota_id"]))  
 {  
        
      
      $output = '';  
      $query = "SELECT * FROM `tblrotas` WHERE `id_rota` = '".$_POST["rota_id"]."'";  
      $result = mysqli_query($con, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($linha1 = mysqli_fetch_array($result))  
      {  
            
		    $nome_rota = $linha1['nome_rota'];
			$origem_rota = $linha1['origem_rota'];
			$destino_rota = $linha1['destino_rota'];
			$localizacao = $linha1['localizacao'];
			$id_carrinha = $linha1['id_carrinha'];
		    $carinha = $aux->getRow("tblcarinha", "matricula", "id_carrinha", $id_carrinha);
           $output .= '  
		       
				<tr>  
                     <td width="30%"><label>Nome Rota :</label></td>  
                     <td width="70%">'.$nome_rota.'</td>  
                </tr> 
				<tr>  
                     <td width="30%"><label>Origem Rota :</label></td>  
                     <td width="70%">'.$origem_rota.'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Destino Rota :</label></td>  
                     <td width="70%">'.$destino_rota.'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Localização</label></td>  
                     <td width="70%">'.$localizacao.'</td>  
                </tr>  
                 <tr>  
                     <td width="30%"><label>Carrinha</label></td>  
                     <td width="70%">'.$carinha.'</td>  
                </tr>  				 
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>

	