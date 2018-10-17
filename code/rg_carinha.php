<?php
include '../connections/Connection.php';
  include_once("../classes/cadastro_carinhas.php");

  $cad = new cadastrocarinha();
  
  $matricula = '';
  $lotacao = '';
  $id_tipo_carinha = '';
  $contacto = '';
  $id_motorista = '';
  $id_educadora = '';
  $foto = '';
  
  
  
  if(isset($_POST['sub'])){
	  
    $matricula = $_POST['matricula'];
    $lotacao = $_POST['lotacao'];
    $id_tipo_carinha = $_POST['modelo'];
    $contacto = $_POST['contacto'];
    $id_motorista = $_POST['motorista'];
    $id_educadora = $_POST['educadora'];
    $foto = $_POST['foto'];

    
    //manda para os dados para classe
    $cad -> setMatricula($matricula);
    $cad -> setLotacao($lotacao);
    $cad -> setId_tipo_carinha($id_tipo_carinha);
    $cad -> setContacto($contacto);
    $cad -> setId_motorista($id_motorista);
	$cad -> setId_educadora($id_educadora);
	$cad -> setFoto($foto);
	
	$cad -> IntroduzDadosCarinha();

   
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