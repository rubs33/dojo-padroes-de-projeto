<?php

namespace Dojo\ChainOfResponsibility;

use Dojo\ChainOfResponsibility\Mensagem\AbstractMensagem;

final class VerificadorMensagemPrioritaria
{
    protected $mensagens;
    protected $valorPadrao;

    public function __construct(array $mensagens, $valorPadrao = null)
    {
        $this->validarMensagens($mensagens);
        $this->mensagens = $mensagens;
        $this->valorPadrao = $valorPadrao;
    }

    public function getDadosMensagem(DadosUsuario $usuario)
    {
        foreach ($this->mensagens as $mensagem) {
            $mensagem->setUsuario($usuario);
            if ($mensagem->podeExibir()) {
                return $mensagem->getDados();
            }
        }
        return $this->valorPadrao;
    }

    private function validarMensagens(array $mensagens)
    {
        if (empty($mensagens)) {
            throw new \InvalidArgumentException('Array de mensagens nao pode ser vazio');
        }

        foreach ($mensagens as $mensagem) {
            if (!($mensagem instanceof AbstractMensagem)) {
                throw new \InvalidArgumentException('Array contendo valor invalido');
            }
        }
    }
}