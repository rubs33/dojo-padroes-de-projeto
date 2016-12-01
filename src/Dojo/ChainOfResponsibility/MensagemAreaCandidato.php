<?php 

namespace Dojo\ChainOfResponsibility;

use Dojo\ChainOfResponsibility\DadosUsuario;

class MensagemAreaCandidato
{
    public function getMensagemPrioritaria(DadosUsuario $usuario)
    {
        $mensagemErro = $this->getDadosMensagemErro($usuario);
        if ($mensagemErro) {
            return $mensagemErro;
        }

        $mensagemAlerta = $this->getDadosMensagemAlerta($usuario);
        if ($mensagemAlerta) {
            return $mensagemAlerta;
        }

        return false;
    }

    private function getDadosMensagemErro(DadosUsuario $usuario)
    {
        if ($usuario->getStatus() == "T") {
            return "Usuario Temporário";
        }

        if ($usuario->getStatus() == "S") {
            return "Usuario Suspenso";
        }

        if ($usuario->getCancelamentoProgramado() == true) {
            return "Cancelamento Programado";
        }

        return false;
    }

    private function getDadosMensagemAlerta(DadosUsuario $usuario)
    {
        if ($usuario->getDebitoAutorizado() == false) {
            return "Débito Não Autorizado";
        }

        if ($usuario->getEmCobranca() == true) {
            return "Em Cobranca";
        }

        return false;
    }
}