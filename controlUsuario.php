<?php
include('funcoesUsuario.php');

if($_POST){
    switch($_GET['acao']){
        case 'cadastrar':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            if(CadastrarUsuario($nome,$email,$senha)){
                echo 'Cadastrado com Sucesso';
            }else{
                echo 'Erro ao cadastrar';
            }
        break;

        case 'listar':
            $cd = $_POST['cd'];
            if($cd > 0){
                $consulta = ListarUsuario($cd);
                while($usuario = $consulta->fetch_array()){
                    $registros = array(
                    'usuario' => array(
                        'codigo' => $usuario['cd_usuario'],
                        'nome' => $usuario['nm_usuario'],
                        'email' => $usuario['ds_email'],
                        'senha' => $usuario['ds_senha'],
                        'bio' => $usuario['ds_bio_usuario'],
                        'cidade' => $usuario['ds_cidade'],
                        'dt_nascimento' => $usuario['dt_nascimento']
                    ));
                }
            }else{
                $consulta = ListarUsuario(0);
                $registros = array(
                    'usuario'=>array()
                );
                $i = 0;
                while($usuario = $consulta->fetch_array()){
                    $registros['usuario'][$i] = array(
                        'codigo' => $usuario['cd_usuario'],
                        'nome' => $usuario['nm_usuario'],
                        'email' => $usuario['ds_email'],
                        'senha' => $usuario['ds_senha'],
                        'bio' => $usuario['ds_bio_usuario'],
                        'cidade' => $usuario['ds_cidade'],
                        'dt_nascimento' => $usuario['dt_nascimento']
                    );
                    $i++;
                }
            }
            echo json_encode($registros);
        break;

        case 'editar':
            $cd = $_POST['cd'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $bio = $_POST['bio'];
            $cidade = $_POST['cidade'];
            $dtnascimento = $_POST['dtnascimento'];
            if(AtualizarUsuario($cd,$nome,$email,$senha,$bio,$cidade,$dtnascimento)){
                echo 'Atualizado com Sucesso';
            }else{
                echo 'Erro ao atualizar';
            }
        break;
        
        case 'excluir':
            $cd = $_POST['cd'];
            if(ExcluirUsuario($cd)){
                echo 'Excluido com Sucesso';
            }else{
                echo 'Erro ao excluir';
            }
        break;
    }
}