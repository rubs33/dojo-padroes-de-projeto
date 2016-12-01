<?php 

use PHPUnit_Framework_TestCase;
use Dojo\ChainOfResponsibility\MensagemAreaCandidato;

class MensagemAreaCandidatoTest extends PHPUnit_Framework_TestCase
{
	public function testTeste()
	{
		$mensagemAreaCandidato = new MensagemAreaCandidato();

		$this->assertEquals(
			$mensagemAreaCandidato->getMensagemPrioritaria(),
			"emCobranca"
		);
	}
}