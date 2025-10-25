<?php

namespace RonaldMirabal\ConsultasDgiiRnc;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ConsultasDgiiRnc
{
    protected string $baseUrl = 'https://dgii.gov.do/app/WebApps/ConsultasWeb2/ConsultasWeb/consultas/rnc.aspx';

    //
    public function consultarRnc(string $rnc)
    {
        $client = new Client(['cookies' => true]);

        // 1️⃣ Cargar la página inicial (GET)
        $response = $client->get($this->baseUrl);
        $html = (string) $response->getBody();
        $crawler = new Crawler($html);

        // 2️⃣ Extraer los valores ocultos del formulario ASP.NET
        $viewState = $crawler->filter('input[name="__VIEWSTATE"]')->attr('value');
        $eventValidation = $crawler->filter('input[name="__EVENTVALIDATION"]')->attr('value');
        $viewStateGenerator = $crawler->filter('input[name="__VIEWSTATEGENERATOR"]')->attr('value');

        // 3️⃣ Construir los datos del formulario
        $formData = [
            'ctl00$smMain' => 'ctl00$cphMain$upBusqueda|ctl00$cphMain$btnBuscarPorRNC',
            'ctl00$cphMain$txtRNCCedula' => $rnc,
            'ctl00$cphMain$txtRazonSocial' => '',
            '__EVENTTARGET' => '',
            '__EVENTARGUMENT' => '',
            '__VIEWSTATEGENERATOR' => $viewStateGenerator,
            '__VIEWSTATE' => $viewState,
            '__EVENTVALIDATION' => $eventValidation,
            '__ASYNCPOST' => 'true',
            'ctl00$cphMain$btnBuscarPorRNC' => 'BUSCAR',
        ];

        // 4️⃣ Enviar la solicitud POST
        $response = $client->post($this->baseUrl, [
            'form_params' => $formData,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0',
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
        ]);

        $htmlResponse = (string) $response->getBody();
        $crawler = new Crawler($htmlResponse);

        // 5️⃣ Buscar los datos del contribuyente
        $dataSection = $crawler->filter('#cphMain_dvDatosContribuyentes');
        $dataRNC = trim($crawler->filterXPath('//tr[1]/td[2]')->count());

        $responseData = [
            'success' => false,
            'message' => null,
        ];

        if ($dataSection->count() > 0 && $dataRNC > 0) {
            $responseData = [
                'CedulaORnc' => $crawler->filterXPath('//tr[1]/td[2]')->count() ? trim($crawler->filterXPath('//tr[1]/td[2]')->text()) : null,
                'NombreORazonSocial' => $crawler->filterXPath('//tr[2]/td[2]')->count() ? trim($crawler->filterXPath('//tr[2]/td[2]')->text()) : null,
                'NombreComercial' => $crawler->filterXPath('//tr[3]/td[2]')->count() ? trim($crawler->filterXPath('//tr[3]/td[2]')->text()) : null,
                'RegimenDePagos' => $crawler->filterXPath('//tr[5]/td[2]')->count() ? trim($crawler->filterXPath('//tr[5]/td[2]')->text()) : null,
                'Categoria' => $crawler->filterXPath('//tr[5]/td[4]')->count() ? trim($crawler->filterXPath('//tr[5]/td[4]')->text()) : null,
                'Estado' => $crawler->filterXPath('//tr[6]/td[2]')->count() ? trim($crawler->filterXPath('//tr[6]/td[2]')->text()) : null,
                'ActividadEconomica' => $crawler->filterXPath('//tr[7]/td[2]')->count() ? trim($crawler->filterXPath('//tr[7]/td[2]')->text()) : null,
                'AdministracionLocal' => $crawler->filterXPath('//tr[8]/td[2]')->count() ? trim($crawler->filterXPath('//tr[8]/td[2]')->text()) : null,
                'success' => true,
            ];
        } else {
            $responseData['message'] = $crawler->filter('#cphMain_lblInformacion')->count()
                ? trim($crawler->filter('#cphMain_lblInformacion')->text())
                : 'No se encontró información para este RNC.';
        }

        return (object) $responseData;
    }
}
