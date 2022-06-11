<?php

require __DIR__ . "/vendor/autoload.php";

use App\Ulvis\UrlShortener;

new class
{
    function __construct()
    {
        try {
            $urlDefault = "https://www.youtube.com/watch?v=QcDhRWmRgWo";
            echo $urlDefault . "\n";
            echo UrlShortener::short($urlDefault);
        } catch (Exception $ex) {
            echo json_encode([
                "status"   => 500,
                "response" => $ex->getMessage()
            ]);
        }
    }
};
