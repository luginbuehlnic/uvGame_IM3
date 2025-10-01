<?php

$name="Nicolas";
$born=2003;
$year=2025;

// echo $name;
// echo "<br>";
// echo $year - $born;

//function
$note = 5;

if ($note >= 4) {
    echo "Bestanden";
} else if ($note < 4 && $note >= 3.5) {
    echo "Nachprüfung";
} else {
    echo "Nicht Bestanden";
}

// array -> console log
echo "<br>";
echo "ARRAYS & Print";
$fruits = ['Banane', 'Apfel', 'Birne'];

print_r($fruits);
echo "<br>";

echo "<pre>";
print_r($fruits);
echo "<br>";

echo "<pre>";
print_r($fruits[2]);
echo "<br>";

echo $fruits[1];
echo "<br>";

//loops
echo "<br>";
echo "LOOPS";
echo "<br>";

foreach ($fruits as $item) {
    echo $item . "<br>";
}


// associative arrays / objekte
echo "<br>";
echo "<br>";
echo "associative arrays";
echo "<br>";
echo "<br>";

$standorte = [
    'Chur' => 15.4,
    'Zürich' => 20.3,
    'Bern' => 18.5
];

echo "<pre>";
print_r($standorte);
echo "<br>";

echo $standorte['Zürich'];
echo "<br>";

foreach ($standorte as $ort => $temperatur) {
    echo $ort . " " . $temperatur . "<br>";
};