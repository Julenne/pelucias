<?php
error_reporting(E_ALL & ~ E_NOTICE);

$id_contato = $_POST["id_contato"];
$login = $_POST["login"];
$senha = $_POST["senha"];
$senha_cod = md5($senha);
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

$sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha_cod'";

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
    $n= mysqli_num_rows($resp);
    if($n != 0){
        header("location: lista-inicio.php?login=".$login);
        //aparece uma pagina aqui
    }
    else
    {
        echo "<h1>Ocorreu algum erro. Verifique seu login e senha novamente\n<h1>";
        echo "<h3><a href=\"login-form.php\">Voltar para a página inicial</a></h3>";
    }
}