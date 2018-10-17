<?php include '../include/cabecalho.php';

//Modal
include './modal/editarPerfil.php';
?>
<body>
  <div class="app" id="app">
  
<!-- ############ PAGE START-->
  <div class="item">
    <div class="item-bg">
      <img src="../assets/images/usuarios/<?=$avatar?>" class="blur opacity-3">
    </div>
    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">
          <a href class="pull-left m-r-md">
            <span class="avatar w-96">
              <img src="../assets/images/usuarios/<?=$avatar?>" class="img-circle">
              <i class="on b-white"></i>
            </span>
          </a>
          <div class="clear m-b">
            <h3 class="m-a-0 m-b-xs"><?=$nome." ".$apelido?></h3>
            <p class="text-muted"><span class="m-r"><?=$usuarioNome?></span> <small><i class="fa fa-map-marker m-r-xs"></i>Maputo, Mocambique</small></p>
            <div class="block clearfix m-b">
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-facebook indigo"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-google-plus"></i>
                <i class="fa fa-google-plus red"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <p class="text-md profile-status"></p>
          <button class="btn btn-sm white" data-toggle="modal" data-target="#view-modal"  data-toggle="tooltip" title="Editar" data-toggle="collapse" id="profileE" value="<?=$idUser?>">Edit</button>
          <div class="collapse box m-t-sm" id="editor">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dker p-x">
    <div class="row">
      <div class="col-sm-6 push-sm-6">
        <div class="p-y text-center text-sm-right">
          
        </div>
      </div>
      <div class="col-sm-6 pull-sm-6">
        <div class="p-y-md clearfix nav-active-primary">
          <ul class="nav nav-pills nav-sm">
            <li class="nav-item active">
              <a class="nav-link" href data-toggle="tab" data-target="#tab_2">Perfil</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="padding">
    <div class="row">
      <div class="col-sm-10 col-lg-11">
        <div class="tab-content">
          <div class="tab-pane p-v-sm active" id="tab_2">
            <div class="row m-b">
              <div class="col-xs-4">
                <small class="text-muted">Email</small>
                <div class="_500"><?=$email?></div>
              </div>
              <div class="col-xs-4">
                <small class="text-muted">Sexo</small>
                <div class="_500"><?=$sexoU?></div>
              </div>
<?php if($nivelAcesso != 2) { ?>
			  <div class="col-xs-4">
                <small class="text-muted">Senha Padrao</small>
                <div class="_500"><b>1230</b></div>
              </div>
<?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- ############ PAGE END-->

<?php include'../include/rodape.php';?>