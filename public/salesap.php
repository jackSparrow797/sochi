<?php

use GuzzleHttp\Client;

require '../vendor/autoload.php';

Class Salesap
{
    private $client;

    const TOKEN = '373324280d2f3e262b78656e235a16ae54fc100b619787fd985b8d6074b2cc52';

    /**
     * Salesap constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://app.salesap.ru/api/v1/',
            'headers' => [
                'Authorization' => "Bearer " . self::TOKEN,
                'Content-Type' => "application/vnd.api+json",
            ]
        ]);
    }

    /**
     * @param array $data
     * @return bool|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addContact(array $data)
    {
        try {
            $response = $this->client->request('POST', 'contacts', [
                'headers' => [
                    'Content-Type' => "application/vnd.api+json"
                ],
                'json' => $data,
            ]);
            $outJson = $response->getBody()->getContents();
            $out = json_decode($outJson, true);
            return $out;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return false;
        }
    }
}


 /**
  * тестирование проводил
  * только тут, хотя так делать нельзя,
  * но мое задание заключалось в том,чтобы разобраться в API, поэтому "Красивости не наводил"
  * можно еще кучу отрефакторить тут, как в конструкторе передавать урл и хардкод выпилить, но пока так, к сожалению времени мало
  *
  **/


$data = array(
    'data' =>
        array(
            'type' => 'contacts',
            'attributes' =>
                array(
                    'first-name' => 'Иван1',
                    'last-name' => 'Петров1',
                ),
        ),
);

$client = new Salesap();

$test = $client->addContact($data);

echo "<pre>";
print_r($test);
echo "</pre>";

