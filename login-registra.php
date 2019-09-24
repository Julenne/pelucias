<?php
    error_reporting(E_ALL & ~ E_NOTICE);
    $id_usuario = $_REQUEST['id_usuario'];
    $nome = $_REQUEST['nome'];
    $login = $_REQUEST['login'];
    $senha = md5($_REQUEST['senha']);

    if(empty($id_contato))
    {
        $sql = "INSERT INTO usuario(nome,login,senha) VALUES ('$nome','$login','{$senha}')";
    }
    
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "pelucia";

    $c = mysqli_connect($host,$usuario,$senha);

    if(!$c)
    {
        echo "erro na conexão";
        echo mysqli_error($c);
        die();
    }
 
    if(!mysqli_select_db($c,$banco))
    {
        echo "erro no select_db";
        echo mysqli_error($c);
        mysqli_close($c);
        die();
    }
 
    $resp = mysqli_query($c, $sql);
 
    if(!$resp)
    {
        echo "erro na consulta $sql";
        echo mysqli_error($c);
        mysqli_close($c);
        die();
    }
    else
    {
        header('location: lista-inicio.php?login='.$login);
    }
    //usuario de teste: brunin
    //senha: uhu
?>