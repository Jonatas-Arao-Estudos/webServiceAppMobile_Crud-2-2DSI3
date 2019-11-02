<?php
$local = "localhost";
$usuario = "id11440171_jonmat";
$senha = "bestmatch";
$banco = "id11440171_db_appcrud";
$conecta = mysqli_connect($local,$usuario,$senha,$banco);
if($conecta){
    echo "Deu certo!";
}
else{
    echo "Não deu :(";
}