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
	$sql = 'SELECT US.cd_usuario, US.nm_usuario
    FROM tb_usuario US, tb_amizade AM
    WHERE AM.id_amigo_solicitante = "'.$cd.'" AND US.cd_usuario = AM.id_amigo_solicitado AND AM.st_confirmacao = "T" 
    UNION 
    SELECT US.cd_usuario, US.nm_usuario
    FROM tb_usuario US, tb_amizade AM 
    WHERE AM.id_amigo_solicitado = "'.$cd.'" AND US.cd_usuario = AM.id_amigo_solicitante AND AM.st_confirmacao = "T"';
	$res = $GLOBALS['conecta']->query($sql);
	return $res;
}

function ListarPedidosAmizade($cd){
	$sql = 'SELECT US.cd_usuario, US.nm_usuario 
    FROM tb_usuario US, tb_amizade AM 
    WHERE AM.id_amigo_solicitado = "'.$cd.'" AND US.cd_usuario = AM.id_amigo_solicitante AND AM.st_confirmacao = "F"';
	$res = $GLOBALS['conecta']->query($sql);
	return $res;
}

function ListarSolicitacaoAmizade($cd){
	$sql = 'SELECT US.cd_usuario, US.nm_usuario 
    FROM tb_usuario US, tb_amizade AM
    WHERE AM.id_amigo_solicitante = "'.$cd.'" AND US.cd_usuario = AM.id_amigo_solicitado AND AM.st_confirmacao = "F" ';
	$res = $GLOBALS['conecta']->query($sql);
	return $res;
}

function VerificaAmizade($solicitante,$solicitado){
	$sql = 'SELECT * FROM tb_amizade  WHERE id_amigo_solicitante = "'.$solicitante.'" AND id_amigo_solicitado = "'.$solicitado.'" AND st_confirmacao = "T"';
    $res = $GLOBALS['conecta']->query($sql);
    if(mysqli_num_rows($res) > 0){
        return true;
    }else{
        return false;
    }
}

function VerificaSolicitacaoAmizade($solicitante,$solicitado){
	$sql = 'SELECT * FROM tb_amizade  WHERE id_amigo_solicitante = "'.$solicitante.'" AND id_amigo_solicitado = "'.$solicitado.'" AND st_confirmacao = "F"';
    $res = $GLOBALS['conecta']->query($sql);
    if(mysqli_num_rows($res) > 0){
        return true;
    }else{
        return false;
    }
}