<?php
include_once("conexao.php");

function PedirAmizade($solicitante,$solicitado){
    $sql = 'INSERT INTO tb_amizade(id_amigo_solicitante,id_amigo_solicitado)
    VALUES ("'.$solicitante.'","'.$solicitado.'")';
    $res = $GLOBALS['conecta']->query($sql);
    return ($res) ? true : false;
}

function AceitarAmizade($solicitante,$solicitado){
    $sql = 'UPDATE tb_amizade 
            SET st_confirmacao = "T", dt_confirmacao = NOW() WHERE id_amigo_solicitante = "'.$solicitante.'" AND id_amigo_solicitado = "'.$solicitado.'"';
	$res = $GLOBALS['conecta']->query($sql);
	return ($res) ? true : false;
}

function DesfazerAmizade($solicitante,$solicitado){
	$sql = 'DELETE FROM tb_amizade WHERE id_amigo_solicitante = "'.$solicitante.'" AND id_amigo_solicitado = "'.$solicitado.'"';
	$res = $GLOBALS['conecta']->query($sql);
	return ($res) ? true : false;
}

function ListarAmizade($cd){
	$sql = 'SELECT * FROM tb_amizade WHERE (id_amigo_solicitante = "'.$cd.'" OR id_amigo_solicitado = "'.$cd.'") AND st_confirmacao = "T"';
	$res = $GLOBALS['conecta']->query($sql);
	return $res;
}