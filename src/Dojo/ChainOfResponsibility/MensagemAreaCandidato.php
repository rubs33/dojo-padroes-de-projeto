<?php

namespace Dojo\ChainOfResponsibility;

use Dojo\ChainOfResponsibility\Mensagem\Erro\UsuarioTemporario as MensagemErroUsuarioTemporario;
use Dojo\ChainOfResponsibility\Mensagem\Erro\UsuarioSuspenso as MensagemErroUsuarioSuspenso;
use Dojo\ChainOfResponsibility\Mensagem\Erro\CancelamentoProgramado as MensagemErroCancelamentoProgramado;
use Dojo\ChainOfResponsibility\Mensagem\Alerta\DebitoNaoAutorizado as MensagemAlertaDebitoNaoAutorizado;
use Dojo\ChainOfResponsibility\Mensagem\Alerta\EmCobranca as MensagemAlertaEmCobranca;

class MensagemAreaCandidato
{
    public function getMensagemPrioritaria(DadosUsuario $usuario)
    {
        $verificadorMensagemPrioritaria = new VerificadorMensagemPrioritaria(
            [
                new MensagemErroUsuarioTemporario(),
                new MensagemErroUsuarioSuspenso(),
                new MensagemErroCancelamentoProgramado(),
                new MensagemAlertaDebitoNaoAutorizado(),
                new MensagemAlertaEmCobranca()
            ],
            false
        );

        return $verificadorMensagemPrioritaria->getDadosMensagem($usuario);
    }
}