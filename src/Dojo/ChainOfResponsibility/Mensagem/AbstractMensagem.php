<?php

namespace Dojo\ChainOfResponsibility\Mensagem;

use Dojo\ChainOfResponsibility\DadosUsuario;

abstract class AbstractMensagem
{
    protected $usuario;

    abstract public function podeExibir();

    abstract public function getDados();

    public function setUsuario(DadosUsuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
}