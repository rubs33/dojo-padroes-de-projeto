<?php

namespace Dojo\ChainOfResponsibility\Mensagem\Alerta;

use Dojo\ChainOfResponsibility\Mensagem\AbstractMensagem;
use Dojo\ChainOfResponsibility\DadosUsuario;

class DebitoNaoAutorizado extends AbstractMensagem
{
    public function podeExibir()
    {
        return !$this->getUsuario()->getDebitoAutorizado();
    }

    public function getDados()
    {
        return 'Débito Não Autorizado';
    }
}