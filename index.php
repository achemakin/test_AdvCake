<?php
require 'Characters.php';

$characters = new Characters;

$result = $characters->revert("Привет! Давно не виделись.");

print($result);


