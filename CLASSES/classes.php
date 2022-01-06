<?php

Class usuario{

  private $pdo;
  public $MSG;
public function conectar(){

  global $pdo;
   try
    {
     $pdo =new PDO("mysql:dbname=escolainfantilbd;host=localhost","root","");
    } 
   catch(PDOException $e){
          $e->getMessage();
   }
  }
   //erro exite
public function cadastrar($nome,$email,$telefone,$cpf,$senha,$usuario,$turma){

    global $pdo;
      
    if($senha=='1'){
      $senha='@aluno2021';
    }else if($senha=='2'){
      $senha='@professor2021';
    }
   $sql= $pdo->prepare("SELECT id FROM tbformulario WHERE `E-mail` =:e ");
   $sql->bindValue(":e",$email);
   $sql->execute();

   // caso nao, cadastrar
   if($sql->rowCount() > 0){
     echo"este email já exite no servidor";
       return false;

   }else{

     $sql =$pdo->prepare("INSERT INTO tbformulario (Nome,`E-mail`,Numero,NumeroMatricula,Senha,usuario) VALUES (:n,:e,:t,:c,:s,:u)");
     $sql->bindValue(":n",$nome);
     $sql->bindValue(":t",$telefone);
     $sql->bindValue(":s",md5($senha));
     $sql->bindValue(":e",$email);
     $sql->bindValue(":c",$cpf);
     $sql->bindValue(":u",$usuario);
     $sql->execute();
     $idAluno=$sql=$pdo->LastInsertId();
     if($turma != NULL){
       $sql=$pdo->prepare("INSERT INTO {$turma} (nome,idAluno) VALUES (:n,:id)");
       $sql->bindValue(":n",$nome);
       $sql->bindValue(":id",$idAluno);
       $sql->execute();
       if ($sql->rowCount()>0) {
         return true;
       }else{
        return false;
       }
     }
     return true;
   }
    
}
public function listarProfessor($usu){
   global $pdo;
   $sql=$pdo->prepare("SELECT nome,`E-mail`,Numero,NumeroMatricula,id,permissao FROM tbformulario WHERE usuario = :u");
   $sql->bindValue(":u",$usu);
   $sql->execute();
   $dados=$sql->fetchAll(PDO::FETCH_ASSOC);
   return $dados;
}

 //funcao para todos os usuarios
  public function logar($email,$senha,$user){

    global $pdo;
    $sql =$pdo->prepare("SELECT id,Nome,usuario,permissao FROM tbformulario WHERE `E-mail` = :e AND Senha = :s AND usuario = :u");
    $sql->bindValue(":e",$email);
    $sql->bindValue(":u",$user);
    $sql->bindValue(":s",md5($senha));
    $sql->execute();

    if($sql->rowCount() > 0){
     $dado= $sql->fetch();
        session_start();
        $_SESSION['id'] = $dado['id'];
        $_SESSION['nome'] = $dado['Nome'];
        $_SESSION['usuario'] = $dado['usuario'];
        $_SESSION['permissao'] = $dado['permissao'];
       
        return true;
    }
    else{
          return false;
    }
}
//funcao para todos os usuarios
public function novasenha($senha,$matricula,$user){
    
    global $pdo;
    $sql=$pdo->prepare("UPDATE tbformulario SET Senha = :s WHERE usuario = :u AND NumeroMatricula = :n");
  
    $sql->bindValue(":s",md5($senha));
    $sql->bindValue(":n",$matricula);
    $sql->bindValue(":u",$user);
    $sql->execute();


  if($sql->rowCount() > 0){

     echo"sua senha foi alterada com sucesso";
       return true;
   }
   else{
     echo"infelizmente ouve um erro na atualizaçao da senha";
         return false;
   }

}
//funcao para professor e gestao
public function listaralunos($ano){

  global $pdo;
  $alunos=array();
  $sql=$pdo->prepare("SELECT nome,id,idAluno FROM {$ano} ORDER BY Nome");
  $sql->execute();
  $alunos= $sql->fetchAll(PDO::FETCH_ASSOC);
 
  return $alunos;
}
//funcao para professor
public function enviarPDF($id,$pdfnome,$bimestre,$ano){
  global $pdo; 

  $sql=$pdo->prepare("UPDATE {$ano} SET {$bimestre}_bimestre = :pd WHERE idAluno = :id"); 
  $sql->bindValue(":pd",$pdfnome);
  $sql->bindValue(":id",$id);
    $sql->execute();
  if($sql->rowCount() > 0){
      echo "deveria ir";
      
  }else{
    echo "quase la ano desista";
  }

}
public function enviarPlanejamento($nome,$ano){
  global $pdo;

  $sql=$pdo->prepare("INSERT INTO planejamento (planoPDF,turma) VALUES (:n,:a) ");
  $sql->bindValue(":n",$nome);
  $sql->bindValue(":a",$ano);
  $sql->execute();
  $id=$sql=$pdo->LastInsertId();

  $sql=$pdo->prepare("UPDATE {$ano} SET planejamento = :i");
  $sql->bindValue(":i",$id);
  $sql->execute();

}
public function planejamentoExiste($ano){

  global $pdo;
  $sql=$pdo->prepare("SELECT id FROM planejamento WHERE turma = :t");
  $sql->bindValue(":t",$ano);
  $sql->execute();
  if($sql->rowCount()>0){
    return true;
  }else{
    return false;

  }
}
public function excluirPanejamento($id){

  global $pdo;
  $sql=$pdo->prepare("DELETE FROM planejamento WHERE turma = :t");
  $sql->bindValue(":t",$id);
  $sql->execute();
  if($sql->rowCount() > 0){
    return true;
  }else{
    return false;
  }
}
//funcao para professor
public function jaexite($bimestre,$id,$ano,$funcao){
   global $pdo;
   $tt=array();

   $sql=$pdo->query("SELECT {$bimestre}_bimestre FROM {$ano} WHERE idAluno= {$id}");
  if($sql->rowCount() > 0){ 
      
    
$tt=$sql->fetch(PDO::FETCH_ASSOC);       
if($tt[$bimestre.'_bimestre']==""){
    ?>
      <button type="submit" id="prof">enviar</button>
    <?php
   return true;
}else{
  ?>
  <h3> enviado <br></h3>
  <a href="area-privada-professor.php?funcao=<?php echo $funcao.$bimestre.$id;?>" id="prof">excluir</a>
  <?php
    return false;
}
}
}
//funcao para professor
public function excluir($bimestre,$id,$ano){
  global $pdo;
  $sql=$pdo->query("UPDATE {$ano} SET {$bimestre}_bimestre = '' WHERE idAluno= {$id}");
  if($sql->rowCount() > 0){ 
     return true;
  }else{
    return false;
  }
}
public function bloquearAcesso($id,$permissao){

    global $pdo;
    if($permissao=='127'){
     
     $sql=$pdo->prepare("UPDATE tbformulario SET permissao = :t WHERE id= {$id}");
     $sql->bindValue(":t","123");
     $sql->execute();
      
   }else{
    $sql=$pdo->prepare("UPDATE tbformulario SET permissao = :n WHERE id= {$id}");
    $sql->bindValue(":n","127");
    $sql->execute();
  
   }

}
public function jaBloqueado($id,$funcao){
  global $pdo;
  $tt=array();   
  $sql=$pdo->query("SELECT permissao FROM tbformulario WHERE id={$id}");
  if($sql->rowCount() > 0){ 

    $tt=$sql->fetch(PDO::FETCH_ASSOC);       
if($tt['permissao']=='123'){
    ?>
       <a href="?funcao=<?php echo$funcao?>&onlock=<?php echo$id?>"><img src="../minha-coleçao/block-user.png"></a>
    <?php
   return true;
}else{
  ?>
  <a href="?funcao=<?php echo$funcao?>&block=<?php echo$id;?>"><img src="../minha-coleçao/user.png"></a>
  <?php
    return false;
}
}
}


public function excluirProfessor($id){
  
  global $pdo;
  $sql=$pdo->prepare("DELETE FROM tbformulario WHERE id = :t");
  $sql->bindValue(":t",$id);
  $sql->execute();
  if($sql->rowCount() > 0){
    return true;
  }else{
    return false;
  }

}
 public function excluirAluno($ano,$id){

  global $pdo;
  $sql=$pdo->prepare("DELETE FROM {$ano} WHERE idAluno = :t");
  $sql->bindValue(":t",$id);
  $sql->execute();

  $sql=$pdo->prepare("DELETE FROM tbformulario WHERE id = :t");
  $sql->bindValue(":t",$id);
  $sql->execute();
  
}
//funcao para aluno
public function verNotas($id,$bimestre){

 global $pdo;
 $notas=array();
 for ($i=1; $i <= 5 ; $i++) { 
    $sql=$pdo->query("SELECT {$bimestre}_bimestre FROM {$i}_ano WHERE idAluno= {$id}");
    
  if($sql->rowCount() > 0){ 
    $notas= $sql->fetch(PDO::FETCH_ASSOC);
  return $notas;
  return  true;
}
}
for ($i=1; $i <= 4 ; $i++) { 
  $sql=$pdo->query("SELECT {$bimestre}_bimestre FROM infantil_{$i} WHERE idAluno= {$id}");
  
if($sql->rowCount() > 0){ 
  $notas= $sql->fetch(PDO::FETCH_ASSOC);
return $notas;
return  true;
}
else{
 
return false;
}
}

}
public function verPlanejamneto($id){

  global $pdo;
  for ($i=1; $i <= 5 ; $i++) { 
   
    $sql=$pdo->query("SELECT planejamento FROM {$i}_ano WHERE idAluno = {$id} ");
   
    if($sql->rowCount()>0){
      $pl= $sql->fetch(PDO::FETCH_ASSOC);
      $sql=$pdo->prepare("SELECT planoPDF FROM planejamento WHERE id = {$pl['planejamento']}");
      $sql->execute();
      $planejamento= $sql->fetch(PDO::FETCH_ASSOC);
      return $planejamento;
      break;
    }
  }
  for ($i=1; $i <= 4 ; $i++) { 
   
    $sql=$pdo->query("SELECT planejamento FROM infantil_{$i} WHERE idAluno = {$id} ");
   
    if($sql->rowCount()>0){
      $pl= $sql->fetch(PDO::FETCH_ASSOC);
      $sql=$pdo->prepare("SELECT planoPDF FROM planejamento WHERE id = {$pl['planejamento']}");
      $sql->execute();
      $planejamento= $sql->fetch(PDO::FETCH_ASSOC);
      return $planejamento;
      break;
    }
  }
 
}
public function verPlanejamnetoP($turma){
  global $pdo;
  $sql=$pdo->prepare("SELECT planoPDF FROM planejamento WHERE turma = :t");
  $sql->bindValue(":t",$turma);
  $sql->execute();
  
    $pdf= $sql->fetch(PDO::FETCH_ASSOC);
    return $pdf;
  

 

}
}
 
?>