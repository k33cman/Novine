<?php
$data = json_decode(file_get_contents("php://input"), true);
$vesti_file = "../json/vesti.json";

$vesti = [];
if (file_exists($vesti_file)) {
    $vesti = json_decode(file_get_contents($vesti_file), true);
}

$max_id = 0;
foreach ($vesti as $v) {
    if ($v["id"] > $max_id) {
        $max_id = $v["id"];
    }
}

$n = [
    "id" => $max_id + 1,
    "naslov" => $data["naslov"],
    "tekst" => $data["tekst"],
    "kategorija" => $data["kategorija"],
    "datum" => $data["datum"],
    "slika" => $data["slika"]
];

$vesti[] = $n;
file_put_contents($vesti_file, json_encode($vesti, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "Vest uspešno sačuvana!";
?>
