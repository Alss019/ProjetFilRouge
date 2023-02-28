<?php
$bdd = new PDO(
    'mysql:host=localhost;dbname=statSport',
    'utils',
    '1234',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
);
