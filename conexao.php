<?php
$local = "localhost";
$usuario = "id11440171_jonmat";
$senha = "bestmatch";
$banco = "id11440171_db_appcrud";
$conecta = new mysqli($local,$usuario,$senha,$banco);
if(!$conecta){
    echo "Não deu :(";
}