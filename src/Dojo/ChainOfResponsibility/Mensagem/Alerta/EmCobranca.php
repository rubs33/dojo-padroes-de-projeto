<?php

namespace Dojo\ChainOfResponsibility\Mensagem\Alerta;

use Dojo\ChainOfResponsibility\Mensagem\AbstractMensagem;
use Dojo\ChainOfResponsibility\DadosUsuario;

class EmCobranca extends AbstractMensagem
{
    public function podeExibir()
    {
        return $this->getUsuario()->getEmCobranca();
    }

    public function getDados()
    {
        return 'Em Cobranca';
    }
}