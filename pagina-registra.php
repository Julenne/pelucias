<?php

 error_reporting(E_ALL & ~ E_NOTICE);   

$ident = $_COOKIE['ident'];
$texto = $_POST["texto"];
$id_foto = $_POST["id_foto"];
//Pega os dados do upload
$imagemTipo = $_FILES['arquivo']['type'];
$imagem = $_FILES['arquivo']['tmp_name'];
$imagemNome = $_FILES['arquivo']['name'];

$host = "localhost";
$usuario = "arlene";
$senha = "banco1234";
$banco = "pelucia";
$c = mysqli_connect($host,$usuario,$senha);

function extensaoImagem($img,$imagemLocal){//nome do arquivo
    switch($img){
        case 'image/png':
            $imagemEnviada = imagecreatefrompng($imagemLocal);
            break;
        case 'image/bmp':
            $imagemEnviada = imagecreatefrombmp($imagemLocal);
            break;
        case 'image/gd2':
            $imagemEnviada = imagecreatefromgd2($imagemLocal);
            break;
        case 'image/gd':
            $imagemEnviada = imagecreatefromgd($imagemLocal);
            break;
        case 'image/gif':
            $imagemEnviada = imagecreatefromgif($imagemLocal);
            break;
        case 'image/jpeg':
            $imagemEnviada = imagecreatefromjpeg($imagemLocal);
            break;
        case 'image/webp':
            $imagemEnviada = imagecreatefromwebp($imagemLocal);
            break;
        case 'image/xbm':
            $imagemEnviada = imagecreatefromxbm($imagemLocal);
            break;
        case 'image/xpm':
            $imagemEnviada = imagecreatefromxpm($imagemLocal);
            break;
    }
    return $imagemEnviada;
}

list($w, $h) = getimagesize($imagem);
if ($w > $h) 
{
    $wi = 0.8 * $h;
}
else 
{
    $wi = 0.8 * $w;
}
 
$xi = ($w - $wi) / 2;
$yi = ($h - $wi) / 2;
 
$wf = 150;
$destino = imagecreatetruecolor($wf, $wf);

$enviada = extensaoImagem($imagemTipo,$imagem);//imagecreatefrom....(---)
imagecopyresized($destino, $enviada, 0, 0, $xi, $yi, $wf, $wf, $wi, $wi);


//$imagemEnviada = imagecreatefromjpeg($imagem);
imagejpeg($enviada,"./upload/jpeg-$imagemNome",70);

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
$sql2 = "SELECT login FROM usuario WHERE ident='$ident'";
echo "$ident";
$resp2 = mysqli_query($c,$sql2);
    
$n = mysqli_num_rows($resp2);
if($n > 0){
    $linha = mysqli_fetch_assoc($resp2);
    if($linha){
        $login = $linha['login'];
    }
}

if(empty($id_contato))
{
    $sql = "INSERT INTO fotos(texto,caminho,login) VALUES ('$texto','./upload/jpeg-$imagemNome','$login')"; 
    //echo "esse é o nome: $imagemNome";
    
}

    $resp = mysqli_query($c, $sql);
    
    if(!$resp)
    {
        echo "erro na consulta $sql";
        echo "$sql";
        echo mysqli_error($c);
        mysqli_close($c);
        die();
    }
    else
    {
        header("location: lista-inicio.php?login=".$ident);
        //adiciona + uma publicação
    }
    //imagedestroy($imagem); 

