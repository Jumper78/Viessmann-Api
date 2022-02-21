<?php
include __DIR__.'/bootstrap.php';
echo "LevelOne: " . $viessmannApi->getHeatingRodRuntime()."\n";
echo "LevelTwo: " . $viessmannApi->getHeatingRodRuntime("levelTwo")."\n";
