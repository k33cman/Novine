<?php
$data = json_decode(file_get_contents("php://input"), true);
$vesti_file = "../json/vesti.json";

$vesti = json_decode(file_get_contents($vesti_file), true);

foreach ($vesti as &$v) {
  if ($v["id"] == $data["id"]) {
    $v["naslov"] = $data["naslov"];
    $v["tekst"] = $data["tekst"];
    $v["kategorija"] = $data["kategorija"];
    $v["slika"] = $data["slika"];
    $v["datum"] = $data["datum"];
    break;
  }
}

file_put_contents($vesti_file, json_encode($vesti, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "Vest uspešno izmenjena!";
?>
