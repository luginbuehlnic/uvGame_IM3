<?php

$data = include('extract.php');

// $locationsMap = [
//     'Berlin' => [
//         'latitude' => 52.5162,
//         'longitude' => 13.3777,
//         'country' => 'Germany'
//     ],
//     'London' => [
//         'latitude' => 51.5072,
//         'longitude' => -0.1275,
//         'country' => 'England'
//     ],
//     'Cophenhagen' => [
//         'latitude' => 55.6786,
//         'longitude' => 12.5635,
//         'country' => 'Denmark'
//     ],
//     'Paris' => [
//         'latitude' => 48.8566,
//         'longitude' => 2.3522,
//         'country' => 'France'
//     ],
//     'Barcelona' => [
//         'latitude' => 41.3825,
//         'longitude' => 2.1769,
//         'country' => 'Spain'
//     ],
//     'Rome' => [
//         'latitude' => 41.8931,
//         'longitude' => 12.4828,
//         'country' => 'Italy'
//     ],
//     'Acropolis' => [
//         'latitude' => 37.7908,
//         'longitude' => 23.7611,
//         'country' => 'Greece'
//     ],
//     'Budapest' => [
//         'latitude' => 47.4983,
//         'longitude' => 19.0408,
//         'country' => 'Hungary'
//     ],
//     'Valais' => [
//         'latitude' => 45.9764,
//         'longitude' => 7.6586,
//         'country' => 'Switzerland'
//     ],
//     'Stonehenge' => [
//         'latitude' => 51.1788,
//         'longitude' => -1.8262,
//         'country' => 'England'
//     ],
// ];

$countryMap = [
    'Berlin' => 'Germany',
    'London' => 'England',
    'Cophenhagen' => 'Denmark',
    'Paris' => 'France',
    'Barcelona' => 'Spain',
    'Rome' => 'Italy',
    'Acropolis' => 'Greece',
    'Budapest' => 'Hungary',
    'Valais' => 'Switzerland',
    'Stonehenge' => 'England'
];

function convertDateTime($datetime){
    //TODO
};

$transformedData = [];

foreach($data as $city => $info){
    // echo "City: ";
    // echo $city;
    // echo ", ";
    // print_r($countryMap[$city]);
    // echo "<br>";
    // print_r('uvi: ');
    // print_r($info['now']['uvi']);
    // echo "<br>";
    // print_r('time: ');
    // print_r($info['now']['time']);
    // echo "<br>";
    // print_r('latitude: ');
    // print_r($info['latitude']);
    // echo "<br>";
    // print_r('longitude: ');
    // print_r($info['longitude']);
    // echo "<br>";
    // echo "<br>";

    // Konstruiert die neue Struktur mit allen angegebenen Feldern der DB
    $transformedData[] = [
        'location' => $city,
        'country' => $countryMap[$city],
        'latitude' => $info['latitude'],
        'longitude' => $info['longitude'],
        'datetime' => $info['now']['time'],
        'uvi' => $info['now']['uvi']
    ];
};

$jsonData = json_encode($transformedData, true);
// print_r($jsonData);

return $jsonData;


?>