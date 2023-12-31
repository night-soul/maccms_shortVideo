<?php
require_once '../config.php';
require_once 'common/functions.php';

$picture_url = getRandomPictureUrl();

?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>短图片</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <div class="image-container">
        <img id="randomImage" src="<?php echo $picture_url; ?>" alt="Random Image">
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>