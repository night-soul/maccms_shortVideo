<?php
include 'db.php';
$conn = db_connect();
$video = get_random_video($conn);
?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>短视频</title>
    <link href="./dplayer/DPlayer.min.css" rel="stylesheet">
    <link href="./styles/style.css" rel="stylesheet">
    <script src="./dplayer/DPlayer.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
</head>

<body>
    <div id="player-container">
        <div id="dplayer"></div>
        <div id="video-title">
            <?php echo $video['vod_name']; ?>
        </div>
        <a href="<?php echo $video['video_html']; ?>" id="full-content">完整内容</a>
    </div>
    <a href="javascript:history.go(-1)" id="back-icon"><img src="images/back-icon.png" alt="Back"></a>

    <script src="scripts/script.js"></script>
</body>

</html>