<!--faz o tratamento das informações inseridas no formulário-->

<?php
session_start();
include_once 'conexao.php';

$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);


$querySelect  = $link->query("select email from tb_pessoas");
$array_emails = [];

while ($emails = $querySelect->fetch_assoc()):
    $emails_existentes = $emails['email'];
array_push($array_emails, $emails_existentes);
endwhile;

if(in_array($email, $array_emails)):  
    $_SESSION['msg'] = "<p class='center red text' >".'Já existe uma pessoa cadastrada com esse email!...'."</p>";
header("Location:../index.php");

else:
    $queryInsert = $link->query("insert into tb_pessoas values(default, '$nome', '$email', '$telefone')");
    $affected_rows = mysqli_affected_rows($link);
    
    if($affected_rows > 0):
        $_SESSION['msg'] = "<p class='center green-text'>".'Seu Cadastro foi efetuado com sucesso!'."</p>";
    header("Location:../index.php");
    endif;
endif;