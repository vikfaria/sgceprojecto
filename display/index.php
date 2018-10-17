<?php
require_once '../Connections/connection.php';
include '../get/variaveis.php';
   
?> 
  <!DOCTYPE html>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>SGCCE</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="../assets/images/usuarios/logo2.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" size="196x196" href="../assets/images/usuarios/logo2.png">
  
  <!-- style -->
  <link rel="stylesheet" href="../assets/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="../assets/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../assets/material-design-icons/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <!-- build:css ../assets/styles/app.min.css -->
  <link rel="stylesheet" href="../assets/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="../assets/styles/font.css" type="text/css" />
</head>
<body>
<style>

#view {
  background-size: 100%;
  background-attachment: fixed;
  background-repeat: no-repeat;
  position: relative;
  width: 100%;
  height: 445px;
}

.container {
    margin-top: 20px;
}

/* Carousel Styles */
.carousel-indicators .active {
    background-color: #2980b9;
}

.carousel-inner img {
    width: 100%;
    max-height: 460px
}

.carousel-control {
    width: 0;
}

</style>

  <div class="app" id="app">

<!-- ############ LAYOUT START-->

  <!-- aside -->
  <div id="aside" class="app-aside box-shadow-z3 modal fade lg nav-expand">
    <div class="left navside white dk" layout="column">
    <div class="navbar navbar-md blue-900 no-radius box-shadow-z4">
        <!-- brand -->
        <a style="margin-left:10px" class="navbar-brand" href='main.php'>
        	<img src="../assets/images/usuarios/logo2.png" alt="." class="">
        	<span  class="hidden-folded inline"><font style="font-size:120%; font-family:Times New Roman; serif; font-style: bold;" color="white">SGCCE</font></span>
        </a>
        <!-- / brand -->
      </div>
      <div flex class="hide-scroll">
        <nav class="scroll">
          <div flex class="hide-scroll">
        <nav class="scroll">
          <div class="item">
		  <div class="item-bg hidden-folded">
			<img src="../assets/images/usuarios/<?=$usuarioAvatar?>" class="opacity-3">
		  </div>
		  <div class="pos-rlt">
			<div class="nav-fold">
				<a href="../display/displayProfileUpdated.php" ui-sref="../display/profile.php" >
				<span class="block">
				  <img src="../assets/images/usuarios/<?=$usuarioAvatar?>" alt="..." class="w-40 img-circle">
				</span>
				<span class="clear hidden-folded m-t-sm">
				  <span class="block _500"><?php echo $nome; ?></span>
				</span>
			  </a>
			</div>   
		  </div>
		</div>
		</nav>
		</div>
             <ul class="nav" ui-nav>
              
              <li>
                <a href="index.php" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe3fc;
                      <span ui-include="'../assets/images/i_0.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Menu Principal</span>
                </a>
              </li>
          
		  <?php 
				  if($usuNivelAcesso == 0)
				  { 
				?>
              <li ui-sref-active="active" class="">
					<a ui-sref="app.chart" onclick="window.location.href='ps_usuarios.php'" >	   
						 <span class="nav-icon">
							<i class="fa  fa-user">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						  Gerir Utilizadores
						</span>
						</a>
					</li>
                
				<li ui-sref-active="active" class="">
						<a ui-sref="app.chart" onclick="window.location.href='ps_historico.php'" >	   
						 <span class="nav-icon">
							<i class="fa  fa-list">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						  Historicos
						</span>
						</a>
					</li>
				
					<?php
					  }
					?>
				
				 <?php 
				  if($usuNivelAcesso == 1)
				  { 
				?>
				  <li ui-sref-active="active" class="">
					  <a>
						<span class="nav-caret">
						  <i class="fa fa-caret-down"></i>
						</span>
						 <span class="nav-icon">
							<i class="fa fa-users">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						 Gerir RH
						</span>
						</a>
					  <ul class="nav-sub">
						<li ui-sref-active="active">
						  <a ui-sref="app.chart" onclick="window.location.href='ps_aluno.php'">
						  
							<span class="nav-text">Gerir Alunos</span>
						  </a>
						</li>
						<li ui-sref-active="active">
						  <a ui-sref="app.chart" onclick="window.location.href='ps_encarregado.php'">
							<span class="nav-text">Gerir Encarregados</span>
						  </a>
						</li>
						<li ui-sref-active="active">
						 <a ui-sref="app.chart" onclick="window.location.href='ps_educadoras.php'">
							<span class="nav-text">Gerir Educadoras</span>
						  </a>
						</li>
						<li ui-sref-active="active">
						  <a ui-sref="app.chart" onclick="window.location.href='ps_motoristas.php'">
							<span class="nav-text">Gerir Motoristas</span>
						  </a>
						</li>
					  </ul>
					</li>
					
					
					<li ui-sref-active="active" class="">
						<a ui-sref="app.chart" onclick="window.location.href='ps_carinha.php'">
						  <span class="nav-icon"> 
							<i class="fa fa-bus">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						  Gerir Carrinhas
						</span>
						</a>
					</li>
					
					<li ui-sref-active="active" class="">
						<a ui-sref="app.chart" onclick="window.location.href='ps_escola.php'">	 
						 <span class="nav-icon">
							<i class="fa fa-institution">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						  Gerir Escolas
						</span>
						</a>
					</li>
					
					<li ui-sref-active="active" class="">
						<a ui-sref="app.chart" onclick="window.location.href='ps_rotas.php'">	 
						 <span class="nav-icon">
							<i class="fa fa-road">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						  Gerir Rotas
						</span>
						</a>
					</li>
					
					<li ui-sref-active="active" class="">
						<a ui-sref="app.chart" onclick="window.location.href='ps_servicoTransporte.php'">	   
						 <span class="nav-icon">
							<i class="fa  fa-car">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						  Servi&ccedil;os de Transporte
						</span>
						</a>
					</li>
              </ul>
			  <?php
					  }
					?>
					
					<?php 
				  if($usuNivelAcesso == 2)
				  { 
				?>
				
					
					<li ui-sref-active="active" class="">
					<a ui-sref="app.chart" onclick="window.location.href='ps_presenca_alunos_educadora.php'">
						 
						 <span class="nav-icon">
							<i class="fa  fa-check">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						  Marcar Presen&ccedil;as
						</span>
						</a>
					</li>
					
					<li ui-sref-active="active" class="">
					<a ui-sref="app.chart" onclick="window.location.href='ps_presenca_marcadas.php'">
						 
						 <span class="nav-icon">
							<i class="fa  fa-list">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						  Listar Presen&ccedil;as
						</span>
						</a>
					</li>
              </ul>
			  <?php
					  }
					?>
					
					<?php 
				  if($usuNivelAcesso == 3)
				  { 
				?>
				
					
					
					<li ui-sref-active="active" class="">
						<a ui-sref="app.chart" onclick="window.location.href='ps_listarFilhoLocalizacao.php'">
						  <span class="nav-icon"> 
							<i class="fa fa-location-arrow">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						  Localizar Filho
						</span>
						</a>
					</li>
					
					<li ui-sref-active="active" class="">
						<a ui-sref="app.chart" onclick="window.location.href='ps_detalhesMotorista.php'">
						  <span class="nav-icon"> 
							<i class="fa  fa-info">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						  Detalhes Motoristas
						</span>
						</a>
					</li>
					
					<li ui-sref-active="active" class="">
						<a ui-sref="app.chart" onclick="window.location.href='ps_detalhesCarrinha.php'">	 
						 <span class="nav-icon">
							<i class="fa fa-bus">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						  Detalhes Carrinha
						</span>
						</a>
					</li>
					
					<li ui-sref-active="active" class="">
						<a ui-sref="app.chart" onclick="window.location.href='ps_detalhesRotas.php'">	 
						 <span class="nav-icon">
							<i class="fa fa-road">
							  <span ui-include="'../assets/images/i_0.svg'"></span>
							</i>
						  </span>
						  Detalhes Rotas
						</span>
						</a>
					</li>
			
              </ul>
			  <?php
					  }
					?>
					
        </nav>
      </div>
	  
	  

	  
	  <nav ui-nav>
	  <ul  class="nav grey-300">
		<li  class="no-bg">
		  <a  href="../get/logout.php">
			<span class="nav-icon">
			 <i  class="material-icons red">&#xe8ac;</i>
			</span>
			<span class="nav-text">Terminar Sess&atilde;o</span>
		  </a>
		</li>
	  </ul>
	</nav>
    </div>
  </div>
  


  
  <!-- / aside -->
  
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
              <div  class="btn-group dropdown">
        <button style="margin-top: 18px" class="md-btn md-flat m-b-sm" data-toggle="dropdown" aria-expanded="false"><?php echo $usuarioNome;?></button>
		  <div class="dropdown-menu pull-right dropdown-menu-scale" style="width: 200px;">
   <span class="dropdown-item"><i class="glyphicon glyphicon-user nav-text">&nbsp;<?=$nome?></i></span>
  <div class="dropdown-divider"></div>
	<a class="dropdown-item" href="../display/displayProfileUpdated.php">Perfil</a>
