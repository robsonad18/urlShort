<?php 

namespace App\Ulvis;

class UrlShortener
{
    /**
     * Metodo responsavel por encurtar uma url
     *
     * @param string $url
     * @return string
     */
    static function short(string $url):string
    {
        $parms = [
            "url" => $url
        ];

        $response = self::send($parms);

        return $response["data"]["url"] ?? "";
    }

    /**
     * Metodo responsavel por executar a requisição
     *
     * @param array $params
     * @return array|null
     */
    private static function send(array $params):?array
    {
        $endpoint = "https://ulvis.net/API/write/get?".http_build_query($params);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET"
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return strlen($response) ? json_decode($response, true) : [];
    }
}