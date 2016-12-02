<?php

namespace Dojo\ChainOfResponsibility\Mensagem;

use Dojo\ChainOfResponsibility\DadosUsuario;

abstract class AbstractMensagem
{
    protected $usuario;
    protected $valorPadrao;
    protected $proximo;

    abstract public function podeExibir();

    abstract public function getDados();

    public function setValorPadrao($valorPadrao)
    {
        $this->valorPadrao = $valorPadrao;
    }

    public function setProximo(self $proximo)
    {
        $this->proximo = $proximo;
    }

    public function setUsuario(DadosUsuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getDadosMensagem(DadosUsuario $usuario)
    {
        $this->setUsuario($usuario);
        if ($this->podeExibir()) {
            return $this->getDados();
        }
        if ($this->proximo instanceof self) {
            return $this->proximo->getDadosMensagem($usuario);
        }
        return $this->valorPadrao;
    }
}