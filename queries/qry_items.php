<?php
include 'includes/config.php';

// create query
$query = 'SELECT * FROM items';
// get result
$result = $connect->query($query);
// fetch data
$items = $result->fetchAll(PDO::FETCH_ASSOC);
