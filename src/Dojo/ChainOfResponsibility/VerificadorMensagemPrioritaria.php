<?php

namespace Dojo\ChainOfResponsibility;

final class VerificadorMensagemPrioritaria
{
    protected $fila;

    public function __construct(array $mensagens, $valorPadrao = null)
    {
        if (empty($mensagens)) {
            throw new \InvalidArgumentException('Array de mensagens nao pode ser vazio');
        }

        $this->fila = array_shift($mensagens);

        $referencia = $this->fila;
        while (!empty($mensagens)) {
            $mensagem = array_shift($mensagens);
            $referencia->setProximo($mensagem);
            $referencia = $mensagem;
        }

        $referencia->setValorPadrao($valorPadrao);
    }

    public function getDadosMensagem(DadosUsuario $usuario)
    {
        return $this->fila->getDadosMensagem($usuario);
    }
}