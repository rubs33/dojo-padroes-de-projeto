<?php

namespace Dojo\ChainOfResponsibility\Mensagem\Erro;

use Dojo\ChainOfResponsibility\Mensagem\AbstractMensagem;
use Dojo\ChainOfResponsibility\DadosUsuario;

class UsuarioTemporario extends AbstractMensagem
{
    public function podeExibir()
    {
        return $this->getUsuario()->getStatus() == 'T';
    }

    public function getDados()
    {
        return 'Usuario Temporário';
    }
}