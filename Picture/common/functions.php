<?php
require_once '../config.php';

function getRandomPictureUrl()
{
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $result = $connection->query("SELECT MAX(annex_id) AS max_id, MIN(annex_id) AS min_id FROM mac_annex");
    $row = $result->fetch_assoc();
    $max_id = $row['max_id'];
    $min_id = $row['min_id'];

    $found = false;
    $row = null;

    while(!$found) {
        $random_id = mt_rand($min_id, $max_id);

        $query = "SELECT annex_file FROM mac_annex WHERE annex_id = $random_id";
        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $found = true;
        }
    }

    $connection->close();
    
    if (is_null($row)) {
        return null;
    }

    return SITE_URL . '/' . $row['annex_file'];
}
