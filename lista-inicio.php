<?php
include "pagina-form.php";
$login = $_COOKIE['nome'];
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

$sql = "SELECT * FROM fotos";

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
