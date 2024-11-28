<?php $flower_json = file_get_contents("products.json");
$flowers = json_decode($flower_json, true);