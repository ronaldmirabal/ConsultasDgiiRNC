# Es un paquete desarrollado para consultar el estado del rnc del contribuyente en República Dominicana.

Este paquete ha sido desarrollado tomando como inspiración el proyecto [ConsultasDgii](https://github.com/wrobirson/ConsultasDgii) Su objetivo es ofrecer funcionalidades similares de manera más sencilla y adaptada, aprovechando las buenas prácticas de Laravel para facilitar su integración y uso en proyectos propios.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/consultas-dgii-rnc.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/consultas-dgii-rnc)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## 📦 Instalación

Puedes instalar el paquete a través de composer:

```bash
composer require ronaldmirabal/consultas-dgii-rnc
```


## Como Usar

```php
$consultasDgiiRnc = new RonaldMirabal\ConsultasDgiiRnc();
echo $consultasDgiiRnc->consultarRnc('101027797');
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
