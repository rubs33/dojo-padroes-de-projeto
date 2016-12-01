<?php

namespace Dojo\ChainOfResponsibility;

class DadosUsuario
{
    private $status;
    private $cancelamentoProgramado;
    private $debitoAutorizado;
    private $emCobranca;

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getCancelamentoProgramado()
    {
        return $this->cancelamentoProgramado;
    }

    public function setCancelamentoProgramado($cancelamentoProgramado)
    {
        $this->cancelamentoProgramado = $cancelamentoProgramado;
        return $this;
    }   

    public function getDebitoAutorizado()
    {
        return $this->debitoAutorizado;
    }

    public function setDebitoAutorizado($debitoAutorizado)
    {
        $this->debitoAutorizado = $debitoAutorizado;
        return $this;
    }

    public function getEmCobranca()
    {
        return $this->emCobranca;
    }

    public function setEmCobranca($emCobranca)
    {
        $this->emCobranca = $emCobranca;
        return $this;
    }       
}