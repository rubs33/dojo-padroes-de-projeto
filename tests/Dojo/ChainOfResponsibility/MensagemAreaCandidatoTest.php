<?php 

use PHPUnit_Framework_TestCase;

use Dojo\ChainOfResponsibility\MensagemAreaCandidato;
use Dojo\ChainOfResponsibility\DadosUsuario;

class MensagemAreaCandidatoTest extends PHPUnit_Framework_TestCase
{
	public function testRetornaNenhumaMesagemDeErro()
	{
		$dadosUsuario = new DadosUsuario();
		$dadosUsuario->setStatus("A");
		$dadosUsuario->setDebitoAutorizado(true);

		$mensagemAreaCandidato = new MensagemAreaCandidato();

		$this->assertEquals(
			$mensagemAreaCandidato->getMensagemPrioritaria($dadosUsuario),
			false
		);
	}

	public function testRetornaMensagemDeErroDeUsuarioTemporario()
	{
		$dadosUsuario = new DadosUsuario();
		$dadosUsuario->setStatus("T");
		$dadosUsuario->setDebitoAutorizado(true);		

		$mensagemAreaCandidato = new MensagemAreaCandidato();

		$this->assertEquals(
			$mensagemAreaCandidato->getMensagemPrioritaria($dadosUsuario),
			"Usuario Temporário"
		);
	}

	public function testRetornaMensagemDeErroDeUsuarioSuspenso()
	{
		$dadosUsuario = new DadosUsuario();
		$dadosUsuario->setStatus("S");
		$dadosUsuario->setDebitoAutorizado(true);		

		$mensagemAreaCandidato = new MensagemAreaCandidato();

		$this->assertEquals(
			$mensagemAreaCandidato->getMensagemPrioritaria($dadosUsuario),
			"Usuario Suspenso"
		);
	}

	public function testRetornaMensagemDeErroDeUsuarioComCancelamentoProgramado()
	{
		$dadosUsuario = new DadosUsuario();
		$dadosUsuario->setStatus("A");
		$dadosUsuario->setCancelamentoProgramado(true);

		$mensagemAreaCandidato = new MensagemAreaCandidato();

		$this->assertEquals(
			$mensagemAreaCandidato->getMensagemPrioritaria($dadosUsuario),
			"Cancelamento Programado"
		);
	}

	public function testRetornaMensagemDeAlertaDeDebitoNaoAutorizado()
	{
		$dadosUsuario = new DadosUsuario();
		$dadosUsuario->setStatus("A");
		$dadosUsuario->setDebitoAutorizado(false);

		$mensagemAreaCandidato = new MensagemAreaCandidato();

		$this->assertEquals(
			$mensagemAreaCandidato->getMensagemPrioritaria($dadosUsuario),
			"Débito Não Autorizado"
		);		
	}

	public function testRetornaMensagemDeAlertaQueUsuarioEstaEmCobranca()
	{
		$dadosUsuario = new DadosUsuario();
		$dadosUsuario->setStatus("A");
		$dadosUsuario->setDebitoAutorizado(true);
		$dadosUsuario->setEmCobranca(true);

		$mensagemAreaCandidato = new MensagemAreaCandidato();

		$this->assertEquals(
			$mensagemAreaCandidato->getMensagemPrioritaria($dadosUsuario),
			"Em Cobranca"
		);		
	}	
}