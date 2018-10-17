<?php include '../include/cabecalho.php';
$activeProfile = '';
$activeSething = 'active';
$mesSenha = '';
if(isset($_POST['cancelar']))
{
    echo '<script language="JavaScript"> 
				window.location="./ps_perfil.php"; 
				</script>';
}
else if(isset($_POST['actualizaPass']))
{
    $activeSething = 'active';
    $activeProfile = '';
        
    $holdPass = $_POST['lastPass'];
    $checkPassQuery = mysqli_query($con, "SELECT `usuarioSenha` FROM `tblusuario` WHERE `usuarioId`='$idUser' AND `usuarioSenha` = md5('$holdPass')");
    $num = mysqli_num_rows($checkPassQuery);
    
    if($num == 0)
    {
        $mesSenha = '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				A Palavra passe Antiga esta Errada!.
				</div>';
    }
    else
    {
        $novaPalavra = $_POST['newPass'];
        $novaPalavraTry = $_POST['newPassTry'];
        if($novaPalavra != $novaPalavraTry)
        {
            $mesSenha = '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				Senhas Diferentes!.
				</div>';
        }
        else
        {
            $changePass = mysqli_query($con, "UPDATE `tblusuario` SET `usuarioSenha` = md5('$novaPalavra') WHERE `usuarioId`='$idUser'");
            if($changePass)
                echo '<script language="JavaScript">
                alert("Sua Nova Senha: '.$novaPalavra.' a guarde Muito bem");
                window.location="./ps_perfil.php"; 
                </script>';
        }
        
    }
}
?>

<!-- ############ PAGE START-->
<div class="row-col">
  <div class="col-sm-3 col-lg-2">
    <div class="p-y">
      <div class="nav-active-border left b-primary">
        <ul class="nav nav-sm">
          <li class="nav-item">
            <a class="nav-link block <?=$activeSething?>" href data-toggle="tab" data-target="#tab-1">Seguran&ccedil;a</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-9 col-lg-10 light lt bg-auto">
    <div class="tab-content pos-rlt">
      <div class="tab-pane <?=$activeSething?>" id="tab-1">
        <div class="p-a-md dker _600">Seguran&ccedil;a</div>
        <div class="p-a-md">
          <div class="clearfix m-b-lg">
            <form role="form" class="col-md-6 p-a-0" action="rg_configurarConta.php" method="post" ui-jp="parsley">
            <?=$mesSenha?>
              <div class="form-group">
                <label>Senha Antiga</label>
                <input type="password" class="form-control" name="lastPass" id="lastPass" required>
                  <div id="error"></div>
              </div>
              <div class="form-group">
                <label>Nova Senha</label>
                <input type="password" class="form-control" name="newPass" required>
              </div>
              <div class="form-group">
                <label>Repita a Senha</label>
                <input type="password" class="form-control" name="newPassTry" required>
              </div>
              <button type="submit" class="btn btn-info m-t" name="actualizaPass">Actualizar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ############ PAGE END-->
<?php include'../include/rodape.php';?>