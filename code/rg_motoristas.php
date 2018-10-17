<?php
include '../connections/Connection.php';
  include_once("../classes/cadastro_motoristas.php");

  $cad = new cadastromotoristas();
  
 
  
  $nomeMotorista = '';
  $apelidoMotorista = '';
  $cellMotorista = '';
  $emailMotorista = '';
  $foto ='';
  $carta_motorista ='';
  $moradaMotorista = '';
  

 
  
  if(isset($_POST['submit'])){
    $nomeMotorista = $_POST['nome'];
    $apelidoMotorista = $_POST['apelido'];
	$carta_motorista = $_POST['carta'];
    $cellMotorista = $_POST['cell'];
    $emailMotorista = $_POST['email'];
	$foto = $_POST['foto'];
    $moradaMotorista = $_POST['morada'];

	
   
    
    //manda para os dados para classe
    $cad -> setNomeMotorista($nomeMotorista);
    $cad -> setApelidoMotorista($apelidoMotorista);
	$cad -> setCarta_motorista($carta_motorista);
    $cad -> setCellMotorista($cellMotorista);
    $cad -> setEmailMotorista($emailMotorista);
    $cad -> setMoradaMotorista($moradaMotorista);
	$cad -> setFoto($foto);
	$cad -> IntroduzDadosMotoristas();
   
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
