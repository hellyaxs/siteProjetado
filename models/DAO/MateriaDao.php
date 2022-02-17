<?php


class MateriaDao extends DAO
{

    public function create($idAluno,$nomeMateria,$nota1,$nota2,$nota3,$nota4,$fequencia)
    {
        $cmd = $this->conexao->query("INSERT INTO {$nomeMateria}
                                     (idAluno,nota1,nota2,nota3,nota4,frequencia)
                                      VALUES ({$idAluno}{$nota1}{$nota2})");

    }
    public function get($idAluno,$nomeMateria)
    {
        $cmd = $this->conexao->query("SELECT * FROM {$nomeMateria} WHERE idAluno = {$idAluno}");
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function getMateria($idAluno,$nomeMatria)
    {
        $cmd = $this->conexao->query("SELECT * FROM Materias WHERE idAluno = {$idAluno} AND materia ={$nomeMatria}");
        $dados =  $cmd->fetch(PDO::FETCH_ASSOC);
        return $dados;

    }
    public function put($idAluno,$nomeMatria)
    {
        $cmd = $this->conexao->query("UPDATE Materias SET nota1 ={$nota1} WHERE  idAluno = {$idAluno}");
        return $cmd->rowCount() > 0;
    }
    public function delete(){}
}