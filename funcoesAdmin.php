<?php
include_once("conexao.php");

function CadastrarAdmin($nome,$email,$senha){
    $sql = 'INSERT INTO tb_admin(nm_admin,ds_email,ds_senha)
    VALUES ("'.$nome.'","'.$email.'","'.$senha.'")';
    $res = $GLOBALS['conecta']->query($sql);
    return ($res) ? true : false;
}

function ListarAdmin($id){
	$sql = 'SELECT * FROM tb_admin';
	if($id > 0){
		$sql.= ' WHERE cd_admin = '.$id;
    }
    else{
        $sql.= ' ORDER by nm_admin';
    }
	$res = $GLOBALS['conecta']->query($sql);
	return $res;
}
function AtualizarAdmin($cd,$nome,$email,$senha){
	$sql = 'UPDATE tb_admin SET nm_admin = "'.$nome.'", nm_email = "'.$email.'", cd_senha = "'.$senha.'" WHERE cd_admin = '.$cd;
	$res = $GLOBALS['conecta']->query($sql);
	return ($res) ? true : false;
}
function ExcluirAdmin($cd){
	$sql = 'DELETE FROM tb_admin WHERE cd_admin = '.$cd;
	$res = $GLOBALS['conecta']->query($sql);
	return ($res) ? true : false;
}