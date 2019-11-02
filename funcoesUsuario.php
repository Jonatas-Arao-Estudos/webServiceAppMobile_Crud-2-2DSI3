<?php
include_once("conexao.php");

function CadastrarUsuario($nome,$email,$senha){
    $sql = 'INSERT INTO tb_usuario(nm_usuario,ds_email,ds_senha)
    VALUES ("'.$nome.'","'.$email.'","'.$senha.'")';
    $res = $GLOBALS['conecta']->query($sql);
    return ($res) ? true : false;
}

function ListarUsuario($id){
	$sql = 'SELECT * FROM tb_usuario';
	if($id > 0){
		$sql.= ' WHERE cd_usuario = '.$id;
    }
    else{
        $sql.= ' ORDER by nm_usuario';
    }
	$res = $GLOBALS['conecta']->query($sql);
	return $res;
}
function AtualizarUsuario($cd,$nome,$email,$senha,$bio,$cidade,$dtnascimento){
	$sql = 'UPDATE tb_usuario 
            SET nm_usuario = "'.$nome.'", nm_email = "'.$email.'", ds_senha = "'.$senha.'",
            ds_bio_usuario = "'.$bio.'", ds_cidade = "'.$cidade.'", dt_nascimento = "'.$dtnascimento.'"
            WHERE cd_usuario = '.$cd;
	$res = $GLOBALS['conecta']->query($sql);
	return ($res) ? true : false;
}
function ExcluirUsuario($cd){
	$sql = 'DELETE FROM tb_usuario WHERE cd_usuario = '.$cd;
	$res = $GLOBALS['conecta']->query($sql);
	return ($res) ? true : false;
}