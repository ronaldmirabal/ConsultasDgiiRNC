# Es un paquete desarrollado para consultar el estado del rnc del contribuyente en República Dominicana.

Este paquete ha sido desarrollado tomando como inspiración el proyecto [ConsultasDgii](https://github.com/wrobirson/ConsultasDgii) Su objetivo es ofrecer funcionalidades similares de manera más sencilla y adaptada, aprovechando las buenas prácticas de Laravel para facilitar su integración y uso en proyectos propios.


## 📦 Instalación

Puedes instalar el paquete a través de composer:

```bash
composer require ronaldmirabal/consultas-dgii-rnc
```

## :clipboard: Requisitos
- PHP ^8.3
- Laravel ^10.0


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
## :rotating_light: Manejo de Errores
```php
if (!resultado.success)
{
    $this->info("Ocurrió un error en la consulta.");
    $this->info($resultado->message);
}

```
## :rotating_light: Variables Accesibles
```php
[
    'CedulaORnc'          => 'Número de RNC o Cédula',
    'NombreORazonSocial'  => 'Nombre o Razón Social del contribuyente',
    'NombreComercial'     => 'Nombre comercial registrado',
    'RegimenDePagos'      => 'Régimen de pagos del contribuyente',
    'Categoria'           => 'Categoría fiscal asignada',
    'Estado'              => 'Estado actual (activo/inactivo)',
    'ActividadEconomica'  => 'Actividad económica principal',
    'AdministracionLocal' => 'Administración local correspondiente',
    'success'             => true // Indica si la consulta fue exitosa
]
```

## :white_check_mark: Testing

```bash
composer test
```
## Credits

- [Ronald Mirabal](https://github.com/ronaldmirabal)
- [All Contributors](../../contributors)

## 📄 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
