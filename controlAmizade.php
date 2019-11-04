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

        case 'desfazer':
            $solicitante = $_POST['solicitante'];
            $solicitado = $_POST['solicitado'];
            if(AceitarAmizade($solicitante,$solicitado)){
                echo "Amizade desfeita";
            }else{
                echo "Erro ao desfazer";
            }
        break;
        
        case 'verifica':
            $cd = $_POST['cd'];
            if(AceitarAmizade($solicitante,$solicitado)){
                echo "Amizade desfeita";
            }else{
                echo "Erro ao desfazer";
            }
        break;

        case 'listar':
        break;
    }
}