<?php 
  if($usuNivelAcesso == 0 || $usuNivelAcesso == 1)
  { 
?>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="../display/rg_usuario.php">Criar Conta</a>
<?php
  }
?>
  <div  class="dropdown-divider"></div>
  <a  class="dropdown-item" href="../get/logout.php">Terminar Sess&atilde;o</a>
</div>

        </div>
            </ul>  
      </div>
    </div><br/><br/><br/>
	<div style="position:center" class="padding">
	<center>
	<div class="margin">
		<h5 class="m-b-0 _300">Ola <strong><?php echo $nome.' '.$UsuarioApelido; ?></strong>, Seja bem vindo ao Sistema de Gest&atilde;o e Controlo de Carrinhas Escolares (<b>SGCCE</b>)!</h5>
	</div>
	<!-- ############ PAGE START-->

<div class="container">
	<div class="row">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../assets/images/usuarios/school-buses.jpg" alt="First slide">
	  <div class="carousel-caption d-none d-md-block">
    <h5>SGCCE</h5>
    <p>O presente sistema tem como objectivo, disponibilizar aos encarregados de educação a localização geografica em tempo real dos seus filhos, apartir de uma plantaforma web e mobile, via google Maps.</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../assets/images/usuarios/criancas.png" alt="Second slide">
	   <div class="carousel-caption d-none d-md-block">
    <h5>Carrinhas- Escolares</h5>
    <p>É possivel atraves da aplicação visualizar as fotos e condições nas quais se encontram as carrinhas que transportam os alunos.</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../assets/images/usuarios/cars.png" alt="Third slide">
	   <div class="carousel-caption d-none d-md-block">
	   <h5>Motoristas</h5>
    <p>O sistema disponibiliza a informação das credencias de todos os motoristas registados no sistema, demodo que todos on encarregados de educação tenham a informação necessaria e autorizem que os nossos motoristas qualificados trasnportem os seus filhos.</p>
  </div>
    </div>
	 <div class="carousel-item">
      <img class="d-block w-100" src="../assets/images/usuarios/maps.png" alt="Four slide">
	   <div class="carousel-caption d-none d-md-block">
	   <h5>Rotas</h5>
    <p>O sistema tambem  disponibiliza de uma lista de rostas na qual é praticada para transportar todos os alunos das suas casas as escolas e vice-versa, com esta funcionalidade o encarregado pode ter a informaçao do percurso tais como KM/H e tempo.</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div></div>

  </div>
  <div  class="navbar-fixed-bottom ">
  <span class="text-center">
    <div class="block clearfix">
			<a href class="btn btn-icon btn-social rounded btn-sm">
        <i class="fa fa-facebook blue-900"></i>
        <i class="fa fa-facebook indigo"></i>
      </a>
      <a href class="btn btn-icon btn-social rounded btn-sm">
        <i class="fa fa-twitter red-900"></i>
        <i class="fa fa-twitter light-blue"></i>
      </a>
      <a href class="btn btn-icon btn-social rounded btn-sm">
        <i class="fa fa-google-plus blue-900"></i>
        <i class="fa fa-google-plus red"></i>
      </a>
      <a href class="btn btn-icon btn-social rounded btn-sm">
        <i class="fa fa-linkedin red-900"></i>
        <i class="fa fa-linkedin cyan-600"></i>
      </a>
			<a href class="btn btn-icon btn-social rounded btn-sm">
        <i class="fa fa-behance blue-900"></i>
        <i class="fa fa-behance blue"></i>
      </a>
			<a href class="btn btn-icon btn-social rounded btn-sm">
        <i class="fa fa-dribbble red-900"></i>
        <i class="fa fa-dribbble pink"></i>
      </a>
	  <div class="pull-right text-muted">
         &copy; Copyright <b>Victor Faria</b>&nbsp&nbsp&nbsp <span class="hidden-xs-down"></span></div>
	</div>
		</div>
	</div>
