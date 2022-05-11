<?php
// URL de teste
// https://troca-gtm-dinamicamente.ddev.site/?utm_source=googleTeste&utm_medium=banner&utm_campaign=campanhaTeste&cmp=cmpTeste&empresa=1001

define('DOMINIO', 'https://troca-gtm-dinamicamente.ddev.site/');

/*define('EMPRESAS', [
    'transportal' => 'GTM-W7VC35H',
    '1001' => 'GTM-W292ZFK',
    'brisa' => 'GTM-M5PD7RN',
    'util' => 'GTM-PVHLT5Q'
]);*/

/**
 * Método responsável por realizar a requisição na API
 * @param String $url Url para a requisição
 * @return Array|Boolean Retorna um array com os dados da API ou retorna false
 */
function webRequest($url)
{
    //$url = 'https://routeapi.brasilbybus.com/routes/search?origin=95067E0B6A5D475AB712A3AB27B6C4F4&destination=858ECB5DC41411E3AB2E00155D12D27A&date=05-28-2022';
    //fazendo a conex�o com a url
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    //definindo o metodo que ser� passado a url
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    //dizendo que se houver redirecionamento, � para fazer
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //compactando a requisi��o com o gzip
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    //definindo o cabe�alho da requisi��o
    /*curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'X-Api-Key:dfea82e8b7cb457aa45827efff301c78'
            )
        );*/
    //recendo o resultado da requisi��o
    $resultado = curl_exec($ch);

    //se n�o houver nenhum resultado, retorna false
    if ($resultado) {
        //transformando o json e um array php
        //eles usam array associativo e bidimencional
        $array = json_decode($resultado, true);
        curl_close($ch);
        return $array;
    } else {
        return FALSE;
    }
}
