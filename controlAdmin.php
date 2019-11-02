<?php
include('funcoesAdmin.php');

if($_POST){
    switch($_GET['acao']){
        case 'cadastrar':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            if(CadastrarAdmin($nome,$email,$senha)){
                echo 'Cadastrado com Sucesso';
            }else{
                echo 'Erro ao cadastrar';
            }
        break;

        case 'listar':
            $cd = $_POST['cd'];
            if($cd > 0){
                $consulta = ListarAdmin($cd);
                while($admin = $consulta->fetch_array()){
                    $registros = array(
                    'admin' => array(
                        'codigo' => $admin['cd_admin'],
                        'nome' => $admin['nm_admin'],
                        'email' => $admin['ds_email'],
                        'senha' => $admin['ds_senha']
                    ));
                }
            }else{
                $consulta = ListarAdmin(0);
                $registros = array(
                    'admin'=>array()
                );
                $i = 0;
                while($admin = $consulta->fetch_array()){
                    $registros['admin'][$i] = array(
                        'codigo' => $admin['cd_admin'],
                        'nome' => $admin['nm_admin'],
                        'email' => $admin['ds_email'],
                        'senha' => $admin['ds_senha']
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
            if(AtualizarAdmin($cd,$nome,$email,$senha)){
                echo 'Atualizado com Sucesso';
            }else{
                echo 'Erro ao atualizar';
            }
        break;
        
        case 'excluir':
            $cd = $_POST['cd'];
            if(ExcluirAdmin($cd)){
                echo 'Excluido com Sucesso';
            }else{
                echo 'Erro ao excluir';
            }
        break;
    }
}