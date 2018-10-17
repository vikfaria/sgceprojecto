<script src="jquery.min.js"></script>
<?php require_once('Connections/sigre.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

    $empresaId          = $_POST['empresaId'];
    $empresaNome        = $_POST['empresaNome'];
    $empresaEndereco    = $_POST['empresaEmail'];
    $empresaTelefone    = $_POST['empresaContacto'];
    $empresaEmail       = $_POST['empresaEmail'];
    $empresaL           = $_POST['empresaL'];
    $empresaLogo        = $_FILES["empresaLogo"];
    

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
    
        $nomeImagem = $empresaLogo['name'];
    if($nomeImagem != '')
        $caminhoImagem="./imagens/".$nomeImagem;
    else
        $caminhoImagem = $empresaL;
        
        $updateSQL = "UPDATE `paramempresa` SET empresaNome = '$empresaNome', empresaEndereco='$empresaEndereco', empresaTelefone=".$empresaTelefone.", empresaEmail='$empresaEmail', empresaLogo='$caminhoImagem' WHERE empresaId = '$empresaId'";
     $Result1 = mysqli_query($sigre, $updateSQL) or die(mysqli_error());
    
    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp|JPG)$/", $empresaLogo["type"]))
    {
	   $error[1]="isso na E imagem";
    }
    if($nomeImagem != '' && $error == 0)
    {
      move_uploaded_file($empresaLogo["tmp_name"],$caminhoImagem);
    }
    if(!$Result1)
    {
        echo "<label class='label red-600'>Erro Na actualiza&ccedil;&auml;o</label>";
    }
    else
    {
        echo "<label class='label blue-600'>Actualizado Com Sucesso</label>";
        echo "
        <script>
            window.location='sigre.php?go=102';
        </script>
        ";
    }
}

if($_GET['id'])
{
    $empresaId = $_GET['id'];
    $sqlEmp = "SELECT * FROM `paramempresa` WHERE empresaId = '$empresaId'";
    $resultEmp = mysqli_query($sigre, $sqlEmp) or die(mysqli_error());
    $rowEmp = mysqli_fetch_assoc($resultEmp);
    $empresaImg = $rowEmp['empresaLogo'];
    $empresaNome = $rowEmp['empresaNome'];
    $empresaEndereco = $rowEmp['empresaEndereco'];
    $empresaTelefone = $rowEmp['empresaTelefone'];
    $empresaEmail = $rowEmp['empresaEmail'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
    
<body>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
 <div style="width: 600px;">
  <table align="center" class="table">
    <tr valign="baseline">
        <td colspan="2" align="center">
            <div style="width: 330px; height: 191px;">
                <div >
                <img id="dvPreview" style="width: 329px; height: 190px;" src="<?=$empresaImg?>" alt="<?=$empresaNome?>">
                </div>
            </div>
        </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nome:</td>
      <td><span id="sprytextfield2">
        <input type="text" name="empresaNome" value="<?=$empresaNome?>" size="40" />
      <span class="textfieldRequiredMsg">Campo obrigatorio.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Endere&ccedil;o:</td>
      <td><span id="sprytextfield1">
        <input type="text" name="empresaEmail" value="<?=$empresaEndereco?>" size="40" />
      <span class="textfieldRequiredMsg">Campo obrigatorio.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Contacto:</td>
      <td><span id="sprytextfield3">
        <input type="text" name="empresaContacto" value="<?=$empresaTelefone?>" size="25" />
      <span class="textfieldRequiredMsg">Campo obrigatorio.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><span id="sprytextfield4">
        <input type="email" name="empresaEmail" value="<?=$empresaEmail?>" size="40" />
      <span class="textfieldRequiredMsg">Campo obrigatorio.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Logotipo:</td>
        <td>
            <span>
                <input type="hidden" name="empresaL" value="<?=$empresaImg?>"/>
                <input type="file" id="fileupload" name="empresaLogo" size="40" />
            </span>
        </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><button type="submit" name="salvar" class="md-btn md-raised dark"><i class="fa fa-save"></i>Salvar Dados</button></td>
    </tr>
  </table>
</div>
  <input type="hidden" name="MM_insert" value="form1" />
    <input type="hidden" name="empresaId" value="<?=$empresaId?>" />
</form>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#dvPreview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#fileupload").change(function(){
        readURL(this);
    });
</script>
</body>
</html>