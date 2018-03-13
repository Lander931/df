<?php

require_once '../vendor/autoload.php';

$df = new \Lander931\DF\DF(true);
$file_system = $df->info('/dev/sda1');

print_r($file_system);