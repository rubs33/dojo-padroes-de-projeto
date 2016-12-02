<?php

namespace Dojo\ChainOfResponsibility\Mensagem\Erro;

use Dojo\ChainOfResponsibility\Mensagem\AbstractMensagem;
use Dojo\ChainOfResponsibility\DadosUsuario;

class UsuarioSuspenso extends AbstractMensagem
{
    public function podeExibir()
    {
        return $this->getUsuario()->getStatus() == 'S';
    }

    public function getDados()
    {
        return 'Usuario Suspenso';
    }
}