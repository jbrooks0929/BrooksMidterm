<?php
//Used to test my connection to the api
require_once 'includes/config.php';

$url = $baseUrl .
    "Games/ByGameName?" .
    "apikey=" . $apiKey .
    "&name=Halo" .
    "&include=boxart,platform";

$json = file_get_contents($url);

echo "<pre>";
print_r(json_decode($json, true));
echo "</pre>";

?>