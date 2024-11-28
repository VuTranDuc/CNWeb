<?php
$json_products = file_get_contents("products.json");
$flowers = json_decode($json_products, true);