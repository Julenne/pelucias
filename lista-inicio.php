<?php
$ident = $_GET['login'];

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

$sql2 = "SELECT ident FROM usuario WHERE ident='$ident'";
$sql = "SELECT * FROM fotos order by caminho desc";

$resp = mysqli_query($c, $sql);
$resp2 = mysqli_query($c, $sql2);

$n= mysqli_num_rows($resp2);
if($n>0){
    include "pagina-form.php";
    if(!$resp)
    {
        echo "erro na consulta $sql";
        echo mysqli_error($c);
        mysqli_close($c);
        die();
    }
    else
    {
        $linha = mysqli_fetch_assoc($resp);
        if($linha)
        {
            while($linha)
            {
                include "publi-form.php";
                $linha = mysqli_fetch_assoc($resp);
            }    
        }
    }
} else {
    header("location:erro.html");
}

