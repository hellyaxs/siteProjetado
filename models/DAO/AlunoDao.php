<?php

class AlunoDao extends DAO
{

    public function create($name,$urlfoto,$dataNascimento,$turma,$email){
     $cmd = $this->conexao->prepare("INSERT INTO dicentes (name,urlfoto,datanascimento,turma,email) VALUES (:n,:u,:d,:t,:e)");
     $cmd->bindValue(":n",$name);
     $cmd->bindValue(":u",$urlfoto);
     $cmd->bindValue(":d",$dataNascimento);
     $cmd->bindValue(":t",$turma);
     $cmd->bindValue(":e",$email);
     $cmd->execute();
     return $cmd->rowCount() > 0 ? true : false;
    }

    public function delete($id)
    {
        $cmd = $this->conexao->query("DELETE FROM dicentes WHERE id ={$id}");
        return $cmd->rowCount() > 0 ? true : false;
    }

    public function get($id)
    {
     $dados = $this->conexao->query("SELECT * FROM dicentes WHERE idDicentes = {$id}");
     $res = $dados->fetch(PDO::FETCH_ASSOC);
     return $res;
    }

    public function put($id)
    {
        $this->conexao->query("UPDATE dicentes SET urlfoto = ''  WHERE id = {$id}");
    }
}