<?php
include 'db.php';

$conn = db_connect();
$video = get_random_video($conn);
header('Content-Type: application/json');
echo json_encode($video);
