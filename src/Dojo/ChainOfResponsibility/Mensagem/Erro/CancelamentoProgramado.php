<?php

namespace Dojo\ChainOfResponsibility\Mensagem\Erro;

use Dojo\ChainOfResponsibility\Mensagem\AbstractMensagem;
use Dojo\ChainOfResponsibility\DadosUsuario;

class CancelamentoProgramado extends AbstractMensagem
{
    public function podeExibir()
    {
        return $this->getUsuario()->getCancelamentoProgramado();
    }

    public function getDados()
    {
        return 'Cancelamento Programado';
    }
}