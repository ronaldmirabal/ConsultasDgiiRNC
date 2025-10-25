# Es un paquete desarrollado para consultar el estado del rnc del contribuyente en República Dominicana.

Este paquete ha sido desarrollado tomando como inspiración el proyecto [ConsultasDgii](https://github.com/wrobirson/ConsultasDgii) Su objetivo es ofrecer funcionalidades similares de manera más sencilla y adaptada, aprovechando las buenas prácticas de Laravel para facilitar su integración y uso en proyectos propios.


## 📦 Instalación

Puedes instalar el paquete a través de composer:

```bash
composer require ronaldmirabal/consultas-dgii-rnc
```


## Como Usar - Consultar Contribuyente por RNC/Cédula

```php
use RonaldMirabal\ConsultasDgiiRnc\ConsultasDgiiRnc;

$rncConsultor = new ConsultasDgiiRnc;
$resultado = $rncConsultor->consultarRnc("[SU RNC]");

if ($resultado->success)
{
    $this->info("RNC/Cédula: {$resultado->CedulaORnc}");
    $this->info("Nombre Comercial: {$resultado->NombreComercial}");
}

```

## Testing

```bash
composer test
```
## Credits

- [Ronald Mirabal](https://github.com/ronaldmirabal)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
