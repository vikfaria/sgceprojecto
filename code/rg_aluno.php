<?php
include '../connections/Connection.php';
  include_once("../classes/cadastro_aluno.php");

  $cad = new cadastroaluno();
  $nome_aluno ='';
  $apelido_aluno ='';
  $id_zona ='';
  $foto ='';
  $data_nascimento ='';
  $id_encarregado ='';
  $id_escola ='';
  
 
  
  if(isset($_POST['submit'])){

    $nome_aluno = $_POST['nome'];
    $apelido_aluno = $_POST['apelido'];
    $id_zona = $_POST['morada'];
    $foto = $_POST['foto'];
	$data_nascimento = $_POST['data'];
    $id_encarregado = $_POST['encarregado'];
	$id_escola = $_POST['escola'];
	
   
    
    //manda para os dados para classe
    $cad -> setNome_aluno($nome_aluno);
    $cad -> setApelido_aluno($apelido_aluno);
    $cad -> setMorada_id($id_zona);
    $cad -> setFoto($foto);
	$cad -> setData_nascimento($data_nascimento);
	$cad -> setId_encarregado($id_encarregado);
	$cad -> setId_escola($id_escola);
    $cad -> IntroduzDadosAluno();

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
