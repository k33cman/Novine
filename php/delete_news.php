<?php
$data = json_decode(file_get_contents("php://input"), true);
$vesti_file = "../json/vesti.json";

$vesti = json_decode(file_get_contents($vesti_file), true);
$novi_niz = [];

foreach ($vesti as $v) {
  if ($v["id"] != $data["id"]) {
    $novi_niz[] = $v;
  }
}

file_put_contents($vesti_file, json_encode($novi_niz, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "Vest uspešno obrisana!";
?>
