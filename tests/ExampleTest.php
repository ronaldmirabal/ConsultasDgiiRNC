<?php

use RonaldMirabal\ConsultasDgiiRnc\ConsultasDgiiRnc;

test('it returns a message when consulting rnc', function () {
    $rncConsultor = new ConsultasDgiiRnc;
    $rnc = '101027797';
    $expected = "consultar rnc: Procesando {$rnc}... (Respuesta simulada)";

    $resultado = $rncConsultor->consultarRnc($rnc);

    // Verificamos que el resultado sea exitoso
    $this->assertTrue($resultado['success'], 'La consulta no fue exitosa.');
    $this->assertArrayHasKey('CedulaORnc', $resultado);
    $this->assertArrayHasKey('NombreORazonSocial', $resultado);
});

test('devuelve_error_para_rnc_invalido', function () {
    $rncConsultor = new ConsultasDgiiRnc;
    $rncInvcalido = '521625262626';
    $expected = "consultar rnc: Procesando {$rncInvcalido}... (Respuesta simulada)";

    $resultado = $rncConsultor->consultarRnc($rncInvcalido);

    $this->assertFalse($resultado['success']);
    $this->assertNotEmpty($resultado['message']);
});
