<?php
require_once 'classes/usuario.php';
$u = new usuario;
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Projeto login</title>
    <link rel="stylesheet" href="./estilo.css">
</head>

<body>
    <div id="corpo-form-Cad">
        <h1> Cadastrar </h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confsenha" name="nome" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="Cadastrar">
            <a href="index.php  ">Já é cadastrado <strong>Entrar</strong>
        </form>
    </div>
 <?php
 //verificar se apertaram o botão
 if(isset($_POST['nome']))
 {
     $nome = addslashes($_POST['nome']);
     $telefone = addslashes($_POST['telefone']);
     $email = addslashes($_POST['email']);
     $senha = addslashes($_POST['senha']);
     $confirmarsenha = addslashes($_POST['confsenha']);


     //verificar se os campos foram preenchidos
     if (!empty ($nome) && !empty ($telefone) && !empty($email) && !empty($senha) && !empty($confirmarsenha))
     {
         $u->conectar("Projeto_login","localhost","root","");
         if($u ->msgErro == "")//esta tudo ok
         {
             if($senha == $confirmarsenha)
             {
                 if($u->cadastrar($nome, $telefone, $email, $senha))
                 {
                     echo "Cadastrado com sucesso! Acesse para entrar!";

                 }
                 else {
                     echo "Email já cadastrado!";
                 }
             }
             else
             {
                 echo "Senha e confirmar senha não correspondem!";
             }

         }
         else
         {
             echo " Erro: ".$u->msgErro;
         }
     }else
     {
         echo "Preencha todos os campos!";
     }

 }

 ?>
</body>

</html>