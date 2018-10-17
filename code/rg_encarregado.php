<?php
include '../connections/Connection.php';
  include_once("../classes/cadastro_encarregado.php");

  $cad = new cadastroencarregado();
  
  $foto = '';
  $nome_encarregado = '';
  $apelido_encarregado = '';
  $contacto_encarregado = '';
  $email_encarregado = '';
  $id_zona = '';
  
  
  
  if(isset($_POST['submeti'])){
    $nome_encarregado = $_POST['nome'];
    $apelido_encarregado = $_POST['apelido'];
    $contacto_encarregado = $_POST['cell'];
    $email_encarregado = $_POST['email'];
    $id_zona = $_POST['morada'];
	$foto = $_POST['foto'];
  
   
    
    //manda para os dados para classe
    $cad -> setNome_encarregado($nome_encarregado);
    $cad -> setApelido_encarregado($apelido_encarregado);
    $cad -> setContacto_encarregado($contacto_encarregado);
    $cad -> setEmail_encarregado($email_encarregado);
    $cad -> setId_zona($id_zona);
	$cad -> setFoto($foto);
   
	$cad -> IntroduzDadosEncarregado();
   
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
