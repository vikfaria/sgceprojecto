<?php

require_once '../Connections/connection.php';
include ("../Classes/classes.php");
		
 $aux = new classes();		
		  
		  
 if(isset($_POST["motorista_id"]))  
 {  
     
      $output = '';  
      $query = "SELECT * FROM `tblmotorista` WHERE `id_motorista` = '".$_POST["motorista_id"]."'";  
      $result = mysqli_query($con, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($linha = mysqli_fetch_array($result))  
      {  
            
		   $id_motorista = $linha['id_motorista'];
           $nome_motorista = $linha['nome_motorista'];
           $apelido_motorista = $linha['apelido_motorista'];
	       $carta_motorista = $linha['carta_motorista'];
           $contacto_motorista = $linha['contacto_motorista'];
           $email_motorista = $linha['email_motorista'];
           $id_zona = $linha['id_zona'];
	       $foto_motorista = $linha['foto_motorista'];
	       $morada = $aux->getRow("tblzona", "nome_zona", "id_zona", $id_zona);
		   
		   
           $output .= '  
		        <tr>  
                     <td width="30%"><label>Foto</label></td>  
                     <td width="70%">'.$foto_motorista.'</td>  
                </tr> 
				<tr>  
                     <td width="30%"><label>Nome Motorista</label></td>  
                     <td width="70%">'.$nome_motorista.'</td>  
                </tr> 
				<tr>  
                     <td width="30%"><label>Apelido Motorista</label></td>  
                     <td width="70%">'.$apelido_motorista.'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Carta de Condução</label></td>  
                     <td width="70%">'.$carta_motorista.'</td>  
                </tr>  
                 
                <tr>  
                     <td width="30%"><label>Contacto</label></td>  
                     <td width="70%">'.$contacto_motorista.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Email</label></td>  
                     <td width="70%">'.$email_motorista.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Morada</label></td>  
                     <td width="70%">'.$morada.'</td>  
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>

	