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
		$sql.= ' WHERE cd_usuario = "'.$id.'"';
    }
    else{
        $sql.= ' ORDER by nm_usuario';
    }
	$res = $GLOBALS['conecta']->query($sql);
	return $res;
}

function ListarUsuarioEmail($email){
	$sql = 'SELECT * FROM tb_usuario WHERE ds_email = "'.$email.'"';
	$res = $GLOBALS['conecta']->query($sql);
	return $res;
}

function AtualizarUsuario($cd,$nome,$bio,$cidade,$dtnascimento){
	$sql = 'UPDATE tb_usuario 
            SET nm_usuario = "'.$nome.'", ds_bio_usuario = "'.$bio.'", 
            ds_cidade = "'.$cidade.'", dt_nascimento = "'.$dtnascimento.'"
            WHERE cd_usuario = '.$cd;
	$res = $GLOBALS['conecta']->query($sql);
	return ($res) ? true : false;
}

function AtualizarCadastro($cd,$nome,$email){
	$sql = 'UPDATE tb_usuario 
            SET nm_usuario = "'.$nome.'", ds_email = "'.$email.'" WHERE cd_usuario = '.$cd;
	$res = $GLOBALS['conecta']->query($sql);
	return ($res) ? true : false;
}

function ExcluirUsuario($cd){
	$sql = 'DELETE FROM tb_usuario WHERE cd_usuario = '.$cd;
	$res = $GLOBALS['conecta']->query($sql);
	return ($res) ? true : false;
}
function LoginUsuario($email,$senha){
    $sql = 'SELECT * FROM tb_usuario  WHERE ds_email = "'.$email.'" AND ds_senha = "'.$senha.'"';
    $res = $GLOBALS['conecta']->query($sql);
    if(mysqli_num_rows($res) > 0){
        return 1;
    }else{
        return 0;
    }
}