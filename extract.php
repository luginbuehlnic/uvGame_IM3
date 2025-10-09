<?php

function fetchUvData() {

    $url = [
       'Berlin' => 'https://currentuvindex.com/api/v1/uvi?latitude=52.5162&longitude=13.3777',
       'London' => 'https://currentuvindex.com/api/v1/uvi?latitude=51.5072&longitude=-0.1275',
       'Cophenhagen' => 'https://currentuvindex.com/api/v1/uvi?latitude=55.6786&longitude=12.5635',
        'Paris' => 'https://currentuvindex.com/api/v1/uvi?latitude=48.8566&longitude=2.3522',
        'Barcelona' => 'https://currentuvindex.com/api/v1/uvi?latitude=41.3825&longitude=2.1769',
        'Rome' => 'https://currentuvindex.com/api/v1/uvi?latitude=41.8931&longitude=12.4828',
        'Acropolis' => 'https://currentuvindex.com/api/v1/uvi?latitude=37.7908&longitude=23.7611',
        'Budapest' => 'https://currentuvindex.com/api/v1/uvi?latitude=47.4983&longitude=19.0408',
        'Valais' => 'https://currentuvindex.com/api/v1/uvi?latitude=45.9764&longitude=7.6586', 
        'Stonehenge' => 'https://currentuvindex.com/api/v1/uvi?latitude=51.1788&longitude=-1.8262'
    ];

    $response = [];
    foreach($url as $city => $link) {
        // Initialisiert eine cURL-Sitzung
        $ch = curl_init($link);

         // Setzt Optionen
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response[$city] = json_decode(curl_exec($ch),true);
        curl_close($ch);
    };

    return $response;

    // echo "<pre>";
    // print_r($response);
    // echo "</pre>";

    //  // Initialisiert eine cURL-Sitzung
    // $ch = curl_init($url);

    //  // Setzt Optionen
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


    // Führt die cURL-Sitzung aus und erhält den Inhalt
    // $response = curl_exec($ch);

    // Schließt die cURL-Sitzung
    // curl_close($ch);

    // Dekodiert die JSON-Antwort und gibt Daten zurück
    // return json_decode($response, true);
    // print_r($response);
}


return fetchUvData();
?>