</div>

   
  <!-- / -->
  <!-- theme switcher -->
  <div id="switcher">
    <div class="switcher box-color dark-white text-color" id="sw-theme">
      <a href ui-toggle-class="active" target="#sw-theme" class="box-color dark-white text-color sw-btn">
        <i class="fa fa-gear"></i>
      </a>
      <div class="box-divider"></div>
      <div class="box-body">
        <p class="hidden-md-down">
          <label class="md-check m-y-xs"  data-target="folded">
            <input type="checkbox">
            <i class="green"></i>
            <span class="hidden-folded">Folded Aside</span>
          </label>
          <label class="md-check m-y-xs" data-target="boxed">
            <input type="checkbox">
            <i class="green"></i>
            <span class="hidden-folded">Boxed Layout</span>
          </label>
          <label class="m-y-xs pointer" ui-fullscreen>
            <span class="fa fa-expand fa-fw m-r-xs"></span>
            <span>Fullscreen Mode</span>
          </label>
        </p>
        <p>Colors:</p>
        <p data-target="themeID">
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'primary', accent:'accent', warn:'warn'}">
            <input type="radio" name="color" value="1">
            <i class="primary"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'accent', accent:'cyan', warn:'warn'}">
            <input type="radio" name="color" value="2">
            <i class="accent"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'warn', accent:'light-blue', warn:'warning'}">
            <input type="radio" name="color" value="3">
            <i class="warn"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'success', accent:'teal', warn:'lime'}">
            <input type="radio" name="color" value="4">
            <i class="success"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'info', accent:'light-blue', warn:'success'}">
            <input type="radio" name="color" value="5">
            <i class="info"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'blue', accent:'indigo', warn:'primary'}">
            <input type="radio" name="color" value="6">
            <i class="blue"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'warning', accent:'grey-100', warn:'success'}">
            <input type="radio" name="color" value="7">
            <i class="warning"></i>
          </label>
          <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md" data-value="{primary:'danger', accent:'grey-100', warn:'grey-300'}">
            <input type="radio" name="color" value="8">
            <i class="danger"></i>
          </label>
        </p>
        <p>Themes:</p>
        <div data-target="bg" class="text-u-c text-center _600 clearfix">
          <label class="p-a col-xs-6 light pointer m-a-0">
            <input type="radio" name="theme" value="" hidden>
            Light
          </label>
          <label class="p-a col-xs-6 grey pointer m-a-0">
            <input type="radio" name="theme" value="grey" hidden>
            Grey
          </label>
          <label class="p-a col-xs-6 dark pointer m-a-0">
            <input type="radio" name="theme" value="dark" hidden>
            Dark
          </label>
          <label class="p-a col-xs-6 black pointer m-a-0">
            <input type="radio" name="theme" value="black" hidden>
            Black
          </label>
        </div>
      </div>
    </div>
    </div>
  </div>
  <!-- / -->

<!-- ############ LAYOUT END-->

  </div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
  <script src="../libs/jquery/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
  <script src="../libs/jquery/tether/dist/js/tether.min.js"></script>
  <script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="../libs/jquery/underscore/underscore-min.js"></script>
  <script src="../libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="../libs/jquery/PACE/pace.min.js"></script>

  <script src="scripts/config.lazyload.js"></script>

  <script src="scripts/palette.js"></script>
  <script src="scripts/ui-load.js"></script>
  <script src="scripts/ui-jp.js"></script>
  <script src="scripts/ui-include.js"></script>
  <script src="scripts/ui-device.js"></script>
  <script src="scripts/ui-form.js"></script>
  <script src="scripts/ui-nav.js"></script>
  <script src="scripts/ui-screenfull.js"></script>
  <script src="scripts/ui-scroll-to.js"></script>
  <script src="scripts/ui-toggle-class.js"></script>

  <script src="scripts/app.js"></script>
   <script src="scripts/estado.js"></script>
   <script src="scripts/paiConteudo.js"></script>

  <!-- ajax -->
  <script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>
  <script src="scripts/ajax.js"></script>
<!-- endbuild -->
</body>
</html>
