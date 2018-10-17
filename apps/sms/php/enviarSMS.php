<?php
	include('conexion.php');

	$idPersona = $_POST['id'];
	$mensaje = $_POST['txt'];

  $sql = mysql_fetch_array(mysql_query("SELECT codigo_pais, telefono_personal FROM directorio WHERE persona_id = '$idPersona' "));
	$receptor = $sql['codigo_pais'].$sql['telefono_personal'];

  $objGsmOut = new COM ("ActiveXperts.GsmOut");
  $archivo = 'C:\Windows';
  $dispositivo = 'COM5';
  $velocidad = 0;
  
  $objGsmOut->LogFile          = $archivo; 
  $objGsmOut->Device           = $dispositivo;
  $objGsmOut->DeviceSpeed      = $velocidad; 
        
  $objGsmOut->MessageRecipient = $receptor;
  $objGsmOut->MessageData      = $mensaje;
          
  if($objGsmOut->LastError == 0){
    $objGsmOut->Send;
    echo 'OK';
  }
?>