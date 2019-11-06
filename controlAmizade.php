<?php
include_once("funcoesAmizade.php");

if($_POST){
    switch($_GET['acao']){
        case 'solicitar':
        $solicitante = $_POST['solicitante'];
        $solicitado = $_POST['solicitado'];
        if(PedirAmizade($solicitante,$solicitado)){
            echo "Solicitação Enviada";
        }else{
            echo "Erro ao Solicitar";
        }
        break;

        case 'aceitar':
            $solicitante = $_POST['solicitante'];
            $solicitado = $_POST['solicitado'];
            if(AceitarAmizade($solicitante,$solicitado)){
                echo "Solicitação Aceita";
            }else{
                echo "Erro ao Aceitar";
            }
        break;

        case 'negar':
            $solicitante = $_POST['solicitante'];
            $solicitado = $_POST['solicitado'];
            if(DesfazerAmizade($solicitante,$solicitado)){
                echo "Solicitação Negada";
            }else{
                echo "Erro ao negar";
            }
        break;

        case 'desfazer':
            $solicitante = $_POST['solicitante'];
            $solicitado = $_POST['solicitado'];
            if(DesfazerAmizade($solicitante,$solicitado) || DesfazerAmizade($solicitado,$solicitante)){
                echo "Amizade desfeita";
            }else{
                echo "Erro ao desfazer";
            }
        break;
        
        case 'verifica':
            $solicitante = $_POST['solicitante'];
            $solicitado = $_POST['solicitado'];
            if((VerificaAmizade($solicitante,$solicitado) == true) || (VerificaAmizade($solicitado,$solicitante) == true)){
                echo "1";
            }else{
                echo "0";
            }
        break;

        case 'verificaSolicitacao':
            $solicitante = $_POST['solicitante'];
            $solicitado = $_POST['solicitado'];
            if(VerificaSolicitacaoAmizade($solicitante,$solicitado) == true){
                echo "1"; //enviado
            }
            else if(VerificaSolicitacaoAmizade($solicitado,$solicitante) == true){
                echo "2"; //recebido
            }
            else{
                echo "0";
            }
        break;

        case 'listar':
        $cd = $_POST['cd'];
        $consulta = ListarAmizade($cd);
        $registros = array(
            'amizade'=>array()
        );
        $i = 0;
        while($amizade = $consulta->fetch_array()){
            $registros['amizade'][$i] = array(
                'codigo' => $amizade['cd_usuario'],
                'nome' => $amizade['nm_usuario']
            );
            $i++;
        }
        echo json_encode($registros);
        break;

        case 'solicitacoes':
        $cd = $_POST['cd'];
        $consulta = ListarSolicitacaoAmizade($cd);
        $registros = array(
            'solicitacao'=>array()
        );
        $i = 0;
        while($solicitacao = $consulta->fetch_array()){
            $registros['solicitacao'][$i] = array(
                'codigo' => $solicitacaoamizade['cd_usuario'],
                'nome' => $solicitacaoamizade['nm_usuario']
            );
            $i++;
        }
        echo json_encode($registros);
        break;

        case 'pedidos':
        $cd = $_POST['cd'];
        $consulta = ListarPedidosAmizade($cd);
        $registros = array(
            'pedido'=>array()
        );
        $i = 0;
        while($pedido = $consulta->fetch_array()){
            $registros['pedido'][$i] = array(
                'codigo' => $pedido['cd_usuario'],
                'nome' => $pedido['nm_usuario']
            );
            $i++;
        }
        echo json_encode($registros);
        break;
    }
}