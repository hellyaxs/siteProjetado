<?php

class AlunoDao
{
    private $con;

    public function __construct()
    {
        conexao::getConexao();
        $this->con = conexao::$acessoAoBD;
    }

    public function create($name,$urlfoto,$dataNascimento,$turma,$email){
     $cmd = $this->con->prepare("INSERT INTO dicentes (name,urlfoto,datanascimento,turma,email) VALUES (:n,:u,:d,:t,:e)");
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
        $cmd = $this->con->query("DELETE FROM dicentes WHERE id ={$id}");
        return $cmd->rowCount() > 0 ? true : false;
    }

    public function get($id)
    {
     $dados = $this->con->query("SELECT * FROM dicentes WHERE id ={$id}");
     $dados->fetch(PDO::FETCH_ASSOC);
     return $dados;
    }

    public function put($id)
    {
        $this->con->query("UPDATE dicentes SET urlfoto = ''  WHERE id = {$id}");
    }
}