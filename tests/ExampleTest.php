<?php

use RonaldMirabal\ConsultasDgiiRnc\ConsultasDgiiRnc;

test('it returns a message when consulting rnc', function () {
    $rncConsultor = new ConsultasDgiiRnc;
    $rnc = '101027797';

    $resultado = $rncConsultor->consultarRnc($rnc);

    // Verificamos que el resultado sea exitoso
    $this->assertTrue($resultado->success, 'La consulta no fue exitosa.');
    $this->assertTrue(property_exists($resultado, 'CedulaORnc'));
    $this->assertTrue(property_exists($resultado, 'NombreComercial'));
});

test('devuelve_error_para_rnc_invalido', function () {
    $rncConsultor = new ConsultasDgiiRnc;
    $rncInvcalido = '521625262626';

    $resultado = $rncConsultor->consultarRnc($rncInvcalido);

    $this->assertFalse($resultado->success);
    $this->assertNotEmpty($resultado->message);
});
