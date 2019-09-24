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
/*
$form = <<<EOT
<div class="card gedf-card">
<div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-between align-items-center">
            <div class="ml-2">
                <div class="h5 m-0">@{$linha["login"]}</div><!--Nome do usuario aqui-->
            </div>
        </div>
        <div>
        <div class="dropdown">
            <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h"></i>
            </button>
        </div>
    </div>
</div>
</div>
    <div class="card-body">
        <a class="card-link" href="#">
            <h5 class="card-title">Titulooo</h5>
                </a>
                    {$linha["texto"]}<!--textooooo-->
                    <img src='./upload/jpeg-{$linha["caminho"]}' class='rounded mx-auto d-block'><!--fotoooooo-->
    </div>
</div>
</div>
EOT;
*/