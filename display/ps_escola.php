<?php
include'../include/cabecalho.php';
?>

 <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
     <div class="app-header blue-900 box-shadow-z4 navbar-md">
      <div class="navbar">
          <!-- Open side - Naviation on mobile -->
          <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
            <i class="material-icons">&#xe5d2;</i>
          </a>
            <!-- / -->
        
            <!-- Page title - Bind to $state's title -->
            <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle"></div>
        
            <!-- navbar right -->
            <ul class="nav navbar-nav pull-right">
              
                <!--<div ui-include="'../views/blocks/dropdown.notification.php'"></div>-->
              </li>
              <div class="btn-group dropdown">
        <button style="margin-top: 18px" class="md-btn md-flat m-b-sm" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-list-ul md-24"></i>&nbsp; <?php echo $usuarioNome;?></button>
          <div class="dropdown-menu pull-right dropdown-menu-scale" style="width: 200px;">
    <span class="dropdown-item"><i class="glyphicon glyphicon-user nav-text">&nbsp;<?=$usuarioNome?></i></span>
  <div class="dropdown-divider"></div>
	<a class="dropdown-item" href="../display/displayProfileUpdated.php">Perfil</a>
<?php 
  if($usuNivelAcesso == 0 || $usuNivelAcesso == 1)
  { 
?>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="../display/signup.php">Criar Conta</a>
<?php
  }
?>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="../get/logout.php">Terminar Sess&atilde;o</a>
</div>

        </div>
            </ul>
        </div>
    </div>

<div ui-view class="app-body" id="view">

<!-- ############ PAGE START-->

<div class="row-col">
  </div>
  <div class="col-sm">
    <div ui-view class="padding pos-rlt">
      <a href class="md-btn md-fab md-fab-bottom-right pos-fix blue-900">
        <i class="material-icons i-24 text-white">&#xe150;</i>
      </a>
    <div class="box">
    <div class="box-header">
	  <h2 >Escolas</h2>
	  
      <small>Gestão de Escolas</small>
    </div>
	<div class="table-responsive">
<?php
	include '../code/ps_escola.php';
?>
	</div>
  </div>

    </div>
  </div>
</div>

<?php
include'../include/rodape.php';
?>


 