<?php
include '../connections/Connection.php';
  include_once("../classes/cadastro_servicoTransporte.php");

 
  
  $cad = new cadastroservicotransporte();
  
 $id_aluno = '';
 $id_zona = '';
 $id_percurso = '';
 $id_carrinha = '';
 $id_educadora = '';
 $id_motorista = ''; 
 $id_rota = '';
  
  
  if(isset($_POST['submit'])){
	  
    $id_aluno = $_POST['aluno'];
    $id_zona = $_POST['zona'];
    $id_percurso = $_POST['percurso'];
    $id_carrinha = $_POST['carrinha'];
    $id_educadora = $_POST['educadora'];
	$id_motorista = $_POST['motorista'];
	$id_rota = $_POST['rota'];
	

    
    //manda para os dados para classe
    $cad -> setId_aluno($id_aluno);
    $cad -> setId_zona($id_zona);
    $cad -> setId_percurso($id_percurso);
    $cad -> setId_carrinha($id_carrinha);
    $cad -> setId_educadora($id_educadora);
	$cad -> setId_motorista($id_motorista);
	$cad -> setId_rota($id_rota);
	

	
	$cad -> IntroduzDadosServicoTransporte();

   
  /*  if($cadastro -> VerificaEmail()){//verifica se o email ja existe
        if($cadastro -> VerificaUserName()){//verifica se o userName ja existe
            if($cadastro -> VerificaPassword($password2)){//verifica se as password's sao iguais ou nao
                if($cadastro -> IntroduzDadosUtilizadores()){//executa a fancao sql para cadastro  
                   echo "
                      <script>alert('Cadastro efectuado com sucesso')</script>
					  <script>window.location='./ps_usuarios.php'</script>
                    ";
                }else{
                    echo "
                         <script>alert('Ocorreu um erro ao tentar efectuar o cadastro')</script>
                    ";
                }  
          }else{
               $ErroUserName = '<div class="alert alert-danger alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Password diferente!
             </div>';
              $focoPassword2 = 'autofocus';
              $error = true;
          }
      }else{
          $ErroUserName = '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        User Name ja existente!
        </div>';
        $focoUserName = 'autofocus';
        $error = true;
      }
    }else{
       $ErroEmail = '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        Email ja existente!
        </div>';
        $focoEmail  =  'autofocus'; 
        $error = true;
    }
    
    if($error == true){
        if($sexo == 'M'){
          $selectedMasc = 'checked';
        }elseif($sexo == 'F'){
          $selectedFem = 'checked';
        }

        if($cargo == '0'){
            $selectedAdm  = 'checked';
        }elseif($cargo == '1'){
            $selectedGestor  = 'checked';
        }elseif($cargo == '2'){
            $selectedFunc  = 'checked';
        }
    }

    if(isset($_SESSION['ERRORIMG'])){
        /*echo "
          <script>
                  alert('erro ao carregar imagem');
          </script>
          ";*/     
    }


  
?>