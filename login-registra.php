<?php
    error_reporting(E_ALL & ~ E_NOTICE);
    $id_usuario = $_REQUEST['id_usuario'];
    $nome = $_REQUEST['nome'];
    $login = $_REQUEST['login'];
    $senha = md5($_REQUEST['senha']);
    $ident = rand(1111111,99999999);

    if(empty($id_contato))
    {
        $sql = "INSERT INTO usuario(nome,login,senha,ident) VALUES ('$nome','$login','{$senha}',$ident)";
    }
    
    $host = "localhost";
    $usuario = "arlene";
    $senha = "banco1234";
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
        header('location: lista-inicio.php?login='.$ident);
    }
?>