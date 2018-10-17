<?php
include 'NewCon.php';
class Historico extends NewCon{

    private $tipo, $usuario='NULL', $data_hora, $descricao, $tabela, $campoAlterado='NULL';
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    public function getTipo(){
        return $this->tipo;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function getUsuario(){
        return $this->usuario;
    }

    public function setDataHora($data_hora){
        $this->data_hora = $data_hora;
    }
    public function getDataHora(){
        return $this->data_hora;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function getDescricao(){
        return $this->descricao;
    }

    public function setTabela($tabela){
        $this->tabela = $tabela;
    }
    public function getTabela(){
        return $this->tabela;
    }

    public function setCampoAlterado($campoAlterado){
        $this->campoAlterado = $campoAlterado;
    }
    public function getCampoAlterado(){
        return $this->campoAlterado;
    }
    public function novoHistorico(){
        $sql = 'INSERT INTO `historico` 
        VALUES(DEFAULT , "'.$this->tipo.'", '.$this->usuario.', "'.$this->data_hora.'", "'.$this->descricao.'", "'.$this->tabela.'", '.$this->campoAlterado.')';
        return mysqli_query($this->con(), $sql);
    }
    public function listarHistorico($usuario=0, $id=0, $limit){
        $gO = ' ORDER BY `data_hora` DESC';
        $sqlAdd = '';
        if($id != 0){
            $sqlAdd = ' AND `id`='.$id;
        }
        if($usuario != 0){
            $sqlAdd = ' AND `usuario`='.$usuario;
        }
        $sql = "SELECT *, `historico`.`id` as id FROM `historico`, `tipo_historico` WHERE `historico`.`tipo` = `tipo_historico`.`id` ".$sqlAdd.$gO.$limit;
        return mysqli_query($this->con(), $sql);
    }
    public function getTotalregistoHistorico($usuario=0, $limit=0){
        $sqlAdd = '';
        if($limit == 0){
            $limit='';
        }
        if($usuario != 0){
            $sqlAdd = ' AND `usuario`='.$usuario;
        }
        $sql = "SELECT *, `historico`.`id` as id FROM `historico`, `tipo_historico` WHERE `historico`.`tipo` = `tipo_historico`.`id` ".$sqlAdd.$limit;
        $query = mysqli_query($this->con(), $sql);
        return mysqli_num_rows($query);
    }
    public function getRecords($tabela, $tipo, $user=0, $group=0, $data=0){
        $sqlAdd='';
        $gO = ' ORDER BY `data_hora` DESC';
        if($user != 0){
            $sqlAdd = ' AND `usuario`='.$user.' ';
        }
        if($group != 0){
            $gO = ' GROUP BY '.$group.' ASC ';
        }
        if ($group == 'data_hora' && $group != 0){
            $gO = " GROUP BY DATE(".$group.") ASC ";
        }
        if($data){
            $sqlAdd = ' AND `data_hora`='.$data.' ';
        }

        $sql = "SELECT * FROM `historico` WHERE `tabela` = '".$tabela."' AND `tipo`= ".$tipo." ".$sqlAdd.$gO;
        return mysqli_query($this->con(), $sql);
    }
    public function getRecordsData ($tabela, $tipo, $user=0, $data){
        $sqlAdd='';
        if($user != 0){
            $sqlAdd = ' AND `usuario`='.$user.' ';
        }

        $sql = "SELECT * FROM `historico` WHERE `tabela` = '".$tabela."' AND `tipo`= ".$tipo." ".$sqlAdd." AND DATE(`data_hora`)='".$data."'";
        return mysqli_query($this->con(), $sql);
    }
}