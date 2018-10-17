<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema SMS</title>
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava.js"></script>
</head>
<body>
<header>
	ENVIAR SMS CON PHP
</header>
<section>
<form id="enviar">
<table>
	<tr>
    	<td>
            <select id="idPersona" name="idPersona">
                <option value="">Seleccione un numero del directorio</option>
                <?php
                    include('../php/conexion.php');
                    $directorio = mysql_query("SELECT * FROM directorio ORDER BY persona_nombre");
                    while($opt = mysql_fetch_array($directorio)){
                        echo '<option value="'.$opt['persona_id'].'">'.$opt['persona_nombre'].'</option>';
                    }
                ?>
            </select>
            <br>
            <input type="text" maxlength="160" id="txtSMS" name"txtSMS" placeholder="Escribe aqui tu mensaje...">
        </td>
    </tr>
    <tr>
    	<td><input type="submit" value="Enviar"/></td>
    </tr>
    <tr>
    	<td id="respuesta" style="padding-top:10px;"></td>
    </tr>
</table>
</form>
</section>
</body>
</html>
