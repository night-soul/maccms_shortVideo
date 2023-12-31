<?php
include 'config.php';

// 创建数据库连接
function db_connect()
{
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($connection->connect_error) {
        die("连接失败: " . $connection->connect_error);
    }
    return $connection;
}

function get_random_video($conn)
{
    $result = $conn->query("SELECT MAX(vod_id) AS max_id, MIN(vod_id) AS min_id FROM mac_vod");
    $row = $result->fetch_assoc();
    $max_id = $row['max_id'];
    $min_id = $row['min_id'];

    do {
        $random_id = mt_rand($min_id, $max_id);
        $query = "SELECT * FROM mac_vod WHERE vod_id = {$random_id}";
        $video = $conn->query($query)->fetch_assoc();
    } while (!$video);

    if (strpos($video['vod_play_url'], '#') !== false) {
        $url_parts = explode('#', $video['vod_play_url'], 2);
        $video['url_video'] = $url_parts[0];
    } else {
        $video['url_video'] = $video['vod_play_url'];
    }

    $video['video_html'] = SITE_URL . "/index.php/vod/detail/id/" . $video['vod_id'] . ".html";

    $video['url_video'] = preg_replace('/^.*\$/', '', $video['url_video']);

    if (strpos($video['url_video'], 'http') === false) {
        $video['url_video'] = SITE_URL . $video['url_video'];
    }

    return $video;
}
