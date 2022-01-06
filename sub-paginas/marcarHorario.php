<?php
require_once '../PHPMailer-master/PHPMailerAutoload.php';
$mail= new PHPMailer();
setcookie('confirmar',uniqid(),time()+1800);
var_dump($_COOKIE);

$_POST['nome'];
$email= $_POST['email'];
$_POST['number'];
$_POST['envio'];
$_POST['horario'];

$mail->IsSMTP();
$mail->Host="localhost";
$mail->Port=8080;
$mail->SMTPAuth = true;
$mail->Username='eliasvito58@gmail.com';
$mail->Password='19600280'; 
$mail->SMTPDebug = 2; 
$mail->From = "eliasvito58@gmail.com"; 
$mail->FromName = "Elias";
$mail->AddAddress($email,$_POST['nome']); 
$mail->IsHTML(true); 
$mail->CharSet = 'UTF-8'; 
$mail->Subject = "E-mail de confirmação";

$mail->Body = 'Este E-mail serve exclusivamente para confirmar sua solicitaçao dos nossos serviços <a>click aqui<a> para solicitar o agendamento'.$_COOKIE['confirmar'].'este e seu codigo de confirmaçao'; 

$enviado = $mail->Send(); 
if ($enviado) 
{ 
    echo "Seu email foi enviado com sucesso!"; 
} else { 
    echo "Houve um erro enviando o email: ".$mail->ErrorInfo; 
} 


/*if ($status) {
    header("Location: agende-online.php?status=sucesso");
}else{
    header("Location: agende-online.php?status=erro");
}
*/

?>
